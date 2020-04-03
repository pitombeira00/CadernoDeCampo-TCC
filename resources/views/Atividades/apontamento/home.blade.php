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
							</div>
						</div>
					</nav><br>		
				</div>
				<div class="panel-body">
					<div class="card">
						<div class="card-content">
							<div class="row">
								<a name="Toast"></a>
							</div>
							<div class="row">
								<table class="responsive-table" >
									<thead>
										<tr>
											<th>Codigo</th>
											<th>Atividade</th>						
											<th>Safra</th>						
											<th>Local</th>						
											<th>Meta</th>						
											<th>Tipo Medição</th>						
											<th>Tipo Atividade</th>						
											<th>Valor Apontado</th>						
											<th>Data Inicio</th>						
											<th>Data Fim</th>						
											<th>Apontar</th>						
											<th>Editar</th>						
										</tr>
									</thead>
									<tbody>
										@foreach($dados as $dad)
										<tr>
											<td>{{$dad->id}} </td>
											<td>{{$dad->atividade}}</td>					
											<td>{{$dad->safra}}</td>					
											<td>{{$dad->local}}</td>					
											<td>{{ number_format($dad->valor_meta,0 , ',','.')}}</td>	
											<td>
												@IF($dad->medicao=='1')
													Área
												@ELSEIF($dad->medicao=='2')
													Linha
												@else
													Plantas
												@ENDIF
											</td>
											<td>
												@if($dad->tipo=='1')
													Mecânica
												@else
													Manual
												@endif
											</td>				
											<td>{{number_format($dad->realizado, 0, ',','.')}}</td>					
											<td>
											@if($dad->Data_ini_aponta <> null)
											{{substr($dad->Data_ini_aponta,8,2).'/'.substr($dad->Data_ini_aponta,5,2).'/'.substr($dad->Data_ini_aponta,0,4)}}
											@else
											-
											@endif
											</td>					
											<td>
											@if($dad->Data_fim_aponta <> null)
											{{substr($dad->Data_fim_aponta,8,2).'/'.substr($dad->Data_fim_aponta,5,2).'/'.substr($dad->Data_fim_aponta,0,4)}}
											@else
											-
											@endif
											</td>					
												@if ($dad->finalizado == NULL)
													<td><a href="{{route('apontamento.create',$dad->id)}}" class="modal-trigger btn-floating">
														<i class=" material-icons green white-text circle" >exit_to_app</i>
														</a>
													</td>
												@else
												<td><a disabled href="{{route('apontamento.create',$dad->id)}}" class="modal-trigger btn-floating">
														<i class=" material-icons grey white-text circle" >exit_to_app</i>
														</a>
													</td>
												@endif
											</td>					
												@if ($dad->finalizado == NULL)
													<td><a disabled href="{{route('apontamento.reapontar',$dad->id)}}" class="modal-trigger btn-floating">
														<i class=" material-icons grey white-text circle" >build</i>
														</a>
													</td>
												@else
												<td><a href="{{route('apontamento.reapontar',$dad->id)}}" class="modal-trigger btn-floating">
														<i class=" material-icons red white-text circle" >build</i>
														</a>
													</td>
												@endif
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>        
	</div>
</div>
@endsection