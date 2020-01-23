@extends('layout')

@section('content')
    
    <div class="col-6">
        <h3> New Test Provider</h3>
        <form class="form-horizontal pb-4" role="form" method="POST" action="{{ route('testProvider.store') }}">
            @csrf
            {{-- Name --}}
            <div class="form-group row">
                <div class="col-sm-9">
                    <input type="text" name="name" id="name" placeholder="Name" class="form-control" autofocus>
                </div>
            </div>
            {{-- Promote --}}
            <div class="form-group row">
                <div class="col-sm-9">
                    <input type="text" name="promote" id="promote" placeholder="Promote" class="form-control" autofocus>
                </div>
            </div>
            
            <button class="btn btn-primary">Add Test Provider</button>
            <a type="button" href="{{ config('variables.url') }}/testProviderFolder/testProvider" class="btn btn-primary">Cancel</a>
        </form>
    </div>
    
@endsection