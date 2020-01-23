@extends('layout')

@section('content')
    <div class="col-6">
        <h1>Edit {{ $importFile->fileName }}</h1>
        <form class="form-horizontal pb-4" role="form" method="POST" action="{{ route('importFile.update' , $importFile->id) }}">
            @csrf
            @method('patch')
            {{-- id --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="id" class="control-label font-weight-bold">Id:</label>
                </div>
                <div class="col-5">
                    <input readonly type="text" name="id" id="id" placeholder="Id" value="{{ $importFile->id }}" class="form-control" autofocus>
                </div>
            </div>
            {{-- fileName --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="fileName" class="control-label font-weight-bold">File name:</label>
                </div>
                <div class="col-5">
                    <input type="text" name="fileName" id="fileName" placeholder="File name" value="{{ $importFile->fileName }}" class="form-control" autofocus>
                </div>
            </div>
            {{-- size --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="size" class="control-label font-weight-normal"><strong>Size</strong> (Bytes):</label>
                </div>
                <div class="col-5">
                    <input type="text" name="size" id="size" placeholder="Size" value="{{ $importFile->size }}" class="form-control" autofocus>
                </div>
            </div>
            {{-- uploadTime --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="uploadTime" class="control-label font-weight-bold">Upload time:</label>
                </div>
                <div class="col-5">
                    <input type="text" name="uploadTime" id="uploadTime" placeholder="Upload time" value="{{ $importFile->created_at }}" class="form-control" autofocus>
                </div>
            </div>
            <button class="btn btn-primary">Edit</button>
            <a href="{{ config('variables.url') }}/importFileFolder/importFile/{{ $importFile->id }}" class="btn btn-primary">Cancel</a>
        </form>
    </div>
@endsection