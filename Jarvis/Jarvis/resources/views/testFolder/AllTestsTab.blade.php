<div class="tab-content">
    <div id="tests" class="tab-panel active">
        <table class="table table-hover table-bordered" id="allTests">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tests as $test)
                <tr>
                    <th scope="row">{{ $test->id }}</th>
                    <td>{{ $test->name }}</a></td>
                    <td>
                        <form id="delete-form" method="POST" action="{{ route('test.destroy', $test) }}">
                            {{ csrf_field() }}
                            {{ method_field('delete') }}

                            <div class="form-group">
                                <a href="{{ config('variables.url') }}/testFolder/test/{{ $test->id }}/edit" class="btn btn-primary">Edit</a>
                                <input type="submit" name="_method" class="btn btn-danger" onclick="return confirm('Are you sure?')"
                                    value="Delete"> 
                            </div>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            {{-- <span>{{ $tests->links() }}</span> --}}
        </table>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#allTests').DataTable();
    });
</script>