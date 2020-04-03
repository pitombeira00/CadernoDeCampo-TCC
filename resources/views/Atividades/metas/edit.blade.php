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
								<a class="breadcrumb">Editar</a>
							</div>
						</div>
					</nav><br>		
				</div>
				<div class="panel-body">
					<div class="card">
						<div class="card-content">
							<form method="POST" action="{{route('metas.update')}} ">
								{{csrf_field()}}
								<div class="row">
									<input type='hidden' name='id' value = "{{$dados->id}}">
									<div class="input-field col s12">
							          	<select name="id_atividade" class="validate" required>
											<option value="" disabled selected>Tipo de Atividade</option>
										    @foreach ($atividade as $ativ)	
										      <option value="{{$ativ->id}}"
											  @if($dados->id_atividade == $ativ->id)
                                               selected
                                               @endif>{{$ativ->descricao}}</option>
									    	@endforeach
									    </select>
									    <label>Atividade</label>
							        </div>
							        <div class="input-field col s12">
							          	<select name="id_safra" class="validate" required>
										      <option value="" disabled selected>Safra</option>
										    @foreach ($safra as $saf)	
										      <option value="{{$saf->id}}"
											  @if($dados->id_safra == $saf->id)
                                               selected
                                               @endif>{{$saf->descricao}}</option>
									    	@endforeach
									    </select>
									    <label>Safra</label>
							        </div>
							        <div class="input-field col s12">
							          	<select name="id_local" class="validate" required>
										      <option value="" disabled selected>Escolha o Local</option>
										      @foreach ($local as $loc)	
											  <option value="{{$loc->id}}"
											  @if($dados->id_local == $loc->id)
                                               selected
                                               @endif
                                              >{{$loc->descricao}}</option>
									    	@endforeach
									    </select>
									    <label>Local</label>
							        </div>
							        <div class="input-field col s12">
							          <input name="val_meta" type="number" class="validate" required="required" value="{{ isset($dados->valor_meta) ? $dados->valor_meta : '' }}" > 
							          <label>Valor Meta</label>
									</div>
							        <div class="input-field col s1">
							          <label>Data Inicio</label>
							        </div>
							        <div class="input-field col s11">
							          <input name="dt_ini" type="datetime-local" class="validate" required="required" value="{{ isset($dados->Data_inicio) ? $dados->Data_inicio : '' }}">
							        </div>
							        <div class="input-field col s1">
							          <label>Data Fim</label>
							        </div>
							        <div class="input-field col s11">
							          <input name="dt_fim" type="datetime-local" class="validate" required="required" value="{{ isset($dados->Data_fim) ? $dados->Data_fim : '' }}">
							        </div>
							    <button type="submit" class="waves-effect green btn right" >Editar</button>
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