<div class="tab-content">
    <div id="countries" class="tab-panel active">

        {{-- <form id="search-country" action="{{ route('searchCountry') }}" method="POST" role="search">
            @csrf
            <div class="input-group w-25 mb-2" >
                <input type="text" class="form-control" name="q"
                        placeholder="Search countries"> <span class="input-group-btn">
                    <button type="submit" class="btn btn-primary ml-2">
                        <span class="ml-2">Search</span>
                    </button>
                </span>
            </div>
        </form> --}}

        <table class="table table-hover table-bordered" id="allCountries">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">SpId</th>
                    <th scope="col">Country Name</th>
                    <th scope="col">Continent</th>
                    <th scope="col">Currency code</th>
                    <th scope="col">Currency name</th>
                    <th scope="col">Geoname Id</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($countries as $country)
                <tr>
                    <th scope="row">{{ $country->id }}</th>
                    <td>{{ $country->spId }}</a></td>
                    <td><a href="{{ config('variables.url') }}/countryFolder/country/{{ $country->id }}">{{ $country->name }}</a></td>
                    <td>{{ $country->continent }}</td>
                    <td>{{ $country->currencyCode }}</td>
                    <td>{{ $country->currencyName }}</td>
                    <td>{{ $country->geonameId }}</td>
                    <td>
                        <form id="delete-form" method="POST" action="{{ route('country.destroy', $country) }}">
                            @csrf
                            @method('delete')

                            <div class="form-group">
                                <a href="{{ config('variables.url') }}/countryFolder/country/{{ $country->id }}/edit" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                <button type="submit" name="_method" class="btn btn-danger" onclick="return confirm('Are you sure?')"> 
                                    <i class="fa fa-trash"></i></button>
                            </div>
                        </form>
                    </td>
                </tr> 
                @endforeach
            </tbody>
            {{-- <span>{{ $countries->appends(request()->input())->links() }} <h2>Total countries: {{ $countries->total() }}</h2></span> --}}
        </table>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#allCountries').DataTable();
    });
</script>