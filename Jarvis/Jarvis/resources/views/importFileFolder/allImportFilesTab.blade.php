<div class="tab-content">
    <div id="importFile" class="tab-panel active">

        {{-- <form id="search-rawTestDate" action="{{ route('searchRawTestDate') }}" method="POST" role="search">
            @csrf
            <div class="input-group w-25 mb-2" >
                <input type="text" class="form-control" name="q"
                        placeholder="Search raw test dates"> <span class="input-group-btn">
                    <button type="submit" class="btn btn-primary ml-2">
                        <span class="ml-2">Search</span>
                    </button>
                </span>
            </div>
        </form> --}}

        <table class="table table-hover table-bordered" id="allImportFiles">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">File name</th>
                    <th scope="col">Size</th>
                    <th scope="col">Upload time</th>
                    <th scope="col">Nr. of Test dates</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($importFiles as $importFile)
                    <tr>
                        <th scope="row">{{ $importFile->id }}</th>
                        <td><a href="{{ config('variables.url') }}/importFileFolder/importFile/{{ $importFile->id }}">{{ $importFile->fileName }}</a></td>
                        <td>{{ $importFile->size }}</td>
                        <td>{{ $importFile->created_at }}</td>
                        <td>{{ $importFile->raw_test_dates_count }}</td>

                        <td>
                            <form id="delete-form" method="POST">
                                @csrf
                                @method('delete')

                                <div class="form-group">
                                    <a href="{{ config('variables.url') }}/importFileFolder/importFile/{{ $importFile->id }}/edit" class="btn btn-primary" style="width: 22%">Edit</a>
                                    <input formaction="{{ route('importFile.destroy', $importFile) }}" type="submit" name="_method" class="btn btn-danger" onclick="return confirm('Are you sure?')"
                                        value="Delete" style="width: 30%"/>
                                    <button formaction="{{ route('makeEditTestDates') }}" type="submit" name="importFileId" value="{{ $importFile->id }}" class="btn btn-primary" style="width: 45%">Create Edit dates</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            {{-- <span>{{ $importFiles->appends(request()->input())->links() }} <h2>Total import files: {{ $importFiles->total() }}</h2></span> --}}
        </table>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#allImportFiles').DataTable();
    });
</script>