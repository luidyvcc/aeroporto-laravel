@extends('panel.layouts.app')

@section('content')

<div class="bred">
    <a href="{{ route('panel') }}" class="bred">Home  ></a>
    <a href="{{ route('states.index') }}" class="bred">Estados ></a>
    <a href="{{ route('state.cities', $city->state->initials) }}" class="bred">Cidades de {{ $city->state->name }} ></a>
    <a href="{{ route('airports.index', $city->id) }}" class="bred">Aeroportos de {{ $city->name }} ></a>
    <a href="#" class="bred">{{ $bred }}</a>
</div>

<div class="title-pg">
    <h1 class="title-pg">{{ $title or 'Erro no título da página' }}</h1>
</div>

<div class="content-din">

    <div class="messenges">
        @include('panel.includes.alerts')
    </div>

    <ul><li>Id: <strong>{{ $airport->id }}</strong></li></ul>

    <ul><li>Cidade: <strong>{{ $airport->city->name }} / {{ $airport->city->state->initials }}</strong></li></ul>

    <ul><li>Nome: <strong>{{ $airport->name }}</strong></li></ul>

    <ul><li>Latitude: <strong>{{ $airport->latitude }}</strong></li></ul>

    <ul><li>Longitude: <strong>{{ $airport->longitude }}</strong></li></ul>

    <ul><li>Endereço: <strong>{{ $airport->address }}</strong></li></ul>

    <ul><li>Nº: <strong>{{ $airport->number }}</strong></li></ul>

    <ul><li>CEP: <strong>{{ $airport->zip_code }}</strong></li></ul>

    <ul><li>Complemento: <strong>{{ $airport->complement }}</strong></li></ul>

    {!! Form::open(['route' => ['airports.destroy', $city->id, $airport->id],
                    'class' => 'form form-search form-ds',
                    'method' => 'delete']) !!} 

        <div class="form-group">
            <button class="btn btn-danger">Deletar</button>
        </div>

    {!! Form::close() !!}

</div><!--Content Dinâmico-->
   
@endsection