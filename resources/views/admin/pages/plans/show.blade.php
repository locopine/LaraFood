{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Detalhes do Plano')

@section('content_header')
<h1>
    Detalhes do Plano <b>{{ $plan->name }}</b>
    <a href="{{ route('plans.index') }}" class="btn btn-dark">LIST</a>
</h1>
@stop

@section('content')

<div class="card card-success">
    <div class="card-body">
        <ul>
            <li><strong>Nome: </strong>{{ $plan->name }}</li>
            <li><strong>URL: </strong>{{ $plan->url }}</li>
            <li><strong>Preço: </strong>{{ number_format($plan->price,2,',','.') }}</li>
            <li><strong>Descrição: </strong>{{ $plan->description }}</li>
        </ul>
            <div class="form-group botoes">
                <a href="{{ route('plans.edit', [$plan->id]) }}" class="btn btn-dark">Alterar Plano</a>
                <form class="ml-2" action="{{ route('plans.destroy', $plan->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Cancelar Plano</button>
                </form>
            </div>
    </div>
</div>

@stop

@push('css')
    <style>
        .botoes{
            display: flex;
            justify-content: flex-start;
        }
    </style>
@endpush
