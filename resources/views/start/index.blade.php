@extends('layout.container')
@section('content')
<div class="d-flex justify-content-center align-items-center" style="height:100%">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-sm-12">
                <div class="card shadow">
                    <div class="card-body">
                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link btn-sm active" id="events-tab" data-bs-toggle="pill" data-bs-target="#eventFilters" type="button" role="tab" aria-controls="eventFilters" aria-selected="true">Eventos</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link btn-sm" id="destinations-tab" data-bs-toggle="pill" data-bs-target="#destinationFilters" type="button" role="tab" aria-controls="destinationFilters" aria-selected="false">Destinos</button>
                            </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="eventFilters" role="tabpanel" aria-labelledby="events-tab" tabindex="0">
                                <form action="{{route('events')}}" method="get" id="regularSearchForm" class="row">
                                    <div class="form-group col-lg-11 col-md-10 col-sm-8">
                                        <label for="searchInput" class="form-label">Búsqueda</label>
                                        <input class="form-control" id="regularSearchInput" name="search" type="text" placeholder="Evento, equipo, artista o ciudad" list="search-autocomplete">
                                        <input type="hidden" id="regularSearchIdValue" name="id" required>
                                        <input type="hidden" id="regularSearchType" name="type" required>
                                    </div>
                                    <div class="col-lg-1 col-md-2 col-sm-3 d-flex flex-column justify-content-end align-items-center">
                                        <button class="btn btn-primary p-3" type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="destinationFilters" role="tabpanel" aria-labelledby="destination-tab" tabindex="0">
                                <form action="{{route('events')}}" method="get" id="destinationSearchForm" class="row">
                                    <div class="form-group col-5">
                                        <label for="searchInput" class="form-label">Búsqueda</label>
                                        <input class="form-control" id="destinationSearchInput" name="search" type="text" placeholder="Destino, ciudad" required>
                                    </div>
                                    <input type="hidden" name="lat" id="destinationLat" required>
                                    <input type="hidden" name="long" id="destinationLong" required>
                                    <input type="hidden" name="rad" id="destinationRad" required>
                                    <input type="hidden" name="type" id="destinationSearchType" required>
                                    <input type="hidden" name="id" id="destinationSearchIdValue" required>
                                    <div class="form-group col-6">
                                        <div class="row">
                                            <label class="form-label">Fechas</label>
                                            <div class="col-6">
                                                <input class="form-control" id="startDate" type="date" name="startDate" placeholder="Fecha de entrada" value="{{$startDate??''}}" min="{{date('Y-m-d')}}" required>
                                            </div>
                                            <div class="col-6">
                                                <input class="form-control" id="endDate" type="date" name="endDate" placeholder="Fecha de salida" value="{{$endDate??''}}" min="{{date('Y-m-d')}}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-1 d-flex flex-column justify-content-end align-items-center">
                                        <button class="btn btn-primary p-3" type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                            </div>
                            
                        <div id="results"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="js/start.js"></script>
@endsection