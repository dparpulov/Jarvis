@extends('layout')

@section('content')
    <div class="row">
        <div class="col-3 mt-2 mb-2">
            <h1>Test dates: </h1>
            <form method="POST" enctype="multipart/form-data">
                @csrf
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
                        <input formaction="{{ route('importRawTestDate') }}" style="width: 100%" type="submit" value="Import raw dates" class="btn btn-info mb-2 mr-2">        
                    </div>
                    <div class="col">
                        <input formaction="{{ route('deleteEditTestDates') }}" style="width: 100%" type="submit" value="Delete all" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete all data form this table?')">                
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <input formmethod='GET' formaction="{{ route('exportLinkedDate') }}" type="submit" name="export_file" value="Export" style="width: 100%" class="btn btn-primary mb-2">        
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="row mb-2">
        <div class="col">
            {{-- Tabs for the different tables --}}
            <ul class="nav nav-tabs" role="tablist">
                <li class="active mr-2">
                    <a data-toggle="tab" class="nav-link active" href="#linked"><span>Linked</span></a>
                </li>
                <li>
                    <a data-toggle="tab" class="nav-link" href="#unlinked"><span>Unlinked</span></a>
                </li>
            </ul>
        </div>
    </div>
    
    <div class="tab-content">
        <div id="linked" class="tab-pane active in">
            <table class="table table-sm table-hover table-bordered" id="allLinked">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Regular test date</th>
                        <th scope="col">Test Type</th>
                        <th scope="col">Test Date</th>
                        <th scope="col">Test Fee</th>
                        <th scope="col">Town</th>
                        <th scope="col">RTD Venue</th>
                        <th scope="col">BTC venue</th>
                        <th scope="col">Raw Test Date Id</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                {{-- <tbody>
                     @foreach ($linkedDates as $linkedDate)
                        <tr>
                            <th scope="row">{{ $linkedDate->id }}</th>
                            <td>{{ $linkedDate->regularTestDate }}</td>
                            <td>{{ $linkedDate->testTypeId }}</td>
                            <td>{{ $linkedDate->testDate }}</td>
                            <td>{{ $linkedDate->testFee }} {{ $linkedDate->feeCurrency }}</td>
                            <td>{{ $linkedDate->rawTestDate->town }}</td>
                            <td>{{ $linkedDate->rawTestDate->venue }}</td>
                            <td>{{ $linkedDate->baseTestCenter->venue }}</td>
                            <td>{{ $linkedDate->rawTestDateId }}</td>
                            <td>
                                <form id="delete-form" method="POST" action="{{ route('editTestDate.destroy', $linkedDate) }}">
                                @csrf
                                @method('delete')
        
                                    <div class="form-group">
                                        <a href="editTestDate/{{ $linkedDate->id }}/edit" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                        <button type="submit" name="_method" class="btn btn-danger" onclick="return confirm('Are you sure?')"
                                            ><i class="fa fa-trash"></i></button> 
                                    </div>
                                </form>    
                            </td>                            
                        </tr>
                    @endforeach
                </tbody>
                <span>{{ $linkedDates->appends(request()->input())->links() }} <h2>Total linked dates: {{ $linkedDates->total() }}</h2></span> --}}
            </table>
        </div>
        
        <div id="unlinked" class="tab-pane fade">
            <form id="linkingForm" method="POST">
            @csrf
                <div class="row mb-2">
                    <div class="col">
                        <button formaction="{{ route('linkOnCenterNrAndCity') }}" class="btn btn-primary" type="submit" name="linkOnCenterNrAndCity">Link on center number and city</button>
                    </div>
                </div>
            </form>
            <table class="table table-sm table-hover table-bordered" id="allUnlinked">
                <thead class="thead-dark">
                    <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Regular test date</th>
                            <th scope="col">Test Type</th>
                            <th scope="col">Test Date</th>
                            <th scope="col">Test Fee</th>
                            <th scope="col">Town</th>
                            <th scope="col">Venue</th>
                            <th scope="col">Raw Test Date Id</th>
                            <th scope="col">Actions</th>
                    </tr>
                </thead>
                {{-- <tbody>
                    @foreach ($unlinkedDates as $unlinkedDate)
                        <tr>
                            <th scope="row">{{ $unlinkedDate->id }}</th>
                            <td>{{ $unlinkedDate->regularTestDate }}</td>
                            <td>{{ $unlinkedDate->testTypeId }}</td>
                            <td>{{ $unlinkedDate->testDate }}</td>
                            <td>{{ $unlinkedDate->testFee }} {{ $unlinkedDate->feeCurrency }}</td>
                            <td>{{ $unlinkedDate->rawTestDate->town }}</td>
                            <td>{{ $unlinkedDate->rawTestDate->venue }}</td>
                            <td>{{ $unlinkedDate->rawTestDateId }}</td>
                            <td>
                                <form id="delete-form" method="POST" action="{{ route('editTestDate.destroy', $unlinkedDate) }}">
                                @csrf
                                @method('delete')
                
                                    <div class="form-group">
                                        <a href="editTestDate/{{ $unlinkedDate->id }}/edit" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                        <button type="submit" name="_method" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                                            <i class="fa fa-trash"></i></button>
                                    </div>
                                </form>  
                            </td>  
                        </tr>
                    @endforeach
                </tbody>
                <span>{{ $unlinkedDates->appends(request()->input())->links() }} <h2>Total unlinked dates: {{ $unlinkedDates->total() }}</h2></span> --}}
            </table>
        </div>
    </div>

<script>
    $(document).ready(function() {
        //creates the dataTable for the linked dates
        let linkedTable = $('#allLinked').DataTable({
            ajax: "{{ config('variables.url') }}/editTestDateFolder/editTestDate/linkedDataArray",
            dataSrc: "data",
            deferRender: true,
            columns: [
                { data: 'id' },
                { data: 'regularTestDate' },
                { data: 'testTypeId' },
                { data: 'testDate' },
                { 
                    data: 'testFee',
                    render: function (data, type, row, meta) {
                        return  data + " " + row.feeCurrency
                    }
                },
                { data: 'town' },
                { data: 'rtdVenue' },
                { data: 'btcVenue' },
                { data: 'rawTestDateId' },
                { 
                    data: 'id',
                    render: function (data) {
                        return "<a href=\"{{ config('variables.url') }}/editTestDateFolder/editTestDate/" + data + "/edit\" class=\"btn btn-primary\" style=\"width: 100%\">Edit</a>"
                    }
                }
            ]
        } );

        //Creates the dataTable for the unlinked dates
        let unlinkedTable = $('#allUnlinked').DataTable({
            ajax: "{{ config('variables.url') }}/editTestDateFolder/editTestDate/unlinkedDataArray",
            dataSrc: "data",
            deferRender: true,
            columns: [
                { data: 'id' },
                { data: 'regularTestDate' },
                { data: 'testTypeId' },
                { data: 'testDate' },
                { 
                    data: 'testFee',
                    render: function (data, type, row, meta) {
                        return  data + " " + row.feeCurrency
                    }
                },
                { data: 'town' },
                { data: 'venue' },
                { data: 'rawTestDateId' },
                { 
                    data: 'id',
                    render: function (data) {
                        return "<a href=\"{{ config('variables.url') }}/editTestDateFolder/editTestDate/" + data + "/edit\" class=\"btn btn-primary\" style=\"width: 100%\">Edit</a>"
                    }
                }
            ]
        });
    });

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