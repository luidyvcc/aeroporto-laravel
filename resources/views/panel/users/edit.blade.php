@extends('panel.layouts.app')

@section('content')

<div class="bred">
    <a href="{{ route('panel') }}" class="bred">Home  ></a>
    <a href="{{ route('users.index') }}" class="bred">Usuários ></a>
    <a href="{{ route('users.edit', $user->id) }}" class="bred">Editar usuário ></a>
</div>

<div class="title-pg">
    <h1 class="title-pg">{{ $title or 'Erro no titulo' }}</h1>
</div>

<div class="content-din">

    @include('panel.includes.errors')

    {!! Form::model($user,
                    ['route' => ['users.update', $user->id], 
                    'class' => 'form form-search form-ds',
                    'files' => true,
                    'method' => 'PUT'
                    ]) !!} 
        @include('panel.users.form')
    {!! Form::close() !!}

</div><!--Content Dinâmico-->
   
@endsection