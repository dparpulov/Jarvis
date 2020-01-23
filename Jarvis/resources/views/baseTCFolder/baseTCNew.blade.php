@extends('layout')

@section('content')
    <div class="col-6">
        <h1>Add new Base test center</h1>
        <form class="form-horizontal pb-4" role="form" method="POST" action="{{ route('baseTC.store') }}">
            @csrf
            {{-- testCenterAssociation --}}
            <div class="form-group row">
                <div class="col-sm-9">
                    <input type="text" name="testCenterAssociation" id="testCenterAssociation" placeholder="Test Center association" class="form-control" autofocus>
                </div>
            </div>
            {{-- centerNumber --}}
            <div class="form-group row">
                <div class="col-sm-9">
                    <input type="text" name="centerNumber" id="centerNumber" placeholder="Center number" class="form-control" autofocus>
                </div>
            </div>
            {{-- venue --}}
            <div class="form-group row">
                <div class="col-sm-9">
                    <input type="text" name="venue" id="venue" placeholder="Venue" class="form-control" autofocus>
                </div>
            </div>
            {{-- city id --}}
            <div class="form-group row">
                <div class="col-sm-9">
                    <input type="text" name="cityId" id="cityId" placeholder="City Id" class="form-control" autofocus>
                </div>
            </div>
            {{-- testProviderId --}}
            <div class="form-group row">
                <div class="col-sm-9">
                    <input type="text" name="testProviderId" id="testProviderId" placeholder="Test provider Id"  class="form-control" autofocus>
                </div>
            </div>
            {{-- ieltsId --}}
            <div class="form-group row">
                <div class="col-sm-9">
                    <input type="text" name="ieltsId" id="ieltsId" placeholder="Ielts Id" class="form-control" autofocus>
                </div>
            </div>
            {{-- Name --}}
            <div class="form-group row">
                <div class="col-sm-9">
                    <input type="text" name="name" id="name" placeholder="Name"  class="form-control" autofocus>
                </div>
            </div>
            {{-- description --}}
            <div class="form-group row">
                <div class="col-sm-9">
                    <input type="text" name="description" id="description" placeholder="Description" class="form-control" autofocus>
                </div>
            </div>
            {{-- clickoutUrlId --}}
            <div class="form-group row">
                <div class="col-sm-9">
                    <input type="text" name="clickoutURLId" id="clickoutURLId" placeholder="clickoutURLId" class="form-control" autofocus>
                </div>
            </div>
            <button class="btn btn-primary">Add Base test center</button>
            <a type="button" href="{{ config('variables.url') }}/baseTCFolder/baseTC" class="btn btn-primary">Cancel</a>
        </form>
    </div>
@endsection