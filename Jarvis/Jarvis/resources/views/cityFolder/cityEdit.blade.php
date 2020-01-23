@extends('layout')

@section('content')
    <div class="col-6">
        <h1>Edit city: {{ $city->name }}</h1>
        <form class="form-horizontal pb-4" role="form" method="POST" action="{{ route('city.update' , $city->id) }}">
            @csrf
            @method('patch')
            {{-- id --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="id" class="control-label font-weight-bold">Id:</label>
                </div>
                <div class="col-5">
                    <label class="control-label font-weight-bold">{{ $city->id }}</label>
                    {{-- <input readonly type="text" name="id" id="id" placeholder="id" value="{{ $city->id }}" class="form-control" autofocus> --}}
                </div>
            </div>
            {{-- countryId --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="countryId" class="control-label font-weight-bold">Country:</label>
                </div>
                <div class="col-5">
                    <input type="text" name="countryId" id="countryId" placeholder="Country Id" value="{{ $city->countryId }}" class="form-control" autofocus>
                </div>
            </div>
            {{-- stateId --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="stateId" class="control-label font-weight-bold">State:</label>
                </div>
                <div class="col-5">
                    <input type="text" name="stateId" id="stateId" placeholder="State Id" value="{{ $city->stateId }}" class="form-control" autofocus>
                </div>
            </div>
            {{-- name --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="cityName" class="control-label font-weight-bold">Name:</label>
                </div>
                <div class="col-5">
                    <input type="text" name="cityName" id="cityName" placeholder="Name" value="{{ $city->name }}" class="form-control" autofocus>
                </div>
            </div>
            {{-- alternativeName --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="alternativeName" class="control-label font-weight-bold">Alternative Name:</label>
                </div>
                <div class="col-5">
                    <input type="text" name="alternativeName" id="alternativeName" placeholder="Alternative Name" value="{{ $city->alternativeName }}" class="form-control" autofocus>
                </div>
            </div>
            {{-- lng --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="lng" class="control-label font-weight-bold">Longitude:</label>
                </div>
                <div class="col-5">
                    <input type="text" name="lng" id="lng" placeholder="Longitude" value="{{ $city->lng }}" class="form-control" autofocus>
                </div>
            </div>
            {{-- lat --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="lat" class="control-label font-weight-bold">Latitude:</label>
                </div>
                <div class="col-5">
                    <input type="text" name="lat" id="lat" placeholder="Latitude" value="{{ $city->lat }}" class="form-control" autofocus>
                </div>
            </div>
            {{-- description --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="description" class="control-label font-weight-bold">Description:</label>
                </div>
                <div class="col-5">
                    <input type="text" name="description" id="description" placeholder="Description" value="{{ $city->description }}" class="form-control" autofocus>
                </div>
            </div>
            {{-- inhabitants --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="inhabitants" class="control-label font-weight-bold">Inhabitants:</label>
                </div>
                <div class="col-5">
                    <input type="text" name="inhabitants" id="inhabitants" placeholder="Inhabitants" value="{{ $city->inhabitants }}" class="form-control" autofocus>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-8">
                    <button class="btn btn-primary" style="width:49%">Edit</button>
                    <a href="{{ config('variables.url') }}/cityFolder/city/{{ $city->id }}" class="btn btn-primary" style="width:49%">Cancel</a>        
                </div>
            </div>
        </form>
    </div>
</div>
@endsection