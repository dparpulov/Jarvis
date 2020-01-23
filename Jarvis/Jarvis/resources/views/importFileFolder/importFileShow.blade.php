@extends('layout')

@section('content')
    <div class="row">
        <div class="col-4">
            <h1>{{ $importFile->fileName }}</h1>
            <div class="col-12">
                <form class="form-horizontal pb-4" role="form" method="POST" action="{{ route('importFile.update' , $importFile->id) }}">
                    @csrf
                    {{-- Id --}}
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label for="id" class="control-label">Id:</label>
                        </div>
                        <div class="col-5">
                            <label class="control-label font-weight-bold">{{ $importFile->id }}</label>
                        </div>
                    </div>
                    {{-- fileName --}}
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label for="fileName" class="control-label">File name:</label>
                        </div>
                        <div class="col-5">
                            <label class="control-label font-weight-bold">{{ $importFile->fileName }}</label>
                        </div>
                    </div>
                    {{-- size --}}
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label for="size" class="control-label">Size:</label>
                        </div>
                        <div class="col-5">
                            <label class="control-label font-weight-bold">{{ $importFile->size }}</label>
                        </div>
                    </div>
                    {{-- created_at --}}
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label for="created_at" class="control-label">Upload time:</label>
                        </div>
                        <div class="col-5">
                            <label class="control-label font-weight-bold">{{ $importFile->created_at }}</label>
                        </div>
                    </div>
                    <a href="{{ config('variables.url') }}/importFileFolder/importFile/create" class=" btn btn-primary">New Import file</a>
                    <a href="{{ config('variables.url') }}/importFileFolder/importFile/{{ $importFile->id }}/edit" class="btn btn-primary">Edit</a>
                    @method('DELETE')
                    <button class="btn btn-danger mt-2 mb-2" type="submit">Delete</button>
                    <a href="{{ config('variables.url') }}/importFileFolder/importFile" class="btn btn-primary mt-2 mb-2" >Go Back</a>
                </form>
            </div>
        </div>
        <div class="col-8">
            <div class="row">
                <div class="col">
                    <h2>RawTestDates    Total dates: {{ $rawTestDatesPaginated->total() }}</h2>
                </div>
            </div>
            {{-- <div class="row">
                <div class="col-5">                
                    <form id="search-rawTestDate" action="{{ route('searchRawTestDate') }}" method="POST" role="search">
                        @csrf
                        <div class="input-group mb-2" >
                            <input type="text" class="form-control" name="q"
                                    placeholder="Search test date"> <span class="input-group-btn">
                                <button type="submit" class="btn btn-primary ml-2">
                                    <span class="ml-2">Search</span>
                                </button>
                            </span>
                        </div>
                    </form>
                </div>
            </div> --}}
            <table class="table table-bordered table-striped mb-2" id="rawTestDatesTable">
                <thead>
                    <tr>
                        <th scope="col">Sheet</th>
                        <th scope="col">Country, city</th>
                        <th scope="col">Center</th>
                        <th scope="col">Test name</th>
                        <th scope="col">Test date</th>
                        <th scope="col">Fee</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                {{-- <tbody>
                @foreach ($rawTestDatesPaginated as $rawTestDate)
                    <tr>
                        <th scope="row">{{ $rawTestDate->sheet }}</th>
                        <td>{{ $rawTestDate->country }}: {{ $rawTestDate->town }}</td>
                        <td>{{ $rawTestDate->center }}</td>
                        <td>{{ $rawTestDate->testName }}</td>
                        <td>{{ $rawTestDate->testDate }}</td>
                        <td>{{ $rawTestDate->testFee }} {{ $rawTestDate->feeCurrency }}</td>
                    </tr>
                @endforeach
                </tbody> --}}
            </table>
            {{-- <span>{{ $rawTestDatesPaginated->appends(request()->input())->links() }}</span> --}}
        </div>
    </div>

<script>
    $(document).ready(function() {
        let table = $('#rawTestDatesTable').DataTable({
            destroy: true,
            ajax: "{{ config('variables.url') }}/rawTestDateFolder/rawTestDate/dataArray?importFileId={{ $importFile->id }}",
            dataSrc: "data",
            deferRender: true,
            //serverSide: true,            
            columns: [
                { data: 'sheet' },
                { 
                    data: 'country',
                    render: function (data, type, row, meta) {
                        return  data + ", " + row.town
                    }
                },
                { data: 'center' },
                { data: 'testName' },
                { data: 'testDate' },
                { 
                    data: 'testFee',
                    render: function (data, type, row, meta) {
                        return  data + " " + row.feeCurrency
                    }
                },
                { 
                    data: 'id',
                    render: function (data) {
                        return "<a href=\"{{ config('variables.url') }}/rawTestDateFolder/rawTestDate/" + data + "/edit\" class=\"btn btn-primary\" style=\"width: 100%\">Edit</a>"
                    }
                }
            ]
        });
    });
</script>
@endsection