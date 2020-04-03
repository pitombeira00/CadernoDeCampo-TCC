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
								<a class="breadcrumb">Atividades</a>
								<a class="breadcrumb">Incluir</a>
							</div>
						</div>
					</nav><br>		
				</div>
				<div class="panel-body">
					<div class="card">
						<div class="card-content">
							<form method="POST" action="{{route('atividade.store')}} ">
								{{csrf_field()}}
								<div class="row">
							        <div class="input-field col s12">
							          <input name="descricao" type="text" class="validate">
							          <label>Descrição</label>
							        </div>
							        <div class="input-field col s12">
							          	<select name="tipo_medicao" class="validate">
										      <option value="" disabled selected>Tipo de Medição</option>
										      <option value="1">Área</option>
										      <option value="2">Linha</option>
										      <option value="3">Plantas</option>
									    </select>
									    <label>Tipo de Medição</label>
							        </div>
							        <div class="input-field col s12">
							          	<select name="tipo_atividade" required>
										      <option value="" disabled selected>Tipo de Atividade</option>
										      <option value="1">Mecânica</option>
										      <option value="2">Manual</option>
									    </select>
									    <label>Tipo de Atividade</label>
							        </div>
							      
						      	<button type="submit" class="waves-effect green btn right" >Adicionar</button>
						      	<a href="{{route('atividade.inicio')}} " class="red white-text waves-effect right btn ">Cancelar</a>
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