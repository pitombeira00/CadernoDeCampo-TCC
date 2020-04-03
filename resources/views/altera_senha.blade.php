@extends('layout.app')

@section('content')
<div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                <nav>
						<div class="nav-wrapper light-blue z-depth-5">
							<div class="col s12">
								<a class="breadcrumb">Caderno de Campo</a>
								<a class="breadcrumb">Alterar Senha Inicial</a>
							</div>
						</div>
					</nav>
          </div>
                <div class="panel-body">
                   <div class="card-content">
                    <form method="POST" action="{{route('alterou.senha')}} ">
                      {{csrf_field()}}
                      <div class="row">
                            <div class="input-field col s12">
                              <input name="new_senha" type="password" class="validate" >
                              <label>Nova Senha</label>
                            </div>
                            <div class="input-field col s12">
                              <input name="confirm_senha" type="password" class="validate" >
                              <label>Repetir Senha</label>
                            </div>
                          <button type="submit" class="waves-effect green btn right" >Alterar Senha</button>
                    </form>
                          <a class="red white-text waves-effect right btn" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Sair') }}
                          </a>
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                          </form>
                      </div>
                    
                  </div>
                </div>
                </div>
            </div>
        </div>        
</div>
</div>
@endsection