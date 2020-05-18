@extends('adminlte::page')

@php $title = ucfirst(Request::segment(2)); @endphp

@section('title', $title)

@section('tools')
<a class="btn btn-dark" href=" {{ route('profiles.index') }}">
    <span class="fa fa-angle-double-left"></span>
</a>
@endsection

@section('content_header')
<h1><i class="fa fa-list"></i> {{ $title }} Edit {{ $model->id }} @yield('tools')</h1>
@stop

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{route('profiles.index')}}">{{ $title }}</a>
</li>
<li class="breadcrumb-item">
    <a href="{{route('profiles.show',$model->id)}}">{{ $model->id }}</a>
</li>
<li class="breadcrumb-item">
    Edit
</li>
@endsection

@section('header')
<h3><i class="fa fa-pencil"></i> Edit {{ $model->id }}</h3>
@endSection

@section('content')
<div class="row">
    <div class='col-md-12'>
        <div class='card'>
            <div class="card-body">
                @include('admin.pages.profiles.forms.profile', [
                'route' => route('profiles.update', $model->id),
                'method' => 'PUT'
                ])
            </div>
        </div>
    </div>
</div>
@endSection
