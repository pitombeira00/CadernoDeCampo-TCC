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
								<a class="breadcrumb">Safra</a>
								<a class="breadcrumb">Incluir</a>
							</div>
						</div>
					</nav><br>		
				</div>
				<div class="panel-body">
					<div class="card">
						<div class="card-content">
							<form method="POST" action="{{route('safra.store')}} ">
								{{csrf_field()}}
								<div class="row">
							        <div class="input-field col s12">
							          <input placeholder="AAAA" name="safra" type="text" maxlength="4" pattern="([0-9]{4})" class="validate">
							          <label>Ano da Safra</label>
							        </div>
							      
						      	<button type="submit" class="waves-effect green btn right" >Adicionar</button>
						      	<a href="{{route('safra.inicio')}} " class="red white-text waves-effect right btn ">Cancelar</a>
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