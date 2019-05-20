@extends('panel.layouts.app')

@section('content')

<div class="bred">
    <a href="{{ route('panel') }}" class="bred">             Home  >      </a>
    <a href="{{ route('reserves.index') }}" class="bred">    Reservas >   </a>
    <a href="{{ route('reserves.create') }}" class="bred">   Cadastro     </a>
</div>

<div class="title-pg">
    <h1 class="title-pg">{{ $title or 'Erro no titulo' }}</h1>
</div>

<div class="content-din">

    @include('panel.includes.errors')

    {!! Form::open(['route' => 'reserves.store', 
                    'class' => 'form form-search form-ds',
                    'files' => true]) !!} 
        @include('panel.reserves.form')
    {!! Form::close() !!}

</div><!--Content Dinâmico-->
   
@endsection