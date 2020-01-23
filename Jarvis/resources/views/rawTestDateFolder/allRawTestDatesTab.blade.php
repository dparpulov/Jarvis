<div class="tab-content">
    <div id="rawTestDates" class="tab-panel active">

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

        <table class="table table-hover table-bordered" id="allRawTestDates">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Import File Id</th>
                    <th scope="col">Sheet</th>
                    <th scope="col">Country</th>
                    <th scope="col">Center</th>
                    <th scope="col">Center number</th>
                    <th scope="col">Venue</th>
                    <th scope="col">Town</th>
                    <th scope="col">Test date</th>
                    <th scope="col">Test name</th>
                    <th scope="col">Test fee</th>
                    <th scope="col">Fee currency</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            {{-- <tbody>
                @foreach ($rawTestDates as $rawTestDate)
                    <tr>
                        <th scope="row">{{ $rawTestDate->id }}</th>
                        <td>{{ $rawTestDate->importFileId }}</td>
                        <td>{{ $rawTestDate->sheet }}</td>
                        <td>{{ $rawTestDate->country }}</td>
                        <td>{{ $rawTestDate->center }}</td>
                        <td>{{ $rawTestDate->centerNumber }}</td>
                        <td>{{ $rawTestDate->venue }}</td>
                        <td>{{ $rawTestDate->town }}</td>
                        <td>{{ $rawTestDate->testDate }}</td>
                        <td>{{ $rawTestDate->testName }}</td>
                        <td>{{ $rawTestDate->testFee }}</td>
                        <td>{{ $rawTestDate->feeCurrency }}</td>
                        <td>
                            <form id="delete-form" method="POST" action="{{ route('rawTestDate.destroy', $rawTestDate) }}">
                                @csrf
                                @method('delete')

                                <div class="form-group">
                                    <a href="rawTestDate/{{ $rawTestDate->id }}/edit" class="btn btn-primary">Edit</a>
                                    <input type="submit" name="_method" class="btn btn-danger" onclick="return confirm('Are you sure?')"
                                        value="Delete"> 
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <span>{{ $rawTestDates->appends(request()->input())->links() }} <h2>Total raw test dates: {{ $rawTestDates->total() }}</h2></span> --}}
        </table>
    </div>
</div>

<script>
    $(document).ready(function() {
        let table = $('#allRawTestDates').DataTable({
            destroy: true,
            ajax: "{{ config('variables.url') }}/rawTestDateFolder/rawTestDate/dataArray?importFileId={{ $importFile->id }}",
            dataSrc: "data",
            deferRender: true,
            //serverSide: true,            
            columns: [
                { data: 'id' },
                { data: 'importFileId' },
                { data: 'sheet' },
                { data: 'country' },
                { data: 'center' },
                { data: 'centerNumber' },
                { data: 'venue' },
                { data: 'town' },
                { data: 'testDate' },
                { data: 'testName' },
                { data: 'testFee' },
                { data: 'feeCurrency' },
                { 
                    data: 'id',
                    render: function (data) {
                        return "<a href=\"{{ config('variables.url') }}/rawTestDateFolder/rawTestDate/" + data + "/edit\" class=\"btn btn-primary\" style=\"width: 100%\">Edit</a>"
                    }
                }
            ]
        });

        $("#importFileId").on("change", function() {
            importFileId = this.value;

            table.destroy();
            table = $('#allRawTestDates').DataTable({
                destroy: true,
                ajax: "{{ config('variables.url') }}/rawTestDateFolder/rawTestDate/dataArray?importFileId=" + importFileId,
                dataSrc: "data",
                deferRender: true,
                //serverSide: true,            
                columns: [
                    { data: 'id' },
                    { data: 'importFileId' },
                    { data: 'sheet' },
                    { data: 'country' },
                    { data: 'center' },
                    { data: 'centerNumber' },
                    { data: 'venue' },
                    { data: 'town' },
                    { data: 'testDate' },
                    { data: 'testName' },
                    { data: 'testFee' },
                    { data: 'feeCurrency' },
                    { 
                        data: 'id',
                        render: function (data) {
                            return "<a href=\"{{ config('variables.url') }}/rawTestDateFolder/rawTestDate/" + data + "/edit\" class=\"btn btn-primary\" style=\"width: 100%\">Edit</a>"
                        }
                    }
                ]
            });
        });

    });
</script>
