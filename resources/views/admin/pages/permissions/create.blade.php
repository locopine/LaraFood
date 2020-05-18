@extends('adminlte::page')

@section('title', 'Permissions')

@section('tools')
<a class="btn btn-dark" href=" {{ route('permissions.index') }}">
    <span class="fa fa-angle-double-left"></span>
</a>
@endsection

@section('content_header')
<h1><i class="fa fa-list"></i> Permissions @yield('tools')</h1>
@stop

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ route('permissions.index') }}">Permissions</a>
</li>
<li class="breadcrumb-item">
    Create
</li>
@endsection

@section('header')
<h3><i class="fa fa-plus"></i> Create New Permissions</h3>
@endSection

@section('content')
<div class="row">
    <div class='col-md-12'>
        @include('admin.pages.permissions.forms.permission')
    </div>
</div>
@endSection
