<div class="tab-content">
    <div id="clickoutURLs" class="tab-panel active">
        {{-- <form id="search-clickoutURL" action="{{ route('searchClickoutURL') }}" method="POST" role="search">
            @csrf
            <div class="input-group w-25 mb-2" >
                <input type="text" class="form-control" name="q"
                        placeholder="Search clickout URLs">
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-primary ml-2">
                        <span class="ml-2">Search</span>
                    </button>
                </span>
            </div>
        </form> --}}

        <table class="table table-hover table-bordered" id="allUrls">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Tracking link name</th>
                    <th scope="col">Short tracking link</th>
                    <th scope="col">Landing page</th>
                    <th scope="col">Creation date</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            {{-- <tbody>
                @foreach ($clickoutURLs as $clickoutURL)
                <tr>
                    <th scope="row">{{ $clickoutURL->id }}</th>
                    <td>{{ $clickoutURL->trackingLinkName }}</td>
                    <td><a href="{{ $clickoutURL->shortTrackingLink }}">{{ $clickoutURL->shortTrackingLink }}</a></td>
                    <td><a href="{{ $clickoutURL->landingPage }}">{{ $clickoutURL->landingPage }}</a></td>
                    <td>{{ $clickoutURL->clickmeterCreationDate }}</td>

                    <td>
                        <form id="delete-form" method="POST" action="{{ route('url.destroy', $clickoutURL) }}">
                            @csrf
                            @method('delete')

                            <div class="form-group">
                                <a href="/urlFolder/url/{{ $clickoutURL->id }}/edit" class="btn btn-primary" style="width: 100%">Edit</a>
                                <input type="submit" name="_method" class="btn btn-danger" onclick="return confirm('Are you sure?')"
                                    value="Delete" style="width: 100%"> 
                            </div>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody> --}}
            {{-- <span>{{ $clickoutURLs->appends(request()->input())->links() }} <h2>Total clickout URLs: {{ $clickoutURLs->total() }}</h2></span> --}}
        </table>
    </div>
</div>

<script>
    $(document).ready(function() {
        let table = $('#allUrls').DataTable({
            ajax: "{{ config('variables.url') }}/urlFolder/url/dataArray",
            dataSrc: "data",
            deferRender: true,
            columns: [
                { data: 'id' },
                { 
                    data: 'trackingLinkName',
                    render: function (data, type, row, meta) {
                        return "<a href=\"{{ config('variables.url') }}/urlFolder/url/" + row.id + "\"  style=\"width: 100%\">" + data + "</a>"
                    }
                },
                { 
                    data: 'shortTrackingLink',
                    render: function (data) {
                        return "<a href=\"" + data + "\"  style=\"width: 100%\">" + data + "</a>"
                    } 
                },
                { 
                    data: 'landingPage' ,
                    render: function (data) {
                        return "<a href=\"" + data + "\"  style=\"width: 100%\">" + data + "</a>"
                    }
                },
                { data: 'clickmeterCreationDate' },
                { 
                    data: 'id',
                    render: function (data) {
                        return "<a href=\"{{ config('variables.url') }}/urlFolder/url/" + data + "/edit\" class=\"btn btn-primary\" style=\"width: 100%\">Edit</a>"
                    }
                }
            ]
        } );

        // $('body').on('click', '#delete-user', function () {
 
        //     var id = $(this).data("id");
        //     confirm("Are You sure want to delete !");

        //     $.ajax({
        //         type: "get",
        //         url: "{{ config('variables.url') }}/urlFolder/url/delete/"+id,
        //         success: function (data) {
        //         var oTable = $('#laravel_datatable').dataTable(); 
        //         oTable.fnDraw(false);
        //         },
        //         error: function (data) {
        //             console.log('Error:', data);
        //         }
        //     });
        // });   
        
    } );
</script>