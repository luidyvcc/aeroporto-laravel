@extends('panel.layouts.app')

@section('content')

<div class="bred">
    <a href="{{ route('panel') }}" class="bred">            Home  >         </a>
    <a href="{{ route('brands.index') }}" class="bred">     Marcas >        </a>
    <a href="#" class="bred">                               {{ $bred }}     </a>
</div>

<div class="title-pg">
    <h1 class="title-pg">{{ $title or 'Detalhes da marcas' }}</h1>
</div>

<div class="content-din">

    <div class="messenges">
        @include('panel.includes.alerts')
    </div>

    <ul>
        <li>Nome: <strong>{{ $brand->name }}</strong></li>
    </ul>

    {!! Form::open(['route' => ['brands.destroy', $brand->id],
                    'class' => 'form form-search form-ds',
                    'method' => 'delete']) !!} 

        <div class="form-group">
            <button class="btn btn-danger">Deletar</button>
        </div>

    {!! Form::close() !!}

</div><!--Content Dinâmico-->
   
@endsection