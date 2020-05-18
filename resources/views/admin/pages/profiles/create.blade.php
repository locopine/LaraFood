@extends('adminlte::page')

@php $title = ucfirst(Request::segment(2)); @endphp

@section('title', $title)

@section('tools')
<a class="btn btn-dark" href=" {{ route('profiles.index') }}">
    <span class="fa fa-angle-double-left"></span>
</a>
@endsection

@section('content_header')
<h1><i class="fa fa-list"></i> {{ $title }} @yield('tools')</h1>
@stop

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{route('profiles.index')}}">{{ ucfirst(Request::segment(2)) }}</a>
</li>
<li class="breadcrumb-item">
    Create
</li>
@endsection

@section('content')
<div class="row">
    <div class='col-md-12'>
        @include('admin.pages.profiles.forms.profile')
    </div>
</div>
@endSection
