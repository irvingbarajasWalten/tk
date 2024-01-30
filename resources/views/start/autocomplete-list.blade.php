<ul class="list-group">
    @foreach($autocompleteData as $data)
    <li class="list-group-item d-flex flex-row align-items-center justify-content-start" search="{{$data["name"]}}" searchId="{{$data["id"]}}" searchType="{{$data["typeSearch"]}}" long="{{$data["lng"]??null}}" lat="{{$data["lat"]??null}}" rad="{{$data["radius"]??null}}" onclick="autoFill($(this))"><i class="fa fa-search" style="margin-right:15px;font-size:20px;color:#999999;"></i> <span class="ml-4">{{$data['name']}}</span>
    @endforeach
</ul>
