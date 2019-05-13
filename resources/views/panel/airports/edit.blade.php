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
    <h1 class="title-pg">{{ $title or 'Erro no titulo' }}</h1>
</div>

<div class="content-din">

    @include('panel.includes.errors')

    {!! Form::model($airport,
                    ['route' => ['airports.update', $city->id, $airport->id], 
                    'class' => 'form form-search form-ds',
                    'files' => true,
                    'method' => 'PUT'
                    ]) !!} 
        @include('panel.airports.form')
    {!! Form::close() !!}

</div><!--Content Dinâmico-->
   
@endsection