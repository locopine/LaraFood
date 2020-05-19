{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Alterar Plano')

@php $title = ucfirst(Request::segment(2)); @endphp

@section('content_header')
<h1>
    Alterar Plano
    <a href="{{ route('plans.index') }}" class="btn btn-dark">
        <i class="fas fa-angle-double-left"></i>
    </a>
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
    @yield('title')
</li>
@endsection


@section('content')

<div class="card card-success">
    <div class="card-body">
        <form action="{{ route('plans.update', $plan->id) }}" class="form-horizontal" method="post">
            <input type="hidden" value="{{ Session::get('retorno') }}" name="uri">
            @csrf
            @method('PUT')

            @include('admin.pages.plans.form')
        </form>
    </div>
</div>

@stop
