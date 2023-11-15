<?php
include_once("conexion.php");
include_once("Consultas.php");

require('./models/venta.php');
require('./models/articulo.php');
require('./models/categoria.php');
$nw = new Venta();
$ar = new Articulo();
$c = new Categoria();
$categorias = $c->index();
$ventas = $nw->ventas(1);
$ultimaVenta = $nw->ultimaVenta(1);
$articulos = $ar->index();



?>
<!DOCTYPE html>
<html lang="es">
<!-- librerías -->

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="./img/logo.png">
  <link rel="icon" type="image/png" href="./img/logo.png">
  <title>
    Tienda del soldado GSECO
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="./assets/css/argon-dashboard.css?v=2.0.2" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

  <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">

  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

  <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
  
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
  


</head>

<body class="g-sidenav-show" style="background-color: #009ad5;">
  <div class="h-100 bg-primary position-absolute w-100"></div>
  <!-- sidebar -->
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-black opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0 mr-4">
        <img src="./img/logo.png" class="navbar-brand-img h-100 mr-5" alt="main_logo">
        <span class="ms-1 font-weight-bold">GSECO</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">ARTÍCULOS</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="stats.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-chart-bar-32 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1 font-weight-bolder">ESTADÍSTICAS</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="sales.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-cart text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1 font-weight-bolder">VENTAS</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="bills.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-copy-04 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1 font-weight-bolder">FACTURA DE VENTA</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">PROVEEDORES</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="purchases.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-chart-bar-32 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1 font-weight-bolder">COMPRAS</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="purchases-bills.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-chart-bar-32 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1 font-weight-bolder">FACTURA DE COMPRA</span>
          </a>
        </li>
        <!-- <?php
              if ($rol == 1) {
              ?>
                      <li class="nav-item mt-3">
                          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Administración</h6>
                      </li>
  
                      <li class="nav-item">
                          <a class="nav-link" href="user-administration.php">
                              <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                  <i class="ni ni-single-02 text-primary text-sm opacity-10"></i>
                              </div>
                              <span class="nav-link-text ms-1 text-uppercase font-weight-bolder">Usuarios</span>
                          </a>
                      </li>
                  <?php
                }
                  ?> -->
      </ul>
    </div>
  </aside>
  <main class="main-content position-relative border-radius-lg">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">

          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <a class="nav-link text-white font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none text-capitalize">
                  <?php echo $nombreUsuario; ?>
                </span>
                <div class="wrap">
              </a>
            </li>
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a class="nav-link text-white p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                </div>
              </a>
            </li>
            <li class="nav-item px-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0">
                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container-fluid py-4">
      <!-- Cards -->
      <div class="row">
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-md mb-0 text-uppercase font-weight-bold">Ventas totales</p>
                    <h5 class="font-weight-bolder">
                      $
                      <?php
                      $ventasTotales = ($ultimaVenta->total_ultimo_mes !== null) ? number_format($ultimaVenta->total_ultimo_mes, 0, ',', '.') : '0';
                      echo $ventasTotales;
                      ?>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-md mb-0 text-uppercase font-weight-bold">Ventas diarias</p>
                    <h5 class="font-weight-bolder">
                      $
                      <?php
                      $totalVenta = ($ventas->total_diario !== null) ? number_format($ultimaVenta->total_diario, 0, ',', '.') : '0';
                      echo $totalVenta;
                      ?>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-md mb-0 text-uppercase font-weight-bold">Última venta</p>
                    <h5 class="font-weight-bolder">
                      $
                      <?php
                      $ultimaVenta = ($ultimaVenta->ultima_venta !== null) ? number_format($ultimaVenta->ultima_venta, 0, ',', '.') : '0';
                      echo $ultimaVenta;
                      ?>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-success shadow-danger text-center rounded-circle">
                    <i class="ni ni-credit-card text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- main content -->

      <div class="row mt-4">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header pb-4">
              <?php
              $productosAgotandose = [];

              foreach ($articulos as $art) {
                $total = $art->stock_deseado;
                $actual = $art->stock;
                $porcentaje = ($actual / $total) * 100;

                if ($porcentaje <= 40) {
                  $productosAgotandose[] = $art->nombre;
                }
              }
              if (!empty($productosAgotandose)) {
              ?>
                <div class="alert alert-warning lowercase" role="alert" style="color: white">
                  <strong>¡Aviso!</strong> Se están agotando los siguientes productos:
                  <strong>
                    <?php echo implode(', ', $productosAgotandose); ?>
                  </strong>
                </div>
              <?php } ?>
              <div class="row pb-2 p-3">
                <div class="col-6 d-flex align-items-center text-uppercase">
                  <h4 class="font-weight-bolder">Productos</h4>
                </div>
                <div class="col-md-6 text-end">
                  <div class="d-flex justify-content-end">
                    <div class="text-end text-uppercase" id="botonera">

                    </div>
                    <div class="me-xl-2" id="register1">

                    </div>
                    <div>
                      <a class="btn mb-0 text-uppercase" data-bs-toggle="modal" style="background: #5e72e4; color:white" data-bs-target="#modal-form-product">
                        <i class="fas fa-cart-plus"></i>&nbsp;&nbsp;Añadir producto
                      </a>
                    </div>
                  </div>
                  <div class="modal fade" id="modal-form-product" tabindex="1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title text-uppercase font-weight-bold">Añadir producto</h4>
                        </div>
                        <div class="modal-body p-0">
                          <div class="card card-plain">
                            <div class="card-body text-start">
                              <form role="form text-left">
                                <div class="form-group">
                                  <div class="row">
                                    <div class="col-xl-9">
                                      <label for="" class="col-form-label text-uppercase">Nombre
                                        del producto</label>
                                      <input id="product_name" type="text" placeholder="Ingresa el nombre del producto" class="form-control" />
                                    </div>
                                    <div class="col-xl-3">
                                      <label for="" class="col-form-label text-uppercase">Cantidad</label>
                                      <input class="form-control" type="number" id="product_stock" placeholder="Ingresa la cantidad" oninput="validarCantidad(this)">
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-xl-4">
                                      <label for="" class="col-form-label text-uppercase">Valor unitario</label>
                                      <input class="form-control" type="number" id="product_price" placeholder="Ingresa el valor del producto" oninput="validarCantidad(this)">
                                    </div>
                                    <div class="col-xl-4">
                                      <label for="" class="col-form-label text-uppercase">Stock máximo</label>
                                      <input class="form-control" type="number" id="stock_maximo" placeholder="Ingresa el stock máximo del producto" oninput="validarCantidad(this)">
                                    </div>
                                    <div class="col-xl-4">
                                      <label for="" class="col-form-label text-uppercase">Categoría</label>
                                      <select class="form-control" name="choices-button" id="categories_select" placeholder="Departure">
                                        <?php foreach ($categorias as $c) { ?>
                                          <option value="<?php echo $c->id_categoria ?>" selected="true">
                                            <?php echo $c->nombre ?>
                                          </option>
                                        <?php } ?>
                                      </select>
                                    </div>
                                  </div>
                                  <button type="button" id="confirmButton" onclick="saveProduct()" class="btn btn-round btn-lg w-100 mt-4 mb-0 text-uppercase" style="background: #5e72e4; color:white">guardar
                                  </button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="p-1 col-md-12 text-end text-uppercase" id="filter1"></div>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center mb-0" id="data_table">
                <thead>
                  <tr>
                    <th align="center" class="text-center text-uppercase text-black text-sm font-weight-bolder">
                      Nombre del producto</th>
                    <th align="center" class="text-center text-uppercase text-black text-sm font-weight-bolder">
                      Precio de venta</th>
                    <th align="center" class="text-center text-uppercase text-black text-sm font-weight-bolder">
                      Unidades</th>
                    <th align="center" class="text-center text-uppercase text-black text-sm font-weight-bolder">
                      Estado</th>
                    <th align="center" class="text-center text-uppercase text-black text-sm font-weight-bolder">
                      Categoría</th>
                    <th align="center" class="text-center text-uppercase text-black text-sm font-weight-bolder">
                      Stock máximo</th>
                    <th align="center" class="text-center text-uppercase text-black text-sm font-weight-bolder">
                      Inventario</th>
                    <th align="center" class="text-center text-uppercase text-black text-xs font-weight-bolder">
                    </th>
                    <th align="center" class="text-center text-uppercase text-black text-xs font-weight-bolder">
                    </th>
                  </tr>
                </thead>
                <tbody>

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!--secondary content -->
      <div class="row mt-4">
        <div class="col-xl-6 mb-4">
          <div class="card">
            <div class="card-header pb-4">
              <div class="row pb-2 p-3">
                <div class="col-4 d-flex align-items-center text-uppercase">
                  <h4 class="font-weight-bolder">Categorías</h4>
                </div>
                <div class="col-md-8 text-end">
                  <div class="d-flex justify-content-end">
                    <div class="me-md-2" id="botonera2">

                    </div>
                    <div>
                      <a class="btn mb-0 text-uppercase" style="background: #5e72e4; color:white" data-bs-toggle="modal" data-bs-target="#modal-form-categories"><i class="fas fa-plus"></i>&nbsp;&nbsp;Añadir
                        categoría</a>
                    </div>
                  </div>
                  <div class="modal fade" id="modal-form-categories" tabindex="1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                      <div class="modal-content">
                        <div class="modal-body p-0">
                          <div class="card card-plain">
                            <div class="card-body text-start">
                              <form role="form text-center">
                                <div class="row">
                                  <div class="col-xl-12">
                                    <label for="" class="col-form-label text-uppercase">Nombre de la categoria</label>
                                    <input id="categoria" type="text" placeholder="Ingresa el nombre de la categoría" class="form-control" />
                                  </div>
                                  <div class="text-center">
                                    <button type="button" onClick="guardarCategoria()" class="btn btn-round btn-lg w-100 mt-4 mb-0 text-uppercase" style="background: #5e72e4; color:white">Añadir
                                      categoría</button>
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="p-1 col-md-6 pb-0 text-uppercase" id="filter2">

                </div>
                <div class="p-1 col-md-6 text-end text-uppercase" id="register2">

                </div>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center mb-0" id="categories_table">
                <thead>
                  <tr>
                    <th align="center" class="text-center text-uppercase text-black text-sm font-weight-bolder">
                      Nombre</th>
                    <th align="center" class="text-center text-uppercase text-black text-sm font-weight-bolder">
                      Estado</th>
                    <th align="center" class="text-center text-uppercase text-black text-xs font-weight-bolder">
                    </th>
                    <th align="center" class="text-center text-uppercase text-black text-xs font-weight-bolder">
                    </th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-xl-6">
          <div class="card ">
            <div class="card-header pb-4">
              <div class="row pb-2 p-3">
                <div class="col-12 d-flex align-items-center justify-content-between">
                  <h4 class="text-uppercase font-weight-bolder">Ventas por empleado</h4>

                  <input type="text" name="daterange" value="11/05/2023 - 11/05/2023" class="custom-daterangepicker"/>


                </div>
              </div>
            </div>
            <div class="table-responsive">
              <table id="ventas_rango" class="table align-items-center">
                <thead>
                  <tr>
                    <th align="center" class="text-center text-uppercase text-black text-sm font-weight-bolder">
                      Usuario
                    </th>
                    <th align="center" class="text-center text-uppercase text-black text-sm font-weight-bolder">
                      Total
                    </th>

                  </tr>
                </thead>
                <tbody>

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
  </main>
  <!-- config interface -->
  <div class="fixed-plugin">
    <div class="card shadow-lg">
      <div class="card-header pb-0 pt-3 ">
        <div class="float-start">
          <h5 class="mt-3 mb-0">Configuración</h5>
        </div>
        <div class="float-end mt-4">
          <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
            <i class="fa fa-close"></i>
          </button>
        </div>
        <!-- End Toggle Button -->
      </div>
      <div class="card-body pt-sm-3 pt-0 overflow-auto">
        <!-- Sidenav Type -->
        <div class="mt-2 mb-5 d-flex">
          <h6 class="mb-0">Tema claro / oscuro</h6>
          <div class="form-check form-switch ps-0 ms-auto my-auto">
            <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version" onclick="darkMode(this)">
          </div>
        </div>
        <a class="btn btn-danger w-100" href="Cerrar.php">Cerrar sesión</a>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function() {

      var categories = $('#categories_table').DataTable({
        dom: 'Blfrtip',
        "order": [
          [1, "asc"]
        ],
        buttons: [{
            extend: 'excel',
            text: '<i class="fas fa-file-excel"></i>', // Icono para Excel (puedes cambiar la clase del icono)
            titleAttr: 'Exportar a Excel' // Texto de información al pasar el ratón sobre el icono
          },
          {
            extend: 'print',
            text: '<i class="fas fa-print"></i>', // Icono para Print (puedes cambiar la clase del icono)
            titleAttr: 'Imprimir' // Texto de información al pasar el ratón sobre el icono
          },
          {
            extend: 'pdf',
            text: '<i class="fas fa-file-pdf"></i>', // Icono para Print (puedes cambiar la clase del icono)
            titleAttr: 'Exportar a PDF', // Texto de información al pasar el ratón sobre el icono
            exportOptions: {
                modifier: {
                    page: 'current'
                }
            }
          },
        ],
        
        lengthMenu: [5, 10, 25, 50], // Configuramos las opciones de cantidad por página
        pageLength: 3,
        "language": {
          "sProcessing": "",
          "sLengthMenu": "Mostrar _MENU_ registros",
          "sZeroRecords": "No se encontraron resultados",
          "sEmptyTable": "Ningún dato disponible en esta tabla",
          "sInfo": "_TOTAL_ registros",
          "sInfoEmpty": "Mostrando 0 registros",
          "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
          "sInfoPostFix": "",
          "sSearch": "",
          "searchPlaceholder": "Buscar...",
          "sUrl": "",
          "sInfoThousands": ",",
          "sLoadingRecords": "<img style='display: block;width:100px;margin:0 auto;' src='assets/img/loading.gif' />",
          "oPaginate": {
            "sFirst": "Primero",
            "sLast": "Último",
            "sNext": "Siguiente",
            "sPrevious": "Anterior"
          },
          "oAria": {
            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
          }
        }
      });
      $('#botonera2').append(categories.buttons().container());
      $('#filter2').append($('#categories_table').closest('.dataTables_wrapper').find('.dataTables_filter'));
      $('#register2').append($('#categories_table').closest('.dataTables_wrapper').find('.dataTables_length'));
      var products = $('#data_table').DataTable({
        dom: 'Blfrtip',
        "order": [
          [1, "asc"]
        ],
        buttons: [{
            extend: 'excel',
            text: '<i class="fas fa-file-excel"></i>', // Icono para Excel (puedes cambiar la clase del icono)
            titleAttr: 'Exportar a Excel' // Texto de información al pasar el ratón sobre el icono
          },
          {
            extend: 'print',
            text: '<i class="fas fa-print"></i>', // Icono para Print (puedes cambiar la clase del icono)
            titleAttr: 'Imprimir' // Texto de información al pasar el ratón sobre el icono
          },
          {
            extend: 'pdf',
            text: '<i class="fas fa-file-pdf"></i>', // Icono para Print (puedes cambiar la clase del icono)
            titleAttr: 'Exportar a PDF' // Texto de información al pasar el ratón sobre el icono
          },
        ],
        lengthMenu: [5, 10, 25, 50], // Configuramos las opciones de cantidad por página
        pageLength: 5,
        "language": {
          "sProcessing": "",
          "sLengthMenu": "Mostrar _MENU_ registros",
          "sZeroRecords": "No se encontraron resultados",
          "sEmptyTable": "Ningún dato disponible en esta tabla",
          "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
          "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
          "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
          "sInfoPostFix": "",
          "sSearch": "",
          "searchPlaceholder": "Buscar...",
          "sUrl": "",
          "sInfoThousands": ",",
          "sLoadingRecords": "<img style='display: block;width:100px;margin:0 auto;' src='assets/img/loading.gif' />",
          "oPaginate": {
            "sFirst": "Primero",
            "sLast": "Último",
            "sNext": "Siguiente",
            "sPrevious": "Anterior"
          },
          "oAria": {
            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
          }
        }
      });
      $('#botonera').append(products.buttons().container());
      $('#register1').append($('#data_table').closest('.dataTables_wrapper').find('.dataTables_filter'));
      $('#filter1').append($('#data_table').closest('.dataTables_wrapper').find('.dataTables_length'));
    });
  </script>

  <!--   Core JS Files and scripts  -->

  <script src="js/categoria.js"></script>
  <script src="js/product.js"></script>
  <script src="js/stats.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="assets/js/plugins/chartjs.min.js"></script>
  <!-- <script>
    document.addEventListener("DOMContentLoaded", function() {
      // Obtiene la fecha actual
      const currentDate = new Date();
      const formattedDate = currentDate.toLocaleDateString('en-US'); // Formato MM/DD/YYYY (cambiar según el formato deseado)

      // Obtiene el campo de fecha por su nombre y establece la fecha actual como valor
      const dateRangeInput = document.querySelector('input[name="daterange"]');
      dateRangeInput.value = formattedDate;
    });
  </script> -->
  <!-- <script src="Js/Search.js"></script> -->


  <!-- Date picker -->
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="./assets/js/argon-dashboard.js"></script>
</body>

