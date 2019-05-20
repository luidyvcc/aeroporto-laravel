<div class="form-group">
    <label for="user_id">Usuário</label>
    {!! Form::select
    (
        'user_id', $users, null,
        [
            'class' => 'form-control'
        ]
    )
    !!}
</div>

<div class="form-group">
    <label for="flight_id">Voo</label>
    {!! Form::select
    (
        'flight_id', $flights, null,
        [
            'class' => 'form-control'
        ]
    )
    !!}
</div>

<div class="form-group">
    <label for="date_reserved">Data do cadastro da reserva</label>
    {!! Form::date
    (
        'date_reserved', date('Y-m-d'),
        [
            'class' => 'form-control'
        ]
    )
    !!}
</div>

<div class="form-group">
    <label for="status">Status</label>
    {!! Form::select
    (
        'status', $statuses, 0,
        [
            'class' => 'form-control'
        ]
    )
    !!}
</div>

<div class="form-group">
    <button class="btn btn-success">Ok</button>
</div>