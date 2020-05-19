{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@php $title = ucfirst(Request::segment(2)); @endphp

@section('title', 'Cadastrar Novo Plano')

@section('tools')
<a href="{{ route('plans.index') }}" class="btn btn-dark">
    <i class="fas fa-angle-double-left"></i>
</a>
@endsection

@section('content_header')
<h1><i class="fa fa-list"></i> @yield('title') @yield('tools')</h1>
@stop

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ route('plans.index') }}">
        {{ $title }}
    </a>
</li>
<li class="breadcrumb-item">
    Create
</li>
@endsection

@section('content')

<div class="card card-success">
    <div class="card-body">
        <form action="{{ route('plans.store') }}" class="form-horizontal" method="post">
            @csrf

            @include('admin.pages.plans.form')
        </form>
    </div>
</div>

@stop
