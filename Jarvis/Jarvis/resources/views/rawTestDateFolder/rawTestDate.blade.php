@extends('layout')

@section('content')
    <div class="col-3 mt-2 mb-2 pl-0">
        <h1>Raw test dates</h1>        
        <form method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col">
                    <a href="{{ config('variables.url') }}/rawTestDateFolder/rawTestDate/create" style="width: 100%" class=" btn btn-primary mb-2">New raw test date</a>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="input-group">
                        <label class="input-group-btn">
                            <span class="btn btn-primary">
                                Browse <input type="file" name="import_file" style="display: none;" multiple>
                            </span>
                        </label>
                        <input type="text" class="form-control" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <input formaction="{{ route('importRawTestDate') }}" style="width: 100%" type="submit" value="Import" class="btn btn-info mt-2 mr-2">
                </div>
                <div class="col">
                    <input formaction="{{ route('deleteRawTestDates') }}" style="width: 100%" type="submit" value="Delete all" class="btn btn-danger mt-2" onclick="return confirm('Are you sure you want to delete all data from this table?')">
                </div>
            </div>
        </form>
    </div>

    @if(count($rawTestDates) > 0)
        <div class="mt-2 mb-2 ml-0">
            {{-- Tabs for the different tables --}}
            <ul class="nav nav-tabs nav-tabs-fillup" data-init-reponsive-tabs="dropdownfx" role="tablist">
                {{-- <li class="nav-item mr-4">
                    <a data-toggle="tab" class="nav-link active" href="#countries"><span>Countries</span></a>
                </li> --}}
                <li class="nav-item mr-4">
                    <a data-toggle="tab" class="nav-link active" href="#rawTestDates"><span>Raw test dates</span></a>
                </li>
            </ul>
        </div>
        
        <div>
            <label for="importFileId">
                Show dates from import file 
                <select name="importFileId" id="importFileId">
                    @foreach ($importFiles as $importFile)
                        <option @if($loop->last)selected="selected"@endif value="{{ $importFile->id }}">{{ $importFile->id }}</option>
                    @endforeach
                </select>
            </label>
        </div>

    {{-- All rawTestDates tab --}}
    @include('rawTestDateFolder.allRawTestDatesTab')
    
    @else
        <h2>No data found!</h2>
    @endif

    <script>
        //Updates the import file input with the name of the selected file
        $(function() {
            $(document).on('change', ':file', function() {
                var input = $(this),
                    numFiles = input.get(0).files ? input.get(0).files.length : 1,
                    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
                input.trigger('fileselect', [numFiles, label]);
            });

            $(document).ready( function() {
                $(':file').on('fileselect', function(event, numFiles, label) {

                    var input = $(this).parents('.input-group').find(':text'),
                        log = numFiles > 1 ? numFiles + ' files selected' : label;

                    if( input.length ) {
                        input.val(log);
                    } else {
                        if( log ) alert(log);
                    }

                });
            });
        });
    </script>
@endsection