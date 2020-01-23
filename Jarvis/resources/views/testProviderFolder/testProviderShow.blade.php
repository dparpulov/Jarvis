@extends('layout')

@section('content')
    <div class="col-6">
        <h3>{{ $testProvider->name }}</h3>
        <form class="form-horizontal pb-4" role="form" method="POST" action="{{ route('testProvider.update' , $testProvider->id) }}">
            @csrf
            {{-- Id --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="id" class="control-label">Id:</label>
                </div>
                <div class="col-5">
                    <label class="control-label font-weight-bold">{{ $testProvider->id }}</label>
                    
                    {{-- <input readonly type="text" name="id" id="id" placeholder="Id" value="{{ $testProvider->id }}" class="form-control" autofocus> --}}
                </div>
            </div>
            {{-- Name --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="name" class="control-label">Sp Id:</label>
                </div>
                <div class="col-5">
                    <label class="control-label font-weight-bold">{{ $testProvider->name }}</label>

                    {{-- <input readonly type="text" name="name" id="name" placeholder="Name" value="{{ $testProvider->name }}" class="form-control" autofocus> --}}
                </div>
            </div>
            {{-- Promote --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="promote" class="control-label">Promote:</label>
                </div>
                <div class="col-5">
                    <label class="control-label font-weight-bold">{{ $testProvider->promote }}</label>

                    {{-- <input readonly type="text" name="promote" id="promote" placeholder="Promote" value="{{ $country->promote }}" class="form-control" autofocus> --}}
                </div>
            </div>
            <a href="{{ config('variables.url') }}/testProviderFolder/testProvider/create" class=" btn btn-primary">New Test Provider</a>
            <a href="{{ config('variables.url') }}/testProviderFolder/testProvider/{{ $testProvider->id }}/edit" class="btn btn-primary">Edit</a>
            @method('DELETE')
            <button class="btn btn-danger mt-2 mb-2" type="submit">Delete</button>
            <a href="{{ config('variables.url') }}/testProviderFolder/testProvider" class="btn btn-primary mt-2 mb-2" >Go Back</a>
        </form>
    </div>
@endsection