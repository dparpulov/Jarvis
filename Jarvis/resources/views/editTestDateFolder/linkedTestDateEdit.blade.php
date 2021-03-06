@extends('layout')

@section('content')
    <div class="row">
        <div class="col">
            <h2>Linked Test Date detail</h2>
            <span>Part of imported file: {{ $editTestDate->rawTestDate->importFileId }} ({{ $editTestDate->rawTestDate->importFile->created_at }})</span> 
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-8">
            <form >
            @csrf
                <div class="row">
                    <div class="col-6">
                        <h4>Raw test date information</h4>
                    </div>
                </div>
                <div class="row mb-2 mt-2">
                    <div class="col-2">
                        <label for="id">Id:</label>
                    </div>
                    <div class="col-4">
                        <input type="text" class="form-control" id="id" value="{{ $editTestDate->id }}" name="id">
                    </div>
                    <div class="col-2">
                        <label for="center">Center:</label>
                    </div>
                    <div class="col-4">
                        <input type="text" class="form-control" id="center" value="{{ $editTestDate->rawTestDate->center }}" name="testDate">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-2">
                        <label>Status:</label>
                    </div>
                    <div class="col-4">
                        <label>Linked</label>
                    </div>
                    <div class="col-2">
                        <label for="centerNumber">Center number:</label>
                    </div>
                    <div class="col-4">
                        <input type="text" class="form-control" id="centerNumber" value="{{ $editTestDate->rawTestDate->centerNumber }}" name="testDate">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-2">
                        <label for="testFee">Test Fee:</label>
                    </div>
                    <div class="col-2">
                        <input type="number" class="form-control" id="testFee" value="{{ $editTestDate->testFee }}" name="testFee">
                    </div>
                    <div class="col-2">
                        <input type="text" class="form-control" id="feeCurrency" value="{{ $editTestDate->feeCurrency }}" name="feeCurrency">
                    </div>
                    <div class="col-2">
                        <label for="venue">Venue:</label>
                    </div>
                    <div class="col-4">
                        <input type="text" class="form-control" id="venue" value="{{ $editTestDate->rawTestDate->venue }}" name="testDate">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-2">
                        <label for="testDate">Test date:</label>
                    </div>
                    <div class="col-4">
                        <input type="text" class="form-control" id="testDate" value="{{ $editTestDate->testDate }}" name="testDate">
                    </div>
                    <div class="col-2">
                        <label for="town">Town:</label>
                    </div>
                    <div class="col-4">
                        <input type="text" class="form-control" id="town" value="{{ $editTestDate->rawTestDate->town }}" name="testDate">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <h4>Test center information</h4>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-2">
                        <label for="testCenter">Test center:</label>
                    </div>
                    <div class="col-4">
                        <input list="baseTCList" class="form-control" id="baseTestCenter" name="baseTestCenter" value="{{ $editTestDate->baseTestCenter->name }}">
                        <datalist id="baseTCList"></datalist>
                    </div>
                    <div class="col-3">
                        <button type="button" class="btn btn-primary" style="width: 100%" data-toggle="modal" data-target="#newTestCenterModal">Add new Test Center</button>
                    </div>
                    <div class="col-3">
                        <button type="button" class="btn btn-primary" style="width: 100%" data-toggle="modal" data-target="#editTestCenterModal">Edit Test Center</button>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-2">
                        <label for="clickoutURL">Clickout URL:</label>
                    </div>
                    <div class="col-4">
                        <input readonly type="text" class="form-control w-30" id="clickoutURL" value="{{ $editTestDate->baseTestCenter->clickoutURLId }}" name="clickoutURL">
                    </div>
                    <div class="col-3">
                        <button type="button" class="btn btn-primary" style="width: 100%" data-toggle="modal" data-target="#newClickoutURLModal">Add new Clickout URL</button>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Update</button>
                <a href="{{ config('variables.url') }}/editTestDateFolder/editTestDate" class="btn btn-warning">Cancel</a>
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>

    @include('editTestDateFolder.inc.baseTCModalNew')

 

    @include('editTestDateFolder.inc.URLModal')


    <script>
        $(document).ready(function(){
            //baseTC datalist element
            var baseTCDataList = document.getElementById('baseTCList');
        
            // $('input#baseTestCenter').keyup( function() {
            //     if( this.value.length < 4 ) return;
            //     /* code to run below */
            //     $(baseTCDataList).empty();
                //Get city data and create datalist options
                // $.getJSON("{{ config('variables.url') }}/baseTCFolder/baseTC/dataList", function( data ) {
                //     for (let i = 0; i < data.length; i++) {
                //         var option = document.createElement('option');
                //         // Set the value using the item in the JSON array.
                //         option.value = data[i].id;
                //         option.label = data[i].name + ", " + data[i].centerNumber + ", " + data[i].venue + ", " + data[i].Name + ", " + data[i].clickoutURLId;;
                //         // Add the <option> element to the <datalist>.
                //         baseTCDataList.appendChild(option);
                //     }
                // });
            // });

            $.getJSON("{{ config('variables.url') }}/baseTCFolder/baseTC/dataList", function( data ) {
                $.each(data, function(i, value){
                    var option = document.createElement('option');
                    // Set the value using the item in the JSON array.
                    option.value = data[i].id;
                    option.label = data[i].name + ", " + data[i].centerNumber + ", " + data[i].venue + ", " + data[i].city + ", " + data[i].clickoutURLId;
                    // Add the <option> element to the <datalist>.
                    baseTCDataList.appendChild(option);
                });
            });
        });
    </script>
@endsection   