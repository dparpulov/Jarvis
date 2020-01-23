@extends('layout')

@section('content')
<h1>Test Types</h1>

<div class="col-3 mt-2 mb-2 ml-0">
    <div class="row">
        <a href="{{ config('variables.url') }}/testTypeFolder/testType/create" style="width: 100%" class=" btn btn-primary mr-4">New test type</a>
    </div>
</div>


@if(count($testTypes) > 0)

    <div class="mt-2 mb-2 ml-0">
        {{-- Tabs for the different tables --}}
        <ul class="nav nav-tabs nav-tabs-fillup" data-init-reponsive-tabs="dropdownfx" role="tablist">
            <li class="nav-item mr-4">
                <a data-toggle="tab" style="width: 100%" class="nav-link active" href="#tests"><span>Test Types</span></a>
            </li>
            {{-- <li class="nav-item mr-4">
                <a data-toggle="tab" class="nav-link " href="#cities"><span>Cities</span></a>
            </li> --}}
        </ul>
    </div>

{{-- All test types tab --}}
@include('testTypeFolder.allTestTypesTab')
@else
<h2>No data found!</h2>
@endif


<script>
    //$('#allTestTypes').DataTable();
</script>
@endsection
