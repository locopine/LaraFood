<nav aria-label="breadcrumb" role="navigation" class="container-fluid">
    <ol class="breadcrumb mb-1" style="font-size: 14px;font-weight: 400;margin: auto">
        <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
        @yield('breadcrumb')
        @if(!empty(request('q')))
        <li class="breadcrumb-item">
            <span class="text-muted">Showing result with keyword <b>{{request('q')}}</b></span>
            <button class="btn btn-none p-0 m-0" id="searchCleaner"><i class="text-danger fa fa-remove"></i>
            </button>
        </li>
        @endif
    </ol>
</nav>
