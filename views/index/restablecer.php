<div class="container">
  <div class="my-5">
  <!--Parte superior bienvenida-->
  <div class="row">
    <div class="col-4 mt-5"><h4>¡Cambia tus contraseñas!...</h4></div>
    <div class="col-4"></div>
    <div class="col-4 mt-3"><h6>Inventario Almacen El Alfa</h6></div>
  </div>
  </div>

  <!--Formulario de registro-->
  <div class="row">
    <div class="col-12">
     <center>
     <form action="?controller=index&method=cambiar" method="post" class="card col-8">
      <div class="row">
        <div class="col-2 mx-5 my-3">
        </div>
        <div class="col-10 my-3 d-flex justify-content-center align-items-center">
        <i class="material-icons ml-5">lock</i>
        <div class="">Contraseña:</div>
        <input id="pwd1" type="password" placeholder="*************" class="form-control col-10 ml-2" name="password">
        </div>
      </div>
      <div class="row">
        <div class="col-2 mx-5">
        </div>
        <div class="col-10 my-3 d-flex justify-content-center align-items-center">
        <i class="material-icons ml-5">lock</i>
        <div class="">Repite tu contraseña:</div>
        <input id="pwd2" type="password" placeholder="*************" class="form-control col-10 ml-2" name="passwordver">
        </div>
      </div>
      <input type="hidden" value="<?=$_POST['usuario_id']?>" name="id">
      <div id="alerta"></div>
      <div class="d-flex justify-content-center">
      <a type="button" href="?controller=index&method=recuperar_cuenta" class="btn btn-outline-dark">Cancelar</a>
      <button id="button" type="submit" class="btn btn-outline-dark mx-2">Continuar</button>
      </div>
      <div class="div my-3">
      <a href="?controller=index&method=recuperar_cuenta">¿Olvido su contraseña?</a>
      </div>
     </form>
     </center>
    </div>
  </div>
</div>

<script>
var pwd1 = document.getElementById('pwd1');
var pwd2 = document.getElementById('pwd2');
var button = document.getElementById('button');
var alerta = document.getElementById('alerta');

button.setAttribute('disabled', '');
alerta.style.display = "none";

pwd2.addEventListener('keyup', function(e){
e.preventDefault();

if(pwd1.value == ""){
  button.setAttribute('disabled', '');
  alerta.style.display = "block";
  alerta.innerHTML= "<div class='alert alert-danger col-6' role='alert'>Estos campos son obligatorios<div/>";
}else if(pwd1.value != ""){
alerta.style.display = "none";
    if(pwd1.value == pwd2.value){
     button.removeAttribute('disabled', '');
    }else if(pwd1.value != pwd2.value){
      button.setAttribute('disabled', '');
      alerta.style.display = "block";
      alerta.innerHTML= "<div class='alert alert-danger col-6' role='alert'>Las contraseñas no coinciden<div/>";
    }else{
      button.setAttribute('disabled', '');
      alerta.style.display = "none";
    }
}else{
alerta.style.display = "none";
button.setAttribute('disabled', '');
}
});
</script>