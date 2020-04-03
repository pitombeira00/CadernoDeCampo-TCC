@extends('layout.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col s12 ">
            <div class="card">
                <h3 class="center blue-text ">Caderno de campo - Login</h3>

                <div class="card-content ">
                <body id="app-layout"  @if(Session::has('mensagem')) id="app-layout" onload="Materialize.toast('{{Session::get('mensagem')['msg']}}', 4000)" @endif>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                            <div class="input-field col s12">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                                <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail ') }}</label>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        
                            <div class="input-field col s12">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Senha') }}</label>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        
                            <div class="col s12">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Lembrar Senha') }}
                                    </label>
                                
                            </div>
                        

                                <button type="submit" class="btn blue">
                                    {{ __('Entrar') }}
                                </button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
