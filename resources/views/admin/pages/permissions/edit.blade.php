@extends('adminlte::page')

@section('title', 'Permissions')

@section('tools')
<a class="btn btn-secondary" href=" {{ route('permissions.index') }}">
    <span class="fa fa-angle-double-left"></span>
</a>
<a class="btn btn-secondary" href="{{route('permissions.create')}}">
    <span class="fa fa-plus"></span>
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
    <a href="{{ route('permissions.show',$model->id) }}">{{ $model->id }}</a>
</li>
<li class="breadcrumb-item">
    Edit
</li>
@endsection
@section('header')
<h3><i class="fa fa-pencil"></i> Alterando <b>{{ $model->name }}</b></h3>
@endSection

@section('content')
<div class="row">
    <div class='col-md-12'>
        <div class='card'>
            <div class="card-body">
                @include('admin.pages.permissions.forms.permission',[
                'route'=>route('permissions.update',$model->id),
                'method'=>'PUT'
                ])
            </div>
        </div>
    </div>
</div>
@endSection
