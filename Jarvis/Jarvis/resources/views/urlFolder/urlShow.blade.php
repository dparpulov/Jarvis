@extends('layout')

@section('content')
    <div class="col-4">
        <div class="row">
            <div class="col">
                <h3>Clickout URL: {{ $clickoutURL->id }}</h3>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <form class="form-horizontal pb-4" role="form" method="POST" action="{{ route('url.update', $clickoutURL->id) }}">
                    @csrf
                    {{-- Id --}}
                    <div class="form-group row">
                        <div class="col-3">
                            <label for="id" class="control-label">Id:</label>
                        </div>
                        <div class="col-5">
                            <label class="control-label font-weight-bold">{{ $clickoutURL->id }}</label>
                            
                            {{-- <input readonly type="text" name="id" id="id" placeholder="Id" value="{{ $clickoutURL->id }}" class="form-control" autofocus> --}}
                        </div>
                    </div>
                    {{-- trackingLinkName --}}
                    <div class="form-group row">
                        <div class="col-3">
                            <label for="trackingLinkName" class="control-label">Tracking link name:</label>
                        </div>
                        <div class="col-5">
                            <label class="control-label font-weight-bold">{{ $clickoutURL->trackingLinkName }}</label>
                            
                            {{-- <input readonly type="text" name="trackingLinkName" id="trackingLinkName" placeholder="Tracking link name" value="{{ $clickoutURL->trackingLinkName }}" class="form-control" autofocus> --}}
                        </div>
                    </div>
                    {{-- shortTrackingLink --}}
                    <div class="form-group row">
                        <div class="col-3">
                            <label for="shortTrackingLink" class="control-label">Short tracking link:</label>
                        </div>
                        <div class="col-5">
                            <label class="control-label font-weight-bold"><a href="{{ $clickoutURL->shortTrackingLink }}">{{ $clickoutURL->shortTrackingLink }}</a></label>
                            
                            {{-- <input readonly type="text" name="shortTrackingLink" id="shortTrackingLink" placeholder="Short tracking link" value="{{ $clickoutURL->shortTrackingLink }}" class="form-control" autofocus> --}}
                        </div>
                    </div>
                    {{-- landingPage --}}
                    <div class="form-group row">
                        <div class="col-3">
                            <label for="landingPage" class="control-label">Landing page:</label>
                        </div>
                        <div class="col-5">
                            <label class="control-label font-weight-bold"><a href="{{ $clickoutURL->landingPage }}">{{ $clickoutURL->landingPage }}</a></label>
                            
                            {{-- <input readonly type="text" name="landingPage" id="landingPage" placeholder="Landing page" value="{{ $clickoutURL->landingPage }}" class="form-control" autofocus> --}}
                        </div>
                    </div>
                    {{-- clickmeterCreationDate --}}
                    <div class="form-group row">
                        <div class="col-3">
                            <label for="clickmeterCreationDate" class="control-label">Clickmeter creation date:</label>
                        </div>
                        <div class="col-5">
                            <label class="control-label font-weight-bold">{{ $clickoutURL->clickmeterCreationDate }}</label>
                            
                            {{-- <input readonly type="text" name="clickmeterCreationDate" id="clickmeterCreationDate" placeholder="Clickout URL" value="{{ $clickoutURL->clickmeterCreationDate }}" class="form-control" autofocus> --}}
                        </div>
                    </div>
                        <a href="{{ config('variables.url') }}/urlFolder/url/create" class=" btn btn-primary">New Clickout URL</a>
                        <a href="{{ config('variables.url') }}/urlFolder/url/{{ $clickoutURL->id }}/edit" class="btn btn-primary">Edit</a>
                        @method('DELETE')
                        <button class="btn btn-danger mt-2 mb-2" type="submit">Delete</button>
                        <a href="{{ config('variables.url') }}/urlFolder/url" class="btn btn-primary mt-2 mb-2">Go Back</a>
                </form>
            </div>
        </div>
    </div>
@endsection