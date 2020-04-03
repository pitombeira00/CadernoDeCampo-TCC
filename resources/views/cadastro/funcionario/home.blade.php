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
								<a class="breadcrumb">Funcionario</a>
							</div>
						</div>
					</nav><br>		
				</div>
				<div class="panel-body">
					<div class="card">
						<div class="card-content">
							<a href="{{route('funcionario.create')}}" class="modal-trigger btn-floating">
								<i class=" material-icons blue white-text circle" >add</i>
							</a>
							<a name="Toast"></a>
							<div class="row">
								<table>
									<thead>
										<tr>
											<th>Codigo</th>
											<th>Nome</th>						
											<th>Cargo</th>						
											<th>Trabalha?</th>						
											<th>Demitir/Readmitir</th>						
											<th>Editar ?</th>						
										</tr>
									</thead>
									<tbody>
										@foreach($dados as $reg)
										@if($reg->demitido == '1')
											<tr class="grey lighten-2">
										@else
											<tr>
										@endif
											<td>{{$reg->id}} </td>
											<td>{{$reg->nome}}</td>					
											<td>{{$reg->cargo}}</td>					
											<td>@if($reg->demitido == '1')
													Não
												@else
													Sim
												@endif
											</td>
											<td>@if($reg->demitido == '1')
													<a  href="javascript: if(confirm('Funcionario Demitido\n Readmitir ?')){ window.location.href = '{{ route('funcionario.readmitir',$reg->id) }}' }" class="btn-floating">
													<i class=" material-icons blue white-text circle" href="#modal1">replay</i></a>
										
												</a>
												@else
													<a href="javascript: if(confirm('Deseja Demitidor\n Esse Funcionário ?')){ window.location.href = '{{route('funcionario.demitir', $reg->id)}}' } " class="btn-floating">
													<i class=" material-icons red white-text circle" href="#modal1">close</i>
												</a>
												@endif
											</td>	
											<td>@if($reg->demitido == '1')
													<a disabled href="{{ route('funcionario.edit',$reg->id) }}" class="btn-floating">
													<i class=" material-icons grey white-text circle" href="#modal1">edit</i>
												</a>
												@else
													<a href="{{ route('funcionario.edit',$reg->id) }}" class="btn-floating">
													<i class=" material-icons green white-text circle" href="#modal1">edit</i>
												</a>
												@endif
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