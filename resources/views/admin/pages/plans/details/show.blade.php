{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', "Detalhe do Plano : {$detail->name}")

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
        Editar
    </li>
</ol>
<h1>
    Detalhe do Plano <b><i>{{ $detail->name }}</i></b>
    <a href="{{ route('details.plan.index', $plan->id) }}" class="btn btn-dark">
        <i class="fas fa-angle-double-left"></i>
    </a>
</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('details.plan.update', [$plan->id, $detail->id]) }}" method="post">
            @csrf
            @method('PUT')
            <ul>
                <li>{{ $detail->name }}</li>
            </ul>
        </form>
    </div>
</div>

@stop
