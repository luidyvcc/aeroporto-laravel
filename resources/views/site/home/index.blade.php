@extends('site.layouts.app')

@section('content-site')

<section class="slide"></section><!--Slide-->

@include('site.home.form-search')

<div class="rectangle"></div><!--rectangle-->

<div class="clear"></div>

<section class="banner">
    <div class="container banner-ctc-background-over-white card">
        <div class="row">
            <div class="col-md-3 text-center">
                <img class="banner-ctc-img" src="{{ url('assets/site/images/cards.png') }}">
            </div>
            <div class="col-md-7">
                
                <div class="banner-ctc-titulo-contenedor"><span>Que tal assinar na EspecializaTi Academy?</span></div>
                
                <div>
                    <p>ASSINE E TENHA ACESSO A TODOS OS NOSOS CURSOS DISPONÍVEL NA ESPECIALIZATI ACADEMY. MAIS BARATO QUE UM CAFÉ POR DIA!</p>
                </div>
            </div>
            <div class="col-md-2">
                <a href="https://academy.especializati.com.br" target="_blank" class="btn pull-right btn-flat flat-medium third-level">
                    <span>Saiba Mais</span>
                </a>
            </div>
        </div>
    </div>
</section><!--Banner-->
    
@endsection