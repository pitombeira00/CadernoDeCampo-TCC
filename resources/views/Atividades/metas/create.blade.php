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
								<a class="breadcrumb">Metas</a>
								<a class="breadcrumb">Adicionar</a>
							</div>
						</div>
					</nav><br>		
				</div>
				<div class="panel-body">
					<div class="card">
						<div class="card-content">
							<form method="POST" action="{{route('metas.store')}} ">
								{{csrf_field()}}
								<div class="row">
									<div class="input-field col s12">
							          	<select name="id_atividade" class="validate" required>
											<option value="" disabled selected>Tipo de Atividade</option>
										    @foreach ($atividade as $ativ)	
										      <option value="{{$ativ->id}}">{{$ativ->descricao}}</option>
									    	@endforeach
									    </select>
									    <label>Atividade</label>
							        </div>
							        <div class="input-field col s12">
							          	<select name="id_safra" class="validate" required>
										      <option value="" disabled selected>Safra</option>
										    @foreach ($safra as $saf)	
										      <option value="{{$saf->id}}">{{$saf->descricao}}</option>
									    	@endforeach
									    </select>
									    <label>Safra</label>
							        </div>
							        <div class="input-field col s12">
							          	<select name="id_local" class="validate" required>
										      <option value="" disabled selected>Escolha o Local</option>
										      @foreach ($local as $loc)	
										      <option value="{{$loc->id}}">{{$loc->descricao}}</option>
									    	@endforeach
									    </select>
									    <label>Local</label>
							        </div>
							        <div class="input-field col s12">
							          <input name="val_meta" type="number" class="validate" required="required">
							          <label>Valor Meta</label>
									</div>
							        <div class="input-field col s1">
							          <label>Data Inicio</label>
							        </div>
							        <div class="input-field col s11">
							          <input name="dt_ini" type="datetime-local" class="validate" required="required">
							        </div>
							        <div class="input-field col s1">
							          <label>Data Fim</label>
							        </div>
							        <div class="input-field col s11">
							          <input name="dt_fim" type="datetime-local"" class="validate" required="required">
							        </div>
							    <button type="submit" class="waves-effect green btn right" >Adicionar</button>
						      	<a href="{{route('metas.inicio')}} " class="red white-text waves-effect right btn ">Cancelar</a>
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