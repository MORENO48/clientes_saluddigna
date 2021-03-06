@extends('Layout')

@section('title', 'Crear Cliente')

@section('encabezado')
    {!! Html::style('public/css/bootstrap.min.css') !!}
    {!! Html::style('public/css/clientes_create.css') !!}
    {!! Html::style('public/css/tempusdominus-bootstrap-4.css') !!}
    {!! Html::style('public/css/dataTables.bootstrap4.min.css') !!}
@endsection    
@section('content')
    <div>
        <br>
        <h2>
            <i class="fa fa-user-plus"></i>
            Alta Cliente
        </h2>
        <hr>
    </div>
@include('flash::message')

<div class="card card-success">
    <div class="card-header">
        Nuevo Cliente
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('clientes.store') }}">
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input name="nombre" type="text" size="50" class="form-control" id="nombre" value="{{ old('nombre') }}" required placeholder="Nombre">
                {!! $errors->first('nombre','<span class=error>:message</span>') !!}
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="apellido_paterno">Apellido paterno</label>
                    <input name="apellido_paterno" type="text" size="50" class="form-control" id="apellido_paterno" value="{{ old('apellido_paterno') }}" required placeholder="Apellido materno">
                    {!! $errors->first('apellido_paterno','<span class=error>:message</span>') !!}
                </div>
                <div class="form-group col-md-6">
                    <label for="apellido_materno">Apellido materno</label>
                    <input name="apellido_materno" type="text" size="50" class="form-control" id="apellido_materno" value="{{ old('apellido_materno') }}" required placeholder="Apellido materno">
                    {!! $errors->first('apellido_materno','<span class=error>:message</span>') !!}
                </div>
            </div>
            
            <div class="form-group">
                <label for="fecha_nacimiento">Fecha de nacimiento</label>
                
                <div class="form-group">
                    <div class="input-group date" id="fecha_nacimiento" data-target-input="nearest">
                        <input name="fecha_nacimiento" value="{{ old('fecha_nacimiento') }}" type="text" class="form-control datetimepicker-input" data-target="#fecha_nacimiento"/>
                        <div class="input-group-append" data-target="#fecha_nacimiento" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                    {!! $errors->first('fecha_nacimiento','<span class=error>:message</span>') !!}
                </div>            
            </div>
            
            <div class="form-row">
                <div class="col-md-4 form-group">
                    <label for="calle">Calle</label>
                    <input name="calle" type="text" size="50" class="form-control" id="calle" value="{{ old('calle') }}" required placeholder="Calle">
                    {!! $errors->first('calle','<span class=error>:message</span>') !!}
                </div>
                <div class="col-md-4 form-group">
                    <label for="colonia">Colonia</label>
                    <input name="colonia" type="text" size="50" class="form-control" id="colonia" value="{{ old('colonia') }}" required placeholder="Colonia">
                    {!! $errors->first('colonia','<span class=error>:message</span>') !!}
                </div>
                <div class="col-md-4 form-group">
                    <label for="num_ext">Numero exterior</label>
                    <input name="num_ext" type="number" class="form-control" id="num_ext" value="{{ old('num_ext') }}" required placeholder="Numero exterior" min="0">
                    {!! $errors->first('num_ext','<span class=error>:message</span>') !!}
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-4 form-group">
                    <label for="codigo_postal">Código Postal</label>
                    <input name="codigo_postal" type="number" class="form-control" id="codigo_postal" value="{{ old('codigo_postal') }}" required placeholder="CP" min="0">
                    {!! $errors->first('codigo_postal','<span class=error>:message</span>') !!}
                </div>
                <div class="col-md-4 form-group">
                    <label for="ciudad">Ciudad</label>
                    <input name="ciudad" type="text" size="50" class="form-control" id="ciudad" value="{{ old('ciudad') }}" required placeholder="Ciudad">
                    {!! $errors->first('ciudad','<span class=error>:message</span>') !!}
                </div>
                <div class="col-md-4 form-group">
                    <label for="estado">Estado</label>
                    <input name="estado" type="text" size="50" class="form-control" id="estado" value="{{ old('estado') }}" required placeholder="Estado">
                    {!! $errors->first('estado','<span class=error>:message</span>') !!}
                </div>
            </div>
            <div class="form-group">
                <label for="estudio">Estudio a realizar</label>
                <select class="form-control" id="estudio" name="estudio" value="{{ old('estudio') }}"required>
                    <option value="">Seleccione</option>
                    @foreach ($estudios as $estudio)
                        <option value="{{ $estudio->id }}">{{ $estudio->nombre }}</option>
                    @endforeach
                </select>
                {!! $errors->first('estudio','<span class=error>:message</span>') !!}
            </div>

            <input type="submit" class="btn btn-primary" value="Guardar">
            <a href="{{route('clientes.index')}}" class="btn btn-danger">Cancelar</a>
        </form>    
    </div>
</div>
    
@endsection


@section('js')
    {!! Html::script('public/js/jquery-3.2.1.slim.min.js') !!}
    {!! Html::script('public/js/bootstrap.min.js') !!}
    {!! Html::script('public/js/moment-with-locales.min.js') !!}
    {!! Html::script('public/js/tempusdominus-bootstrap-4.js') !!}
    {!! Html::script('public/js/jquery.dataTables.min.js') !!}
    <script type="text/javascript">
        $(function () {
            $('#fecha_nacimiento').datetimepicker({
                format: 'DD/MM/YYYY'
            });
        });
    </script>
@endsection