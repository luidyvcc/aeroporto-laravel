@extends('panel.layouts.app')

@section('content')

<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>

    <li class="breadcrumb-item"><a href="#">Estados</a></li>

    <li class="breadcrumb-item"><a href="#">Cidades</a></li>

    <li class="breadcrumb-item"><a href="#">{{ $city->name }}</a></li>

    <li class="breadcrumb-item"><a href="{{ route('airports.index', $city->id) }}">Aeroportos</a></li>

    <li class="breadcrumb-item active">{{ $bred }}</li>
</ol>

<div class="title-pg">
    <h1 class="title-pg">{{ $title or 'Erro no titulo' }}</h1>
</div>

<div class="content-din">

    @include('panel.includes.errors')

    {!! Form::open(['route' => ['airports.store', $city->id], 
                    'class' => 'form form-search form-ds',
                    'files' => true]) !!} 
        @include('panel.airports.form')
    {!! Form::close() !!}

</div><!--Content Dinâmico-->
   
@endsection