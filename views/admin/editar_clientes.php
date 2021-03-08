
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper bg-white my-5">
    <!-- Contenido-->
  <div class="container">
    <div class="container">
      <div class="my-1 mx-5">

      <div class="row">
          <div class="col-6">
          <a class="btn btn-dark" href="?controller=admin&method=clientes">Regresar</a>
        </div>
      </div>
        
      <div class="container">
  <div class="my-5">
  <!--Parte superior bienvenida-->
  <div class="row">
    <div class="col-6 mt-5"><h4>¡Actualización de clientes!</h4></div>
    <div class="col-1"></div>
    <div class="col-4 mt-3"><h6>Inventario Almacen El Alfa</h6></div>
  </div>
  </div>

  <!--Formulario de registro-->
  <div class="row">
    <div class="col-12">
     <center>
     <form action="?controller=admin&method=actualizar_personas" method="post" class="card col-10">
     <div class="row">
        <div class="col-2 mx-5 my-3">
        </div>
        <div class="col-10 my-3 d-flex justify-content-center align-items-center">
        <div class="mx-3">Nombres:</div>
        <input type="text" placeholder="names lastnames" class="form-control col-10" name="PersoNombres" value="<?=$persona->PersoNombres?>">
        </div>
      </div>
      <div class="row">
        <div class="col-2 mx-5">
        </div>
        <div class="col-10 my-3 d-flex justify-content-center align-items-center">
        <div class="mx-4">Correo:</div>
        <input type="email" placeholder="some@example.com" class="form-control col-10" name="Correo" value="<?=$persona->Correo?>">
        </div>
      </div>
      <div class="row">
        <div class="col-2 mx-5">
        </div>
        <div class="col-10 my-3 d-flex justify-content-center align-items-center">
        <div class="mx-2">Tipo de documento:</div>
        <select class="form-control col-10" name="TipoDoc">
        <option selected value="<?=$persona->TipoDoc?>"><?=$persona->TipoDoc?></option>
        <option value="Cédula de ciudadanía">Cédula de ciudadanía</option>
        <option value="Cédula de extranjería">Cédula de extranjería</option>
        <option value="Pasaporte MS">Pasaporte MS</option>
        </select>
        </div>
      </div>
      <div class="row">
        <div class="col-2 mx-5">
        </div>
        <div class="col-10 my-3 d-flex justify-content-center align-items-center">
        <div class="mx-2">Número de documento:</div>
        <input type="text" placeholder="0000000000" class="form-control col-10" name="documento" value="<?=$persona->documento?>">
        </div>
      </div>
      <div class="row">
        <div class="col-2 mx-5">
        </div>
        <div class="col-10 my-3 d-flex justify-content-center align-items-center">
        <div class="mx-3">Dirección:</div>
        <input type="text" placeholder="street #0 - 00 center park" class="form-control col-10" name="Direccion" value="<?=$persona->Direccion?>">
        </div>
      </div>
      <div class="row">
        <div class="col-2 mx-5">
        </div>
        <div class="col-10 my-3 d-flex justify-content-center align-items-center">
        <div class="mx-3">Teléfono:</div>
        <input type="text" placeholder="(0)00000000" class="form-control col-10" name="Telefono" value="<?=$persona->Telefono?>">
        </div>
      </div>
      <input type="hidden" name="id_persona" value="<?=$persona->id_persona?>">
      <div class="d-flex justify-content-center mb-3">
      <button class="btn btn-outline-dark mx-2" type="submit">Editar</button>
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
  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  <!-- /.content-wrapper -->

  <script>
  var precio1 = document.getElementById('precio1');
  var precio2 = document.getElementById('precio2');
  var iva = document.getElementById('iva');

  precio2.addEventListener('keyup', function(e){
   if(precio1.value!=""){
       if(iva.value!=""){
        var parcial=(precio1.value*iva.value)/100;
        precio2.value = parseInt(precio1.value) + parseInt(parcial);
       }else if(iva.value==""){
        precio2.value=precio1.value;
       }
   }
  });
  </script>