<div class="tab-content">
    <div id="testTypes" class="tab-panel active">
        <table class="table table-hover table-bordered" id="allTestTypes">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Test Id</th>
                    <th scope="col">Type</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($testTypes as $testType)
                <tr>
                    <th scope="row">{{ $testType->id }}</th>
                    <td>{{ $testType->test->name }}</a></td>
                    <td>{{ $testType->type }}</a></td>
                    <td>
                        <form id="delete-form" method="POST" action="{{ route('testType.destroy', $testType) }}">
                            @csrf
                            @method('delete')

                            <div class="form-group">
                                <a href="{{ config('variables.url') }}/testTypeFolder/testType/{{ $testType->id }}/edit" class="btn btn-primary">Edit</a>
                                <input type="submit" name="_method" class="btn btn-danger" onclick="return confirm('Are you sure?')"
                                    value="Delete"> 
                            </div>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            {{-- <span>{{ $testTypes->links() }}</span> --}}
        </table>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#allTestTypes').DataTable();
    });
</script>