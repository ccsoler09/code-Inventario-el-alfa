
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper bg-white my-5">
    <!-- Contenido-->
  <div class="container">
    <div class="container">
      <div class="my-1 mx-5">

      <div class="row">
          <div class="col-6">
          <a class="btn btn-dark" href="?controller=empleado&method=proveedores">Regresar</a>
        </div>
      </div>
        
      <div class="container">
  <div class="my-5">
  <!--Parte superior bienvenida-->
  <div class="row">
    <div class="col-6 mt-5"><h4>¡Registro de proveedores!</h4></div>
    <div class="col-1"></div>
    <div class="col-4 mt-3"><h6>Inventario Almacen El Alfa</h6></div>
  </div>
  </div>

  <!--Formulario de registro-->
  <div class="row">
    <div class="col-12">
     <center>
     <form action="?controller=empleado&method=crear_proveedor" method="post" class="card col-10">
     <div class="row">
        <div class="col-2 mx-5 my-3">
        </div>
        <div class="col-10 my-3 d-flex justify-content-center align-items-center">
        <div class="mx-3">Nombres:</div>
        <input type="text" placeholder="names lastnames" class="form-control col-10" name="ProveNombres">
        </div>
      </div>
      <div class="row">
        <div class="col-2 mx-5">
        </div>
        <div class="col-10 my-3 d-flex justify-content-center align-items-center">
        <div class="mx-2">Número de documento:</div>
        <input type="text" placeholder="0000000000000000" class="form-control col-10" name="ProveNumDoc">
        </div>
      </div>
      <div class="row">
        <div class="col-2 mx-5">
        </div>
        <div class="col-10 my-3 d-flex justify-content-center align-items-center">
        <div class="mx-4">Correo:</div>
        <input type="text" placeholder="some@example.com" class="form-control col-10" name="Correo">
        </div>
      </div>
      <div class="row">
        <div class="col-2 mx-5">
        </div>
        <div class="col-10 my-3 d-flex justify-content-center align-items-center">
        <div class="mx-2">Dirreccion:</div>
        <input type="text" placeholder="place #0000-000" class="form-control col-10" name="Direccion">
        </div>
      </div>
      <div class="row">
        <div class="col-2 mx-5">
        </div>
        <div class="col-10 my-3 d-flex justify-content-center align-items-center">
        <div class="mx-3">Telefono:</div>
        <input type="text" placeholder="0000000000" class="form-control col-10" name="Telefono">
        </div>
      </div>
      <div class="d-flex justify-content-center mb-3">
      <button class="btn btn-outline-dark mx-2" type="submit">Enviar</button>
      </div>
     </form>
     </center>
    </div>
  </div>
</div>

      </div>
    </div>
  </div>
  </div>
  <br><br><br><br><br>
  <!-- /.content-wrapper -->