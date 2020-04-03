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
								<a class="breadcrumb">Local</a>
								<a class="breadcrumb">Editar</a>
							</div>
						</div>
					</nav><br>		
				</div>
				<div class="panel-body">
					<div class="card">
						<div class="card-content">
							<form method="POST" action="{{route('local.store')}} ">
								{{csrf_field()}}
								<div class="row">
							        <div class="input-field col s12">
							          <input name="descricao" type="text" class="validate" value="{{ isset($dados->descricao) ? $dados->descricao : '' }}">
							          <label>Descrição do Local</label>
							        </div>
									<input name="id" type='hidden' value='{{$dados->id}}'>
							      
						      	<button type="submit" class="waves-effect green btn right" >Editar</button>
						      	<a href="{{route('local.inicio')}} " class="red white-text waves-effect right btn ">Cancelar</a>
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