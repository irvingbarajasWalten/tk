<h6 class="fw-bold">{{$events["data"]["count"]}} resultados para la búsqueda</h6>
@foreach ($events["data"]["results"] as $event)
<div class="row mt-3 shadow-sm">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-2 col-sm-12 d-flex flex-column justify-content-center align-items-center">
                    {{$event["event_date"]}}
                </div>
                <div class="col-lg-10 col-sm-12">
                    <div class="row">
                        <div class="col-9">
                            <h2 class="fs-6 m-0 p-0 fw-semibold mb-1">{{$event["event_name"]}}</h2>
                            <span style="color:#77777;font-size:14px" class="mb-1">{{$event["event_time"]}} - {{$event["venue_name"]}} - {{$event["location"]["city_name"]}}, {{$event["location"]["state_name"]}}, {{$event["location"]["country_name"]}}</span><br>
                            <span class="badge bg-info rounded-pill mt-1">{{$event["categories"][0]}}</span>
                        </div>
                        <div class="col-3 d-flex flex-column justify-content-center">
                            <p class="mt-0 mb-0">Desde:</p>
                            <h5 class="m-0 p-0"><strong>{{$event["prices"]["lowPrice"]}} {{$event["prices"]["currency"]}}</strong> <span class="fs-6">c/u</span></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach