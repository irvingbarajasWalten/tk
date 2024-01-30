<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\TicketeroController;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public static function index(Request $request){
        //validate parameters
        $request->validate(['id'=>'required|numeric|min:1','type'=>'required|min:4']);
        //set data
        $data = array(
            'id'=>$request->id,
            'type'=>$request->type,
            'search'=>$request->search,
            'startDate'=>$request->startDate??date('Y-m-d'),
            'endDate'=>$request->endDate??date('Y-m-d', strtotime(date('Y-m-d') . ' +7 days')),
            'lat'=>$request->lat??null,
            'long'=>$request->long??null,
            'city'=>$request->search??null,
            'rad'=>$request->rad??null
        );
        //return view
        return view('event.index',$data);
    }
    public static function getEvents(Request $request){
        //validate parameters
        $request->validate(['id'=>'required|numeric|min:1','type'=>'required|min:4']);
        //set request type
        $type = $request->type;
        //if request type is equals destination, then validate the specified parameters
        if($type=='destination'){
            $request->validate([
                'lat'=>'required|numeric',
                'long'=>'required|numeric',
                'search'=>'required|min:3',
                'startDate'=>'required|date',
                'endDate'=>'required|date',
                'rad'=>'required|numeric'
            ]);
        }
        //set data array for request
        $data = array(
            "searchType" => $type,
            "{$type}Id" => $request->id,
            "withPerformers" => false,
            'startDate'=>$request->startDate??null,
            'endDate'=>$request->endDate??null,
            'destination[latitude]'=>$request->lat??null,
            'destination[longitude]'=>$request->long??null,
            'destination[city]'=>$request->search??null,
            'destination[radius]'=>$request->rad??null
        );
        //return view with API response
        return view('event.event-list',['events'=>(StartController::apiRequest($data,'search/events')??null)]);
    }
}
