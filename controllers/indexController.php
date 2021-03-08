<?php

class indexController extends index{

   public function index(){
    $title = "Inventario El Alfa";
    require_once 'views/layouts/header_index.php';
    require_once 'views/index/index.php';
    require_once 'views/layouts/footer_index.php';
   }

   public function registro(){
    $title = "Inventario El Alfa";
    require_once 'views/layouts/header_index.php';
    require_once 'views/index/registro.php';
    require_once 'views/layouts/footer_index.php';
   }
   //end1

   public function pregunta(){
   $title = "Inventario El Alfa";
   require_once 'views/layouts/header_index.php';
   require_once 'views/index/pregunta.php';
   require_once 'views/layouts/footer_index.php';
   }

   public function recuperar_cuenta(){
   $title = "Inventario El Alfa";
   require_once 'views/layouts/header_index.php';
   require_once 'views/index/recuperar.php';
   require_once 'views/layouts/footer_index.php';
   }


   public function restablecer_cuenta(){
      $answer = parent::verificar($_POST['respuesta'], $_POST['usuario_id']);

      if(! $_POST['respuesta'] != $answer){

         $title = "Inventario El Alfa";
         require_once 'views/layouts/header_index.php';
         require_once 'views/index/restablecer.php';
         require_once 'views/layouts/footer_index.php';

  } else {
          echo '<script type="text/javascript">
          alert("Las respuestas no coinciden. ¡Intentalo nuevamente!");window.location.href="?controller=index";
          </script>';
      }
  }

   public function cambiar(){
    $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
     
    echo parent::update_password($_POST) ? '<script type="text/javascript">
          alert("Contraseñas modificadas con éxito");window.location.href="?controller=index&method=login";
          </script>' : '<script type="text/javascript">
          alert("Contraseñas modificadas con éxito");window.location.href="?controller=index";
          </script>';
      }

   public function recording(){

      $user = parent::query($_POST['email']);
      if(! $_POST['email'] != $user){
          $id = $user->id;
          $question = parent::search($id);
      $title = "Recuperar cuenta";
      require_once 'views/layouts/header_index.php';
      require_once 'views/index/pregunta_interfaz.php';
      require_once 'views/layouts/footer_index.php';

  } else {
          echo '<script type="text/javascript">
          alert("Correo electrónico no encontrado, ¡Intentalo nuevamente!");window.location.href="?controller=index";
          </script>';
      }
  }

   //crear usuario
   public function crear_usuario(){

      $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

      $registro = parent::register($_POST);

      if($registro){
         $date = $_POST['email'];
         $email = parent::query($date);
         $title = 'Pregunta de seguridad';
            require_once 'views/layouts/header_index.php';
            require_once 'views/index/pregunta.php';
            require_once 'views/layouts/footer_index.php';
      }else{
         echo '<script type="text/javascript">
         alert("Error en el registro");window.location.href="?controller=index";
         </script>';
      }
   }
   //end2
     
   public function seguridad(){
      echo parent::guardar_pregunta($_POST) ? '<script type="text/javascript">
      alert("Registro realizado con éxito");window.location.href="?controller=index";
      </script>' : '<script type="text/javascript">
      alert("Error en el registro");window.location.href="?controller=index";
      </script>';
   }
  //end3


  //Login
  public function login(){

      $usuario = parent::validatelogin($_POST['email']);
     

      if(! is_object($usuario)){
        echo '<script type="text/javascript">
        alert("Correo erróneo. ¡Acceso Denegado!");window.location.href="?controller=index";
        </script>';
      }else{
        $hash = $usuario->password;
        $cargo = $usuario->cargo;
        $estado = $usuario->estado;
        if($estado==1){
         if (password_verify($_POST['password'], $hash)) {
            $_SESSION['user'] = $usuario;
            switch($cargo){
             case 1:
                header('Location: ?controller=empleado&method=index');
             break;
             
             case 2:
                header('Location: ?controller=admin&method=index');
             break;
             
            }
        } else {
            echo '<script type="text/javascript">
            alert("Introduciste mal las contraseñas verificalas nuevamente!");window.location.href="?controller=index";
            </script>';
        }
        }else{
         echo '<script type="text/javascript">
         alert("Usuario inactivo, no tienes acceso!");window.location.href="?controller=index";
         </script>';
        }
      }
      
    }

    public function logout(){
      unset($_SESSION['user']);
      session_destroy();
      header('location:?controller=index');
      }


      //Sitio web
   public function home(){
      require_once 'views/layouts/header_index.php';
      require_once 'views/index/home.php';
      require_once 'views/layouts/footer_index.php';
   }
}