@extends('site.layouts.app')

@section('content-site')

<div class="content">

    <section class="container">

        <h1 class="title">Resultados Pesquisa:</h1>
        <div class="key-search row">
            <div class="col-lg-2 col-md-2 col-sm-12 col-12 text-center">
                <img src="{{ url('assets/site/images/flight.png') }}" alt="Voô">
            </div>
            <div class="col-lg-10 col-md-10 col-sm-12 col-12">
                <p>De: <span>{{ $city_origin ? $city_origin : 'Sem Origem' }}</span></p>
                <p>Para: <span>{{ $city_destination ? $city_destination : 'Sem Destino' }}</span></p>
                <p>Data: <span>{{ $flight_date ? $flight_date : 'Sem Data' }}</span></p>
            </div>
        </div>


        <div class="row results-search">

            @forelse ($flights as $flight)
                <article class="result-search col-12">

                    <span>Aeroporto Origem: <strong>{{ $flight->origin->name }}</strong></span>
                    <span>Saída: <strong>{{ formatTime($flight->hour_output) }}</strong></span>
                    <span>Chegada: <strong>{{ formatTime($flight->arrival_time) }}</strong></span>
                    <span>Paradas: <strong>{{ $flight->qty_stops }}</strong></span>
                    <a href="?pg=compras">Comprar</a>

                </article><!--result-search-->
            @empty
                <article class="result-search col-12">
                    <span><strong>Nenhum resultado encontrado.</strong></span>
                </article><!--result-search-->
            @endforelse

        </div><!--Row-->

    </section><!--Container-->

</div>

@endsection