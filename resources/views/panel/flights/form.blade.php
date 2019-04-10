<div class="form-group">
    <label for="plane_id">Avião</label>
    {!! Form::select
    (
        'plane_id', $planes, null,
        [
            'class' => 'form-control'
        ]
    )
    !!}
</div>

<div class="form-group">
    <label for="airport_origin_id">Origem</label>
    {!! Form::select
    (
        'airport_origin_id', $airports, null,
        [
            'class' => 'form-control'
        ]
    )
    !!}
</div>

<div class="form-group">
    <label for="airport_destination_id">Destino</label>
    {!! Form::select
    (
        'airport_destination_id', $airports, null,
        [
            'class' => 'form-control'
        ]
    )
    !!}
</div>

<div class="form-group">
    <label for="date">data</label>
    {!! Form::date
    (
        'date', null,
        [
            'class' => 'form-control'
        ]
    )
    !!}
</div>

<div class="form-group">
    <label for="time_duration">Duração</label>
    {!! Form::time
    (
        'time_duration', null,
        [
            'class' => 'form-control'
        ]
    )
    !!}
</div>

<div class="form-group">
    <label for="hour_output">Horario saída</label>
    {!! Form::time
    (
        'hour_output', null,
        [
            'class' => 'form-control',
            'placeholder' => 'Horario saída'
        ]
    )
    !!}
</div>

<div class="form-group">
    <label for="arrival_time">Horario chegada</label>
    {!! Form::time
    (
        'arrival_time', null,
        [
            'class' => 'form-control',
            'placeholder' => 'Horario chegada'
        ]
    )
    !!}
</div>

<div class="form-group">
    <label for="old_price">Preço anterior</label>
    {!! Form::text
    (
        'old_price', null,
        [
            'class' => 'form-control',
            'placeholder' => 'Preço anterior'
        ]
    )
    !!}
</div>

<div class="form-group">
    <label for="price">Preço</label>
    {!! Form::text
    (
        'price', null,
        [
            'class' => 'form-control',
            'placeholder' => 'Preço'
        ]
    )
    !!}
</div>

<div class="form-group">
    <label for="total_plots">Total de parcelas</label>
    {!! Form::number
    (
        'total_plots', null,
        [
            'class' => 'form-control',
            'placeholder' => 'Total de parcelas'
        ]
    )
    !!}
</div>

<div class="form-group">
    {!! Form::checkbox
    (
        'is_promotion', null, null,
        [
            'id' => 'is_promotion'
        ]
    )
    !!}
    <label for="is_promotion">É promoção?</label>
</div>

<div class="form-group">
    <label for="image">Foto</label>
    {!! Form::file
    (
        'image', 
        [
            'class' => 'form-control'
        ]
    )
    !!}
</div>

<div class="form-group">
    <label for="qty_stops">Nº de Paradas</label>
    {!! Form::number
    (
        'qty_stops', null,
        [
            'class' => 'form-control',
            'placeholder' => 'Nº de Paradas'
        ]
    )
    !!}
</div>

<div class="form-group">
    <label for="descrition">Descrição</label>
    {!! Form::text
    (
        'descrition', null,
        [
            'class' => 'form-control',
            'placeholder' => 'Descrição'
        ]
    )
    !!}
</div>


<div class="form-group">
    <button class="btn btn-success">Ok</button>
</div>