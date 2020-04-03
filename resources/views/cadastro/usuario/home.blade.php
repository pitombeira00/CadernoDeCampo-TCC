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
								<a class="breadcrumb">Usuarios</a>
							</div>
						</div>
					</nav><br>		
				</div>
				<div class="panel-body">
					<div class="card">
						<div class="card-content">
							<div class="row">
								<a href="{{route('usuario.create')}}" class="modal-trigger btn-floating  COL S2">
									<i class=" material-icons blue white-text circle" >add</i>
								</a>
								<a name="Toast"></a>
							</div>
							<div class="row">
								<table>
									<thead>
										<tr>
											<th>Codigo</th>
											<th>Nome</th>						
											<th>E-mail</th>						
											<th>Ativo?</th>						
											<th>Editar</th>						
											<th>Gerar Senha</th>						
										</tr>
									</thead>
									<tbody>
										@foreach($dados as $dad)
										<tr>
											<td>{{$dad->id}} </td>
											<td>{{$dad->name}}</td>					
											<td>{{$dad->email}}</td>					
											<td>@if ($dad->ativo == 0)
													<a href="{{route('usuario.ativa',$dad->id)}}" class="modal-trigger btn-floating  COL S2">
													<i class=" material-icons red" >thumb_down</i>
													</a>
												@else
													<a href="{{route('usuario.ativa',$dad->id)}}" class="modal-trigger btn-floating  COL S2 red-text">
													<i class=" material-icons green" >thumb_up</i>
													</a>
												@endif
											</td>
											<td>
												<a href="{{route('usuario.edit',$dad->id)}}" class="modal-trigger btn-floating  COL S2">
													<i class=" material-icons blue white-text circle" >edit</i>
												</a>

											</td>
											<td>
												<a href="{{route('usuario.gerasenha',$dad->id)}}" class="modal-trigger btn-floating  COL S2">
													<i class=" material-icons grey white-text circle" >link</i>
												</a>

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