@extends('layout')

@section('content')
    <div class="col-6">
        <h1>New state</h1>
        <form class="form-horizontal pb-4" role="form" method="POST" action="{{ route('state.store') }}">
            @csrf
            {{-- name --}}
            <div class="form-group row">
                <div class="col-sm-9">
                    <input type="text" name="stateName" id="stateName" placeholder="Name" class="form-control" autofocus>
                </div>
            </div>
            {{-- Country Id --}}
            <div class="form-group row">
                <div class="col-sm-9">
                    <input type="text" name="countryId" id="countryId" placeholder="Country Id" class="form-control" autofocus>
                </div>
            </div>
            {{-- State code --}}
            <div class="form-group row">
                <div class="col-sm-9">
                    <input type="text" name="stateCode" id="stateCode" placeholder="State code" class="form-control" autofocus>
                </div>
            </div>

            <button class="btn btn-primary">Add State</button>
            <a type="button" href="{{ config('variables.url') }}/stateFolder/state" class="btn btn-primary">Cancel</a>
        </form>
    </div>
    
@endsection