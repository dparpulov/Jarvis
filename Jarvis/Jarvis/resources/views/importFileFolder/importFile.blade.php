@extends('layout')

@section('content')
    <form method="POST" enctype="multipart/form-data">
        @csrf
        <div class="col-3 mt-2 mb-2">
            <div class="row">
                <h1>Import files</h1>
            </div>
            <div class="row">
                <div class="input-group">
                    <label class="input-group-btn">
                        <span class="btn btn-primary">
                            Browse <input type="file" name="import_file" style="display: none;" multiple>
                        </span>
                    </label>
                    <input type="text" class="form-control" readonly>
                </div> 
            </div>
            <div class="row mt-2">
                <input formaction="{{ route('importRawTestDate') }}" style="width: 100%" type="submit" value="Import" class="btn btn-info">
            </div>
        </div>
    </form>


    @if(count($importFiles) > 0)
        <div class="mt-2 mb-2 ml-0">
            {{-- Tabs for the different tables --}}
            <ul class="nav nav-tabs nav-tabs-fillup" data-init-reponsive-tabs="dropdownfx" role="tablist">
                {{-- <li class="nav-item mr-4">
                    <a data-toggle="tab" class="nav-link active" href="#countries"><span>Countries</span></a>
                </li> --}}
                <li class="nav-item mr-4">
                    <a data-toggle="tab" class="nav-link active" href="#importFiles"><span>Import File</span></a>
                </li>
            </ul>
        </div>


        {{-- All cities tab --}}
        @include('importFileFolder.allImportFilesTab')
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