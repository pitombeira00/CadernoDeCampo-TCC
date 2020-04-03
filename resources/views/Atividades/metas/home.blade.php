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
							</div>
						</div>
					</nav><br>		
				</div>
				<div class="panel-body">
					<div class="card">
						<div class="card-content">
							<div class="row">
								<a href="{{route('metas.create')}}" class="modal-trigger btn-floating  COL S2">
									<i class=" material-icons blue white-text circle" >add</i>
								</a>
								<a href="{{route('metas.safra.atual')}}" class="waves-effect waves-light btn blue right">
									Safra Atual<i class=" material-icons blue white-text circle" >filter_list</i>
								</a>
								<a name="Toast"></a>
							</div>
							<div class="row">
								<table class="responsive-table">
									<thead>
										<tr>
											<th>Codigo</th>
											<th>Atividade</th>						
											<th>Safra</th>						
											<th>Local</th>						
											<th>Quantidade</th>						
											<th>Data a Realizar</th>						
											<th>Apontado?</th>						
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
											<td>{{$dad->valor_meta}}</td>					
											<td>{{substr($dad->Data_inicio,8,2).'/'.substr($dad->Data_inicio,5,2).'/'.substr($dad->Data_inicio,0,4)}}</td>					
												@if ($dad->finalizado == NULL)
													<td>Não</td>
												@else
													<td>Sim</td>
												@endif

												@if ($dad->finalizado == NULL)
													<td><a href="{{route('metas.editar',$dad->id)}}" class="modal-trigger btn-floating">
														<i class=" material-icons green white-text circle" >build</i>
														</a>
													</td>
												@else
												<td><a disabled class="modal-trigger btn-floating">
														<i class=" material-icons grey white-text circle" >build</i>
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