<script>
  $(function() {
    $('input[name="daterange"]').daterangepicker({
      opens: 'left'
    }, function(start, end, label) {

      console.log(start.format('YYYY-MM-DD'));
      console.log(end.format('YYYY-MM-DD'));

      let rangeDates = {
        start: start.format('YYYY-MM-DD'),
        end: end.format('YYYY-MM-DD')
      }

      let datos = new FormData();

      datos.append('range_dates', JSON.stringify(rangeDates));

      $.ajax({
        url: "ajax/ventas.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(response) {
          let tabla = document.getElementById('ventas_rango');
          ventas = JSON.parse(response);

          ventas.forEach(v => {

            let nuevaFila = document.createElement("tr");
            nuevaFila.classList.add('text-center', 'text-uppercase', 'text-black', 'text-xs', 'font-weight-bolder');
            var precioVentaFormateado = parseFloat(v.total_venta).toLocaleString('es-CO');


            let contenidoCeldas = [
              v.nombres + ' ' + v.apellidos,
              "$" + precioVentaFormateado,
            ];

            contenidoCeldas.forEach(function(contenido) {
              var celda = document.createElement("td");
              var parrafo = document.createElement("p");
              parrafo.innerHTML = contenido;
              celda.appendChild(parrafo);
              nuevaFila.appendChild(celda);
            });

            let tabla = document.getElementById("ventas_rango");

            let filas = tabla.getElementsByTagName("tr");


            for (var i = filas.length - 1; i > 0; i--) {
                tabla.deleteRow(i);
            }

    
            // Agrega la nueva fila a la tabla
            tabla.querySelector("tbody").appendChild(nuevaFila);
          });




        }
      });

    });
  });
