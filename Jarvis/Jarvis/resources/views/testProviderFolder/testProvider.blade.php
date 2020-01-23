@extends('layout')

@section('content')
<h1>Test providers</h1>

<div class="col-3 mt-2 mb-2 ml-0">
    <div class="row">
        <a href="{{ config('variables.url') }}/testProviderFolder/testProvider/create" style="width: 100%" class=" btn btn-primary mr-4">New test provider</a>
    </div>
</div>

@if(count($testProviders) > 0)

<div class="mt-2 mb-2 ml-0">
    {{-- Tabs for the different tables --}}
    <ul class="nav nav-tabs nav-tabs-fillup" data-init-reponsive-tabs="dropdownfx" role="tablist">
        <li class="nav-item mr-4">
            <a data-toggle="tab" class="nav-link active" href="#testProviders"><span>Test providers</span></a>
        </li>
        {{-- <li class="nav-item mr-4">
            <a data-toggle="tab" class="nav-link " href="#cities"><span>Cities</span></a>
        </li> --}}
    </ul>
</div>

{{-- All testProviders tab --}}
@include('testProviderFolder.allTestProvidersTab')
@else
    <h2>No data found!</h2>
@endif


<script>
    //$('#allTestProviders').DataTable();
</script>
@endsection
