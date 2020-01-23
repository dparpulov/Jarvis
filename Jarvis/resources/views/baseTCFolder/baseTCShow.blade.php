@extends('layout')

@section('content')
<div class="row">
    <div class="col-6">
        <h3>{{ $baseTC->name }}</h3>
        {{-- <form class="form-horizontal pb-4" role="form" method="POST" action="{{ route('baseTC.update' , $baseTC->id) }}">
            @csrf --}}
            {{-- Id --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="id" class="control-label">Id:</label>
                </div>
                <div class="col-5">
                    <label class="control-label font-weight-bold">{{ $baseTC->id }}</label>                    
                    
                    {{-- <input readonly type="text" name="id" id="id" placeholder="Id" value="{{ $baseTC->id }}" class="form-control" autofocus> --}}
                </div>
            </div>
            {{-- testCenterAssociation --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="testCenterAssociation" class="control-label">Test Center association:</label>
                </div>
                <div class="col-5">
                    <label class="control-label font-weight-bold">{{ $baseTC->testCenterAssociation }}</label>
                </div>
            </div>
            {{-- centerNumber --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="centerNumber" class="control-label">Center number:</label>
                </div>
                <div class="col-5">
                    <label class="control-label font-weight-bold">{{ $baseTC->centerNumber }}</label>
                </div>
            </div>
            {{-- venue --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="venue" class="control-label">Venue:</label>
                </div>
                <div class="col-5">
                    <label class="control-label font-weight-bold">{{ $baseTC->venue }}</label>
                </div>
            </div>
            {{-- city id --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="cityId" class="control-label">City Id:</label>
                </div>
                <div class="col-5">
                    <label class="control-label font-weight-bold">{{ $baseTC->city->name }}</label>
                    
                    {{-- <input readonly type="text" name="cityId" id="cityId" placeholder="Name" value="{{ $baseTC->cityId }}" class="form-control" autofocus> --}}
                </div>
            </div>
            {{-- testProviderId --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="testProviderId" class="control-label">Test provider Id:</label>
                </div>
                <div class="col-5">
                    <label class="control-label font-weight-bold">{{ $baseTC->testProvider->name }}</label>
                    
                    {{-- <input readonly type="text" name="testProviderId" id="testProviderId" placeholder="Test provider Id" value="{{ $baseTC->testProviderId }}" class="form-control" autofocus> --}}
                </div>
            </div>
            {{-- ieltsId --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="ieltsId" class="control-label">ielts Id:</label>
                </div>
                <div class="col-5">
                    <label class="control-label font-weight-bold">{{ $baseTC->ieltsId }}</label>
                    
                    {{-- <input readonly type="text" name="ieltsId" id="ieltsId" placeholder="Ielts Id" value="{{ $baseTC->ieltsId }}" class="form-control" autofocus> --}}
                </div>
            </div>
            {{-- Name --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="name" class="control-label">Name:</label>
                </div>
                <div class="col-5">
                    <label class="control-label font-weight-bold">{{ $baseTC->name }}</label>
                    
                    {{-- <input readonly type="text" name="name" id="name" placeholder="Name" value="{{ $baseTC->name }}" class="form-control" autofocus> --}}
                </div>
            </div>
            {{-- description --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="description" class="control-label">Description:</label>
                </div>
                <div class="col-5">
                    <label class="control-label font-weight-bold">{{ $baseTC->description }}</label>
                    
                    {{-- <input readonly type="text" name="description" id="description" placeholder="Description" value="{{ $baseTC->description }}" class="form-control" autofocus> --}}
                </div>
            </div>
            {{-- clickoutUrlId --}}
            <div class="form-group row">
                <div class="col-sm-3">
                    <label for="clickoutURLId" class="control-label">ClickoutUrl Id:</label>
                </div>
                <div class="col-5">
                    <label class="control-label font-weight-bold">{{ $baseTC->clickoutURLId }}</label>
                    
                    {{-- <input readonly type="text" name="clickoutURLId" id="clickoutURLId" placeholder="clickoutURLId" value="{{ $baseTC->clickoutURLId }}" class="form-control" autofocus> --}}
                </div>
            </div>
            <div class="form-group row">
                <div class="col-4">
                    <a href="{{ config('variables.url') }}/baseTCFolder/baseTC/create" class="btn btn-primary">New base test center</a>
                
                </div>
                {{-- <div class="col-4">
                    <a href="{{ config('variables.url') }}/baseTCFolder/baseTC/{{ $baseTC->id }}/edit" class="btn btn-primary">Edit</a>
                </div> --}}
                <div class="col-4">
                    <form id="delete-form" method="POST" action="{{ route('baseTC.update', $baseTC->id) }}">
                        @csrf
                        @method('DELETE')
                        <div class="row">
                            <div class="col-6">
                                <a href="{{ $baseTC->id }}/edit" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">
                                <i class="fa fa-trash"></i></button> 
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-4">
                    <a href="{{ config('variables.url') }}/baseTCFolder/baseTC" class="btn btn-primary" >Go Back</a>
                </div>
            </div>
        {{-- </form> --}}
    </div>


    <div class="col-6">
        <h2>Test dates</h2>
        <table class="table table-bordered table-striped mb-0" id="editTestDatesTable">
            <thead>
                <tr>
                    <th scope="col">Center</th>
                    <th scope="col">Center number</th>
                    <th scope="col">Venue</th>
                    <th scope="col">Town</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($baseTC->editTestDates as $editTestDate)
                <tr>
                    <th scope="row">{{ $editTestDate->rawTestDate->center }}</th>
                    <td>{{ $editTestDate->rawTestDate->centerNumber }}</td>
                    <td>{{ $editTestDate->rawTestDate->venue }}</td>
                    <td>{{ $editTestDate->rawTestDate->town }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    $('#editTestDatesTable').DataTable({});    
</script>

@endsection