@extends('layout')

@section('content')
    <div class="col-4">
        <h1>Edit {{ $test->name }}</h1>
        <form class="form-horizontal pb-4" role="form" method="POST" action="{{ route('test.update' , $test->id) }}">
            @csrf
            @method('patch')
            {{-- Id --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="id" class="control-label font-weight-bold">Id:</label>
                </div>
                <div class="col-7">
                    <input readonly type="text" name="id" id="id" placeholder="Id" value="{{ $test->id }}" class="form-control" autofocus>
                </div>
            </div>
            {{-- Name --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="name" class="control-label font-weight-bold">Name:</label>
                </div>
                <div class="col-7">
                    <input type="text" name="name" id="name" placeholder="Name" value="{{ $test->name }}" class="form-control" autofocus>
                </div>
            </div>
            <button class="btn btn-primary">Edit</button>
            <a href="{{ config('variables.url') }}/testFolder/test/{{ $test->id }}" class="btn btn-primary">Cancel</a>
        </form>
    </div>
@endsection