@extends('site.layouts.app')

@section('content-site')
<div class="content">
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
                    <h1 class="title">Restaurar senha por e-mail</h1>
            </div>

            <div class="panel-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="control-label">E-Mail</label>

                        <div>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div>
                            <button type="submit" class="btn btn-primary">
                                Enviar link para restaurar senha
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- <div class="container"> -->
</div> <!-- <div class="content"> -->
@endsection
