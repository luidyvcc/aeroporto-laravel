@extends('site.layouts.app')

@section('content-site')

<div class="content">

    <section class="container">

        <h1 class="title">Minhas Compras</h1>


        <table class="table">
            <thead>
                <tr>
                    <th width="50">Cod</th>
                    <th>Vôo</th>
                    <th>Data</th>
                    <th width="100">Status</th>
                    {{-- <th width="130">Cancelar</th> --}}
                </tr>
            </thead>
            <tbody>
                
                @forelse($reserves as $reserve)

                <tr>

                    <td> {{ $reserve->id }} </td>

                    <td>
                        <a href="{{ route('site.user.purchase.detail', $reserve->flight_id) }}" class="badge badge-light">
                            Ver Detalhes Voô: {{ $reserve->flight_id }}
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </a>
                    </td>

                    <td> {{ formatDate($reserve->date_reserved) }} </td>
                    <td>
                        <span class="badge badge-secondary">
                            {{ $reserve->statuses($reserve->status) }}
                        </span>
                    </td>
                    {{-- <td>
                        <a href="" class="btn btn-sm btn-danger">
                            Cancelar <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>
                    </td> --}}
                </tr>

                @empty

                    <tr>
                        <td colspan="5">Nenhum voô reservado!</td>
                    </tr>

                @endforelse

            </tbody>
        </table>
    </section><!--Container-->

</div>

@endsection