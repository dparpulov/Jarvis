<form role="form" method="POST" action="{{ route('baseTC.store') }}">
    @csrf
    <!-- new Base Test Center Modal -->
    <div class="modal fade" id="newTestCenterModal" tabindex="-1" role="dialog" aria-labelledby="newTestCenterModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newTestCenterModal">New Base Test Center</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <small>Test center association (center number + city)</small>
                        <input type="text" name="testCenterAssociation" id="testCenterAssociation" class="form-control" placeholder="Suggestion: {{ $editTestDate->rawTestDate->centerNumber }}{{ $editTestDate->rawTestDate->town }}" autofocus>
                    </div>
                    <div class="form-group">
                        <small>Center number</small>
                        <input type="text" name="centerNumber" id="centerNumber" class="form-control" value="{{ $editTestDate->rawTestDate->centerNumber }}">
                    </div>         
                    <div class="form-group">
                        <small>Venue</small>
                        <input type="text" name="venue" id="venue"  class="form-control" value="{{ $editTestDate->rawTestDate->venue }}">
                    </div>       
                    <div class="form-group"> 
                        <small>City</small>
                        <input list="citiesList" name="cityId" id="cityInput"  class="form-control" placeholder="Suggestion: {{ $editTestDate->rawTestDate->town }}">
                        <datalist id="citiesList"></datalist>           
                    </div>    
                    <div class="form-group">   
                        <small>Test provider</small>
                        <input type="text" name="testProviderId" id="testProviderId" class="form-control" value="1">
                    </div>
                    <div class="form-group">
                        <small>IeltsId</small>
                        <input type="text" name="ieltsId" id="ieltsId" class="form-control">
                    </div>    
                    <div class="form-group">    
                        <small>Name</small>
                        <input type="text" name="name" id="name" class="form-control" value="{{ $editTestDate->rawTestDate->center }}">
                    </div>      
                    <div class="form-group">         
                        <small>Description</small>
                        <input list="descriptionList" type="text" name="description" id="description" class="form-control">
                        <datalist id="descriptionList">
                            <option value="Test dates are subject to availability. Please check real-time availability on the British Council Online Registration System."></option>
                            <option value="This test centre is specifically authorised by UK Visas and Immigration and offers the UKVI exam. Test dates are subject to availability. Please check real-time availability on the British Council Online Registration System."></option>
                        </datalist>
                    </div>   
                    <div class="form-group">        
                        <small>Clickout URL</small>
                        <input list="clickoutURLsList" name="clickoutURLId" id="clickoutURLInput" class="form-control">
                        <datalist id="clickoutURLsList"></datalist>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" id="baseTestCenterAjaxSubmit">Create</button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    $(document).ready(function(){
        var cityDataList = document.getElementById('citiesList');
        var urlDataList = document.getElementById('clickoutURLsList');

        //Get city data and create datalist options
        $.getJSON("{{ config('variables.url') }}/cityFolder/city/dataList", function( data ) {
            for (let i = 0; i < data.length; i++) {
                var option = document.createElement('option');
                // Set the value using the item in the JSON array.
                option.value = data[i].id;
                option.label = data[i].name + " (" + data[i].countryId + ")";
                // Add the <option> element to the <datalist>.
                cityDataList.appendChild(option);
            }
        });

        //Get clickoutURL data and create datalist options
        $.getJSON("{{ config('variables.url') }}/urlFolder/url/dataList", function( data ) {
            for (let i = 0; i < data.length; i++) {
                var option = document.createElement('option');
                // Set the value using the item in the JSON array.
                option.value = data[i].id;
                option.label = data[i].trackingLinkName;
                // Add the <option> element to the <datalist>.
                urlDataList.appendChild(option);
            }
        });

        //Post new base test center 
        $('#baseTestCenterAjaxSubmit').click(function(e){
            $.post('baseTC.store',
                {
                    testCenterAssociation: '#testCenterAssociation',
                    centerNumber: '#centerNumber',
                    venue: '#venue',
                    cityId: '#cityId',
                    testProviderId: '#testProviderId',
                    ieltsId: '#ieltsId',
                    name: '#name',
                    description: '#description',
                    clickoutURLId: '#clickoutURLId'
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