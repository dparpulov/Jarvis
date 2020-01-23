@extends('layout')

@section('content')
    <div class="col-6">
        <h1>New country</h1>
        <form class="form-horizontal pb-4" role="form" method="POST" action="{{ route('country.store') }}">
            @csrf
            {{-- Id --}}
            <div class="form-group row">
                <div class="col-sm-9">
                    <input type="text" name="id" id="id" placeholder="Id" class="form-control" autofocus>
                </div>
            </div>
            {{-- spId --}}
            <div class="form-group row">
                <div class="col-sm-9">
                    <input type="text" name="spId" id="spId" placeholder="spId" class="form-control" autofocus>
                </div>
            </div>
            {{-- Country name --}}
            <div class="form-group row">
                <div class="col-sm-9">
                    <input type="text" name="countryName" id="countryName" placeholder="Country Name" class="form-control" autofocus>
                </div>
            </div>
            {{-- Continent --}}
            <div class="form-group row">
                <div class="col-sm-9">
                    <input type="text" name="continent" id="continent" placeholder="Continent" class="form-control" autofocus>
                </div>
            </div>
            {{-- Currency code --}}
            <div class="form-group row">
                <div class="col-sm-9">
                    <input type="text" name="currencyCode" id="currencycode" placeholder="Currency code" class="form-control" autofocus>
                </div>
            </div>
            {{-- Currency name --}}
            <div class="form-group row">
                <div class="col-sm-9">
                    <input type="text" name="currencyName" id="currencyName" placeholder="Currency Name" class="form-control" autofocus>
                </div>
            </div>
            {{-- geonameId --}}
            <div class="form-group row">
                <div class="col-sm-9">
                    <input type="text" name="geonameId" id="geonameId" placeholder="Geoname Id" class="form-control" autofocus>
                </div>
            </div>
            <button class="btn btn-primary">Add Country</button>
            <a type="button" href="{{ config('variables.url') }}/countryFolder/country" class="btn btn-primary">Cancel</a>
        </form>
    </div>
    
@endsection