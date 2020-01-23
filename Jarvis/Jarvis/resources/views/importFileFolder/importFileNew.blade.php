@extends('layout')

@section('content')
    <div class="col-6">
        <h1> New Import file</h1>
        <form class="form-horizontal pb-4" role="form" method="POST" action="{{ route('importFile.store') }}">
            @csrf
            {{-- fileName --}}
            <div class="form-group row">
                <div class="col-sm-9">
                    <input type="text" name="fileName" id="fileName" placeholder="File name" class="form-control" autofocus>
                </div>
            </div>
            {{-- size --}}
            <div class="form-group row">
                <div class="col-sm-9">
                    <input type="text" name="size" id="size" placeholder="Size" class="form-control" autofocus>
                </div>
            </div>

            <button class="btn btn-primary">Add Import file</button>
            <a type="button" href="{{ config('variables.url') }}/importFileFolder/importFile" class="btn btn-primary">Cancel</a>
        </form>
    </div>
    
@endsection