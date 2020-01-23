<div class="tab-content">
    <div id="states" class="tab-panel active">
        <table class="table table-hover table-bordered" id="allStates">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">State id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Country</th>
                    <th scope="col">State code</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            {{-- <tbody>
                @foreach ($states as $state)
                <tr>
                    <th scope="row">{{ $state->id }}</th>
                    <td><a href="state/{{ $state->id }}"> {{ $state->name }}</a></td>
                    <td><a href="/countryFolder/country/{{ $state->countryId }}">{{ $state->country->name }}</a></td>
                    <td>{{ $state->stateCode }}</td>
                    <td>
                        <form id="delete-form" method="POST" action="{{ route('state.destroy', $state) }}">
                            {{ csrf_field() }}
                            {{ method_field('delete') }}

                            <div class="form-group">
                                <a href="state/{{ $state->id }}/edit" class="btn btn-primary">Edit</a>
                                <input type="submit" name="_method" class="btn btn-danger" onclick="return confirm('Are you sure?')"
                                    value="Delete"> 
                            </div>
                        </form>
                    </td>
                </tr>
                @endforeach
                
            </tbody>
            <span>{{ $states->links() }}</span> --}}
        </table>
    </div>
</div>


<script>
    $(document).ready(function() {
        let table = $('#allStates').DataTable({
            ajax: "{{ config('variables.url') }}/stateFolder/state/dataArray",
            dataSrc: "data",
            deferRender: true,
            columns: [
                { data: 'id' },
                { 
                    data: 'name',
                    render: function (data, type, row, meta) {
                        return "<a href=\"{{ config('variables.url') }}/stateFolder/state/" + row.id + "\"  style=\"width: 100%\">" + data + "</a>"
                    }
                },
                { 
                    data: 'country',
                    render: function (data, type, row, meta) {
                        return "<a href=\"{{ config('variables.url') }}/countryFolder/country/" + row.countryId + "\"  style=\"width: 100%\">" + data + "</a>"
                    } 
                },
                { data: 'stateCode' },
                { 
                    data: 'id',
                    render: function (data) {
                        return "<a href=\"{{ config('variables.url') }}/stateFolder/state/" + data + "/edit\" class=\"btn btn-primary\" style=\"width: 100%\">Edit</a>"
                    }
                }
            ]
        } );
    });
</script>