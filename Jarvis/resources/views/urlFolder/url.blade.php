@extends('layout')

@section('content')
<div class="col-3 mt-2 mb-2 pl-0">
    <h1>Clickout URLs</h1>
    <form method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col">
                <a href="{{ config('variables.url') }}/urlFolder/url/create" style="width: 100%" class="btn btn-primary mb-2">New Clickout url</a>
            </div>
        </div>
        <div class="row">
            <div class="col">
                {{-- <input  style="width: 100%" type="file" name="import_file" class="btn btn-primary mb-2"> --}}
                <div class="input-group">
                    <label class="input-group-btn">
                        <span class="btn btn-primary">
                            Browse <input formaction="{{ route('importURL') }}" type="file" name="import_file" style="display: none;" multiple>
                        </span>
                    </label>
                    <input type="text" class="form-control" readonly>
                </div> 
            </div>
        </div>
        <div class="row">
            <div class="col">
                <input formaction="{{ route('importURL') }}" type="submit" value="Import" style="width: 100%" class="btn btn-info mb-2">
            </div>
            <div class="col">
                <input formaction="{{ route('deleteAllURL') }}" style="width: 100%" type="submit" title="Deletes all URL's" value="Delete all" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete all data form this table?')">
            </div>
        </div>
        <div class="row">
            <div class="col">
                <a href="{{ route('checkBrokenURL') }}" style="width: 100%" class="btn btn-primary mb-2">Check for broken links</a>
            </div>
        </div>
    </form>
</div>



@if(count($clickoutURLs) > 0)

<div class="mt-2 mb-2 ml-0">
    {{-- Tabs for the different tables --}}
    <ul class="nav nav-tabs nav-tabs-fillup" data-init-reponsive-tabs="dropdownfx" role="tablist">
        <li class="nav-item mr-4">
            <a data-toggle="tab" class="nav-link active" href="#clickoutURLs"><span>Clickout urls</span></a>
        </li>
        {{-- <li class="nav-item mr-4">
            <a data-toggle="tab" class="nav-link " href="#cities"><span>Cities</span></a>
        </li> --}}
    </ul>
</div>

{{-- All clickoutURLs tab --}}
@include('urlFolder.allUrlTab')
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
