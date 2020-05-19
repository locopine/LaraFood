{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@php $title = ucfirst(Request::segment(2)); @endphp

@section('title', "Editar o detalhe")

@section('tools')
<a href="{{ route('details.plan.index', $plan->id) }}" class="btn btn-dark">
    <i class="fas fa-angle-double-left"></i>
</a>
@endsection

@section('content_header')
<h1>
    <i class="fa fa-list"></i>
    @yield('title')
    <b>{{ $detail->name }}</b>
    @yield('tools')
</h1>
@stop

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ route('plans.index') }}">
        {{ $title }}
    </a>
</li>
<li class="breadcrumb-item">
    <a href="{{ route('plans.show', $plan->id) }}">
        {{ $plan->name }}
    </a>
</li>
<li class="breadcrumb-item">
    <a href="{{ route('details.plan.index', $plan->id) }}">
        Detalhes
    </a>
</li>
<li class="breadcrumb-item active" aria-current="page">
    @yield('title')
</li>
@endsection

@section('content_header')
<h1>Editar o detalhe {{$detail->name}}</b>
    <a href="{{ route('details.plan.index', $plan->id) }}" class="btn btn-dark">
        <i class="fas fa-angle-double-left"></i>
    </a>
</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('details.plan.update', [$plan->id, $detail->id]) }}" method="post">
            @csrf
            @method('PUT')
            @include('admin.pages.plans.details._partils.form')
        </form>
    </div>
</div>

@stop
