{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Cadastrar Novo Plano')

@section('content_header')
<h1>
    Cadastrar Novo Plano
    <a href="{{ route('plans.index') }}" class="btn btn-dark">LIST</a>
</h1>
@stop

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
