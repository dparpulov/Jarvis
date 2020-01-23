@extends('layout')

@section('content')
    <div class="row">
        <div class="col">
            <h2>New Linked Test Date</h2>
            <span>Part of import file: </span> 
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-8">
            <form >
                <div class="row mb-2 mt-2">
                    <div class="col-2">
                        <label for="regularTestDate">Regular Test Date:</label>
                    </div>
                    <div class="col-4">
                        <input type="text" class="form-control" id="regularTestDate" name="regularTestDate">
                    </div>
                </div>
                <div class="row mb-2 mt-2">
                    <div class="col-2">
                        <label for="rawTestDateId">Raw test date id:</label>
                    </div>
                    <div class="col-4">
                        <input type="text" class="form-control" id="rawTestDateId" name="rawTestDateId">
                    </div>
                </div>
                <div class="row mb-2 mt-2">
                    <div class="col-2">
                        <label for="testTypeId">Test type Id:</label>
                    </div>
                    <div class="col-4">
                        <input type="text" class="form-control" id="testTypeId" name="testTypeId">
                    </div>
                </div>
                <div class="row mb-2 mt-2">
                    <div class="col-2">
                        <label for="testDate">Test date:</label>
                    </div>
                    <div class="col-4">
                        <input type="text" class="form-control" id="testDate" name="testDate">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-2">
                        <label for="testFee">Test Fee:</label>
                    </div>
                    <div class="col-2">
                        <input type="number" class="form-control" id="testFee" name="testFee">
                    </div>
                    <div class="col-2">
                        <input type="text" class="form-control" id="feeCurrency" name="feeCurrency">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-2">
                        <label for="testCenter">Test center:</label>
                    </div>
                    <div class="col-4">
                        <input type="text" class="form-control" id="testCenter" name="testCenter">
                    </div>
                    <div class="col-3">
                        <input type="text" class="form-control" id="testCenterSearch" name="testCenterSearch">
                    </div>
                    <div class="col-3">
                        <button type="submit" class="btn btn-primary" style="width: 100%">Add new Test Center</button>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Create</button>
                <button type="submit" class="btn btn-warning">Cancel</button>
            </form>
        </div>
    </div>
@endsection   