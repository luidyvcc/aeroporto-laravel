@extends('panel.layouts.app')

@section('content')

<div class="bred">
    <a href="{{ route('panel') }}" class="bred">Home  ></a>
    <a href="{{ route('users.index') }}" class="bred">Usuários  ></a>
</div>

<div class="title-pg">
    <h1 class="title-pg">{{ $title or 'Erro no titulo' }}</h1>
</div>


<div class="content-din bg-white">  

    <div class="form-search">
        {!! Form::open(['route' => 'users.search', 'class' => 'form form-inline']) !!}
            {!! Form::number('code', null, ['class' => 'form-control', 'placeholder' => 'Código']) !!}
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nome']) !!}
            {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'E-mail']) !!}
            <button class="btn btn-search">Pesquisar</button>
        {!! Form::close() !!}
    </div>

    @if (isset($searchForm))
        <div class="alert alert-info">
            <p>
                <a href="{{ route('users.index') }}">
                    <i class="fa fa-refresh" aria-hidden="true"></i>
                </a>
                Resultado da pesquisa   
            </p>
        </div>
    @endif

    <div class="messenges">
        @include('panel.includes.alerts')
    </div>

    <div class="class-btn-insert">
        <a href="{{ route('users.create') }}" class="btn-insert">
            <span class="glyphicon glyphicon-plus"></span>
            Cadastrar
        </a>
    </div>

    <table class="table table-striped">
        <tr>
            <th>image</th>
            <th>Id</th>
            <th>Nome</th>
            <th>email</th>
            <th>Admin</th>
            <th width="200">Ações</th>
        </tr>

        @forelse ($users as $user)
            <tr>
                <td>
                    @if ( $user->image )
                        <img src="{{ url("storage/users/{$user->image}") }}" alt="Imagem do usuário" width="25">
                    @else
                        <img src="{{ url("assets/panel/imgs/user-no-image.jpg") }}" alt="Usuário sem imagem" width="25">
                    @endif
                </td>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->is_admin }}</td>
                <td>
                    <a href="{{ route('users.edit', $user->id) }}" class="edit">Editar</a>
                    <a href="{{ route('users.show', $user->id) }}" class="edit">Detalher</a>
                </td>
            </tr>            
        @empty
            <tr>
                <td colspan="200">Nenhum cadastro!</td>
            </tr> 
        @endforelse

    </table>

    {{-- 
    appends = Faz com que o array de pesquisa também vá para a próxima página.

    Se veio a variável $searchForm existir, as informações contidas nela
    são da pesquisa feita pelo input dessa mesma página.
    Caso ela não exista, a paginação deve ser feita normalmente.
    --}}
    @if(isset($searchForm))
        {!! $users->appends($searchForm)->links() !!}
    @else
        {!! $users->links() !!}
    @endif

</div><!--Content Dinâmico-->
    
@endsection