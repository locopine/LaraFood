@extends('adminlte::page')

@section('title', "Perfis do Plano {$plan->name}")

@section('tools')
<a class="btn btn-dark" href=" {{ route('plans.profiles.available',$plan->id) }}">
    <span class="fa fa-plus"></span>
</a>
@endsection

@section('content_header')
<h1><i class="fa fa-list"></i> Perfis do Plano <b>{{ $plan->name }}</b> @yield('tools')</h1>
@stop

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href=" {{ route('plans.index') }}">
        Plans
    </a>
</li>
<li class="breadcrumb-item">
    Profiles
</li>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <form class="form form-inline" action="{{ route('plans.profiles.available', $plan->id) }}" method="post">
            @csrf
            <div class="form-group pesquisa">
                <input type="text" class="form-control" name="q" id="q" value="{{ $filters['q'] ?? '' }}" aria-describedby="Pesquisar" placeholder="Pesquisar">
                <button type="submit" class="form-control btn btn-dark ml-1"><i class="fas fa-search"></i></button>
            </div>
        </form>
    </div>
</div>

@include('admin.includes.alerts')

<div class="row">
    <div class="col-12 ml-2 d-flex justify-content-left">
        <div class="col-md-1"><b>#</b></div>
        <div class="col-md-3"><b>Nome</b></div>
        <div class="col-md-8"><b>Descrição</b></div>
    </div>
    @foreach($profiles as $profile)
    <div class="col-sm-12">
        @include('admin.pages.plans.profiles.cards.attachedprofile')
    </div>
    @endforeach
</div>
{{ $profiles->links() }}
@endSection
<meta name="csrf-token" content="{{ csrf_token() }}" />
