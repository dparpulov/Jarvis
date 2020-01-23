@extends('layout')

@section('content')
    <div class="col-6">
        <h3>Edit Raw test date {{ $rawTestDate->center }} {{ $rawTestDate->testDate }}</h3>
        <form class="form-horizontal pb-4" role="form" method="POST" action="{{ route('rawTestDate.update' , $rawTestDate->id) }}">
            @csrf
            @method('patch')
            {{-- id --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="id" class="control-label font-weight-bold">id:</label>
                </div>
                <div class="col-5">
                    <label class="control-label font-weight-bold">{{ $rawTestDate->id }}</label>
                </div>
            </div>
            {{-- importFileId --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="importFileId" class="control-label font-weight-bold">Import File Id:</label>
                </div>
                <div class="col-5">
                    <input type="text" name="importFileId" id="importFileId" placeholder="Import File Id" value="{{ $rawTestDate->importFileId }}" class="form-control" autofocus>
                </div>
            </div>
            {{-- sheet --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="sheet" class="control-label font-weight-bold">Sheet:</label>
                </div>
                <div class="col-5">
                    <input type="text" name="sheet" id="sheet" placeholder="Sheet" value="{{ $rawTestDate->sheet }}" class="form-control" autofocus>
                </div>
            </div>
            {{-- country --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="country" class="control-label font-weight-bold">Country:</label>
                </div>
                <div class="col-5">
                    <input type="text" name="country" id="country" placeholder="Country" value="{{ $rawTestDate->country }}" class="form-control" autofocus>
                </div>
            </div>
            {{-- center --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="center" class="control-label font-weight-bold">Center:</label>
                </div>
                <div class="col-5">
                    <input type="text" name="center" id="center" placeholder="Center" value="{{ $rawTestDate->center }}" class="form-control" autofocus>
                </div>
            </div>
            {{-- centerNumber --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="centerNumber" class="control-label font-weight-bold">Center number:</label>
                </div>
                <div class="col-5">
                    <input type="text" name="centerNumber" id="centerNumber" placeholder="Center number" value="{{ $rawTestDate->centerNumber }}" class="form-control" autofocus>
                </div>
            </div>
            {{-- venue --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="venue" class="control-label font-weight-bold">Venue:</label>
                </div>
                <div class="col-5">
                    <input type="text" name="venue" id="venue" placeholder="venue" value="{{ $rawTestDate->venue }}" class="form-control" autofocus>
                </div>
            </div>
            {{-- town --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="town" class="control-label font-weight-bold">Town:</label>
                </div>
                <div class="col-5">
                    <input type="text" name="town" id="town" placeholder="Town" value="{{ $rawTestDate->town }}" class="form-control" autofocus>
                </div>
            </div>
            {{-- testDate --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="testDate" class="control-label font-weight-bold">Test date:</label>
                </div>
                <div class="col-5">
                    <input type="text" name="testDate" id="testDate" placeholder="Test date" value="{{ $rawTestDate->testDate }}" class="form-control" autofocus>
                </div>
            </div>
            {{-- testName --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="testName" class="control-label font-weight-bold">Test name:</label>
                </div>
                <div class="col-5">
                    <input type="text" name="testName" id="testName" placeholder="Ttest name" value="{{ $rawTestDate->testName }}" class="form-control" autofocus>
                </div>
            </div>
            {{-- testFee --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="testFee" class="control-label font-weight-bold">Test fee:</label>
                </div>
                <div class="col-5">
                    <input type="text" name="testFee" id="testFee" placeholder="Test fee" value="{{ $rawTestDate->testFee }}" class="form-control" autofocus>
                </div>
            </div>
            {{-- testCurrency --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="testCurrency" class="control-label font-weight-bold">Test currency:</label>
                </div>
                <div class="col-5">
                    <input type="text" name="testCurrency" id="testCurrency" placeholder="Test currency" value="{{ $rawTestDate->feeCurrency }}" class="form-control" autofocus>
                </div>
            </div>
            <button class="btn btn-primary">Edit</button>
            <a href="{{ config('variables.url') }}/rawTestDateFolder/rawTestDate/{{ $rawTestDate->id }}" class="btn btn-primary">Cancel</a>
            
        </form>
    </div>
</div>
@endsection