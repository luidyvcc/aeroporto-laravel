@extends('site.layouts.app')

@section('content-site')
<div class="content">
    <div class="container">
            <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 class="title">Login</h1>
                    </div>

                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="control-label">E-Mail</label>

                                <div>
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="control-label">Senha</label>

                                <div>
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Me lembre
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Entrar
                                    </button>

                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        Esqueceu sua senha?
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
    </div> <!-- <div class="container"> -->
</div> <!-- <div class="content"> -->
@endsection