</script>

</html>
<!-- style -->
<style>
  @import url(https://fonts.googleapis.com/css?family=Open+Sans);

  .table.dataTable tbody td {
    border: 0px solid #8898aa;
    background: transparent !important;
  }

  .table {
    background: transparent !important;
  }

  div.dt-buttons>.dt-button,
  div.dt-buttons>div.dt-button-split .dt-button {
    border-radius: 0.5rem;
    color: white;
    background: #5e72e4;
    border: 0px;
    line-height: 1.5;
    font-size: 0.875rem;
    font-weight: 700;
  }

  .dataTables_wrapper .dataTables_paginate .paginate_button {
    border-radius: 25px;
    color: white;
    border: 0px transparent;
    font-size: 0.875rem;
    font-weight: 700;
  }

  div#data_table_info {
    font-size: 0.875rem;
    font-weight: 700;
  }

  div#categories_table_info {
    font-size: 0.875rem;
    font-weight: 700;
  }

  div#data_table_wrapper {
    background-color: transparent !important;
    padding: 10px;
    padding-left: 10px;
    border: none;
  }

  select {
    border: 1px solid #8898aa;
    border-radius: 0.4rem;
    padding: 0.5rem 1rem;
    font-size: 0.875rem;
    color: #8898aa;
    background-color: transparent;
  }

  div#categories_table_wrapper {
    background-color: transparent !important;
    padding: 10px;
    padding-left: 10px;
    border: none;
  }

  .dataTables_paginate .pagination {
    justify-content: center;
  }

  .dataTables_filter label input {
    border: 1px solid #8898aa;
    border-radius: 0.4rem;
    padding: 0.5rem 1rem;
    font-size: 0.875rem;
    color: #8898aa;
    width: 100%;
    background-color: transparent;
  }

  .custom-daterangepicker {
    /* Estilos para el input del Datepicker */
    padding: 8px 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 14px;
    color: #333;
    width: 200px;
    /* Ajusta el ancho según lo necesites */
    background-color: #fff;
  }

  /* Estilos para el Datepicker en modo rango */
  .daterangepicker {
    /* Modifica el estilo del contenedor principal del Datepicker */
    font-family: Arial, sans-serif;
    /* Cambia la fuente si lo deseas */
    border: 1px solid #ccc;
    border-radius: 4px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    background-color: #fff;
  }
</style>