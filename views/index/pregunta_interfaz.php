<div class="container">
  <div class="my-5">
  <!--Parte superior bienvenida-->
  <div class="row">
    <div class="col-6 mt-5"><h4>¡Responde a tu pregunta de seguridad!...</h4></div>
    <div class="col-2"></div>
    <div class="col-4 mt-3"><h6>Inventario Almacen El Alfa</h6></div>
  </div>
  </div>

  <!--Formulario de registro-->
  <div class="row">
    <div class="col-12">
     <center>
     <form action="?controller=index&method=restablecer_cuenta" method="post" class="card col-8">
      <div class="row">
        <div class="col-2 mx-5 my-3">
        </div>
        <div class="col-10 my-3 d-flex justify-content-center align-items-center">
        <i class="material-icons ml-5">help_center</i>
        <div class="mx-1">Pregunta:</div>
        <input type="text" class="form-control col-10" name="pregunta_id" value="<?=$question->pregunta?>" disabled>
        </div>
      </div>
      <div class="row">
        <div class="col-2 mx-5">
        </div>
        <div class="col-10 my-3 d-flex justify-content-center align-items-center">
        <i class="material-icons ml-5">question_answer</i>
        <div class="mx-1">Respuesta:</div>
        <input type="text" placeholder="Escribe tu respuesta" class="form-control col-10" name="respuesta">
        </div>
      </div>
      <input type="hidden" name="usuario_id" value="<?=$question->usuario_id?>">
      <div class="d-flex justify-content-center mb-3">
      <a href="?controller=index&method=index" type="button" class="btn btn-outline-dark">Cancelar</a>
      <button type="submit" class="btn btn-outline-dark mx-2">Validar</button>
      </div>
     </form>
     </center>
    </div>
  </div>
</div>