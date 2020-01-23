@extends('layout')

@section('content')
    <div class="col-6">
        <h3>Edit {{ $testProvider->name }}</h3>
        <form class="form-horizontal pb-4" role="form" method="POST" action="{{ route('testProvider.update' , $testProvider->id) }}">
            @csrf
            @method('patch')
            {{-- Id --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="id" class="control-label font-weight-bold">Id:</label>
                </div>
                <div class="col-5">
                    <input readonly type="text" name="id" id="id" placeholder="Id" value="{{ $testProvider->id }}" class="form-control" autofocus>
                </div>
            </div>
            {{-- Name --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="name" class="control-label font-weight-bold">Name:</label>
                </div>
                <div class="col-5">
                    <input type="text" name="name" id="name" placeholder="Name" value="{{ $testProvider->name }}" class="form-control" autofocus>
                </div>
            </div>
            {{-- Promote --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="promote" class="control-label font-weight-bold">Promote:</label>
                </div>
                <div class="col-5">
                    <input type="text" name="promote" id="promote" placeholder="Promote" value="{{ $testProvider->promote }}" class="form-control" autofocus>
                </div>
            </div>
            <button class="btn btn-primary">Edit</button>
            <a href="{{ config('variables.url') }}/testProviderFolder/testProvider/{{ $testProvider->id }}" class="btn btn-primary">Cancel</a>
        </form>
    </div>
@endsection