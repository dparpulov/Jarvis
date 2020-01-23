@extends('layout')

@section('content')
    <h1>Cities</h1>
    
    <div class="col-3 mt-2 mb-2 ml-0">
        <div class="row">
            <a href="{{ config('variables.url') }}/cityFolder/city/create" style="width: 100%" class=" btn btn-primary mr-4">New city</a>
        </div>
    </div>

    {{-- @if(count($cities) > 0) --}}

    <div class="mt-2 mb-2 ml-0">
        {{-- Tabs for the different tables --}}
        <ul class="nav nav-tabs nav-tabs-fillup" data-init-reponsive-tabs="dropdownfx" role="tablist">
            {{-- <li class="nav-item mr-4">
                <a data-toggle="tab" class="nav-link active" href="#countries"><span>Countries</span></a>
            </li> --}}
            <li class="nav-item mr-4">
                <a data-toggle="tab" class="nav-link active" href="#cities"><span>Cities</span></a>
            </li>
        </ul>
    </div>


    {{-- All cities tab --}}
    @include('cityFolder.allCitiesTab')
    {{-- @else
        <h2>No data found!</h2>
    @endif --}}

{{-- <script>
('#allCities').DataTable();
</script> --}}
    {{-- <script>
        ('#allCities').DataTable();
        $(document).ready(function() {
            $('#allCities').DataTable({
                //"serverSide": true,
                "ajax" : '{{ config('variables.url') }}/cityFolder/city/data',
                "columns": [
                    {"data": "id"},
                    {"data": "countryId"},
                    {"data": "stateId"},
                    {"data": "name"},
                    {"data": "alternativeName"},
                    {"data": "lng"},
                    {"data": "lat"},
                    {"data": "description"},
                    {"data": "inhabitants"},
                ],
                "deferRender": true,
            });
        } );
    </script> --}}
@endsection