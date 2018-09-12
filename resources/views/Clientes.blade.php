@extends('Layout')

@section('title', 'Crear Cliente')

@section('encabezado') 
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    {!! Html::style('public/css/clientes.css') !!}   
@endsection

@section('content')
    <div>
    	<br>
        <h2>
        	<i class="fa fa-users"></i>
        	Listado de Clientes
        </h2>
        <hr>
    </div>

@include('flash::message')
@include('modalconfirm')

<div class="card card-success">
	<div class="card-header">
		Listado de clientes
		<div class="pull-right">
			<a href="{{route('clientes.create')}}" class="btn btn-success">Nuevo</a>
		</div>
	</div>
	<div class="card-body">
		<div>
			<table id="clientes" class="table table-bordered" data-toggle="dataTable" data-form="deleteForm">
				<thead>
					<th>NOMBRE COMPLETO</th>
					<th>FECHA NACIMIENTO</th>
					<th>DIRECCION COMPLETA</th>
					<th>ESTUDIO</th>
					<th>OPCIONES</th>
				</thead>
				<tbody>
				@forelse ($clientes as $cliente)
				    <tr>
					    <td>{{ $cliente->nombre }} {{ $cliente->appaterno }} {{ $cliente->apmaterno }}</td>
					    <td>{{ $cliente->fechanac }}</td>
					    <td>{{ $cliente->calle }} {{ $cliente->numext }}, {{ $cliente->colonia }} {{ $cliente->ciudad }} {{ $cliente->estado }}</td>
				    	<td>{{ $cliente->estudio->nombre }}</td>
				    	<td>
				    		<div class="form-row">
				    			<div>
				    				<a href="{{route('clientes.edit', ['id' => $cliente->id])}}" class="btn btn-xs btn-primary">Editar</a>		
				    			</div>
				    			<div>
						    		{!! Form::model($cliente, ['method' => 'delete', 'route' => ['clientes.destroy', $cliente->id], 'class' =>'form-inline form-delete']) !!}
				                    {!! Form::hidden('id', $cliente->id) !!}
				                    {!! Form::submit(trans('Eliminar'), ['class' => 'btn btn-xs btn-danger delete', 'name' => 'delete_modal']) !!}
				                    {!! Form::close() !!}		
				    			</div>
		                    </div>
				    	</td>
				    </tr>
				@empty
				    <td colspan="12"><center>No hay clientes registrados</center></td>
				@endforelse
				</tbody>
			</table>
		</div>


	</div>
</div>

@endsection

@section('js')
	<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    {!! Html::script('public/js/bootstrap.min.js') !!}
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
	<script type="text/javascript">
        $(document).ready(function() {
            $('#clientes').DataTable({
            	"language": {
					"url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
				}
            });    
        });

        $('table[data-form="deleteForm"]').on('click', '.form-delete', function(e){
		    e.preventDefault();
		    var $form=$(this);
		    $('#confirm').modal({ backdrop: 'static', keyboard: false })
		        .on('click', '#delete-btn', function(){
		            $form.submit();
		        });
		});
    </script>

@endsection