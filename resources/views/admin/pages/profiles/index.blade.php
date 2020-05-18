@extends('adminlte::page')

@php $title = ucfirst(Request::segment(2)); @endphp

@section('title', $title)

@section('tools')
<a class="btn btn-dark" href=" {{route('profiles.create')}}">
    <span class="fa fa-plus"></span>
</a>
@endsection

@section('content_header')
<h1><i class="fa fa-list"></i> @yield('title') @yield('tools')</h1>
@stop

@section('breadcrumb')
<li class="breadcrumb-item">
    Profiles
</li>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <form class="form form-inline" action="{{ route('profiles.search') }}" method="post">
            @csrf
            <div class="form-group pesquisa">
                <input type="text" class="form-control" name="search" id="search" value="{{ $records['search'] ?? '' }}" aria-describedby="Pesquisar" placeholder="Pesquisar">
                <button type="submit" class="form-control btn btn-dark ml-1"><i class="fas fa-search"></i></button>
            </div>
        </form>
    </div>
</div>

@include('admin.includes.alerts')

<div class="row">
    @foreach($records as $record)
    <div class="col-sm-12">
        @include('admin.pages.profiles.cards.profile')
    </div>
    @endforeach
</div>
{{ $records->links() }}
@endSection
