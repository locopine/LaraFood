{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@php $title = ucfirst(Request::segment(2)); @endphp

@section('title', 'Planos')

@section('tools')
<a class="btn btn-dark" href=" {{route('plans.create')}}">
    <span class="fa fa-plus"></span>
</a>
@endsection

@section('content_header')
<h1><i class="fa fa-list"></i> @yield('title') @yield('tools')</h1>
@stop

@section('breadcrumb')
<li class="breadcrumb-item">
    Plans
</li>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <form class="form form-inline" action="{{ route('plans.search') }}" method="post">
            @csrf
            <div class="form-group pesquisa">
                <input type="text" class="form-control" name="search" id="search" value="{{ $filters['search'] ?? '' }}" aria-describedby="Pesquisar" placeholder="Pesquisar">
                <button type="submit" class="form-control btn btn-dark ml-1"><i class="fas fa-search"></i></button>
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
                        <a data-toggle="tooltip" title="Detalhes do Plano!" data-placement="left" href="{{ route('details.plan.index', $plan->id) }}" class="btn btn-info"><i class="fas fa-info-circle"></i></a>
                        <a data-toggle="tooltip" title="Exibição, Edição e Exclusão do Plano!" data-placement="left" href="{{ route('plans.show', $plan->id) }}" class="btn btn-warning"><i class="far fa-eye"></i></a>
                        <a data-toggle="tooltip" title="Perfis do Plano" data-placement="left" href="{{ route('plans.profiles', $plan->id) }}" class="btn btn-info"><i class="fas fa-info-circle"></i></a>
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
    .paginacao {
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>
@endpush
