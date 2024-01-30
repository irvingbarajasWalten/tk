<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class StartController extends Controller
{
    public function index(){
        return view('start.index');
    }
    //get autocomplete result from passed query
    public static function getAutocomplete(Request $request){
        $request->validate([
            'search'=>'required|min:2'
        ]);
        $data = array(
            'q'=>$request->search,
            'limit'=>6
        );
        $result = StartController::apiRequest($data,'search/autocomplete');
        $autocompleteData = array_merge(
            $result['data']['results']['performers'],
            $result['data']['results']['venues'],
            $result['data']['results']['destinations']);
        return view('start.autocomplete-list',[
            'autocompleteData'=>$autocompleteData,
        ]);
    }
    //ticketero api request definition
    public static function apiRequest($data, $action){
        $httpClient = new Client();
        $url = config('constants.options.ticketeroUrl') . $action;
        $response = $httpClient->request('GET', $url, [
            'query' => $data,
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer '.config('constants.options.ticketeroAuthToken'),
            ],
        ]);
        $resultArray = json_decode($response->getBody(), true);
        return $resultArray;
    }
}
