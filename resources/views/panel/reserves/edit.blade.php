@extends('panel.layouts.app')

@section('content')

<div class="bred">
    <a href="{{ route('panel') }}" class="bred">             Home  >      </a>
    <a href="{{ route('reserves.index') }}" class="bred">    Reservas >   </a>
    <a href="{{ route('reserves.edit', $reserve->id) }}" class="bred">     Editar       </a>
</div>

<div class="title-pg">
    <h1 class="title-pg">{{ $title or 'Erro no titulo' }}</h1>
</div>

<div class="content-din">

    @include('panel.includes.errors')

    {{-- {!! Form::model($reserve,
                    ['route' => ['reserves.update', $reserve->id], 
                    'class' => 'form form-search form-ds',
                    'files' => true,
                    'method' => 'PUT'
                    ]) !!} 
        @include('panel.reserves.form')
    {!! Form::close() !!} --}}

    {!! Form::model($reserve,
            ['route' => ['reserves.update', $reserve->id], 
            'class' => 'form form-search form-ds',
            'files' => true,
            'method' => 'PUT'
            ])
    !!} 
        <div class="form-group">
            <label for="status">Status</label>
            {!! Form::select
            (
                'status', $statuses, $reserve->status,
                [
                    'class' => 'form-control'
                ]
            )
            !!}
        </div>

        <div class="form-group">
            <button class="btn btn-success">Ok</button>
        </div>
    {!! Form::close() !!}

</div><!--Content Dinâmico-->
   
@endsection