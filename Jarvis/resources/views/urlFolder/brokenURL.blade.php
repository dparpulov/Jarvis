@extends('layout')

@section('content')
    <h1>Broken links will be here</h1>
    <div class="row">
        <div class="col">
            {{-- Tabs for the different tables --}}
            <ul class="nav nav-tabs" role="tablist">
                <li class="active mr-2">
                    <a data-toggle="tab" class="nav-link active" href="#workingURLs"><span>Working URLs</span></a>
                </li>
                <li>
                    <a data-toggle="tab" class="nav-link" href="#brokenURLs"><span>Broken URLs</span></a>
                </li>
            </ul>
        </div>
    </div>

    <div class="tab-content">
        <div id="workingURLs" class="tab-pane active in">
            <table class="table table-sm table-hover table-bordered" id="allWorkingURLs">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" style="width: 33.33%">Link name</th>
                        <th scope="col" style="width: 33.33%">Link</th>
                        <th scope="col" style="width: 33.33%">Checked on</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($workingLinks as $workingLink)
                    <tr>
                        <th scope="row">{{ $workingLink->trackingLinkName }}</th>
                        <td>{{ $workingLink->shortTrackingLink }}</td>
                        <td>21/10/2019</th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div id="brokenURLs" class="tab-pane fade">
            <table class="table table-sm table-hover table-bordered" id="allBrokenURLs">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Link name</th>
                        <th scope="col">Link</th>
                        <th scope="col">Checked on</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($brokenLinks as $brokenLink)
                    <tr>
                        <th scope="row">{{ $brokenLink->trackingLinkName }}</th>
                        <td>{{ $brokenLink->shortTrackingLink }}</th>
                        <td>21/10/2019</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <script>
        $('#allWorkingURLs').DataTable({});
        $('#allBrokenURLs').DataTable({});
    </script>
@endsection