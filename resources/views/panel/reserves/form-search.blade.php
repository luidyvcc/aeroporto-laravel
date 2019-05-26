<div class="form-search">
    {!! Form::open(['route' => 'reserves.search', 'class' => 'form form-inline']) !!}

        {!! Form::number('reserve_id', null, ['class' => 'form-control', 'placeholder' => 'Id da reserva']) !!}
        {!! Form::text('user_name', null, ['class' => 'form-control', 'placeholder' => 'Nome do usuário']) !!}

        {!! Form::select('user', $users, null, ['class' => 'form-control']) !!}
        {!! Form::select('flight', $flights, null, ['class' => 'form-control']) !!}
        {!! Form::select('status', $statuses, null, ['class' => 'form-control']) !!}

        {!! Form::date('date_reserve_start', null, ['class' => 'form-control']) !!}
        até
        {!! Form::date('date_reserve_end', null, ['class' => 'form-control']) !!}

        <button class="btn btn-search">Pesquisar</button>
    {!! Form::close() !!}
</div>