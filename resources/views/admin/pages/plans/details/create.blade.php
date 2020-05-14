{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', "Adicionar novo detalhe ao plano {$plan->name}")

@section('content_header')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item">
        <a href="{{ route('dashboard.index') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('plans.index') }}">Planos</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('plans.show', $plan->id) }}">{{ $plan->name }}</a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('details.plan.index', $plan->id) }}">Detalhes</a>
    </li>
    <li class="breadcrumb-item active" aria-current="page">
        Novo Detalhe
    </li>
</ol>
<h1>Adicionar novo detalhe ao plano <b>{{ $plan->name }}</b>
    <a href="{{ route('details.plan.index', $plan->id) }}" class="btn btn-dark">
        <i class="fas fa-angle-double-left"></i>
    </a>
</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('details.plan.store', $plan->id) }}" method="post">
            @csrf
            @include('admin.pages.plans.details._partils.form')
        </form>
    </div>
</div>

@stop
