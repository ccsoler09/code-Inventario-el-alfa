
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
    <div class="col-4 mt-5"><h4>¡Mi Perfil!</h4></div>
    <div class="col-4"></div>
    <div class="col-4 mt-3"><h6>Inventario Almacen El Alfa</h6></div>
  </div>
  </div>

  <!--Formulario de registro-->
  <div class="row">
    <div class="col-12">
     <center>
     <form action="#" method="post" class="card col-10">
     <div class="row">
        <div class="col-2 mx-5">
        </div>
        <div class="col-10 my-3 d-flex align-items-center">
        <i class="material-icons ml-5">account_circle</i>
        <div class="mx-3">*Nombres:</div>
       <?=$user->nombre?>     
       </div>
      </div>
      <div class="row">
        <div class="col-2 mx-5">
        </div>
        <div class="col-10 my-3 d-flex align-items-center">
        <i class="material-icons ml-5">email</i>
        <div class="mx-3">*Email:</div>
       <?=$user->email?>     
       </div>
      </div>
      <div class="row">
        <div class="col-2 mx-5">
        </div>
        <div class="col-10 my-3 d-flex align-items-center">
        <i class="material-icons ml-5">accessibility</i>
        <div class="mx-3">*Cargo:</div>
       <?=$user->CarDescripcion?>     
       </div>
      </div>
      <div class="d-flex justify-content-center mb-3">
      <a class="btn btn-outline-dark mx-2" href="?controller=admin&method=edit_profile&id=<?=$user->id?>">Editar</a>
      </div>
     </form>
     </center>
    </div>
  </div>
</div>


<div class="container">
  <div class="">
  <!--Parte superior bienvenida-->
  <div class="row">
    <div class="col-6 mt-5"><h4>¡Mi Pregunta de seguridad!</h4></div>
    <div class="col-4"></div>
  </div>
  </div>

  <!--Formulario de registro-->
  <div class="row">
    <div class="col-12">
     <center>
     <form action="#" method="post" class="card col-10">
     <div class="row">
        <div class="col-2 mx-5">
        </div>
        <div class="col-10 my-3 d-flex align-items-center">
        <i class="material-icons ml-5">help_center</i>
        <div class="mx-3">*Pregunta:</div>
       <?=$question->pregunta?>     
       </div>
      </div>
      <div class="row">
        <div class="col-2 mx-5">
        </div>
        <div class="col-10 my-3 d-flex align-items-center">
        <i class="material-icons ml-5">question_answer</i>
        <div class="mx-3">*Respuesta:</div>
       <?=$question->respuesta?>     
       </div>
      </div>
      <div class="d-flex justify-content-center mb-3">
      <a class="btn btn-outline-dark mx-2" href="?controller=admin&method=edit_profile_question&id=<?=$user->id?>">Editar</a>
      </div>
     </form>
     </center>
    </div>
  </div>
</div>

<div class="container">
    <div class="d-flex justify-content-center">
    <a class="btn btn-dark" href="?controller=admin&method=change_passwords&id=<?=$user->id?>">Cambiar contraseñas</a>
    </div>
</div>
      </div>
    </div>
  </div>
  </div>  
  <!-- /.content-wrapper -->
  <br><br><br><br><br>