@extends('site.layouts.app')

@section('content-site')

<div class="content">

    <section class="container">

        <h1 class="title">Promoções</h1>

        <div class="row">

            @forelse ($flightsPromotion as $flight)

                <article class="result col-lg-3 col-md-4 col-sm-6 col-12">

                    <div class="image-promo">

                        @if ( $flight->image )
                            <img src="{{ url("storage/flights/{$flight->image}") }}" alt="{{ $flight->id }}">
                        @else
                            <img src="{{ url("assets/panel/imgs/no-image.jpg") }}" alt="{{ $flight->id }}">
                        @endif

                        <div class="legend">
                            <h1>{{ $flight->destination->city->name }}</h1>
                            <h2>Saída: {{ $flight->origin->city->name }}</h2>
                            <span>As: {{ formatDate($flight->date) }}</span>
                        </div>
                    </div><!--image-promo-->

                    <div class="details">

                        <div class="price">
                            <span>{{ formatPrice($flight->price) }}</span>
                            <strong>Em até {{ $flight->total_plots }}x</strong>
                        </div>

                        <a href="{{ route('site.flights.show', $flight->id) }}" class="btn btn-buy">Detalhes</a> 

                    </div><!--details-->

                </article><!--result-->
            @empty

                <h2>Sem promoções no momento.</h2>
                
            @endforelse

        </div><!--Row-->

    </section><!--Container-->

</div>

@endsection