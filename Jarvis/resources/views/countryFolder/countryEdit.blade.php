@extends('layout')

@section('content')
    <div class="col-6">
        <h1>Edit {{ $country->name }}</h1>
        <form class="form-horizontal" role="form" method="POST" action="{{ route('country.update' , $country->id) }}">
            @csrf
            @method('PATCH')
            {{-- Id --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="id" class="control-label font-weight-bold">Id:</label>
                </div>
                <div class="col-6">
                    <input readonly type="text" name="id" id="id" placeholder="Id" value="{{ $country->id }}" class="form-control" autofocus>                    
                </div>
            </div>
            {{-- spId --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="spId" class="control-label font-weight-bold">Sp Id:</label>
                </div>
                <div class="col-6">
                    <input type="text" name="spId" id="spId" placeholder="spId" value="{{ $country->spId }}" class="form-control" autofocus>
                </div>
            </div>
            {{-- Country name --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="countryName" class="control-label font-weight-bold">Country Name:</label>
                </div>
                <div class="col-6">
                    <input type="text" name="countryName" id="countryName" placeholder="Country Name" value="{{ $country->name }}" class="form-control" autofocus>
                </div>
            </div>
            {{-- Continent --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="continent" class="control-label font-weight-bold">Continent:</label>
                </div>
                <div class="col-6">
                    <input type="text" name="continent" id="continent" placeholder="Continent" value="{{ $country->continent }}" class="form-control" autofocus>
                </div>
            </div>
            {{-- Currency code --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="currencyCode" class="control-label font-weight-bold">Currency Code:</label>
                </div>
                <div class="col-6">
                    <input type="text" name="currencyCode" id="currencyCode" placeholder="Currency code" value="{{ $country->currencyCode }}" class="form-control" autofocus>
                </div>
            </div>
            {{-- Currency name --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="currencyName" class="control-label font-weight-bold">Currency Name:</label>
                </div>
                <div class="col-6">
                    <input type="text" name="currencyName" id="currencyName" placeholder="Currency Name" value="{{ $country->currencyName }}" class="form-control" autofocus>
                </div>
            </div>
            {{-- geonameId --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="geonameId" class="control-label font-weight-bold">Geoname Id:</label>
                </div>
                <div class="col-6">
                    <input type="text" name="geonameId" id="geonameId" placeholder="Geoname Id" value="{{ $country->geonameId }}" class="form-control" autofocus>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-8">
                    <button class="btn btn-primary" style="width:49%">Edit</button>
                    <a href="{{ config('variables.url') }}/countryFolder/country/{{ $country->id }}" class="btn btn-primary" style="width:49%">Cancel</a>
                </div>
            </div>
        </form>
    </div>
@endsection