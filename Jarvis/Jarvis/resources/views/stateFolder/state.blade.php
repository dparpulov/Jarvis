@extends('layout')

@section('content')
<h1>States</h1>

<div class="col-3 mt-2 mb-2 ml-0">
    <div class="row">
        <a href="{{ config('variables.url') }}/stateFolder/state/create" style="width: 100%" class="btn btn-primary mr-4">New state</a>
    </div>
</div>

@if(count($states) > 0)

<div class="mt-2 mb-2 ml-0">
    {{-- Tabs for the different tables --}}
    <ul class="nav nav-tabs nav-tabs-fillup" data-init-reponsive-tabs="dropdownfx" role="tablist">
        <li class="nav-item mr-4">
            <a data-toggle="tab" class="nav-link active" href="#states"><span>States</span></a>
        </li>
        {{-- <li class="nav-item mr-4">
            <a data-toggle="tab" class="nav-link " href="#cities"><span>Cities</span></a>
        </li> --}}
    </ul>
</div>

{{-- All states tab --}}
@include('stateFolder.allStatesTab')
@else
<h2>No data found!</h2>
@endif

<script>
    // $(document).ready(function(){
    //     $('#allStates').DataTable({
    //         "ajax": '/stateFolder/state/data',
    //         "columns": [
    //             { "data": "id" },
    //             { "data": "name" },
    //             { "data": "countryId" },
    //             { "data": "stateCode" }
    //         ],
    //         "pageLength": 25,            
    //         "deferRender": true,
    //     });
    // });
</script>
@endsection
