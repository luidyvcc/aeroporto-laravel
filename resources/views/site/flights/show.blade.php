@extends('site.layouts.app')

@section('content-site')

<div class="content">

    <section class="container">
        <h1 class="title">{{ $title or 'Erro no titulo' }}</h1>


        <ul class="list-group">

            <li class="list-group-item">
                Id: <strong>{{ $flight->id }}</strong>
            </li>
    
            <li class="list-group-item">
                Avião: <strong>{{ $flight->plane_id }}</strong>
            </li>
        
            <li class="list-group-item">
                Origem: <strong>{{ $flight->origin->name }}</strong>
            </li>
        
            <li class="list-group-item">
                Destino: <strong>{{ $flight->destination->name }}</strong>
            </li>
        
            <li class="list-group-item">
                Data: <strong>{{ formatDate($flight->date) }}</strong>
            </li>
        
            <li class="list-group-item">
                Duração: <strong>{{ formatTime($flight->time_duration) }}</strong>
            </li>
        
            <li class="list-group-item">
                Horario saída: <strong>{{ formatTime($flight->hour_output) }}</strong>
            </li>
        
            <li class="list-group-item">
                Horario chegada: <strong>{{ formatTime($flight->arrival_time) }}</strong>
            </li>
        
            <li class="list-group-item">
                Preço anterior: <strong>{{ formatPrice($flight->old_price) }}</strong>
            </li>
        
            <li class="list-group-item">
                Preço: <strong>{{ formatPrice($flight->price) }}</strong>
            </li>
        
            <li class="list-group-item">
                Total de parcelas: <strong>{{ $flight->total_plots }}</strong>
            </li>
    
            <li class="list-group-item">
                É promoção? <strong>{{ $flight->is_promotion ? 'Sim' : 'Não'}}</strong>
            </li>

            <li class="list-group-item">
                Foto:
                @if ( $flight->image )
                    <img src="{{ url("storage/flights/{$flight->image}") }}" alt="{{ $flight->id }}" style="max-width: 35px;">
                @else
                    <img src="{{ url("assets/panel/imgs/no-image.jpg") }}" alt="{{ $flight->id }}" style="max-width: 35px;">
                @endif
            </li>
        
            <li class="list-group-item">
                Nº de Paradas: <strong>{{ $flight->qty_stops }}</strong>
            </li>
        
            <li class="list-group-item">
                Descrição: <strong>{{ $flight->descrition }}</strong>
            </li>

        </ul>
    </section><!--Container-->

</div>




    {{-- {!! Form::open(['route' => ['flights.destroy', $flight->id],
                    'class' => 'form form-search form-ds',
                    'method' => 'delete']) !!} 

        <div class="form-group">
            <button class="btn btn-danger">Deletar</button>
        </div>

    {!! Form::close() !!} --}}

   
@endsection