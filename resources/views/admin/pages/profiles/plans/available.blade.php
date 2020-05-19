@extends('adminlte::page')

@section('title', "Permissões disponíveis para {$profile->name}")

{{-- @section('tools')
<a href="{{ route('permissions.create', $profile->id) }}" class="btn btn-secondary">
ADD Nova Permissão <span class="fa fa-plus"></span>
</a>
@endsection --}}

@section('content_header')
<h1><i class="fa fa-list"></i> Permissões disponíveis para <b>{{ $profile->name }}</b> @yield('tools')</h1>
@stop

{{-- Breadcrumb --}}
@section('breadcrumb')
<li class="breadcrumb-item">
    <a href=" {{ route('profiles.index') }}">
        Profiles
    </a>
</li>
<li class="breadcrumb-item">
    Permissions Available
</li>
@endsection
{{-- ./Breadcrumb --}}

{{-- Search --}}
@section('content')
<div class="card">
    <div class="card-header">
        <form class="form form-inline" action="{{ route('profiles.permissions.available', $profile->id) }}" method="post">
            @csrf
            <div class="form-group pesquisa">
                <input type="text" class="form-control" name="q" id="q" value="{{ $records['q'] ?? '' }}" aria-describedby="Pesquisar" placeholder="Pesquisar">
                <button type="submit" class="form-control btn btn-dark ml-1"><i class="fas fa-search"></i></button>
            </div>
        </form>
    </div>
</div>
{{-- ./Search --}}

@include('admin.includes.alerts')

<div class="row">
    <form action="{{ route('profiles.permissions.attach', $profile->id) }}" class="form w-100" method="post">
        @csrf
        @foreach($permissions as $permission)
        <div class="col-sm-12">
            @include('admin.pages.profiles.permissions.cards.availablePermission')
        </div>
        @endforeach
        <div class="form-group pt-2 ml-2">
            <button type="submit" class="btn btn-secondary">Vincular</button>
        </div>
    </form>
</div>
<div class="card-footer d-flex justify-content-center">
    @if($filters)
    {{ $permissions->appends($filters)->links() }}
    @else
    {{ $permissions->links() }}
    @endif
</div>
@endSection
