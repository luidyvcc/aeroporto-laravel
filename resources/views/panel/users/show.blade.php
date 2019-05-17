@extends('panel.layouts.app')

@section('content')

<div class="bred">
    <a href="{{ route('panel') }}" class="bred">Home  ></a>
    <a href="{{ route('users.index') }}" class="bred">Usuários ></a>
    <a href="{{ route('users.show', $user->id) }}" class="bred">Detalhes do usuário ></a>
</div>

<div class="title-pg">
    <h1 class="title-pg">{{ $title or 'Erro no título da página' }}</h1>
</div>

<div class="content-din">

    <div class="messenges">
        @include('panel.includes.alerts')
    </div>

    <ul><li>Id: <strong>{{ $user->id }}</strong></li></ul>

    <ul><li>Nome: <strong>{{ $user->name }}</strong></li></ul>

    <ul><li>Senha: <strong>{{ $user->password }}</strong></li></ul>

    <ul><li>E-mail: <strong>{{ $user->email }}</strong></li></ul>

    <ul>
        <li>
            Imagem: 
            @if ( $user->image )
                <img src="{{ url("storage/users/{$user->image}") }}" alt="Imagem do usuário" width="35">
            @else
                <img src="{{ url("assets/panel/imgs/user-no-image.jpg") }}" alt="Usuário sem imagem" width="35">
            @endif
        </li>
    </ul>

    <ul><li>Admin: <strong>{{ $user->is_admin }}</strong></li></ul>

    {!! Form::open(['route' => ['users.destroy', $user->id],
                    'class' => 'form form-search form-ds',
                    'method' => 'delete']) !!} 

        <div class="form-group">
            <button class="btn btn-danger">Deletar</button>
        </div>

    {!! Form::close() !!}

</div><!--Content Dinâmico-->
   
@endsection