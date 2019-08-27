@extends('layouts.main')

@section('content')

  <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Empleados</h3>
        </div>
        <div class="pull-right" >
          <a  href="#" class="btn btn-success btn_nuevo " data-toggle="tooltip" data-placement="bottom" title="Agregar nuevo usuario" ><i class="fa fa-plus"></i> Nuevo</a>
        </div>
         <div class="title_right"></div>
      </div>
      <div class="clearfix"></div>
        
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_content animated fadeIn">
          {{-- <p class="text-muted font-13 m-b-30"></p> --}}
          <div class="table-responsive" {{-- style="max-height: 450px; width: 100%; margin: 0; overflow-y: auto; --}}">
            <table class="table table-striped jambo_table bulk_action" id="datatable1">
              <thead>
                <tr>
                 {{-- <th>ID</th> --}}
                 
                </tr>
              </thead>
              {{-- <tfoot>
                <tr>
                 <th>ID</th>
                 <th>USUARIO</th>
                 <th>E-MAIL</th>
                 <th>NOMBRE</th>
                 <th>PATERNO</th>
                 <th>UBICACION</th>
                 <th>ROL</th>
                 <th>OPCIONES</th>
                </tr>
              </tfoot> --}}
              <tbody></tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="modal fade modal_datos" id="Modal_nuevo" role="dialog" >
        <div class="modal-dialog modal-lg">
          <div class="modal-content contenido">
          </div>
        </div>
      </div>

    </div>
  </div>       


@endsection

@section('scripts')


@endsection