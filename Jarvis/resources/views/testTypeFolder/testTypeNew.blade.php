@extends('layout')

@section('content')
    
<h1> New test type</h1>
    <div class="col-6">
        <form class="form-horizontal pb-4" role="form" method="POST" action="{{ route('testType.store') }}">
            @csrf
            {{-- testId --}}
            <div class="form-group row">
                <div class="col-sm-9">
                    <input type="text" name="testId" id="testId" placeholder="TestId" class="form-control" autofocus>
                </div>
            </div>
            {{-- type --}}
            <div class="form-group row">
                <div class="col-sm-9">
                    <input type="text" name="type" id="type" placeholder="Test Type" class="form-control" autofocus>
                </div>
            </div>
            <button class="btn btn-primary">Add Test type</button>
            <a type="button" href="{{ config('variables.url') }}/testTypeFolder/testType" class="btn btn-primary">Cancel</a>
        </form>
    </div>
    
@endsection