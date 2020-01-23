<form role="form" method="POST" action="{{ route('url.store') }}">
    @csrf
    <!-- new clickout URL Modal -->
    <div class="modal fade" id="newClickoutURLModal" tabindex="-1" role="dialog" aria-labelledby="newTestCenterModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newClickoutURLModal">New Clickout URL</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <div class="form-group">
                            <small>Tracking Link Name</small>
                            <input type="text" name="trackingLinkName" id="trackingLinkName" class="form-control" autofocus>
                        </div>
                        <div class="form-group">
                            <small>Short Tracking Link</small>
                            <input type="text" name="shortTrackingLink" id="shortTrackingLink" class="form-control" autofocus>
                        </div>         
                        <div class="form-group">
                            <small>Landing Page</small>
                            <input type="text" name="landingPage" id="landingPage" class="form-control" autofocus>
                        </div>       
                        <div class="form-group"> 
                            <small>Clickmeter Creation Date (YY-MM-DD)</small>
                            <input type="text" name="clickmeterCreationDate" id="clickmeterCreationDate" class="form-control" autofocus>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" id="clickoutURLAjaxSubmit">Create</button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    $(document).ready(function(){
        //Post new clickout URL
        $('#clickoutURLAjaxSubmit').click(function(e){
            $.post('url.store',
                {
                    testCenterAssociation: '#testCenterAssociation',
                    centerNumber: '#centerNumber',
                    venue: '#venue',
                    cityId: '#cityId'
                },
                function(result){
                    if(result.errors){
                        $('.alert-danger').html('');

                        jQuery.each(result.errors, function(key, value){
                            $('.alert-danger').show();
                            $('.alert-danger').append('<li>'+value+'</li>');
                        });
                    }else{
                        $('.alert-danger').hide();
                        $('#open').hide();
                        $('#newTestCenterModal').modal('hide');
                    }
                }
            );
        });

    });
</script>