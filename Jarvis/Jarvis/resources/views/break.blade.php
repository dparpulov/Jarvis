<!DOCTYPE html>
<html>
    <head>
        <title>Datatables Server Side Processing in Laravel</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">  
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>

        <link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">

        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
    
    </head>
    <body>

            <h1 class="text-center">Server side processing</h1>


            
                    <table class="table table-sm table-hover table-bordered" id="allUnlinked">
                        <thead class="thead-dark">
                            <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Regular test date</th>
                                    <th scope="col">Test Type</th>
                                    <th scope="col">Test Date</th>
                                    <th scope="col">Test Fee</th>
                                    <th scope="col">Town</th>
                                    <th scope="col">Venue</th>
                                    <th scope="col">Raw Test Date Id</th>
                                    <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        {{-- <tbody>
                            @foreach ($unlinkedDates as $unlinkedDate)
                                <tr>
                                    <th scope="row">{{ $unlinkedDate->id }}</th>
                                    <td>{{ $unlinkedDate->regularTestDate }}</td>
                                    <td>{{ $unlinkedDate->testTypeId }}</td>
                                    <td>{{ $unlinkedDate->testDate }}</td>
                                    <td>{{ $unlinkedDate->testFee }} {{ $unlinkedDate->feeCurrency }}</td>
                                    <td>{{ $unlinkedDate->rawTestDate->town }}</td>
                                    <td>{{ $unlinkedDate->rawTestDate->venue }}</td>
                                    <td>{{ $unlinkedDate->rawTestDateId }}</td>
                                    <td>
                                        <form id="delete-form" method="POST" action="{{ route('editTestDate.destroy', $unlinkedDate) }}">
                                        @csrf
                                        @method('delete')
                        
                                            <div class="form-group">
                                                <a href="editTestDate/{{ $unlinkedDate->id }}/edit" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                                <button type="submit" name="_method" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                                                    <i class="fa fa-trash"></i></button>
                                            </div>
                                        </form>  
                                    </td>  
                                </tr>
                            @endforeach
                        </tbody>
                        <span>{{ $unlinkedDates->appends(request()->input())->links() }} <h2>Total unlinked dates: {{ $unlinkedDates->total() }}</h2></span> --}}
                    </table>
                
        
        
        <script>
            $(document).ready(function() {
                let table = $('#allUnlinked').DataTable({
                    ajax: "{{ config('variables.url') }}/editTestDateFolder/editTestDate/unlinkedDataArray",
                    dataSrc: "data",
                    deferRender: true,
                    columns: [
                        { data: 'id' },
                        { data: 'regularTestDate' },
                        { data: 'testTypeId' },
                        { data: 'testDate' },
                        { data: 'testFee' },
                        { data: 'town' },
                        { data: 'venue' },
                        { data: 'rawTestDateId' },
                        { 
                            data: 'id',
                            render: function (data) {
                                return "<a href=\"/editTestDateFolder/editTestDate/" + data + "/edit\" class=\"btn btn-primary\" style=\"width: 100%\">Edit</a>"
                            }
                        }
                    ]
                } );
            });
        </script>

</html>