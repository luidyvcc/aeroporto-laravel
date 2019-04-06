<div class="form-group">
    <label for="plane_id">Avião</label>
    {!! Form::select
    (
        'plane_id', $planes, 0,
        [
            'class' => 'form-control'
        ]
    )
    !!}
</div>













<div class="form-group">
    <label for="qty_passengers">Quantidade de passegeiros</label>
    {!! Form::number
    (
        'qty_passengers', null,
        [
            'class' => 'form-control',
            'placeholder' => 'Quantidade de passageiros'
        ]
    )
    !!}
</div>

<div class="form-group">
    <label for="class">Classe</label>
    {!! Form::select
    (
        'class', $classes, 0,
        [
            'class' => 'form-control'
        ]
    )
    !!}
</div>

<div class="form-group">
    <label for="brand_id">Marca</label>
    {!! Form::select
    (
        'brand_id', $brands, 0,
        [
            'class' => 'form-control'
        ]
    )
    !!}
</div>

<div class="form-group">
    <button class="btn btn-success">Ok</button>
</div>