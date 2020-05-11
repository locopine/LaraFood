{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item">
            <a href="{{ route('dashboard.index') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
            Planos
        </li>
    </ol>
<h1>Planos <a href="{{ route('plans.create') }}" class="btn btn-dark"><i class="far fa-plus-square"></i></a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form class="form form-inline" action="{{ route('plans.search') }}" method="post">
                @csrf
                <div class="form-group pesquisa">
                    <input type="text"
                        class="form-control"
                        name="search"
                        id="search"
                        value="{{ $filters['search'] ?? '' }}"
                        aria-describedby="Pesquisar"
                        placeholder="Pesquisar">
                        <button type="submit"
                        class="form-control btn btn-dark ml-1"><i class="fas fa-search"></i></button>
                </div>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>URL</th>
                        <th>Preço</th>
                        <th>Descrição</th>
                        <th colspan="2">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($plans as $plan)
                    <tr>
                        <td>{{ $plan->name }}</td>
                        <td>{{ $plan->url }}</td>
                        <td class="text-right"> R$ {{ number_format($plan->price,2,',','.') }}</td>
                        <td>{{ $plan->description }}</td>
                        <td>
                            <a href="{{ route('plans.show', $plan->id) }}" class="btn btn-warning"><i class="far fa-eye"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        <div class="paginacao" aria-label="Page navigation">
            @if(isset($filters))
                {{ $plans->appends($filters)->links() }}
            @else
                {{ $plans->links() }}
            @endif
        </div>
    </div>
@stop

@push('css')
<style>
    .paginacao{
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>
@endpush
