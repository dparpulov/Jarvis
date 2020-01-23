@extends('layout')

@section('content')
    <div class="col-6">
        <h1>{{ $testType->type }}</h1>
        <form class="form-horizontal pb-4" role="form" method="POST" action="{{ route('testType.update' , $testType->id) }}">
            @csrf
            {{-- Id --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="id" class="control-label">Id:</label>
                </div>
                <div class="col-5">
                    <label class="control-label font-weight-bold">{{ $testType->id }}</label>
                    
                    {{-- <input readonly type="text" name="id" id="id" placeholder="Id" value="{{ $testType->id }}" class="form-control" autofocus> --}}
                </div>
            </div>
            {{-- testId --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="testId" class="control-label">Test Id:</label>
                </div>
                <div class="col-5">
                    <label class="control-label font-weight-bold">{{ $testType->testId }}</label>
                    
                    {{-- <input readonly type="text" name="testId" id="testId" placeholder="Test Id" value="{{ $testType->testId }}" class="form-control" autofocus> --}}
                </div>
            </div>
            {{-- type --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="type" class="control-label">Type:</label>
                </div>
                <div class="col-5">
                    <label class="control-label font-weight-bold">{{ $testType->type }}</label>
                    {{-- <input readonly type="text" name="type" id="type" placeholder="Name" value="{{ $testType->type }}" class="form-control" autofocus> --}}
                </div>
            </div>
            <a href="{{ config('variables.url') }}/testTypeFolder/testType/create" class=" btn btn-primary">New test type</a>
            <a href="{{ config('variables.url') }}/testTypeFolder/testType/{{ $testType->id }}/edit" class="btn btn-primary">Edit</a>
            @method('DELETE')
            <button class="btn btn-danger mt-2 mb-2" type="submit">Delete</button>
            <a href="{{ config('variables.url') }}/testTypeFolder/testType" class="btn btn-primary mt-2 mb-2" >Go Back</a>
        </form>
    </div>
@endsection