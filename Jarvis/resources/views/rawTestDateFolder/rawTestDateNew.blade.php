@extends('layout')

@section('content')
    <h1>Add new Raw test date</h1>
    <div class="col-6">
        <form class="form-horizontal pb-4" role="form" method="POST" action="{{ route('rawTestDate.store') }}">
            @csrf
            {{-- importFileId --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="importFileId" class="control-label font-weight-bold">Import File Id:</label>
                </div>
                <div class="col-5">
                    <input type="text" name="importFileId" id="importFileId" placeholder="Import File Id" class="form-control" autofocus>
                </div>
            </div>
            {{-- sheet --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="sheet" class="control-label font-weight-bold">Sheet:</label>
                </div>
                <div class="col-5">
                    <input type="text" name="sheet" id="sheet" placeholder="Sheet" class="form-control" autofocus>
                </div>
            </div>
            {{-- country --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="country" class="control-label font-weight-bold">Country:</label>
                </div>
                <div class="col-5">
                    <input type="text" name="country" id="country" placeholder="Country" class="form-control" autofocus>
                </div>
            </div>
            {{-- center --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="center" class="control-label font-weight-bold">Center:</label>
                </div>
                <div class="col-5">
                    <input type="text" name="center" id="center" placeholder="Center" class="form-control" autofocus>
                </div>
            </div>
            {{-- centerNumber --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="centerNumber" class="control-label font-weight-bold">Center number:</label>
                </div>
                <div class="col-5">
                    <input type="text" name="centerNumber" id="centerNumber" placeholder="Center number" class="form-control" autofocus>
                </div>
            </div>
            {{-- venue --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="venue" class="control-label font-weight-bold">Venue:</label>
                </div>
                <div class="col-5">
                    <input type="text" name="venue" id="venue" placeholder="venue" class="form-control" autofocus>
                </div>
            </div>
            {{-- town --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="town" class="control-label font-weight-bold">Town:</label>
                </div>
                <div class="col-5">
                    <input type="text" name="town" id="town" placeholder="Town" class="form-control" autofocus>
                </div>
            </div>
            {{-- testDate --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="testDate" class="control-label font-weight-bold">Test date:</label>
                </div>
                <div class="col-5">
                    <input type="text" name="testDate" id="testDate" placeholder="Test date" class="form-control" autofocus>
                </div>
            </div>
            {{-- testName --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="testName" class="control-label font-weight-bold">Test name:</label>
                </div>
                <div class="col-5">
                    <input type="text" name="testName" id="testName" placeholder="Ttest name" class="form-control" autofocus>
                </div>
            </div>
            {{-- testFee --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="testFee" class="control-label font-weight-bold">Test fee:</label>
                </div>
                <div class="col-5">
                    <input type="text" name="testFee" id="testFee" placeholder="Test fee" class="form-control" autofocus>
                </div>
            </div>
            {{-- testCurrency --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="testCurrency" class="control-label font-weight-bold">Test currency:</label>
                </div>
                <div class="col-5">
                    <input type="text" name="testCurrency" id="testCurrency" placeholder="Test currency" class="form-control" autofocus>
                </div>
            </div>
            <button class="btn btn-primary">Add Raw test date</button>
            <a href="{{ config('variables.url') }}/rawTestDateFolder/rawTestDate" class="btn btn-primary">Cancel</a>
        </form>
    </div>
</div>
@endsection