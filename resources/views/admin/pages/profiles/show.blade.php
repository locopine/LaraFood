@extends('adminlte::page')

@php $title = ucfirst(Request::segment(2)); @endphp

@section('title', $title)

@section('tools')
<a class="btn btn-dark" href=" {{ route('profiles.permissions.available',$profile->id) }}">
    <span class="fa fa-plus"></span>
</a>
@stop

@section('content_header')
<h1><i class="fa fa-list"></i> {{ $title }} @yield('tools')</h1>
@stop

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ route('profiles.index') }}">{{ ucfirst(Request::segment(2)) }}</a>
</li>
<li class="breadcrumb-item">
    {{ $record->id }}
</li>
@endsection

@section('header')
<h3><i class="fa fa-eye"></i> {{ $record->id }}</h3>
@endsection

@section('tools')
<div class="btn-group">

    <a class="btn btn-secondary" href="{{ route('profiles.create') }}">
        <span class="fa fa-plus"></span>
    </a>
    <a class="btn btn-secondary" href="{{ route('profiles.edit', $record->id) }}">
        <span class="fa fa-pencil"></span>
    </a>
    <form onsubmit="return confirm('Are you sure you want to delete?')" action="{{ route('profiles.destroy',$record->id) }}" method="post" style="display: inline">
        {{csrf_field()}}
        {{method_field('DELETE')}}
        <button type="submit" class="btn btn-secondary cursor-pointer">
            <i class="text-danger fa fa-remove"></i>
        </button>
    </form>

</div>
@endsection

@section('content')

<div class="row">
    <div class="col-sm-12">
        @include('admin.pages.profiles.tables.profile')
    </div>

    {{-- Listagens das permissões relacionadas ao Perfil --}}
    @if(isset($permissions[0]->id) && count($permissions) > 0)
    <div class="col-sm-12">
        <h3>Permissões</h3>
        @foreach($permissions as $permission)
        @include('admin.pages.profiles.permissions.cards.attachedPermission')
        @endforeach
    </div>
    @endif

</div>
@endSection
