<?php
 if(!isset($_SESSION['user'])){
  header('location: ?controller=index');
}else{
   if($_SESSION['user']->cargo != 2){
       header('location: ?controller=index');
   }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?=$title?></title>
  <!--CDN material icons-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/node_modules/admin-lte/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/node_modules/admin-lte/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="assets/node_modules/admin-lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

  <!--Datatables-->
   <link rel="shortcut icon" type="icon" href="assets/img/logooo.png"> 
    
</head>
<body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">

<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light bg-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link text-white" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block col-3">
        <a href="?controller=admin&method=index" class="nav-link text-white d-flex">
          <i class="material-icons mx-2">house</i>Inicio</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
      <a href="javascript:location.reload()" class="nav-link text-white d-flex">
          <i class="material-icons mx-2">refresh</i>Actualizar</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
      <a href="?controller=index&method=logout" class="nav-link text-white d-flex">
          <i class="material-icons mx-2">exit_to_app</i>Salir</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
      <a href="?controller=admin&method=profile&id=<?=$_SESSION['user']->id?>" class="nav-link text-white d-flex">
          <i class="material-icons mx-2">account_circle</i>Usuario</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="?controller=admin&method=index" class="brand-link">
      <img src="assets/img/logooo.png" alt="Inventario El Alfa" class="brand-image img-square elevation-5" style="opacity: .8">
    <u><i>Inventario El Alfa</i></u>
    </a>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="?controller=admin&method=usuarios" class="nav-link text-white">
              <p>
               Usuarios
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="?controller=admin&method=seguridades" class="nav-link text-white">
              <p>
               Seguridad
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="?controller=admin&method=categorias" class="nav-link text-white">
              <p>
               Categorías
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="?controller=admin&method=tipomovimientos" class="nav-link text-white">
              <p>
               Tipo movimientos
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="?controller=admin&method=cargos" class="nav-link text-white">
              <p>
               Cargos
              </p>
            </a>
          </li>
          <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="?controller=admin&method=productos" class="nav-link text-white">
              <p>
               Productos
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="?controller=admin&method=proveedores" class="nav-link text-white">
              <p>
                Proveedores
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="?controller=admin&method=inventario" class="nav-link text-white">
              <p>
                Inventario
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="?controller=admin&method=devoluciones" class="nav-link text-white">
              <p>
                Devoluciones
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="?controller=admin&method=movimientos" class="nav-link text-white">
              <p>
               Movimientos
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="?controller=admin&method=facturas" class="nav-link text-white">
              <p>
                Facturas
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="?controller=admin&method=clientes" class="nav-link text-white">
              <p>
              Clientes
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>