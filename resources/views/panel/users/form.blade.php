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
    <label for="latitude">E-mail</label>
    {!! Form::text
    (
        'email', null,
        [
            'class' => 'form-control',
            'placeholder' => 'e-mail'
        ]
    )
    !!}
</div>

<div class="form-group">
    <label for="longitude">Senha</label>
    {!! Form::password
    (
        'password', null,
        [
            'class' => 'form-control',
        ]
    )
    !!}
</div>

<div class="form-group">
    {!! Form::checkbox
    (
        'is_admin', true, null,
        [
            'id' => 'is_promotion'
        ]
    )
    !!}
    <label for="is_promotion">É Admin?</label>
</div>

<div class="form-group">
    <label for="image">Imagem</label>
    {!! Form::file
    (
        'image', 
        [
            'class' => 'form-control',
        ]
    )
    !!}
</div>

<div class="form-group">
    <button class="btn btn-success">Ok</button>
</div>