@extends('layout')

@section('content')
    <div class="col-4">
        <h1>{{ $city->name }}</h1>
        <form class="form-horizontal pb-4" role="form" method="POST" action="{{ route('city.update' , $city->id) }}">
            @csrf
            {{-- id --}}
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="id" class="control-label">Id:</label>
                </div>
                <div class="col-6">
                    <label class="control-label font-weight-bold">{{ $city->id }}</label>
                    
                    {{-- <input readonly type="text" name="id" id="id" placeholder="Id" value="{{ $city->id }}" class="form-control" autofocus> --}}
                </div>
            </div>
            {{-- countryId --}}
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="countryId" class="control-label">Country:</label>
                </div>
                <div class="col-6">
                    <label class="control-label font-weight-bold">{{ $city->countryId }}</label>
                    
                    {{-- <input readonly type="text" name="countryId" id="countryId" placeholder="Country Id" value="{{ $city->countryId }}" class="form-control" autofocus> --}}
                </div>
            </div>
            {{-- stateId --}}
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="stateId" class="control-label">State:</label>
                </div>
                <div class="col-6">
                    <label class="control-label font-weight-bold">{{ $city->stateId }}</label>
                    
                    {{-- <input readonly type="text" name="stateId" id="stateId" placeholder="State Id" value="{{ $city->stateId }}" class="form-control" autofocus> --}}
                </div>
            </div>
            {{-- name --}}
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="cityName" class="control-label">Name:</label>
                </div>
                <div class="col-6">
                    <label class="control-label font-weight-bold">{{ $city->name }}</label>
                    
                    {{-- <input readonly type="text" name="cityName" id="cityName" placeholder="Name" value="{{ $city->name }}" class="form-control" autofocus> --}}
                </div>
            </div>
            {{-- alternativeName --}}
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="alternativeName" class="control-label">Alternative Name:</label>
                </div>
                <div class="col-6">
                    <label class="control-label font-weight-bold">
                        @if($city->alternativeName != '')
                            {{ $city->alternativeName }}
                        @else
                            No alternative
                        @endif 
                    </label>
                    
                    {{-- <input readonly type="text" name="alternativeName" id="alternativeName" placeholder="Alternative Name" value="{{ $city->alternativeName }}" class="form-control" autofocus> --}}
                </div>
            </div>
            {{-- lng --}}
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="lng" class="control-label">Longitude:</label>
                </div>
                <div class="col-6">
                    <label class="control-label font-weight-bold">{{ $city->lng }}</label>
                    
                    {{-- <input readonly type="text" name="lng" id="lng" placeholder="Longitude" value="{{ $city->lng }}" class="form-control" autofocus> --}}
                </div>
            </div>
            {{-- lat --}}
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="lat" class="control-label">Latitude:</label>
                </div>
                <div class="col-6">
                    <label class="control-label font-weight-bold">{{ $city->lat }}</label>
                    
                    {{-- <input readonly type="text" name="lat" id="lat" placeholder="Latitude" value="{{ $city->lat }}" class="form-control" autofocus> --}}
                </div>
            </div>
            {{-- description --}}
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="description" class="control-label">Description:</label>
                </div>
                <div class="col-6">
                    <label class="control-label font-weight-bold">{{ $city->description }}</label>
                    
                    {{-- <input readonly type="text" name="description" id="description" placeholder="Description" value="{{ $city->description }}" class="form-control" autofocus> --}}
                </div>
            </div>
            {{-- inhabitants --}}
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="inhabitants" class="control-label">Inhabitants:</label>
                </div>
                <div class="col-6">
                    <label class="control-label font-weight-bold">{{ $city->inhabitants }}</label>
                    
                    {{-- <input readonly type="text" name="inhabitants" id="inhabitants" placeholder="Inhabitants" value="{{ $city->inhabitants }}" class="form-control" autofocus> --}}
                </div>
            </div>
            <a href="{{ config('variables.url') }}/cityFolder/city/create" class=" btn btn-primary">New city</a>
            <a href="{{ config('variables.url') }}/cityFolder/city/{{ $city->id }}/edit" class="btn btn-primary">Edit</a>
            @method('DELETE')
            <button class="btn btn-danger mt-2 mb-2" type="submit">Delete</button>
            <a href="{{ config('variables.url') }}/cityFolder/city" class="btn btn-primary mt-2 mb-2" >Go Back</a>
        </form>
    </div>
</div>
    
@endsection