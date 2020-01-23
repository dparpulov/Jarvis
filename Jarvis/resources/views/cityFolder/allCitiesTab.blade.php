<div class="tab-content">
    <div id="cities" class="tab-panel active">

        {{-- <form id="search-city" action="{{ route('searchCity') }}" method="POST" role="search">
            @csrf
            <div class="input-group w-25 mb-2" >
                <input type="text" class="form-control" name="q"
                        placeholder="Search cities"> <span class="input-group-btn">
                    <button type="submit" class="btn btn-primary ml-2">
                        <span class="ml-2">Search</span>
                    </button>
                </span>
            </div>
        </form> --}}

        <table class="table table-hover table-bordered" id="allCities">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">CountryId</th>
                    <th scope="col">State Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Alternative name</th>
                    {{-- <th scope="col">lng</th>
                    <th scope="col">lat</th> --}}
                    <th scope="col">Inhabitants</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            {{-- <tbody>
                @foreach ($cities as $city)
                <tr>
                    <th scope="row">{{ $city->id }}</th>
                    <td><a href="/countryFolder/country/{{ $city->countryId }}">{{ $city->country->name }}</a></td>
                    <td>
                        @if ($city->stateId != 0)
                        <a href="/stateFolder/state/{{ $city->stateId }}">{{ $city->state->name }}</a>
                        @endif
                    </td>
                    <td><a href="city/{{ $city->id }}">{{ $city->name }}</a></td>
                    <td>{{ $city->alternativeName }}</td>
                    <td>{{ $city->lng }}</td>
                    <td>{{ $city->lat }}</td>
                    <td>{{ $city->inhabitants }}</td>
                    <td>
                        <form id="delete-form" method="POST" action="{{ route('city.destroy', $city) }}">
                            @csrf
                            @method('delete')
                            <div class="form-group">
                                <a href="city/{{ $city->id }}/edit" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                <button type="submit" name="_method" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                                    <i class="fa fa-trash"></i></button>
                            </div>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <span>{{ $cities->appends(request()->input())->links() }} <h2>Total cities: {{ $cities->total() }}</h2></span> --}}
        </table>
    </div>
</div>

<script>
    $(document).ready(function() {
        let table = $('#allCities').DataTable({
            ajax: "{{ config('variables.url') }}/cityFolder/city/dataArray",
            dataSrc: "data",
            deferRender: true,
            columns: [
                { data: 'id' },
                { 
                    data: 'country',
                    render: function (data, type, row, meta) {
                        return "<a href=\"{{ config('variables.url') }}/countryFolder/country/" + row.countryId + "\"  style=\"width: 100%\">" + data + "</a>"
                    }
                },
                { 
                    data: 'stateId',
                    render: function (data, type, row, meta) {
                        return "<a href=\"{{ config('variables.url') }}/stateFolder/state/" + row.stateId + "\"  style=\"width: 100%\">" + data + "</a>"
                    } 
                },
                { 
                    data: 'name' ,
                    render: function (data, type, row, meta) {
                        return "<a href=\"{{ config('variables.url') }}/cityFolder/city/" + row.id + "\"  style=\"width: 100%\">" + data + "</a>"
                    }
                },
                { data: 'alternativeName' },
                { data: 'inhabitants' },
                { 
                    data: 'id',
                    render: function (data) {
                        return "<a href=\"{{ config('variables.url') }}/cityFolder/city/" + data + "/edit\" class=\"btn btn-primary\" style=\"width: 100%\">Edit</a>"
                    }
                }
            ]
        } );
    });
</script>