<div class="form-group">
    <label for="cidy_id">Cidades</label>
    {!! Form::select
    (
        'cidy_id', $cities, $city->id,
        [
            'class' => 'form-control'
        ]
    )
    !!}
</div>

<div class="form-group">
    <label for="name">Nome</label>
    {!! Form::text
    (
        'name', null,
        [
            'class' => 'form-control',
            'placeholder' => 'Nome'
        ]
    )
    !!}
</div>

<div class="form-group">
    <label for="latitude">Latitude</label>
    {!! Form::text
    (
        'latitude', null,
        [
            'class' => 'form-control',
            'placeholder' => 'Latitude'
        ]
    )
    !!}
</div>

<div class="form-group">
    <label for="longitude">Longitude</label>
    {!! Form::text
    (
        'longitude', null,
        [
            'class' => 'form-control',
            'placeholder' => 'Longitude'
        ]
    )
    !!}
</div>

<div class="form-group">
    <label for="address">Endereço</label>
    {!! Form::text
    (
        'address', null,
        [
            'class' => 'form-control',
            'placeholder' => 'Endereço'
        ]
    )
    !!}
</div>


<div class="form-group">
    <label for="number">Número</label>
    {!! Form::number
    (
        'number', null,
        [
            'class' => 'form-control',
            'placeholder' => 'Número'
        ]
    )
    !!}
</div>

<div class="form-group">
    <label for="zip_code">CEP</label>
    {!! Form::text
    (
        'zip_code', null,
        [
            'class' => 'form-control',
            'placeholder' => 'CEP'
        ]
    )
    !!}
</div>

<div class="form-group">
    <label for="complement">Complemento</label>
    {!! Form::text
    (
        'complement', null,
        [
            'class' => 'form-control',
            'placeholder' => 'Complemento'
        ]
    )
    !!}
</div>


<div class="form-group">
    <button class="btn btn-success">Ok</button>
</div>