{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Detalhes do Plano')

@section('content_header')
<h1>
    Detalhes do Plano <b>{{ $plan->name }}</b>
    <a href="{{ route('plans.index') }}" class="btn btn-dark">
        <i class="fas fa-angle-double-left"></i>
    </a>
</h1>
@stop

@section('content')

<div class="card card-success">
    <div class="card-body">
        <ul>
            <li><strong>Nome: </strong>{{ $plan->name }}</li>
            <li><strong>URL: </strong>{{ $plan->url }}</li>
            <li><strong>Preço: </strong>R$ {{ number_format($plan->price,2,',','.') }}</li>
            <li><strong>Descrição: </strong>{{ $plan->description }}</li>
        </ul>
            <div class="form-group botoes">
                <a href="{{ route('plans.edit', [$plan->id]) }}" class="btn btn-dark">
                    <i class="far fa-edit"></i>
                </a>
                <button class="btn btn-danger ml-1" data-toggle="modal" data-target="#myModal">
                    <i class="far fa-trash-alt"></i>
                </button>
            </div>
    </div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="#myModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content bg-danger">
      <div class="modal-header">
        <h4 class="modal-title">Remoção de Planos</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <p>Tem certeza que quer remover o plano: <i><b>{{ $plan->name }}</b></i>?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
        <form class="ml-2" action="{{ route('plans.destroy', $plan->id) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline-light" data-toggle="modal" data-target="#myModal">
                <i class="far fa-trash-alt"></i>
            </button>
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@stop

@push('css')
    <style>
        .botoes{
            display: flex;
            justify-content: flex-start;
        }
    </style>
@endpush
