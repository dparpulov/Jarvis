<div class="tab-content">
    <div id="testProviders" class="tab-panel active">
        <table class="table table-hover table-bordered" id="allTestProviders">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Promote</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($testProviders as $testProvider)
                <tr>
                    <th scope="row">{{ $testProvider->id }}</th>
                    <td><a href="{{ config('variables.url') }}/testProviderFolder/testProvider/{{ $testProvider->id }}">{{ $testProvider->name }}</a></td>
                    <td>{{ $testProvider->promote }}</td>
                    <td>
                        <form id="delete-form" method="POST" action="{{ route('testProvider.destroy', $testProvider) }}">
                            @csrf
                            @method('delete')

                            <div class="form-group">
                                <a href="{{ config('variables.url') }}/testProviderFolder/testProvider/{{ $testProvider->id }}/edit" class="btn btn-primary">Edit</a>
                                <input type="submit" name="_method" class="btn btn-danger" onclick="return confirm('Are you sure?')"
                                    value="Delete"> 
                            </div>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            {{-- <span>{{ $testProviders->links() }}</span> --}}
        </table>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#allTestProviders').DataTable();
    });
</script>