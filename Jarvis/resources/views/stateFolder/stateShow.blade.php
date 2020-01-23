@extends('layout')

@section('content')
<div class="row">

    <div class="col-4">
        <h1>{{ $state->name }}</h1>
        <form class="form-horizontal pb-4" role="form" method="POST" action="{{ route('state.update' , $state->id) }}">
            @csrf
            {{-- state Id --}}
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="id" class="control-label">Id:</label>
                </div>
                <div class="col-6">
                    <label class="control-label font-weight-bold">{{ $state->id }}</label>

                    {{-- <input readonly type="text" name="stateId" id="stateId" placeholder="Id" value="{{ $state->id }}" class="form-control" autofocus> --}}
                </div>
            </div>
            {{-- name --}}
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="name" class="control-label">Name:</label>
                </div>
                <div class="col-6">
                    <label class="control-label font-weight-bold">{{ $state->name }}</label>

                    {{-- <input readonly type="text" name="stateName" id="stateName" placeholder="Name" value="{{ $state->name }}" class="form-control" autofocus> --}}
                </div>
            </div>
            {{-- Country Id --}}
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="countryId" class="control-label">Country id:</label>
                </div>
                <div class="col-6">
                    <label class="control-label font-weight-bold">{{ $state->countryId }} ({{ $state->country->name }})</label>

                    {{-- <input readonly type="text" name="countryId" id="countryId" placeholder="Country Id" value="{{ $state->countryId }}" class="form-control" autofocus> --}}
                </div>
            </div>
            {{-- State code --}}
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="stateCode" class="control-label">State code:</label>
                </div>
                <div class="col-6">
                    <label class="control-label font-weight-bold">{{ $state->stateCode }}</label>

                    {{-- <input readonly type="text" name="stateCode" id="stateCode" placeholder="State code" value="{{ $state->stateCode }}" class="form-control" autofocus> --}}
                </div>
            </div>
            <a href="{{ config('variables.url') }}/stateFolder/state/create" class=" btn btn-primary">New state</a>
            <a href="{{ config('variables.url') }}/stateFolder/state/{{ $state->id }}/edit" class="btn btn-primary">Edit</a>
            @method('DELETE')
            <button class="btn btn-danger mt-2 mb-2" type="submit">Delete</button>
            <a href="{{ config('variables.url') }}/stateFolder/state" class="btn btn-primary mt-2 mb-2" >Go Back</a>
        </form>
    </div>

    {{-- List all cities --}}
    <div class="col-6">
        <h2>Cities</h2>
        <table class="table table-bordered table-striped mb-0" id="citiesTable">
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Name</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($state->cities as $city)
                <tr>
                    <th scope="row">{{ $city->id }}</th>
                    <td>{{ $city->name }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

    <script>
        $('#citiesTable').DataTable({});
    </script>
@endsection