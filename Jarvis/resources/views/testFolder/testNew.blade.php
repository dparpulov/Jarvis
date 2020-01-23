@extends('layout')

@section('content')
    <div class="col-6">
        <h1> New test</h1>
        <form class="form-horizontal pb-4" role="form" method="POST" action="{{ route('test.store') }}">
            @csrf
            {{-- Name --}}
            <div class="form-group row">
                <div class="col-sm-9">
                    <input type="text" name="name" id="name" placeholder="Name" class="form-control" autofocus>
                </div>
            </div>
            <button class="btn btn-primary">Add Test</button>
            <a type="button" href="{{ config('variables.url') }}/testFolder/test" class="btn btn-primary">Cancel</a>
        </form>
    </div>
    
@endsection