@extends('layout')

@section('content')
<div class="row">
    <div class="col-4">
        <h3>{{ $country->name }}</h3>
        
            <form class="form-horizontal pb-4" role="form" method="POST" action="{{ route('country.update' , $country->id) }}">
                @csrf
                {{-- Id --}}
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label for="id" class="control-label">Id:</label>
                    </div>

                    <div class="col-6">
                        <label class="control-label font-weight-bold">{{ $country->id }}</label>

                    </div>
                        {{-- <input readonly type="text" name="id" id="id" placeholder="Id" value="{{ $country->id }}" class="form-control" autofocus> --}}
                </div>
                {{-- spId --}}
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label for="spId" class="control-label">Sp Id:</label>
                    </div>
                    <div class="col-6">
                        <label class="control-label font-weight-bold">{{ $country->spId }}</label>
                    </div>
                        
                        {{-- <input readonly type="text" name="spId" id="spId" placeholder="spId" value="{{ $country->spId }}" class="form-control" autofocus> --}}
                </div>
                {{-- Country name --}}
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label for="countryName" class="control-label">Country Name:</label>
                    </div>
                    <div class="col-6">
                        <label class="control-label font-weight-bold">{{ $country->name }}</label>
                    </div>
                        
                        {{-- <input readonly type="text" name="countryName" id="countryName" placeholder="Country Name" value="{{ $country->name }}" class="form-control" autofocus> --}}
                </div>
                {{-- Continent --}}
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label for="continent" class="control-label">Continent:</label>
                    </div>
                    <div class="col-6">
                        <label class="control-label font-weight-bold">{{ $country->continent }}</label>
                    </div>
                        
                        {{-- <input readonly type="text" name="continent" id="continent" placeholder="Continent" value="{{ $country->continent }}" class="form-control" autofocus> --}}
                </div>
                {{-- Currency code --}}
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label for="currencyCode" class="control-label">Currency Code:</label>
                    </div>
                    <div class="col-6">
                        <label class="control-label font-weight-bold">{{ $country->currencyCode }}</label>
                    </div>
                    {{-- <input readonly type="text" name="currencyCode" id="currencyCode" placeholder="Currency code" value="{{ $country->currencyCode }}" class="form-control" autofocus> --}}
                </div>
                {{-- Currency name --}}
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label for="currencyName" class="control-label">Currency Name:</label>
                    </div>
                    <div class="col-6">
                        <label class="control-label font-weight-bold">{{ $country->currencyName }}</label>
                    </div>
                        {{-- <input readonly type="text" name="currencyName" id="currencyName" placeholder="Currency Name" value="{{ $country->currencyName }}" class="form-control" autofocus> --}}
                </div>
                {{-- geonameId --}}
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label for="geonameId" class="control-label">Geoname Id:</label>
                    </div>
                    <div class="col-6">
                        <label class="control-label font-weight-bold">{{ $country->geonameId }}</label>

                    </div>
                        
                        {{-- <input readonly type="text" name="geonameId" id="geonameId" placeholder="Geoname Id" value="{{ $country->geonameId }}" class="form-control" autofocus> --}}
                    
                </div>
                <a href="{{ config('variables.url') }}/countryFolder/country/create" class=" btn btn-primary">New country</a>
                <a href="{{ config('variables.url') }}/countryFolder/country/{{ $country->id }}/edit" class="btn btn-primary">Edit</a>
                @method('DELETE')
                <button class="btn btn-danger mt-2 mb-2" type="submit">Delete</button>
                <a href="{{ config('variables.url') }}/countryFolder/country" class="btn btn-primary mt-2 mb-2" >Go Back</a>
            </form>
    </div>

    <div class="col-4">
        <h2>States</h2>
        <table class="table table-bordered table-striped mb-0" id="statesTable">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($country->states as $state)
                <tr>
                    <th scope="row">{{ $state->id }}</th>
                    <td>{{ $state->name }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="col-4">
        <h2>Cities</h2>
        <div class="table-wrapper-scroll-y" style="height: 200px">
            <table class="table table-bordered table-striped mb-0" id="citiesTable">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($country->cities as $city)
                        <tr>
                            <th scope="row">{{ $city->id }}</th>
                            <td>{{ $city->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
    </div>
</div>    
<script>
    $('#citiesTable').DataTable();
    $('#statesTable').DataTable();
</script>
@endsection