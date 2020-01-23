@extends('layout')

@section('content')
    <div class="col-6">
        <h1>Edit {{ $clickoutURL->trackingLinkName }}</h1>
        <form class="form-horizontal pb-4" role="form" method="POST" action="{{ route('url.update' , $clickoutURL->id) }}">
            @csrf
            @method('patch')
            {{-- Id --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="id" class="control-label font-weight-bold">Id:</label>
                </div>
                <div class="col-5">
                    <input readonly type="text" name="id" id="id" placeholder="Id" value="{{ $clickoutURL->id }}" class="form-control" autofocus>
                </div>
            </div>
            {{-- Tracking Link name --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="trackingLinkName" class="control-label font-weight-bold">Tracking link name:</label>
                </div>
                <div class="col-5">
                    <input type="text" name="trackingLinkName" id="trackingLinkName" placeholder="Tracking link name" value="{{ $clickoutURL->trackingLinkName }}" class="form-control" autofocus>
                </div>
            </div>
            {{-- shortTrackingLink --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="shortTrackingLink" class="control-label font-weight-bold">Short tracking link:</label>
                </div>
                <div class="col-5">
                    <input type="text" name="shortTrackingLink" id="shortTrackingLink" placeholder="Short tracking link" value="{{ $clickoutURL->shortTrackingLink }}" class="form-control" autofocus>
                </div>
            </div>
            {{-- landingPage --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="landingPage" class="control-label font-weight-bold">Landing page:</label>
                </div>
                <div class="col-5">
                    <input type="text" name="landingPage" id="landingPage" placeholder="Landing page" value="{{ $clickoutURL->landingPage }}" class="form-control" autofocus>
                </div>
            </div>
            {{-- clickmeterCreationDate --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="clickmeterCreationDate" class="control-label font-weight-bold">Clickmeter creation date: YY-MM-DD</label>
                </div>
                <div class="col-5">
                    <input type="text" name="clickmeterCreationDate" id="clickmeterCreationDate" placeholder="Clickmeter creation date" value="{{ $clickoutURL->clickmeterCreationDate }}" class="form-control" autofocus>
                </div>
            </div>
            <button class="btn btn-primary">Edit</button>
            <a href="{{ config('variables.url') }}/urlFolder/url/{{ $clickoutURL->id }}" class="btn btn-primary">Cancel</a>
        </form>
    </div>
@endsection