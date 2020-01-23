@extends('layout')

@section('content')
    <div class="col-4">
        <h1>Edit {{ $state->name }}</h1>

        <form class="form-horizontal pb-4" role="form" method="POST" action="{{ route('state.update' , $state->id) }}">
            @csrf
            @method('patch')
                {{-- id --}}
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label for="id" class="control-label font-weight-bold">Id:</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" name="id" id="id" placeholder="Id" value="{{ $state->id }}" class="form-control" autofocus>
                    </div>
                </div>
                {{-- name --}}
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label for="name" class="control-label font-weight-bold">State name:</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" name="name" id="stateName" placeholder="Name" value="{{ $state->name }}" class="form-control" autofocus>
                    </div>
                </div>
                {{-- Country Id --}}
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label for="countryId" class="control-label font-weight-bold">Country Id:</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" name="countryId" id="countryId" placeholder="Country Id" value="{{ $state->countryId }}" class="form-control" autofocus>
                    </div>
                </div>
                {{-- State Code --}}
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label for="stateCode" class="control-label font-weight-bold">State Code:</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" name="stateCode" id="stateCode" placeholder="State code" value="{{ $state->stateCode }}" class="form-control" autofocus>
                    </div>
                </div>
                {{-- List of cities --}}
                <div class="form-group row">
                    <div class="col-12">
                        <button class="btn btn-primary" style="width: 49%">Edit</button>
                        <a href="{{ config('variables.url') }}/stateFolder/state/{{ $state->id }}" class="btn btn-primary" style="width: 49%">Cancel</a>
                    </div>
                </div>
        </form>
    </div>
@endsection