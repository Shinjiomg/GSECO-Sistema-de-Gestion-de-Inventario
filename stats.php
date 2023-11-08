<?php
include_once("conexion.php");
include_once("Consultas.php");

require('./models/venta.php');
require('./models/articulo.php');
require('./models/categoria.php');
$nw = new Venta();
$ar = new Articulo();
$cat = new Categoria();
$ventas = $nw->ventas(1);
$ultimaVenta = $nw->ultimaVenta(1);
$articulos = $ar->index();
$categorias = $cat->index();

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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body class="g-sidenav-show bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>
  <!-- sidebar -->
  <aside
    class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-black opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
        aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0 mr-4">
        <img src="./img/logo.png" class="navbar-brand-img h-100 mr-5" alt="main_logo">
        <span class="ms-1 font-weight-bold">GSECO</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Artículos</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="stats.php">
            <div
              class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-chart-bar-32 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Estadísticas</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="sales.php">
            <div
              class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-cart text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Ventas</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="bills.php">
            <div
              class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-copy-04 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Facturas</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Administración</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="user-administration.php">
            <div
              class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-single-02 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Usuarios</span>
          </a>
        </li>
        <li class="sidenav-footer mx-3">

        </li>
      </ul>
    </div>
  </aside>
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur"
      data-scroll="false">
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
            <!-- <li class="nav-item dropdown pe-2 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-bell cursor-pointer"></i>
              </a>
              <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
              </ul>
            </li> -->
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
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Ventas totales</p>
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
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Ventas diarias</p>
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
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Última venta</p>
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
              <div class="row pb-2 p-3">
                <div class="col-6 d-flex align-items-center">
                  <h6>Productos</h6>
                </div>
                <div class="col-6 text-end">
                  <a class="btn bg-gradient-primary mb-0" data-bs-toggle="modal" data-bs-target="#modal-form-product"><i
                      class="fas fa-cart-plus"></i>&nbsp;&nbsp;Añadir producto</a>
                  <div class="modal fade" id="modal-form-product" tabindex="1" role="dialog"
                    aria-labelledby="modal-form" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Añadir producto</h5>
                        </div>
                        <div class="modal-body p-0">
                          <div class="card card-plain">
                            <div class="card-body text-start">
                              <form role="form text-left">
                                <div class="form-group">
                                  <div class="row">
                                    <div class="col-xl-9">
                                      <label for="" class="col-form-label">Nombre
                                        del producto</label>
                                      <input type="text" placeholder="Ingresa el nombre del producto"
                                        class="form-control" />
                                    </div>
                                    <div class="col-xl-3">
                                      <label for="" class="col-form-label">Cantidad</label>
                                      <input class="form-control" type="number" id="" placeholder="Ingresa la cantidad"
                                        oninput="validarCantidad(this)">
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-xl-4">
                                      <label for="" class="col-form-label">Valor unitario</label>
                                      <input class="form-control" type="number" id=""
                                        placeholder="Ingresa el valor del producto" oninput="validarCantidad(this)">
                                    </div>
                                    <div class="col-xl-4">
                                      <label for="" class="col-form-label">Stock máximo</label>
                                      <input class="form-control" type="number" id=""
                                        placeholder="Ingresa el stock máximo del producto" oninput="validarCantidad(this)">
                                    </div>
                                    <div class="col-xl-4">
                                      <label for="" class="col-form-label">Categoría</label>
                                      <button class="btn btn-outline-primary dropdown-toggle w-100" type="button"
                                        id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="true">
                                        Selecciona una categoría
                                      </button>
                                      <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                      </ul>
                                    </div>
                                  </div>
                                  <button type="button" id="confirmButton"
                                    class="btn btn-round bg-gradient-primary btn-lg w-100 mt-4 mb-0">Añadir
                                    producto</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th align="center"
                      class="text-center text-uppercase text-black text-xxs font-weight-bolder opacity-7">
                      Nombre del producto</th>
                    <th align="center"
                      class="text-center text-uppercase text-black text-xxs font-weight-bolder opacity-7 ps-2">
                      Precio de venta</th>
                    <th align="center"
                      class="text-center text-uppercase text-black text-xxs font-weight-bolder opacity-7">
                      Cantidad</th>
                    <th align="center"
                      class="text-center text-uppercase text-black text-xxs font-weight-bolder opacity-7">
                      Estado</th>
                    <th align="center"
                      class="text-center text-uppercase text-black text-xxs font-weight-bolder opacity-7">
                      Categoría</th>
                    <th align="center"
                      class="text-center text-uppercase text-black text-xxs font-weight-bolder opacity-7">
                      Stock máximo</th>
                    <th align="center"
                      class="text-center text-uppercase text-black text-xxs font-weight-bolder opacity-7">
                      Inventario</th>
                    <th align="center"
                      class="text-center text-uppercase text-black text-xxs font-weight-bolder opacity-7">
                    </th>
                    <th align="center"
                      class="text-center text-uppercase text-black text-xxs font-weight-bolder opacity-7">
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($articulos as $art) { ?>
                    <tr>
                      <td align="center"
                        class="text-center text-uppercase text-black text-xxs font-weight-bolder opacity-7">
                        <?php echo $art->nombre ?>
                      </td>
                      <td align="center"
                        class="text-center text-uppercase text-black text-xxs font-weight-bolder opacity-7">$
                        <?php
                        $precioVenta = number_format($art->precio_venta, 0, ',', '.');
                        echo $precioVenta;
                        ?>
                      </td>
                      <td align="center"
                        class="text-center text-uppercase text-black text-xxs font-weight-bolder opacity-7">
                        <?php echo $art->stock ?>
                      </td>
                      <td align="center" class="text-center text-uppercase text-black text-xxs font-weight-bolder">
                        <?php
                        if ($art->estado == 1) {
                          echo '<span class="badge badge-sm bg-gradient-success">Disponible</span>';
                        } else {
                          echo '<span class="badge badge-sm bg-gradient-danger">No disponible</span>';
                        }
                        ?>
                      </td>
                      <td align="center"
                        class="text-center text-uppercase text-black text-xxs font-weight-bolder opacity-7">
                        <?php echo $art->categoria ?>
                      </td>
                      <td align="center"
                        class="text-center text-uppercase text-black text-xxs font-weight-bolder opacity-7">
                        <?php echo $art->stock_deseado ?>
                      <td align="center" class="text-center text-uppercase text-black text-xxs font-weight-bolder">
                        <div class="d-flex align-items-center justify-content-center">
                          <?php
                          $total = $art->stock_deseado;
                          $actual = $art->stock;
                          $porcentaje = ($actual / $total) * 100;

                          if ($porcentaje > 100) {
                            $porcentaje = 100;
                          }
                          ?>
                          <span class="me-2 text-xs font-weight-bold">
                            <?php echo $porcentaje; ?>%
                          </span>

                          <div class="progress">
                            <?php if ($porcentaje <= 40) { ?>
                              <div class="progress-bar bg-gradient-danger" role="progressbar" aria-valuenow="60"
                                aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $porcentaje; ?>%"></div>
                            <?php } else if ($porcentaje > 40 && $porcentaje <= 60) { ?>
                                <div class="progress-bar bg-gradient-info" role="progressbar" aria-valuenow="60"
                                  aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $porcentaje; ?>%"></div>
                            <?php } else { ?>
                                <div class="progress-bar bg-gradient-success" role="progressbar" aria-valuenow="60"
                                  aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $porcentaje; ?>%"></div>
                            <?php } ?>
                          </div>
                        </div>
                      </td>

                      <td align="center" class="text-center text-black text-xxs font-weight-bolder">
                        <a data-bs-toggle="tooltip" title="Editar" class="text-primary font-weight-bold text-xs"
                          href=""><i class="fas fa-edit" style='font-size:24px'></i></a>
                      </td>
                      <td align="center" class="text-center text-black text-xxs font-weight-bolder">
                        <a data-bs-toggle="tooltip" title="Borrar" class="text-danger font-weight-bold text-xs" href=""><i
                            class="fas fa-trash" style='font-size:24px'></i></a>
                      </td>
                    </tr>
                    <?php
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!--secondary content -->
      <div class="row mt-4">
        <div class="col-xl-6">
          <div class="card">
            <div class="card-header pb-4">
              <div class="row pb-2 p-3">
                <div class="col-6 d-flex align-items-center">
                  <h6>Categorías</h6>
                </div>
                <div class="col-6 text-end">
                  <a class="btn bg-gradient-primary mb-0" data-bs-toggle="modal" data-bs-target="#modal-form"><i
                      class="fas fa-plus"></i>&nbsp;&nbsp;Añadir categoría</a>
                  <div class="modal fade" id="modal-form" tabindex="1" role="dialog" aria-labelledby="modal-form"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                      <div class="modal-content">
                        <div class="modal-body p-0">
                          <div class="card card-plain">
                            <div class="card-body text-start">
                              <form role="form text-center">
                                <div class="row">
                                  <div class="col-xl-12">
                                    <label for="" class="col-form-label">Nombre de la categoria</label>
                                    <input id="categoria" type="text" placeholder="Ingresa el nombre de la categoría"
                                      class="form-control" />
                                  </div>
                                  <div class="text-center">
                                    <button type="button" onClick="guardarCategoria()"
                                      class="btn btn-round bg-gradient-primary btn-lg w-100 mt-4 mb-0">Añadir
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
              </div>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th align="center"
                      class="text-center text-uppercase text-black text-xxs font-weight-bolder opacity-7">
                      Nombre</th>
                    <th align="center"
                      class="text-center text-uppercase text-black text-xxs font-weight-bolder opacity-7">
                      Estado</th>
                    <th align="center"
                      class="text-center text-uppercase text-black text-xxs font-weight-bolder opacity-7">
                    </th>
                    <th align="center"
                      class="text-center text-uppercase text-black text-xxs font-weight-bolder opacity-7">
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($categorias as $cat) { ?>
                    <tr>
                      <td align="center"
                        class="text-center text-uppercase text-black text-xxs font-weight-bolder opacity-7">
                        <?php echo $cat->nombre ?>
                      </td>
                      <td align="center" class="text-center text-uppercase text-black text-xxs font-weight-bolder">
                        <?php
                        if ($cat->estado == 1) {
                          echo '<span class="badge badge-sm bg-gradient-success">Activo</span>';
                        } else {
                          echo '<span class="badge badge-sm bg-gradient-danger">Inactivo</span>';
                        }
                        ?>
                      </td>
                      <td align="center" class="text-center text-black text-xxs font-weight-bolder">
                        <a data-bs-toggle="tooltip" title="Editar" class="text-primary font-weight-bold text-xs"
                          href=""><i class="fas fa-edit" style='font-size:24px'></i></a>
                      </td>
                      <td align="center" class="text-center text-black text-xxs font-weight-bolder">
                        <a data-bs-toggle="tooltip" title="Borrar" class="text-danger font-weight-bold text-xs" href=""><i
                            class="fas fa-trash" style='font-size:24px'></i></a>
                      </td>
                    </tr>
                    <?php
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-xl-6">
          <div class="card ">
            <div class="card-header pb-4">
              <div class="row pb-2 p-3">
                <div class="col-6 d-flex align-items-center">
                  <h6>Ventas por empleado</h6>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table align-items-center ">
                <tbody>
                  <!-- <tr>
                    <td>
                      <div class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Vendedor:</p>
                        <h6 class="text-sm mb-0">Nombre 1</h6>
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Ventas:</p>
                        <h6 class="text-sm mb-0">2500</h6>
                      </div>
                    </td>
                    <td>
                      <div class="text-center">
                        <p class="text-xs font-weight-bold mb-0">Ganancias:</p>
                        <h6 class="text-sm mb-0">$230,900</h6>
                      </div>
                    </td>
                    <td class="align-middle text-sm">
                      <div class="col text-center">
                        <p class="text-xs font-weight-bold mb-0">Impacto:</p>
                        <h6 class="text-sm mb-0">29.9%</h6>
                      </div>
                    </td>
                  </tr> -->
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- footer -->
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
  <!--   Core JS Files and scripts  -->
  <script src="js/stats.js"></script>
  <script src="assets/js/core/popper.min.js"></script>
  <script src="assets/js/core/bootstrap.min.js"></script>
  <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="assets/js/plugins/chartjs.min.js"></script>
  <script src="Js/Search.js"></script>
  <script src="js/categoria.js"></script>
  <script>
    var ctx1 = document.getElementById("chart-line").getContext("2d");
    var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);
    gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
    gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
    gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
    new Chart(ctx1, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Mobile apps",
          tension: 0.4,
          borderWidth: 0,
          pointRadius: 0,
          borderColor: "#5e72e4",
          backgroundColor: gradientStroke1,
          borderWidth: 3,
          fill: true,
          data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
          maxBarThickness: 6
        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#fbfbfb',
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#ccc',
              padding: 20,
              font: {
                size: 11,
                family: "Open Sans",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script>
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

</html>
<!-- style -->
<style>
  @import url(https://fonts.googleapis.com/css?family=Open+Sans);

  .search {
    width: 100%;
    position: relative;
    display: flex;
  }

  .searchTerm {
    width: 100%;
    border: 3px solid #596CFF;
    border-right: none;
    padding: 5px;
    height: 36px;
    border-radius: 5px 0 0 5px;
    outline: none;
    color: black;
  }

  .searchTerm:focus {
    color: #596CFF;
  }

  .searchButton {
    width: 40px;
    height: 36px;
    border: 1px solid #596CFF;
    background: #596CFF;
    text-align: center;
    color: #fff;
    border-radius: 0 5px 5px 0;
    cursor: pointer;
    font-size: 20px;
  }

  /*Resize the wrap to see the search bar change!*/
  .wrap {
    width: 30%;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  }
</style>