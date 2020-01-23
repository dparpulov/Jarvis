@extends('layout')

@section('content')
    <div class="col-6">
        <h3>{{ $rawTestDate->testDate }}: {{ $rawTestDate->center }} in {{ $rawTestDate->town }}</h3>
        <form class="form-horizontal pb-4" role="form" method="POST" action="{{ route('rawTestDate.update', $rawTestDate->id) }}">
            @csrf
            {{-- id --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="id" class="control-label">Id:</label>
                </div>
                <div class="col-5">
                    <label for="id" class="control-label font-weight-bold">{{ $rawTestDate->id }}</label>
                </div>
            </div>
            {{-- importFileId --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="importFileId" class="control-label">Import File Id:</label>
                </div>
                <div class="col-5">
                    <label for="importFileId" class="control-label font-weight-bold">{{ $rawTestDate->importFileId }}</label>
                </div>
            </div>
            {{-- sheet --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="sheet" class="control-label">Sheet:</label>
                </div>
                <div class="col-5">
                    <label for="sheet" class="control-label font-weight-bold">{{ $rawTestDate->sheet }}</label>
                </div>
            </div>
            {{-- country --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="country" class="control-label">Country:</label>
                </div>
                <div class="col-5">
                    <label for="country" class="control-label font-weight-bold">{{ $rawTestDate->country }}</label>
                </div>
            </div>
            {{-- center --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="center" class="control-label">Center:</label>
                </div>
                <div class="col-5">
                    <label for="center" class="control-label font-weight-bold">{{ $rawTestDate->center }}</label>
                </div>
            </div>
            {{-- centerNumber --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="centerNumber" class="control-label">Center number:</label>
                </div>
                <div class="col-5">
                    <label for="centerNumber" class="control-label font-weight-bold">{{ $rawTestDate->centerNumber }}</label>
                </div>
            </div>
            {{-- venue --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="venue" class="control-label">Venue:</label>
                </div>
                <div class="col-5">
                    <label for="venue" class="control-label font-weight-bold">{{ $rawTestDate->venue }}</label>
                </div>
            </div>
            {{-- town --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="town" class="control-label">Town:</label>
                </div>
                <div class="col-5">
                    <label for="town" class="control-label font-weight-bold">{{ $rawTestDate->town }}</label>
                </div>
            </div>
            {{-- testDate --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="testDate" class="control-label">Test date:</label>
                </div>
                <div class="col-5">
                    <label for="testDate" class="control-label font-weight-bold">{{ $rawTestDate->testDate }}</label>
                </div>
            </div>
            {{-- testName --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="testName" class="control-label">Test name:</label>
                </div>
                <div class="col-5">
                    <label for="testName" class="control-label font-weight-bold">{{ $rawTestDate->testName }}</label>
                </div>
            </div>
            {{-- testFee --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="testFee" class="control-label">Test fee:</label>
                </div>
                <div class="col-5">
                    <label for="testFee" class="control-label font-weight-bold">{{ $rawTestDate->testFee }}</label>
                </div>
            </div>
            {{-- testCurrency --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="testCurrency" class="control-label">Test currency:</label>
                </div>
                <div class="col-5">
                    <label for="testCurrency" class="control-label font-weight-bold">{{ $rawTestDate->feeCurrency }}</label>
                </div>
            </div>
            <a href="{{ config('variables.url') }}/rawTestDateFolder/rawTestDate/create" class="btn btn-primary">Add Raw test date</a>
            <a href="{{ config('variables.url') }}/rawTestDateFolder/rawTestDate/{{ $rawTestDate->id }}/edit" class="btn btn-primary">Edit</a>
            @method('DELETE')
            <button class="btn btn-danger mt-2 mb-2" type="submit">Delete</button>
            <a href="{{ config('variables.url') }}/rawTestDateFolder/rawTestDate" class="btn btn-primary">Go back</a>
        </form>
    </div>
</div>
@endsection