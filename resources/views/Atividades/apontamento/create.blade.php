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
								<a class="breadcrumb">Apontamento</a>
								<a class="breadcrumb">Novo</a>
							</div>
						</div>
					</nav><br>		
				</div>
				<div class="panel-body">
					<div class="card">
						<div class="card-content">
							<form method="POST" action="{{route('apontamento.store')}} ">
								{{csrf_field()}}
								<div class="row">
										<input name="id" type="hidden" value="{{$dados->id}}">
							    <div class="input-field col s4">
										<input name="Safra" type="text" value="{{$dados->safra->descricao}}" disabled>
							        	<label>Safra</label>
							    	</div>
							        <div class="input-field col s4">
										<input name="local" type="text" value="{{$dados->local->descricao}}" disabled >
							        	<label>Local</label>
									</div>
							        <div class="input-field col s4">
										<input name="Atividade" type="text" value="{{$dados->atividade->descricao}}" disabled>
							        	<label>Atividade</label>
									</div>
							        <div class="input-field col s12">
												<input name="quantidade" type="number" value="Podar-teste" class="validate" place>
							        	<label>Quantidade</label>
											</div>
							        <div class="input-field col s1">
							          <label>Data Inicio</label>
							        </div>
							        <div class="input-field col s4">
							          <input name="dt_ini" type="datetime-local" class="validate">
							        </div>
							        <div class="input-field col s1">
							          <label>Data Fim</label>
							        </div>
							        <div class="input-field col s5">
							          <input name="dt_fim" type="datetime-local" class="validate">
											</div>
							        <div class="input-field col s12">
												<select multiple="multiple" name='funcs[]' id='funcs' >
													<option value="" disabled selected>Escolha o(s) Funcionário(s)</option>
													@foreach ($func as $funcionario)	
										      <option value="{{$funcionario->id}}">{{$funcionario->id .'-'. $funcionario->nome}}</option>
									    		@endforeach
												</select>
												<label>Funcionários</label>
											</div>
											<div class="col s11">
									<button type="submit" class="waves-effect green btn right" >Adicionar</button>
						      	<a href="{{route('apontamento.inicio')}} " class="red white-text waves-effect right btn ">Cancelar</a>
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