@extends('layout')

@section('content')
    <div class="col-6">
        <h1>Edit {{ $testType->type }}</h1>
        <form class="form-horizontal pb-4" role="form" method="POST" action="{{ route('testType.update' , $testType->id) }}">
            @csrf
            @method('patch')
            {{-- Id --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="id" class="control-label font-weight-bold">Id:</label>
                </div>
                <div class="col-5">
                    <input readonly type="text" name="id" id="id" placeholder="Id" value="{{ $testType->id }}" class="form-control" autofocus>
                </div>
            </div>
            {{-- testId --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="testId" class="control-label font-weight-bold">Test Id:</label>
                </div>
                <div class="col-5">
                    <input type="text" name="testId" id="testId" placeholder="Test id" value="{{ $testType->testId }}" class="form-control" autofocus>
                </div>
            </div>
            {{-- testType --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="name" class="control-label font-weight-bold">Test type:</label>
                </div>
                <div class="col-5">
                    <input type="text" name="testType" id="testType" placeholder="Test type" value="{{ $testType->type }}" class="form-control" autofocus>
                </div>
            </div>
            <button class="btn btn-primary">Edit</button>
            <a href="{{ config('variables.url') }}/testTypeFolder/testType/{{ $testType->id }}" class="btn btn-primary">Cancel</a>
        </form>
    </div>
@endsection