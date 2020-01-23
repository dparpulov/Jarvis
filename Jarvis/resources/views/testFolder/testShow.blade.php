@extends('layout')

@section('content')
    <div class="col-6 ml-0">
        <h1>{{ $test->name }}</h1>
        <form class="form-horizontal pb-4" role="form" method="POST" action="{{ route('test.update' , $test->id) }}">
            @csrf
            {{-- Id --}}
            <div class="form-group row">
                <div class="col-sm-9">
                    <label for="id" class="control-label">Id:</label>
                    <label class="control-label font-weight-bold">{{ $test->id }}</label>
                    
                    {{-- <input readonly type="text" name="id" id="id" placeholder="Id" value="{{ $test->id }}" class="form-control" autofocus> --}}
                </div>
            </div>
            {{-- name --}}
            <div class="form-group row">
                <div class="col-sm-9">
                    <label for="name" class="control-label">Name:</label>
                    <label class="control-label font-weight-bold">{{ $test->name }}</label>
                    
                    {{-- <input readonly type="text" name="name" id="name" placeholder="Name" value="{{ $test->name }}" class="form-control" autofocus> --}}
                </div>
            </div>
            <a href="{{ config('variables.url') }}/testFolder/test/create" class=" btn btn-primary">New test</a>
            <a href="{{ config('variables.url') }}/testFolder/test/{{ $test->id }}/edit" class="btn btn-primary">Edit</a>
            @method('DELETE')
            <button class="btn btn-danger mt-2 mb-2" type="submit">Delete</button>
            <a href="{{ config('variables.url') }}/testFolder/test" class="btn btn-primary mt-2 mb-2" >Go Back</a>
        </form>
    </div>
@endsection