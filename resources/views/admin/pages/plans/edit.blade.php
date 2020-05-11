{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Cadastrar Novo Plano')

@section('content_header')
<h1>
    Cadastrar Novo Plano
    <a href="{{ route('plans.index') }}" class="btn btn-dark">
        <i class="fas fa-angle-double-left"></i>
    </a>
</h1>
@stop

@section('content')

<div class="card card-success">
    <div class="card-body">
        <form action="{{ route('plans.update', $plan->id) }}" class="form-horizontal" method="post">
            <input type="hidden" value="{{ Session::get('retorno') }}" name="uri">
            @csrf
            @method('PUT')

            @include('admin.pages.plans.form')
        </form>
    </div>
</div>

@stop
