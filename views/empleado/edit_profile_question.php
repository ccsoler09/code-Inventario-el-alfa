
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper bg-white my-5">
    <!-- Contenido-->
  <div class="container">
    <div class="container">
      <div class="my-1 mx-5">

      <div class="row">
          <div class="col-6">
          <a class="btn btn-dark" href="?controller=empleado&method=profile&id=<?=$user->id?>">Regresar</a>
        </div>
      </div>
        
      <div class="container">
  <div class="my-5">
  <!--Parte superior bienvenida-->
  <div class="row">
    <div class="col-4 mt-5"><h4>¡Tu seguridad importa!</h4></div>
    <div class="col-4"></div>
    <div class="col-4 mt-3"><h6>Inventario Almacen El Alfa</h6></div>
  </div>
  </div>

  <!--Formulario de registro-->
  <div class="row">
    <div class="col-12">
     <center>
     <form action="?controller=empleado&method=editar_respuesta_perfil" method="post" class="card col-10">
     <div class="row">
        <div class="col-2 mx-5 my-3">
        </div>
        <div class="col-10 my-3 d-flex justify-content-center align-items-center">
        <i class="material-icons ml-5">help_center</i>
        <div class="mx-3">*Pregunta:</div>
        <input type="text" placeholder="" class="form-control col-10" name="pregunta" value="<?=$question->pregunta?>" disabled>
        </div>
      </div>
     <div class="row">
        <div class="col-2 mx-5">
        </div>
        <div class="col-10 my-3 d-flex justify-content-center align-items-center">
        <i class="material-icons ml-5">question_answer</i>
        <div class="mx-3">*Respuesta:</div>
        <input type="text" placeholder="Respuesta" class="form-control col-10" name="respuesta" value="<?=$question->respuesta?>">
        </div>
      </div>
      <input type="hidden" name="id" value="<?=$question->id?>">
      <div class="d-flex justify-content-center mb-3">
      <button class="btn btn-outline-dark mx-2" type="submit">Actualizar</button>
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