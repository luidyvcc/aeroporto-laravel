@extends('panel.layouts.app')

@section('content')

<div class="bred">
    <a href="{{ route('panel') }}" class="bred">            Home  >         </a>
    <a href="{{ route('planes.index') }}" class="bred">    Aviões >        </a>
    <a href="#" class="bred">                               {{ $bred }}     </a>
</div>

<div class="title-pg">
    <h1 class="title-pg">{{ $title or 'Erro no titulo' }}</h1>
</div>

<div class="content-din">

    <div class="messenges">
        @include('panel.includes.alerts')
    </div>

    <ul>
        <li>Id: <strong>{{ $plane->id }}</strong></li>
    </ul>

    <ul>
        <li>Quantidade de passageiros: <strong>{{ $plane->qty_passengers }}</strong></li>
    </ul>


    <ul>
        <li>Classe: <strong>{{ $classes[$plane->class] }}</strong></li>
    </ul>


    <ul>
        <li>Marca: <strong>{{ $plane->brand->name }}</strong></li>
    </ul>

    {!! Form::open(['route' => ['planes.destroy', $plane->id],
                    'class' => 'form form-search form-ds',
                    'method' => 'delete']) !!} 

        <div class="form-group">
            <button class="btn btn-danger">Deletar</button>
        </div>

    {!! Form::close() !!}

</div><!--Content Dinâmico-->
   
@endsection