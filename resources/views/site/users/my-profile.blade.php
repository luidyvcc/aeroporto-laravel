@extends('site.layouts.app')

@section('content-site')

<div class="content">

    <section class="container">
        <h1 class="title">Meu Perfil</h1>


        <div class="">
            {!! Form::model($user, ['route' => ['update.profile', $user->id], 'class' => 'form-eti', 'files' => true, 'method' => 'PUT']) !!} 
        
                <div class="form-group">
                    <label for="name">Nome *</label>

                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                    <div class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></div>
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nome']) !!}
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">E-Mail *</label>

                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                    <div class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                    {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'E-mail']) !!}
                    </div>
                </div>

                <div class="form-group">
                    <label for="image">Imagem: (Opcional) Informe Apenas se Quiser Atualizar</label>

                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                    <div class="input-group-addon"><i class="fa fa-picture-o" aria-hidden="true"></i></div>
                    {!! Form::file('image', null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">Senha: (Opcional) Informe Apenas se Quiser Atualizar</label>

                    <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                    <div class="input-group-addon"><i class="fa fa-unlock-alt" aria-hidden="true"></i></div>
                    {!! Form::password('password', null, ['class' => 'form-control', 'placeholder' => '(Opcional) Informe Apenas se Quiser Atualizar a Senha']) !!}
                    </div>
                </div>

                <button type="submit" class="btn-form">Atualizar Perfil <i class="fa fa-retweet" aria-hidden="true"></i></button>

            {!! Form::close() !!}

        </div><!--Row-->
    </section><!--Container-->

</div>

@endsection