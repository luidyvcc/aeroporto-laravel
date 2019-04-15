@extends('panel.layouts.app')

@section('content')

<div class="bred">
    <a href="{{ route('panel') }}" class="bred">            Home >         </a>
    <a href="{{ route('flights.index') }}" class="bred">    Voos >         </a>
    <a href="#" class="bred">                               {{ $bred }}    </a>
</div>

<div class="title-pg">
    <h1 class="title-pg">{{ $title or 'Erro no titulo' }}</h1>
</div>

<div class="content-din">

    <div class="messenges">
        @include('panel.includes.alerts')
    </div>

    <ul>
        <li>Id: <strong>{{ $flight->id }}</strong></li>
    </ul>

    <ul>
        <li>Avião: <strong>{{ $flight->plane_id }}</strong></li>
    </ul>


    <ul>
        <li>Origem: <strong>{{ $flight->origin->name }}</strong></li>
    </ul>


    <ul>
        <li>Destino: <strong>{{ $flight->destination->name }}</strong></li>
    </ul>

    <ul>
        <li>Data: <strong>{{ $flight->date }}</strong></li>
    </ul>

    <ul>
        <li>Duração: <strong>{{ $flight->time_duration }}</strong></li>
    </ul>

    <ul>
        <li>Horario saída: <strong>{{ $flight->hour_output }}</strong></li>
    </ul>

    <ul>
        <li>Horario chegada: <strong>{{ $flight->arrival_time }}</strong></li>
    </ul>

    <ul>
        <li>Preço anterior: <strong>{{ $flight->old_price }}</strong></li>
    </ul>

    <ul>
        <li>Preço: <strong>{{ $flight->price }}</strong></li>
    </ul>

    <ul>
        <li>Total de parcelas: <strong>{{ $flight->total_plots }}</strong></li>
    </ul>

    <ul>
        <li>Preço: <strong>{{ $flight->price }}</strong></li>
    </ul>

    <ul>
        <li>É promoção? <strong>{{ $flight->is_promotion }}</strong></li>
    </ul>

    <ul>
        <li>Foto: <strong>{{ $flight->image }}</strong></li>
    </ul>

    <ul>
        <li>Nº de Paradas: <strong>{{ $flight->qty_stops }}</strong></li>
    </ul>

    <ul>
        <li>Descrição: <strong>{{ $flight->descrition }}</strong></li>
    </ul>

    {!! Form::open(['route' => ['flights.destroy', $flight->id],
                    'class' => 'form form-search form-ds',
                    'method' => 'delete']) !!} 

        <div class="form-group">
            <button class="btn btn-danger">Deletar</button>
        </div>

    {!! Form::close() !!}

</div><!--Content Dinâmico-->
   
@endsection