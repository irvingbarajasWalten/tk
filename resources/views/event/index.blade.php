@extends('layout.container')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-10 offset-lg-1 col-sm-12 mt-3 shadow-sm">
            <div class="row">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('events')}}" method="get" id="destinationSearchForm" class="row">
                            <div class="form-group col-lg-5 col-sm-12">
                                <label for="searchInput" class="form-label">Búsqueda</label>
                                <input class="form-control" id="destinationSearchInput" name="search" type="text" placeholder="Destino, ciudad" value="{{$search}}" required>
                            </div>
                            <input type="hidden" name="lat" id="destinationLat" value="{{$lat??null}}" required>
                            <input type="hidden" name="long" id="destinationLong" value="{{$long??null}}" required>
                            <input type="hidden" name="rad" id="destinationRad" value="{{$rad??null}}" required>
                            <input type="hidden" name="type" id="destinationSearchType" value="{{$type??null}}" required>
                            <input type="hidden" name="id" id="destinationSearchIdValue" value="{{$id??null}}" required>
                            <div class="form-group col-lg-6 col-sm-12">
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
                            <div class="col-lg-1 col-sm-12 d-flex flex-column justify-content-end align-items-center">
                                <button class="btn btn-primary p-3" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </form>
                        <div id="results" class="shadow-sm"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-md-10 col-sm-12 offset-lg-3 offset-md-1 mt-3" id="events-content">
            
        </div>
    </div>
</div>
<script src="js/event.js"></script>
@endsection