@extends('panel.layouts.app')

@section('content')

<div class="bred">
    <a href="{{ route('panel') }}" class="bred">Home  ></a>
    <a href="{{ route('brands.index') }}" class="bred">Marcas ></a>
    <a href="{{ route('brands.planes', $brand->id) }}" class="bred">{{ $bred }}</a>
</div>

<div class="title-pg">
    <h1 class="title-pg">{{ $title or 'Erro no titulo' }}</h1>
</div>


<div class="content-din bg-white">  

    <table class="table table-striped">
        <tr>
            <th>Id</th>
            <th>Classe</th>
            <th>Passageiros</th>
            <th width="200">Ações</th>
        </tr>

        @forelse ($planes as $plane)
            <tr>
                <td>{{ $plane->id }}</td>
                <td>{{ $plane->classes($plane->class) }}</td>
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

</div><!--Content Dinâmico-->
    
@endsection