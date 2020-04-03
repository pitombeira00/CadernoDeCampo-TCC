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
							</div>
						</div>
					</nav><br>		
				</div>
				<div class="panel-body">
					<div class="card">
						<div class="card-content">
							<a href="{{route('atividade.create')}}" class="modal-trigger btn-floating">
								<i class=" material-icons blue white-text circle" >add</i>
							</a>
							<a name="Toast"></a>
							<div class="row">
								<table>
									<thead>
										<tr>
											<th>Codigo</th>
											<th>Atividade</th>						
											<th>Tipo Medição</th>						
											<th>Tipo Atividade</th>						
											<th>Editar?</th>						
											<th>Apagar?</th>						
										</tr>
									</thead>
									<tbody>
										@foreach($dados as $reg)
										<tr>
											<td>{{$reg->id}} </td>
											<td>{{$reg->descricao}}</td>					
											<td>
												@IF($reg->medicao=='1')
													Área
												@ELSEIF($reg->medicao=='2')
													Linha
												@else
													Plantas
												@ENDIF
											</td>
											<td>
												@if($reg->tipo=='1')
													Mecânica
												@else
													Manual
												@endif
											</td>
											<td>
												<a href="{{ route('atividade.edit',$reg->id) }}" class="btn-floating">
													<i class=" material-icons green white-text circle" href="#modal1">edit</i>
											</td>
											<td>
												<a href="{{route('atividade.excluir', $reg->id)}} " class="btn-floating">
													<i class=" material-icons red white-text circle" href="#modal1">close</i>
											</td>
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