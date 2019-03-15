@extends('site.layouts.app')

@section('content-site')

<div class="content">

    <section class="container">
        <h1 class="title">Promoções</h1>


        <div class="row">
            @for($i =0; $i < 20; $i++):
                <article class="result col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="image-promo">
                        <img src="{{ url('assets/site/images/buenos_aires.jpg') }}" alt="">

                        <div class="legend">
                            <h1>Brasília</h1>
                            <h2>Saída: Goiânia</h2>
                            <span>Ida e Volta</span>
                        </div>
                    </div><!--image-promo-->

                    <div class="details">
                        <p>Data: 12/12/2018</p>

                        <div class="price">
                            <span>R$ 259,00</span>
                            <strong>Em até 6x</strong>
                        </div>

                        <a href="" class="btn btn-buy">Comprar</a>
                    </div><!--details-->

                </article><!--result-->
            @endfor;
        </div><!--Row-->
    </section><!--Container-->

</div>

@endsection