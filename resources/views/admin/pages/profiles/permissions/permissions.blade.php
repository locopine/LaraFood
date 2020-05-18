@extends('adminlte::page')

@section('title', "Permissões do perfil {$profile->name}")

@section('tools')
<a class="btn btn-dark" href=" {{ route('profiles.permissions.available',$profile->id) }}">
    <span class="fa fa-plus"></span>
</a>
@endsection

@section('content_header')
<h1><i class="fa fa-list"></i> Permissões do perfil <b>{{ $profile->name }}</b> @yield('tools')</h1>
@stop

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href=" {{ route('profiles.index') }}">
        Profiles
    </a>
</li>
<li class="breadcrumb-item">
    Permissions
</li>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <form class="form form-inline" action="{{ route('profiles.permissions.available', $profile->id) }}" method="post">
            @csrf
            <div class="form-group pesquisa">
                <input type="text" class="form-control" name="q" id="q" value="{{ $filters['q'] ?? '' }}" aria-describedby="Pesquisar" placeholder="Pesquisar">
                <button type="submit" class="form-control btn btn-dark ml-1"><i class="fas fa-search"></i></button>
            </div>
        </form>
    </div>
</div>

@include('admin.includes.alerts')

<div class="row">
    <div class="col-12 ml-2 d-flex justify-content-left">
        <div class="col-md-1"><b>#</b></div>
        <div class="col-md-3"><b>Nome</b></div>
        <div class="col-md-8"><b>Descrição</b></div>
    </div>
    @foreach($permissions as $permission)
    <div class="col-sm-12">
        @include('admin.pages.profiles.permissions.cards.attachedPermission')
    </div>
    @endforeach
</div>
{{ $permissions->links() }}
@endSection
<meta name="csrf-token" content="{{ csrf_token() }}" />
