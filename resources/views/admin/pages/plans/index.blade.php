{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <h1>Planos <a href="{{ route('plans.create') }}" class="btn btn-dark">ADD</a></h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            #filters
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
                            <a href="{{ route('plans.show', $plan->id) }}" class="btn btn-warning">VER</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        <div class="paginacao" aria-label="Page navigation">
            {{ $plans->links() }}
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
