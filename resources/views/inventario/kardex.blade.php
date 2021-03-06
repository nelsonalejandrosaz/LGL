@extends('adminlte::layouts.app')

@section('htmlheader_title')
	Kardex producto
@endsection

@section('CSSx')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('/plugins/dataTables.bootstrap.css') }}">
  <style type="text/css">
    .entradaCSS {
      background-color: #F0F4C3;
    }
    .salidaCSS {
      background-color: #FFCDD2;
    }
    .existenciaCSS {
      background-color: #BBDEFB;
    }
    thead {
      background-color: #607D8B;
      color: white;
    }
  </style>
@endsection

@section('contentheader_title')
  Kardex producto
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
          <h3 class="box-title">Kardex de {{$kardex->producto->nombre}}</h3>
          <a href="{{ route('inventarioGeneral') }}" class="btn btn-lg btn-default pull-right">Regresar</a>
        </div><!-- /.box-header -->
        <div class="box-body table-responsive">
          <table id="tablaKardex" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th style="width: 10%" rowspan="2">Fecha</th>
                <th style="width: 15%" rowspan="2">Detalle</th>
                <th style="width: 25%" colspan="3">Entradas</th>
                <th style="width: 25%" colspan="3">Salidas</th>
                <th style="width: 25%" colspan="3">Existencias</th>
              </tr>
              <tr>
                <th>Cantidad</th>
                <th>V. Unitario</th>
                <th>V. Total</th>
                <th>Cantidad</th>
                <th>V. Unitario</th>
                <th>V. Total</th>
                <th>Cantidad</th>
                <th>V. Unitario</th>
                <th>V. Total</th>
              </tr>
            </thead>
            <tbody>
              @foreach($movimientos as $movimiento)
              <tr>
                <td>{{$movimiento->fechaIngreso}}</td>
                @if( $movimiento->entrada != null )
                  <td><a href="{{ route('facturaVer',['id' => $movimiento->entrada->factura->id]) }}">{{$movimiento->detalle}}</a></td>
                @else
                  <td><a href="{{ route('facturaVer',['id' => $movimiento->salida->factura->id]) }}">{{$movimiento->detalle}}</a></td>
                @endif
                @if($movimiento->entrada != null)
                  <td class="entradaCSS">{{$movimiento->entrada->cantidad}}</td>
                  <td class="entradaCSS">${{ number_format($movimiento->entrada->valorUnitario,2) }}</td>
                  <td class="entradaCSS">${{ number_format($movimiento->entrada->valorTotal,2) }}</td>
                  <td class="salidaCSS"> -- </td>
                  <td class="salidaCSS"> -- </td>
                  <td class="salidaCSS"> -- </td>
                @elseif($movimiento->salida != null)
                  <td class="entradaCSS"> -- </td>
                  <td class="entradaCSS"> -- </td>
                  <td class="entradaCSS"> -- </td>
                  <td class="salidaCSS">{{$movimiento->salida->cantidad}}</td>
                  <td class="salidaCSS">${{ number_format($movimiento->salida->valorUnitario,2) }}</td>
                  <td class="salidaCSS">${{ number_format($movimiento->salida->valorTotal,2) }}</td>
                @else
                  <td> -- </td>
                  <td> -- </td>
                  <td> -- </td>
                  <td> -- </td>
                  <td> -- </td>
                  <td> -- </td>
                @endif
                <td class="existenciaCSS">{{$movimiento->cantidadExistencia}}</td>
                <td class="existenciaCSS">${{ number_format($movimiento->valorUnitarioExistencia,2) }}</td>
                <td class="existenciaCSS">${{ number_format($movimiento->valorTotalExistencia,2) }}</td>
  {{--               <td align="center">
                  <a href="{{ route('productoEditar', ['id' => $movimiento->id]) }}" class="btn btn-primary"><span class="fa fa-th"></span></a>
                </td> --}}
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
