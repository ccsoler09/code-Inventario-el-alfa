
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper bg-white my-5">
    <!-- Contenido-->
  <div class="container">
    <div class="container">
      <div class="my-1 mx-5">

      <div class="row">
          <div class="col-6">
          <a class="btn btn-dark" href="?controller=empleado&method=seguridades">Regresar</a>
        </div>
      </div>
        
      <div class="container">
  <div class="my-5">
  <!--Parte superior bienvenida-->
  <div class="row">
    <div class="col-4 mt-5"><h4>¡Registro de preguntas!</h4></div>
    <div class="col-4"></div>
    <div class="col-4 mt-3"><h6>Inventario Almacen El Alfa</h6></div>
  </div>
  </div>

  <!--Formulario de registro-->
  <div class="row">
    <div class="col-12">
     <center>
     <form action="?controller=empleado&method=actualizar_pregunta" method="post" class="card col-10">
     <div class="row">
        <div class="col-2 mx-5 my-3">
        </div>
        <div class="col-10 my-3 d-flex justify-content-center align-items-center">
        <i class="material-icons ml-5">help_center</i>
        <div class="mx-1">*Pregunta:</div>
        <input type="text" placeholder="¿Question?" class="form-control col-10" name="pregunta" value="<?=$pregunta->pregunta?>"> 
         <input type="hidden" name="id_pregunta" value="<?=$pregunta->id_pregunta?>">   
    </div>
      </div>
      <div class="d-flex justify-content-center mb-3">
      <a href="?controller=empleado&method=seguridades" class="btn btn-outline-dark mx-2">Cancelar</a>
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
  <br>
  <br>
  <!-- /.content-wrapper -->