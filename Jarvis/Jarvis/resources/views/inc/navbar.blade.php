<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <ul class="navbar-nav" role="tablist">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                World
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a href="{{ config('variables.url') }}/countryFolder/country" class="dropdown-item">Countries</a>
                    <a href="{{ config('variables.url') }}/cityFolder/city" class="dropdown-item">Cities</a>
                    <a href="{{ config('variables.url') }}/stateFolder/state" class="dropdown-item">States</a>
            </div>
        </li>
        
        <li class="nav-item">
            <a href="{{ config('variables.url') }}/testFolder/test" class="nav-link">Tests</a>
        </li>
        <li class="nav-item">
            <a href="{{ config('variables.url') }}/baseTCFolder/baseTC" class="nav-link">Base test centers</a>
        </li>
        <li class="nav-item">
            <a href="{{ config('variables.url') }}/testProviderFolder/testProvider" class="nav-link">Test providers</a>
        </li>
        <li class="nav-item">
            <a href="{{ config('variables.url') }}/testTypeFolder/testType" class="nav-link">Test types</a>
        </li>
        <li class="nav-item">
            <a href="{{ config('variables.url') }}/urlFolder/url" class="nav-link">Clickout URLs</a>
        </li>   
        <li class="nav-item">
            <a href="{{ config('variables.url') }}/importFileFolder/importFile" class="nav-link">Import files</a>
        </li>   
        <li class="nav-item">
            <a href="{{ config('variables.url') }}/rawTestDateFolder/rawTestDate" class="nav-link">Raw test dates</a>
        </li>
        <li class="nav-item">
            <a href="{{ config('variables.url') }}/editTestDateFolder/editTestDate" class="nav-link">Edit test dates</a>
        </li>
    </ul>
</nav>