@extends('adminlte::page')

@section('title', $records->title)

{{-- tools --}}
@section('tools')
<a class="btn btn-secondary" href=" {{ route('permissions.create') }}">
    <span class="fa fa-plus"></span>
</a>
@endsection

@section('content_header')
<h1><i class="fa fa-list"></i> {{ $records->title }} @yield('tools')</h1>
@stop

@section('breadcrumb')
<li class="breadcrumb-item">
    {{ $records->title }}
</li>
@endsection

@section('content')

@include('admin.includes.alerts')

<div class="card">
    <div class="card-header">
        <form class="form form-inline" action="{{ route('permissions.search') }}" method="post">
            @csrf
            <div class="form-group pesquisa">
                <input type="text" class="form-control" name="q" id="q" value="{{ $records['q'] ?? '' }}" aria-describedby="Pesquisar" placeholder="Pesquisar">
                <button type="submit" class="form-control btn btn-dark ml-1"><i class="fas fa-search"></i></button>
            </div>
        </form>
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        @include('admin.pages.permissions.tables.permission')
    </div>
</div>
@endSection
