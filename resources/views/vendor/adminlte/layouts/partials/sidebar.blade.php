<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
{{--         <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form> --}}
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">{{ trans('message.encabezadoMenu') }}</li>
            <!-- Optionally, you can add icons to the links -->
            {{-- Inicio --}}
            <li><a href="{{ url('home') }}"><i class='fa fa-home'></i> <span>{{ trans('message.inicio') }}</span></a></li>
            {{-- Inventario general --}}
            <li><a href="{{ route('inventarioGeneral') }}"><i class='fa fa-book'></i> <span>{{ trans('message.inventarioGeneral') }}</span></a></li>
            {{-- Productos --}}
            <li class="treeview">
                <a href="#"><i class='fa fa-industry'></i> <span>{{ trans('message.producto') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('productoLista') }}">{{ trans('message.productoLista') }}</a></li>
                    <li><a href="{{ route('productoNuevo') }}">{{ trans('message.productoNuevo') }}</a></li>
                </ul>
            </li>
            {{-- Proveedores --}}
            <li class="treeview">
                <a href="#"><i class='fa fa-link'></i> <span>{{ trans('message.proveerdor') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('proveedorLista') }}">{{ trans('message.proveerdorLista') }}</a></li>
                    <li><a href="{{ route('proveedorNuevo') }}">{{ trans('message.proveerdorNuevo') }}</a></li>
                </ul>
            </li>
            {{-- Categorias --}}
            <li class="treeview">
                <a href="#"><i class='fa fa-tags'></i> <span>{{ trans('message.categoria') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#">{{ trans('message.categoriaLista') }}</a></li>
                    <li><a href="#">{{ trans('message.categoriaNueva') }}</a></li>
                </ul>
            </li>
            {{-- Salidas --}}
            <li class="treeview">
                <a href="#"><i class='fa fa-arrow-up'></i> <span>{{ trans('message.salidaProducto') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#">{{ trans('message.salidaIndividual') }}</a></li>
                    <li><a href="#">{{ trans('message.reporte1') }}</a></li>
                </ul>
            </li>
            {{-- Entradas --}}
            <li class="treeview">
                <a href="#"><i class='fa fa-arrow-down'></i> <span>{{ trans('message.entradaProducto') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href=" {{ route('entradaIndividual') }} ">{{ trans('message.entradaIndividual') }}</a></li>
                    <li><a href="#">{{ trans('message.reporte1') }}</a></li>
                </ul>
            </li>
            {{-- Reportes --}}
            <li class="treeview">
                <a href="#"><i class='fa fa-bar-chart'></i> <span>{{ trans('message.reporte') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="#">{{ trans('message.reporte1') }}</a></li>
                    <li><a href="#">{{ trans('message.reporte1') }}</a></li>
                </ul>
            </li>
            {{-- Usuarios --}}
            <li class="treeview">
                <a href="#"><i class='fa fa-users'></i> <span>{{ trans('message.usuario') }}</span> <i class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('usuarioLista') }}">{{ trans('message.usuarioLista') }}</a></li>
                    <li><a href="{{ route('usuarioNuevo') }}">{{ trans('message.usuarioNuevo') }}</a></li>
                </ul>
            </li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>