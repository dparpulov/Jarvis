@extends('layout')

@section('content')
    <h1>Add new city</h1>
    <div class="container col-6 ml-0">
        <form class="form-horizontal pb-4" role="form" method="POST" action="{{ route('city.store') }}">
            @csrf
            {{-- id --}}
            <div class="form-group row">
                <div class="col-sm-9">
                    <input type="text" name="id" id="id" placeholder="id" class="form-control" autofocus>
                </div>
            </div>
            {{-- countryId --}}
            <div class="form-group row">
                <div class="col-sm-9">
                    <input type="text" name="countryId" id="countryId" placeholder="Country Id" class="form-control" autofocus>
                </div>
            </div>
            {{-- stateId --}}
            <div class="form-group row">
                <div class="col-sm-9">
                    <input type="text" name="stateId" id="stateId" placeholder="State Id" class="form-control" autofocus>
                </div>
            </div>
            {{-- name --}}
            <div class="form-group row">
                <div class="col-sm-9">
                    <input type="text" name="cityName" id="cityName" placeholder="Name" class="form-control" autofocus>
                </div>
            </div>
            {{-- alternativeName --}}
            <div class="form-group row">
                <div class="col-sm-9">
                    <input type="text" name="alternativeName" id="alternativeName" placeholder="Alternative Name" class="form-control" autofocus>
                </div>
            </div>
            {{-- lng --}}
            <div class="form-group row">
                <div class="col-sm-9">
                    <input type="text" name="lng" id="lng" placeholder="Longitude" class="form-control" autofocus>
                </div>
            </div>
            {{-- lat --}}
            <div class="form-group row">
                <div class="col-sm-9">
                    <input type="text" name="lat" id="lat" placeholder="Latitude" class="form-control" autofocus>
                </div>
            </div>
            {{-- description --}}
            <div class="form-group row">
                <div class="col-sm-9">
                    <input type="text" name="description" id="description" placeholder="Description" class="form-control" autofocus>
                </div>
            </div>
            {{-- inhabitants --}}
            <div class="form-group row">
                <div class="col-sm-9">
                    <input type="text" name="inhabitants" id="inhabitants" placeholder="Inhabitants" class="form-control" autofocus>
                </div>
            </div>
            <button class="btn btn-primary">Add City</button>
            <a type="button" href="{{ config('variables.url') }}/cityFolder/city" class="btn btn-primary">Cancel</a>
        </form>
    </div>
@endsection