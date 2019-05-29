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

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <ul>
                    <li>Id: <strong>{{ $flight->id }}</strong></li>
                
                    <li>Avião: <strong>{{ $flight->plane_id }}</strong></li>
                
                    <li>Origem: <strong>{{ $flight->origin->name }}</strong></li>
                
                    <li>Destino: <strong>{{ $flight->destination->name }}</strong></li>
                
                    <li>Data: <strong>{{ formatDate($flight->date) }}</strong></li>
                
                    <li>Duração: <strong>{{ formatTime($flight->time_duration) }}</strong></li>
                
                    <li>Horario saída: <strong>{{ formatTime($flight->hour_output) }}</strong></li>
                
                    <li>Horario chegada: <strong>{{ formatTime($flight->arrival_time) }}</strong></li>
                
                    <li>Preço anterior: <strong>{{ formatPrice($flight->old_price) }}</strong></li>
                
                    <li>Preço: <strong>{{ formatPrice($flight->price) }}</strong></li>
                
                    <li>Total de parcelas: <strong>{{ $flight->total_plots }}</strong></li>
                
                    <li>É promoção? <strong>{{ $flight->is_promotion ? 'Sim' : 'Não'}}</strong></li>           
                    
                    <li>Nº de Paradas: <strong>{{ $flight->qty_stops }}</strong></li>
                
                    <li>Descrição: <strong>{{ $flight->descrition }}</strong></li>
                </ul>
            </div>

            <div class="col-md-6">
                @if ( $flight->image )
                    <img src="{{ url("storage/flights/{$flight->image}") }}" alt="{{ $flight->id }}" style="max-width: 375px;" class="img-thumbnail">
                @else
                    <img src="{{ url("assets/panel/imgs/no-image.jpg") }}" alt="{{ $flight->id }}" style="max-width: 375px;" class="img-thumbnail">
                @endif
            </div>

        </div>

    </div>

    

    {!! Form::open(['route' => ['flights.destroy', $flight->id],
                    'class' => 'form form-search form-ds',
                    'method' => 'delete']) !!} 

        <div class="form-group">
            <button class="btn btn-danger">Deletar</button>
        </div>

    {!! Form::close() !!}

</div><!--Content Dinâmico-->
   
@endsection