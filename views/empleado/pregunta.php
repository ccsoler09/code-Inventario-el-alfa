
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper bg-white my-5">
    <!-- Contenido-->
  <div class="container">
    <div class="container">
      <div class="my-1 mx-5">

      
      <div class="container">
  <div class="my-5">
  <!--Parte superior bienvenida-->
  <div class="row">
    <div class="col-6 mt-5"><h4>¡Crea una pregunta de seguridad!...</h4></div>
    <div class="col-2"></div>
    <div class="col-4 mt-3"><h6>Inventario Almacen El Alfa</h6></div>
  </div>
  </div>

  <!--Formulario de registro-->
  <div class="row">
    <div class="col-12">
     <center>
     <form action="?controller=empleado&method=seguridad" method="post" class="card col-8">
      <div class="row">
        <div class="col-2 mx-5 my-3">
        </div>
        <div class="col-10 my-3 d-flex justify-content-center align-items-center">
        <i class="material-icons ml-5">help_center</i>
        <div class="mx-1">Pregunta:</div>
        <select name="pregunta_id" id="" class="form-control col-10">  
        <option selected disabled>Seleccione aquí su pregunta</option> 
        <?php foreach(parent::query_questions() as $pregunta): ?>
        <option value="<?=$pregunta->id_pregunta?>"><?=$pregunta->pregunta?></option>
        <?php endforeach; ?>
       </select>
        </div>
      </div>
      <div class="row">
        <div class="col-2 mx-5">
        </div>
        <div class="col-10 my-3 d-flex justify-content-center align-items-center">
        <i class="material-icons ml-5">question_answer</i>
        <div class="mx-1">Respuesta:</div>
        <input type="text" placeholder="Escribe y recuerda muy bien tu respuesta" class="form-control col-10" name="respuesta">
        </div>
      </div>
      <input type="hidden" value="<?=$email->id?>" name="usuario_id">
      <div class="d-flex justify-content-center mb-3">
      <a type="button" class="btn btn-outline-dark">Cancelar</a>
      <button type="submit" class="btn btn-outline-dark mx-2">Registrar</button>
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
  <!-- /.content-wrapper -->