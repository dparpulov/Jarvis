@extends('layout')

@section('content')
    <div class="col-6">
        <h3>Edit {{ $baseTC->name }}</h3>
        <form class="form-horizontal pb-4" role="form" method="POST" action="{{ route('baseTC.update' , $baseTC->id) }}">
            @csrf
            @method('patch')
            {{-- Id --}}
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="id" class="control-label font-weight-bold">Id:</label>
                </div>
                <div class="col-8">
                    <input readonly type="text" name="id" id="id" placeholder="Id" value="{{ $baseTC->id }}" class="form-control">
                </div>
            </div>
            {{-- testCenterAssociation --}}
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="testCenterAssociation" class="control-label font-weight-bold">Test Center Associaton:</label>
                </div>
                <div class="col-8">
                    <input type="text" name="testCenterAssociation" id="testCenterAssociation" placeholder="Test Center Association" value="{{ $baseTC->testCenterAssociation }}" class="form-control">
                </div>
            </div>
            {{-- centerNumber --}}
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="centerNumber" class="control-label font-weight-bold">Center number:</label>
                </div>
                <div class="col-8">
                    <input type="text" name="centerNumber" id="centerNumber" placeholder="Center Number" value="{{ $baseTC->centerNumber }}" class="form-control">
                </div>
            </div>
            {{-- venue --}}
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="venue" class="control-label font-weight-bold">Venue:</label>
                </div>
                <div class="col-8">
                    <input type="text" name="venue" id="venue" placeholder="Venue" value="{{ $baseTC->venue }}" class="form-control">
                </div>
            </div>
            {{-- city --}}
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="cityId" class="control-label font-weight-bold">City:</label>
                </div>
                <div class="col-8">
                    <input list="citiesList" name="cityId" value="{{ $baseTC->cityId }}" id="cityInput" class="form-control">
                    <datalist id="citiesList"></datalist>           
                </div>
            </div>
            {{-- testProviderId --}}
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="testProviderId" class="control-label font-weight-bold">Test provider Id:</label>
                </div>
                <div class="col-8">
                    <input list="testProviders" name="testProviderId" id="testProvidersInput" value="{{ $baseTC->testProviderId }}" class="form-control">
                    <datalist id="testProviders">
                        @foreach ($testProviders as $testProvider)
                            <option value="{{ $testProvider->id }}" label="{{ $testProvider->name }}">{{ $testProvider->name }}</option>
                                
                        @endforeach
                            
                    </datalist>
                </div>
            </div>
            {{-- ieltsId --}}
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="ieltsId" class="control-label font-weight-bold">Ielts Id:</label>
                </div>
                <div class="col-8">
                    <input type="text" name="ieltsId" id="ieltsId" placeholder="Ielts Id" value="{{ $baseTC->ieltsId }}" class="form-control">
                </div>
            </div>
            {{-- Name --}}
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="name" class="control-label font-weight-bold">Name:</label>
                </div>
                <div class="col-8">
                    <input type="text" name="name" id="name" placeholder="Name" value="{{ $baseTC->name }}" class="form-control">
                </div>
            </div>
            {{-- description --}}
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="description" class="control-label font-weight-bold">Description:</label>
                </div>
                <div class="col-8">
                    <input type="text" name="description" id="description" placeholder="Description" value="{{ $baseTC->description }}" class="form-control">
                </div>
            </div>
            {{-- clickoutUrlId --}}
            <div class="form-group row">
                {{-- @if ($baseTC->clickoutURL()->exists()) --}}

                    <div class="col-sm-4">
                        <label for="clickoutURLId" class="control-label font-weight-bold">ClickoutUrl Id</label>
                    </div>
                    <div class="col-8">
                        <input list="clickoutURLsList" name="clickoutURLId" id="clickoutURLInput" value="{{ $baseTC->clickoutURLId }}" class="form-control">
                        <datalist id="clickoutURLsList"></datalist>
                    </div>
                {{-- @else
                    <div class="col-sm-4">
                        <label class="control-label font-weight-bold">ClickoutUrl Id: </label>
                    </div>
                    <div class="col-8">
                        <label>Missing</label>
                    </div>
                        
                @endif --}}
            </div>

            <div class="row">
                <div class="col">
                    <button style="width: 99%" class="btn btn-primary">Edit</button>
                </div>
                <div class="col">
                    <a style="width: 99%" href="{{ config('variables.url') }}/baseTCFolder/baseTC/{{ $baseTC->id }}" class="btn btn-warning">Cancel</a>        
                </div>
            </div>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            var cityDataList = document.getElementById('citiesList');
            var urlDataList = document.getElementById('clickoutURLsList');

            //var cityInput = document.getElementById('cityInput');

            //Get city data and create datalist options
            $.getJSON("{{ config('variables.url') }}/cityFolder/city/dataList", function( data ) {
                for (let i = 0; i < data.length; i++) {
                    var option = document.createElement('option');
                    // Set the value using the item in the JSON array.
                    option.value = data[i].id;
                    option.label = data[i].name + " (" + data[i].countryId + ")";
                    // Add the <option> element to the <datalist>.
                    cityDataList.appendChild(option);
                }
            });

            //Get clickoutURL data and create datalist options
            $.getJSON("{{ config('variables.url') }}/urlFolder/url/dataList", function( data ) {
                for (let i = 0; i < data.length; i++) {
                    var option = document.createElement('option');
                    // Set the value using the item in the JSON array.
                    option.value = data[i].id;
                    option.label = data[i].trackingLinkName;
                    // Add the <option> element to the <datalist>.
                    urlDataList.appendChild(option);
                }
            });
        });
    </script>
@endsection