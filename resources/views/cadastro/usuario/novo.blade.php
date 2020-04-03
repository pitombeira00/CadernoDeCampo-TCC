@extends('layout.app')

@section('content')
<div class="container">
	<div class="row">

		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading"><br>
					<nav>
						<div class="nav-wrapper light-blue z-depth-5">
							<div class="col s12">
								<a class="breadcrumb">Caderno de Campo</a>
								<a class="breadcrumb">Cadastros</a>
								<a class="breadcrumb">Usuario</a>
								<a class="breadcrumb">Novo</a>
							</div>
						</div>
					</nav><br>		
				</div>
				<div class="panel-body">
					<div class="card">
						<div class="card-content">
							<form method="POST" action="{{route('usuario.store')}} ">
								{{csrf_field()}}
								<div class="row">
							        <div class="input-field col s12">
							          <input name="nome" type="text" class="validate" >
							          <label>Nome do Usuário</label>
							        </div>
							        <div class="input-field col s12">
							          <input name="email" type="text" class="validate" >
							          <label>E-mail</label>
							        </div>
							        <div class="input-field col s12">
							        <select name="tipo_user" class="validate">
							        	<option value="" disabled selected>Tipo de usuario</option>
							        	<option value="1">Gerente</option>
							        	<option value="2">Encarregado</option>
							        	<option value="3">Administrativo</option>
							        	<option value="4">Fiscal</option>
							        </select>
							        </div>
							        							      	
						      	<button type="submit" class="waves-effect green btn right" >Adicionar</button>
						      	<a href="{{route('usuario.inicio')}} " class="red white-text waves-effect right btn ">Cancelar</a>
								</div>
							</form>

						</div>
					</div>
				</div>
			</div>
		</div>        
	</div>
</div>
@endsection