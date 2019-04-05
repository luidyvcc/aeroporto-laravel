@extends('panel.layouts.app')

@section('content')

<div class="bred">
    <a href="{{ route('panel') }}" class="bred">Home  ></a>
    <a href="{{ route('states.index') }}" class="bred">Estados  ></a>
    <a href="{{ route('state.cities', $state->initials) }}" class="bred">{{ $state->name }} ></a>
    <a href="#" class="bred">{{ $bred }}</a>
</div>

<div class="title-pg">
    <h1 class="title-pg">{{ $title or 'Erro no titulo' }} ({{ $cities->count() }} de {{ $cities->total()}})</h1>
</div>


<div class="content-din bg-white">    

    <div class="form-search">
        {!! Form::open(['route' => ['state.cities.search', $state->initials], 'class' => 'form form-inline']) !!}
            {!! Form::text('key_search', null, ['class' => 'form-control', 'placeholder' => 'Digite aqui o nome da cidade']) !!}

            <button class="btn btn-search">Pesquisar</button>
        {!! Form::close() !!}
    </div>

    @if (isset($searchForm['key_search']))
        <div class="alert alert-info">
            <p>
                <a href="{{ route('state.cities', $state->initials) }}"><i class="fa fa-refresh" aria-hidden="true"></i></a>
                Resultado para <strong>{{ $searchForm['key_search'] }}</strong>
            </p>
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
            <th>Nome</th>
            <th>CEP</th>
            <th width="150">Ações</th>
        </tr>

        @forelse ($cities as $city)
            <tr>
                <td>{{ $city->id }}</td>
                <td>{{ $city->name }}</td>
                <td>{{ $city->zip_code }}</td>
                <td>
                    <a href="{{ route('planes.edit', $city->id) }}" class="edit">Editar</a>
                    <a href="{{ route('planes.show', $city->id) }}" class="show">Detalhes</a>
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
        {!! $cities->appends($searchForm)->links() !!}
    @else
        {!! $cities->links() !!}
    @endif

</div><!--Content Dinâmico-->
    
@endsection