<div class="tab-content">
    <div id="baseTCs" class="tab-panel active">

        {{-- <form id="search-baseTC" action="{{ route('searchBaseTC') }}" method="POST" role="search">
            @csrf
            <div class="input-group w-25 mb-2" >
                <input type="text" class="form-control" name="q"
                    placeholder="Search Base test centers"> <span class="input-group-btn">
                    <button type="submit" class="btn btn-primary ml-2">
                        <span class="ml-2">Search</span>
                    </button>
                </span>
            </div>
        </form> --}}

        <table class="table table-hover table-bordered" id="allBaseTCs">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Test Center Association</th>
                    <th scope="col">Center Number</th>
                    <th scope="col">Venue</th>
                    <th scope="col">City</th>
                    <th scope="col">Test provider</th>
                    <th scope="col">IELTS Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Clickout URL id</th>
                    {{-- <th scope="col">Test dates</th> --}}
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            {{-- <tbody>
                @foreach ($baseTCs as $baseTC)
                <tr>
                    <th scope="row">{{ $baseTC->id }}</th>
                    <td>{{ $baseTC->testCenterAssociation }}</td>
                    <td>{{ $baseTC->centerNumber }}</td>
                    <td>{{ $baseTC->venue }}</td>
                    <td><a href="/cityFolder/city/{{ $baseTC->cityId }}">
                        @if ($baseTC->city()->exists())
                            {{ $baseTC->city->name }}
                        @else
                            Doesn't exist
                        @endif
                    </a></td>
                    <td><a href="/testProviderFolder/testProvider/{{ $baseTC->testProviderId }}">{{ $baseTC->testProvider->name }}</a></td>
                    <td>{{ $baseTC->ieltsId }}</td>
                    <td><a href="baseTC/{{ $baseTC->id }}">{{ $baseTC->name }}</a></td>
                    <td><a href="/urlFolder/url/{{ $baseTC->clickoutURLId }}">{{ $baseTC->clickoutURLId }}</a></td>
                    <td>{{ count($baseTC->editTestDates) }}</td>                    
                    <td>
                        <form id="delete-form" method="POST" action="{{ route('baseTC.destroy', $baseTC) }}">
                            @csrf
                            @method('delete')

                            <div class="form-group">
                                <a href="baseTC/{{ $baseTC->id }}/edit" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                <button type="submit" name="_method" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                                    <i class="fa fa-trash"></i></button> 
                            </div>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <span>{{ $baseTCs->appends(request()->input())->links() }}<h2>Total Base test centers: {{ $baseTCs->total() }}</h2></span> --}}
        </table>
    </div>
</div>

<script>
    $(document).ready(function() {
        let table = $('#allBaseTCs').DataTable({
            ajax: "{{ config('variables.url') }}/baseTCFolder/baseTC/dataArray",
            dataSrc: "data",
            deferRender: true,
            columns: [
                { data: 'id' },
                { data: 'testCenterAssociation' },
                { data: 'centerNumber' },
                { data: 'venue' },
                { data: 'city' },
                { 
                    data: 'testProviderId',
                    render: function (data, type, row, meta) {
                        return "<a href=\"{{ config('variables.url') }}/testProviderFolder/testProvider/" + row.testProvider + "\" style=\"width: 100%\">" + data + "</a>"
                    }
                },
                { 
                    data: 'name',
                    render: function (data, type, row, meta) {
                        return "<a href=\"{{ config('variables.url') }}/baseTCFolder/baseTC/" + row.id + "\"  style=\"width: 100%\">" + data + "</a>"
                    } 
                },
                { data: 'ieltsId' },
                { data: 'clickoutURLId' },
                { 
                    data: 'id',
                    render: function (data) {
                        return "<a href=\"{{ config('variables.url') }}/baseTCFolder/baseTC/" + data + "/edit\" class=\"btn btn-primary\"><i class=\"fa fa-edit\"></i></a>" 
                        // + "<a href=\"{{ config('variables.url') }}/baseTCFolder/baseTC/" + data + "\" class=\"btn btn-danger\"><i class=\"fa fa-trash\"></i></a>"
                    
                      
                    }
                },
                //{ data: 'linkedDates' }
            ]
        } );
    });
</script>