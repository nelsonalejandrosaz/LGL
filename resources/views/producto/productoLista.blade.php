@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Productos
@endsection

@section('CSSx')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('/plugins/dataTables.bootstrap.css') }}">
@endsection

@section('contentheader_title')
  Productos
@endsection

@section('contentheader_description')

@endsection

@section('main-content')

@include('partials.modaleliminar')

@include('partials.alertamensajes')

<div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Lista de productos</h3>
          <a href="{{ route('productoNuevo') }}" class="btn btn-lg btn-primary pull-right"><span class="fa fa-plus"></span> Nuevo</a>
        </div><!-- /.box-header -->
        <div class="box-body table-responsive">
          <table id="tablaAlumnos" class="table table-hover">
            <thead>
              <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Unidad de medida</th>
                <th>Cantidad</th>
                <th>Valor unitario</th>
                <th>Acción</th>
              </tr>
            </thead>
            <tbody>
              @foreach($productos as $producto)
              <tr>
              <td>{{$producto->codigo}}</td>
              <td>{{$producto->nombre}}</td>
              <td>{{$producto->unidadMedida->nombre}}</td>
              <td>{{$producto->kardex->cantidadActual}}</td>
              <td>${{number_format($producto->kardex->valorUnitarioActual,2)}}</td>
              <td align="center">
                <a href="{{ route('productoEditar', ['id' => $producto->id]) }}" class="btn btn-warning"><span class="fa fa-edit"></span></a>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalEliminar" data-producto="{{ $producto->nombre }}" data-id="{{ $producto->id }}">
                  <span class="fa fa-trash"></span>
                </button>
              </td>
              </tr>
            @endforeach
            </tbody>
            <tfoot>
            </tfoot>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div>
  </div>

@endsection

@section('JSx')
<!-- DataTables -->
<script src="{{ asset('/plugins/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/plugins/dataTables.bootstrap.min.js') }}"></script>
<script>
      $(function () {
        $("#tablaAlumnos").DataTable(
          {
    language: {
        processing:     "Procesando...",
        search:         "Buscar:",
        lengthMenu:     "Mostrar _MENU_ registros",
        info:           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        infoEmpty:      "Mostrando registros del 0 al 0 de un total de 0 registros",
        infoFiltered:   "(filtrado de un total de _MAX_ registros)",
        infoPostFix:    "",
        loadingRecords: "Cargando...",
        zeroRecords:    "No se encontraron resultados",
        emptyTable:     "Ningún dato disponible en esta tabla",
        paginate: {
            first:      "Primero",
            previous:   "Anterior",
            next:       "Siguiente",
            last:       "Último"
        },
        aria: {
            sortAscending:  ": Activar para ordenar la columna de manera ascendente",
            sortDescending: ": Activar para ordenar la columna de manera descendente"
        }
    }
} 
          );
      });

      $('#modalEliminar').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var nombreProducto = button.data('producto') // Extract info from data-* attributes
        var idProducto = button.data('id')
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
        var modal = $(this)
        modal.find('.modal-body').text('Desea eliminar ' + nombreProducto)
        modal.find('#myform').attr("action", "/producto/" + idProducto)
      })
</script>
@endsection
