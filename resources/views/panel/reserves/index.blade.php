@extends('panel.layouts.app')

@section('content')

<div class="bred">
    <a href="{{ route('panel') }}" class="bred">Home  ></a>
    <a href="{{ route('reserves.index') }}" class="bred">Reservas  ></a>
</div>

<div class="title-pg">
    <h1 class="title-pg">{{ $title or 'Erro no titulo' }}</h1>
</div>

<div class="content-din bg-white">    

    <div class="form-search">
        {!! Form::open(['route' => 'reserves.search', 'class' => 'form form-inline']) !!}
            {!! Form::text('key_search', null, ['class' => 'form-control', 'placeholder' => 'Reserva']) !!}

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
        <a href="{{ route('reserves.create') }}" class="btn-insert">
            <span class="glyphicon glyphicon-plus"></span>
            Cadastrar
        </a>
    </div>

    <table class="table table-striped">
        <tr>
            <th>Id</th>
            <th>Data Reserva</th>
            <th>Usuário</th>
            <th>Voo</th>
            <th>Origem</th>
            <th>Destino</th>
            <th>Data Voo</th>
            <th>Status</th>
            <th width="150">Ações</th>
        </tr>

        @forelse ($reserves as $reserve)
            <tr>
                <td>{{ $reserve->id }}</td>
                <td>{{ formatDate($reserve->date_reserved) }}</td>
                <td>{{ $reserve->user->name }}</td>
                <td>{{ $reserve->flight->id }}</td>
                <td>{{ $reserve->flight->origin->name }}</td>
                <td>{{ $reserve->flight->destination->name }}</td>
                <td>{{ formatDate($reserve->flight->date) }}</td>
                <td>{{ $reserve->statuses($reserve->status) }}</td>
                <td>                    
                    <a href="{{ route('reserves.edit', $reserve->id) }}" class="edit">
                        Editar
                    </a>
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
        {!! $reserves->appends($searchForm)->links() !!}
    @else
        {!! $reserves->links() !!}
    @endif

</div><!--Content Dinâmico-->
    
@endsection