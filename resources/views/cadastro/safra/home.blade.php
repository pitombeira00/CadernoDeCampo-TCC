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
								<a class="breadcrumb">Cadastro</a>
								<a class="breadcrumb">Safra</a>
							</div>
						</div>
					</nav><br>		
				</div>
				<div class="panel-body">
					<div class="card">
						<div class="card-content">
							<a href="{{route('safra.create')}}" class="modal-trigger btn-floating">
								<i class=" material-icons blue white-text circle" >add</i>
							</a>
							<a name="Toast"></a>
							<div class="row">
								<table>
									<thead>
										<tr>
											<th>Codigo</th>
											<th>Período</th>						
											<th>Encerrada</th>						
											<th>Finalizar?</th>						
										</tr>
									</thead>
									<tbody>
										@foreach($dados as $reg)
										<tr>
											<td>{{$reg->id}} </td>
											<td>{{$reg->descricao}}</td>					
											<td>@if($reg->terminou == '1')
												Sim
												@else
												Não
												@endif
											</td>
											<td>@if($reg->terminou == '1')
												<a href="javascript: if(confirm('Safra Finalizada\n Reabrir ?')){ window.location.href = '{{ route('safra.reabrir',$reg->id) }}' }" class="btn-floating" >
													<i  class=" material-icons grey white-text circle" href="#modal1">close</i>
												</a>
												@else
												<a href="{{route('safra.finaliza',$reg->id)}} " class="btn-floating">
													<i class=" material-icons red white-text circle" href="#modal1">close</i>
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