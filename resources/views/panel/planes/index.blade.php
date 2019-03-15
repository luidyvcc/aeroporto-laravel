@extends('panel.layouts.app')

@section('content')

<div class="bred">
    <a href="{{ route('panel') }}" class="bred">Home  ></a>
    <a href="{{ route('planes.index') }}" class="bred">Aviões</a>
</div>

<div class="title-pg">
    <h1 class="title-pg">{{ $title or 'Erro no titulo' }}</h1>
</div>


<div class="content-din bg-white">    

    <div class="form-search">
        {!! Form::open(['route' => 'planes.index', 'class' => 'form form-inline']) !!}
            {!! Form::text('key_search', null, ['class' => 'form-control', 'placeholder' => 'Digite aqui o nome do avião']) !!}

            <button class="btn btn-search">Pesquisar</button>
        {!! Form::close() !!}
    </div>

    @if (isset($searchForm['key_search']))
        <div class="alert alert-info">
            <a href=""><i class="fa fa-refresh" aria-hidden="true"></i></a>
            <p>Resultado para <strong>{{ $searchForm['key_search'] }}</strong></p>
        </div>
    @endif

    <div class="messenges">
        @include('panel.includes.alerts')
    </div>

    <div class="class-btn-insert">
        <a href="{{ route('planes.create') }}" class="btn-insert">
            <span class="glyphicon glyphicon-plus"></span>
            Cadastrar
        </a>
    </div>

    <table class="table table-striped">
        <tr>
            <th>Id</th>
            <th>Classe</th>
            <th>Marcas</th>
            <th>Passageiros</th>
            <th width="150">Ações</th>
        </tr>

        @forelse ($planes as $plane)
            <tr>
                <td>{{ $plane->id }}</td>
                <td>{{ $plane->classes($plane->class) }}</td>
                <td>{{ $plane->brand->name }}</td>
                <td>{{ $plane->qty_passengers }}</td>
                <td>
                    <a href="{{ route('planes.edit', $plane->id) }}" class="edit">Editar</a>
                    <a href="{{ route('planes.show', $plane->id) }}" class="show">Detalhes</a>
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
        {!! $planes->appends($searchForm)->links() !!}
    @else
        {!! $planes->links() !!}
    @endif

</div><!--Content Dinâmico-->
    
@endsection