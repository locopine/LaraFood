{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@php $title = ucfirst(Request::segment(2)); @endphp

@section('title', "Detalhe do Plano : ")

@section('tools')
<a href="{{ route('details.plan.index', $plan->id) }}" class="btn btn-dark">
    <i class="fas fa-angle-double-left"></i>
</a>
@endsection

@section('content_header')
<h1>
    <i class="fa fa-list"></i>
    @yield('title')
    <b>{{ $detail->name }}</b>
    @yield('tools')
</h1>
@stop

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ route('plans.index') }}">
        {{ $title }}
    </a>
</li>
<li class="breadcrumb-item">
    <a href="{{ route('plans.show', $plan->id) }}">
        {{ $plan->name }}
    </a>
</li>
<li class="breadcrumb-item">
    <a href="{{ route('details.plan.index', $plan->id) }}">
        Detalhes
    </a>
</li>
<li class="breadcrumb-item active" aria-current="page">
    Editar
</li>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <ul>
            <li>{{ $detail->name }}</li>
        </ul>
    </div>
</div>

@stop
