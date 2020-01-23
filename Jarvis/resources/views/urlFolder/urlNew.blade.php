@extends('layout')

@section('content')
    <div class="col-3 ml-0">
        <h1> New clickout URL</h1>
        <form class="form-horizontal pb-4" role="form" method="POST" action="{{ route('url.store') }}">
            @csrf
            {{-- trackingLinkName --}}
            <div class="form-group row">
                <div class="col-sm-12">
                    <input type="text" name="trackingLinkName" id="trackingLinkName" placeholder="Tracking link name" class="form-control" autofocus>
                </div>
            </div>
            {{-- shortTrackingLink --}}
            <div class="form-group row">
                <div class="col-sm-12">
                    <input type="text" name="shortTrackingLink" id="shortTrackingLink" placeholder="Short tracking link" class="form-control" autofocus>
                </div>
            </div>
            {{-- landingPage --}}
            <div class="form-group row">
                <div class="col-sm-12">
                    <input type="text" name="landingPage" id="landingPage" placeholder="Landing page" class="form-control" autofocus>
                </div>
            </div>
            {{-- clickmeterCreationDate  --}}
            <div class="form-group row">
                <div class="col-sm-12">
                    <input type="text" name="clickmeterCreationDate" id="clickmeterCreationDate" placeholder="Clickmeter creation date (YY-MM-DD)" class="form-control" autofocus>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button class="btn btn-primary" style="width: 100%">Add Url</button>
                </div>
                <div class="col">
                    <a type="button" href="{{ config('variables.url') }}/urlFolder/url" class="btn btn-primary" style="width: 100%">Cancel</a>
                </div>
            </div>
        </form>
    </div>
    
@endsection