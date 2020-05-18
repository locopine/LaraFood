@extends('adminlte::page')

@section('title', 'Permissions')

{{-- tools --}}
@section('tools')
<a class="btn btn-secondary" href=" {{ route('permissions.create') }}">
    <span class="fa fa-plus"></span>
</a>
@endsection

@section('content_header')
<h1><i class="fa fa-list"></i> Permissions @yield('tools')</h1>
@stop

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ route('permissions.index') }}">permissions</a>
</li>
<li class="breadcrumb-item">
    {{ $record->id }}
</li>

@endsection

@section('content')

<div class="row">
    <div class="col-sm-12">
        @include('admin.pages.permissions.cards.permission')
    </div>
</div>

{{-- Listagens dos Perfis relacionados ás Permissões --}}
@if(isset($profiles[0]->id) && count($profiles) > 0)
<div class="col-sm-12">
    <h3>Perfis relacionados</h3>
    @foreach($profiles as $profile)
    @include('admin.pages.permissions.profiles.cards.attachedProfile')
    @endforeach
</div>
@endif

@endSection
