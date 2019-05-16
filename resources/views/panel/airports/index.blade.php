@extends('panel.layouts.app')

@section('content')

<div class="bred">
    <a href="{{ route('panel') }}" class="bred">Home  ></a>
    <a href="{{ route('states.index') }}" class="bred">Estados  ></a>
    <a href="{{ route('state.cities', $city->state->initials) }}" class="bred">Cidades de {{ $city->state->name }} ></a>
    <a href="{{ route('airports.index', $city->id) }}" class="bred">{{ $bred }}</a>
</div>

<div class="title-pg">
    <h1 class="title-pg">{{ $title or 'Erro no titulo' }}</h1>
</div>


<div class="content-din bg-white">    

    <div class="form-search">
        {!! Form::open(['route' => 'brands.search', 'class' => 'form form-inline']) !!}
            {!! Form::text('key_search', null, ['class' => 'form-control', 'placeholder' => 'Digite aqui o nome da marca']) !!}

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
        <a href="{{ route('airports.create', $city->id) }}" class="btn-insert">
            <span class="glyphicon glyphicon-plus"></span>
            Cadastrar
        </a>
    </div>

    <table class="table table-striped">
        <tr>
            <th>Nome</th>
            <th>Endereço</th>
            <th width="200">Ações</th>
        </tr>

        @forelse ($airports as $airport)
            <tr>
                <td>{{ $airport->name }}</td>
                <td>{{ $airport->address }}</td>
                <td>
                    <a href="{{ route('airports.edit', [$city->id, $airport->id]) }}" class="edit">Edit</a>
                    <a href="{{ route('airports.show', [$city->id, $airport->id]) }}" class="edit">Detalher</a>
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
        {!! $airports->appends($searchForm)->links() !!}
    @else
        {!! $airports->links() !!}
    @endif

</div><!--Content Dinâmico-->
    
@endsection