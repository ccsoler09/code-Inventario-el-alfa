<?php

class empleadoController extends empleado{

    public function index(){
        $title = "Empleado | Inventario El Alfa";
        require_once 'views/layouts/header_empleado.php';
        require_once 'views/empleado/index.php';
        require_once 'views/layouts/footer_empleado.php';
    }

    public function usuarios(){
        $title = "Ver usuarios | Inventario El Alfa";
        require_once 'views/layouts/header_empleado.php';
        require_once 'views/empleado/usuarios.php';
        require_once 'views/layouts/footer_empleado.php';
    }

    public function registro(){
        $title = "Inventario El Alfa";
        require_once 'views/layouts/header_empleado.php';
        require_once 'views/empleado/create_user.php';
        require_once 'views/layouts/footer_empleado.php';
       }
//crear usuario
public function crear_usuario(){

    $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $registro = parent::register($_POST);

    if($registro){
       $date = $_POST['email'];
       $email = parent::query($date);
       $title = 'Pregunta de seguridad';
          require_once 'views/layouts/header_empleado.php';
          require_once 'views/empleado/pregunta.php';
          require_once 'views/layouts/footer_empleado.php';
    }else{
       echo '<script type="text/javascript">
       alert("Error en el registro");window.location.href="?controller=empleado&method=usuarios";
       </script>';
    }
 }
   
 public function user_update_state(){
    $estado = parent::find_user($_GET['id']);
    $user = $_GET['id'];
    
    if($estado->estado==1){
        echo parent::inactivar_user($user) ? '<script type="text/javascript">
    alert("Cambiando estado...!");window.location.href="?controller=empleado&method=usuarios";
    </script>' : '<script type="text/javascript">
    alert("Error al cambiar el registro de usuario!");window.location.href="?controller=empleado&method=usuarios";
    </script>';
    }else if($estado->estado==2){
        echo parent::activar_user($user) ? '<script type="text/javascript">
    alert("Cambiando estado...!");window.location.href="?controller=empleado&method=usuarios";
    </script>' : '<script type="text/javascript">
    alert("Error al cambiar el registro de usuario!");window.location.href="?controller=empleado&method=usuarios";
    </script>';
    }
 }

 public function seguridad(){
    echo parent::guardar_pregunta($_POST) ? '<script type="text/javascript">
    alert("Registro realizado con éxito");window.location.href="?controller=empleado&method=usuarios";
    </script>' : '<script type="text/javascript">
    alert("Error en el registro");window.location.href="?controller=empleado&method=usuarios";
    </script>';
 }

    
    public function seguridades(){
        $title = "Preguntas de seguridad | Inventario El Alfa";
        require_once 'views/layouts/header_empleado.php';
        require_once 'views/empleado/preguntas_seguridad.php';
        require_once 'views/layouts/footer_empleado.php';
    }

    public function create_answer(){
        $title = "Crear pregunta de seguridad | Inventario El Alfa";
        require_once 'views/layouts/header_empleado.php';
        require_once 'views/empleado/create_answer.php';
        require_once 'views/layouts/footer_empleado.php';
    }

    public function crear_pregunta(){
        echo parent::new_question($_POST) ? '<script type="text/javascript">
        alert("Pregunta registrada con éxito");window.location.href="?controller=empleado&method=seguridades";
        </script>' : '<script type="text/javascript">
        alert("Error la creación de pregunta");window.location.href="?controller=empleado&method=seguridades";
        </script>';
     }

     public function question_update(){
        $pregunta = parent::find_answer($_GET['id_pregunta']);
        $title = "Modificar pregunta | Inventario El Alfa";
        require_once 'views/layouts/header_empleado.php';
        require_once 'views/empleado/edit_answer.php';
        require_once 'views/layouts/footer_empleado.php';
    }

    public function actualizar_pregunta(){
        echo parent::update_question($_POST) ? '<script type="text/javascript">
        alert("Pregunta actualizada con éxito");window.location.href="?controller=empleado&method=seguridades";
        </script>' : '<script type="text/javascript">
        alert("Error la actualización de pregunta");window.location.href="?controller=empleado&method=seguridades";
        </script>';
     }

     public function preguntas_usuario(){
        $title = "Preguntas de usuario | Inventario El Alfa";
        require_once 'views/layouts/header_empleado.php';
        require_once 'views/empleado/preguntas_usuario.php';
        require_once 'views/layouts/footer_empleado.php';
    }
    
    public function profile(){
        $user = parent::user($_GET['id']);
        $question = parent::user_question($_GET['id']);
        $title = "Mi perfil | Inventario El Alfa";
        require_once 'views/layouts/header_empleado.php';
        require_once 'views/empleado/profile.php';
        require_once 'views/layouts/footer_empleado.php';
    }

    public function edit_profile(){
        $user = parent::user($_GET['id']);
        $title = "Editar mi perfil | Inventario El Alfa";
        require_once 'views/layouts/header_empleado.php';
        require_once 'views/empleado/edit_profile.php';
        require_once 'views/layouts/footer_empleado.php';
    }

    public function editar_datos_perfil(){
        echo parent::update_profile_personal($_POST) ? '<script type="text/javascript">
        alert("Perfil actualizado con éxito, vuelve a iniciar sesión para ver los cambios guardados");window.location.href="?controller=empleado";
        </script>' : '<script type="text/javascript">
        alert("Error la actualización del perfil");window.location.href="?controller=empleado";
        </script>';
     }

     public function edit_profile_question(){
        $user = parent::user($_GET['id']);
        $question = parent::user_question($_GET['id']);
        $title = "Editar mi respuesta | Inventario El Alfa";
        require_once 'views/layouts/header_empleado.php';
        require_once 'views/empleado/edit_profile_question.php';
        require_once 'views/layouts/footer_empleado.php';
    }

    public function editar_respuesta_perfil(){
        echo parent::update_profile_personal_question($_POST) ? '<script type="text/javascript">
        alert("Respuesta actualizada con éxito");window.location.href="?controller=empleado";
        </script>' : '<script type="text/javascript">
        alert("Error la actualización de la respuesta");window.location.href="?controller=empleado";
        </script>';
     }

     public function change_passwords(){
        $user = parent::user($_GET['id']);
        $title = "Editar mis contraseñas | Inventario El Alfa";
        require_once 'views/layouts/header_empleado.php';
        require_once 'views/empleado/change_passwords.php';
        require_once 'views/layouts/footer_empleado.php';
    }

    public function cambiar(){
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
         
        echo parent::update_password($_POST) ? '<script type="text/javascript">
              alert("Contraseñas modificadas con éxito");window.location.href="?controller=empleado";
              </script>' : '<script type="text/javascript">
              alert("Contraseñas modificadas con éxito");window.location.href="?controller=empleado";
              </script>';
    }

     public function proveedores(){
        $title = "Proveedores | Inventario El Alfa";
        require_once 'views/layouts/header_empleado.php';
        require_once 'views/empleado/proveedores.php';
        require_once 'views/layouts/footer_empleado.php';
    }

    public function agregar_proveedor(){
       $title = "Agregar proveedor | Inventario El Alfa";
       require_once 'views/layouts/header_empleado.php';
       require_once 'views/empleado/agregar_proveedor.php';
       require_once 'views/layouts/footer_empleado.php';
   }

   public function crear_proveedor(){
    echo parent::create_proveedor($_POST) ? '<script type="text/javascript">
          alert("Proveedor creado con éxito");window.location.href="?controller=empleado&method=proveedores";
          </script>' : '<script type="text/javascript">
          alert("Proveedor creado con éxito");window.location.href="?controller=empleado&method=proveedores";
          </script>';
}

public function update_proveedor(){
    $proveedor = parent::find_proveedor($_GET['CodiProve']);
    $title = "Modificar proveedor | Inventario El Alfa";
    require_once 'views/layouts/header_empleado.php';
    require_once 'views/empleado/modificar_proveedor.php';
    require_once 'views/layouts/footer_empleado.php';
 }
 
 public function actualizar_proveedor(){
 echo parent::modificar_proveedor($_POST) ? '<script type="text/javascript">
       alert("Actualizando datos..!");window.location.href="?controller=empleado&method=proveedores";
       </script>' : '<script type="text/javascript">
       alert("Actualizando datos..!");window.location.href="?controller=empleado&method=proveedores";
       </script>';
 }

 public function state_proveedor(){
    $proveedor = parent::find_proveedor($_GET['CodiProve']);
    if($proveedor->estado==1){
        echo parent::inactivar_proveedor($_POST) ? '<script type="text/javascript">
        alert("Cambiando estado..!");window.location.href="?controller=empleado&method=proveedores";
        </script>' : '<script type="text/javascript">
        alert("Cambiando estado..!");window.location.href="?controller=empleado&method=proveedores";
        </script>';
    }else if($proveedor->estado==2){
        echo parent::activar_proveedor($_POST) ? '<script type="text/javascript">
        alert("Cambiando estado..!");window.location.href="?controller=empleado&method=proveedores";
        </script>' : '<script type="text/javascript">
        alert("Cambiando estado..!");window.location.href="?controller=empleado&method=proveedores";
        </script>';
    }
}

public function productos(){
    $title = "Productos | Inventario El Alfa";
    require_once 'views/layouts/header_empleado.php';
    require_once 'views/empleado/productos.php';
    require_once 'views/layouts/footer_empleado.php';
}

public function agregar_productos(){
    $title = "Agregar productos | Inventario El Alfa";
    require_once 'views/layouts/header_empleado.php';
    require_once 'views/empleado/agregar_productos.php';
    require_once 'views/layouts/footer_empleado.php';
}

public function crear_productos(){
    echo parent::create_product($_POST) ? '<script type="text/javascript">
    alert("¡Producto registrado con éxito!");window.location.href="?controller=empleado&method=productos";
    </script>' : '<script type="text/javascript">
    alert("¡Producto registrado con éxito!");window.location.href="?controller=empleado&method=productos";
    </script>';
}

public function update_productos(){
    $producto = parent::find_productos($_GET['idprod']);
    $title = "Editar productos | Inventario El Alfa";
    require_once 'views/layouts/header_empleado.php';
    require_once 'views/empleado/update_productos.php';
    require_once 'views/layouts/footer_empleado.php';
}

public function actualizar_productos(){
    echo parent::edit_product($_POST) ? '<script type="text/javascript">
    alert("¡Producto actualizado con éxito!");window.location.href="?controller=empleado&method=productos";
    </script>' : '<script type="text/javascript">
    alert("¡Producto actualizado con éxito!");window.location.href="?controller=empleado&method=productos";
    </script>';
}



public function state_productos(){
    $producto = parent::find_productos($_GET['idprod']);
    if($producto->Estado == "Disponible"){
        echo parent::agt_state_product($_GET['idprod']) ? '<script type="text/javascript">
        alert("¡Cambiando estado...!");window.location.href="?controller=empleado&method=productos";
        </script>' : '<script type="text/javascript">
        alert("¡Cambiando estado...!");window.location.href="?controller=empleado&method=productos";
        </script>';

    }else if($producto->Estado == "Agotado"){
        echo parent::dis_state_product($_GET['idprod']) ? '<script type="text/javascript">
        alert("¡Cambiando estado...!");window.location.href="?controller=empleado&method=productos";
        </script>' : '<script type="text/javascript">
        alert("¡Cambiando estado...!");window.location.href="?controller=empleado&method=productos";
        </script>';

    }
}

public function categorias(){
    $title = "Categorias | Inventario El Alfa";
    require_once 'views/layouts/header_empleado.php';
    require_once 'views/empleado/categorias.php';
    require_once 'views/layouts/footer_empleado.php';
}

public function tipomovimiento(){
    $title = "Tipo de movimiento | Inventario El Alfa";
    require_once 'views/layouts/header_empleado.php';
    require_once 'views/empleado/tipomovimiento.php';
    require_once 'views/layouts/footer_empleado.php';
}

public function inventario(){
    $title = "Inventario de productos | Inventario El Alfa";
    require_once 'views/layouts/header_empleado.php';
    require_once 'views/empleado/inventario.php';
    require_once 'views/layouts/footer_empleado.php';
}

public function ingresar_producto(){
    $title = "Inventario de productos | Inventario El Alfa";
    require_once 'views/layouts/header_empleado.php';
    require_once 'views/empleado/ingresar_producto.php';
    require_once 'views/layouts/footer_empleado.php';
}

public function insert_product(){
    
$producto = parent::find_inventario($_POST);
if(isset($producto->producto_id)){
    echo parent::editplusinventarioproducts($_POST) ? '<script type="text/javascript">
    alert("¡Producto insertado con éxito!");window.location.href="?controller=empleado&method=inventario";
    </script>' : '<script type="text/javascript">
    alert("¡Producto insertado con éxito!");window.location.href="?controller=empleado&method=inventario";
    </script>';
}else{
    echo parent::store_product($_POST) ? '<script type="text/javascript">
    alert("¡Producto insertado con éxito!");window.location.href="?controller=empleado&method=inventario";
    </script>' : '<script type="text/javascript">
    alert("¡Producto insertado con éxito!");window.location.href="?controller=empleado&method=inventario";
    </script>';
}
parent::add_movimiento($_POST); 
}

public function cargo(){
    $title = "Cargos | Inventario El Alfa";
    require_once 'views/layouts/header_empleado.php';
    require_once 'views/empleado/cargo.php';
    require_once 'views/layouts/footer_empleado.php';
}

public function movimientos(){
    $title = "Movimientos | Inventario El Alfa";
    require_once 'views/layouts/header_empleado.php';
    require_once 'views/empleado/movimientos.php';
    require_once 'views/layouts/footer_empleado.php';
}

public function devoluciones(){
    $title = "Devoluciones | Inventario El Alfa";
    require_once 'views/layouts/header_empleado.php';
    require_once 'views/empleado/devoluciones.php';
    require_once 'views/layouts/footer_empleado.php';
}

public function agregar_devoluciones(){
    $title = "Ingresar devoluciones | Inventario El Alfa";
    require_once 'views/layouts/header_empleado.php';
    require_once 'views/empleado/agregar_devoluciones.php';
    require_once 'views/layouts/footer_empleado.php';
}

public function insert_devolucion(){
    echo parent::add_devolucion($_POST) ? '<script type="text/javascript">
    alert("¡Generando devolución!");window.location.href="?controller=empleado&method=devoluciones";
    </script>' : '<script type="text/javascript">
    alert("¡Generando devolución!");window.location.href="?controller=empleado&method=devoluciones";
    </script>';
    parent::add_movimiento_dev($_POST);
}

public function revertir(){
 $producto = parent::find_producto_revertir($_GET['id_movimiento']);
 $total = $producto->total;
 $producto_id = $producto->producto_id;
 $id_movimiento = $producto->id_movimiento;
 $fecha = $producto->fecha;
 $find = parent::buscar_devolucion($fecha);
 if($producto->tipomovimiento_id == 1){
    echo parent::restaurarsuma($total, $producto_id) ? '<script type="text/javascript">
    alert("¡Generando restauración!");window.location.href="?controller=empleado&method=inventario";
    </script>' : '<script type="text/javascript">
    alert("¡Generando restauración!");window.location.href="?controller=empleado&method=inventario";
    </script>';
 }else if($producto->tipomovimiento_id == 3){
    echo parent::restaurardevolucion($find->id_devolucion) ? '<script type="text/javascript">
    alert("¡Generando restauración!");window.location.href="?controller=empleado&method=inventario";
    </script>' : '<script type="text/javascript">
    alert("¡Generando restauración!");window.location.href="?controller=empleado&method=inventario";
    </script>';
 }
 parent::eliminar_movimiento($id_movimiento);
}

public function revertir_exit(){
    $producto = parent::find_producto_revertir_exit($_GET['id_movimiento']);

    $find = parent::find_factura($producto->factura_id);

    $array_js = json_decode($find->productos);

    foreach($array_js as $array){
     parent::restaurarresta($array->cantidad, $array->idprod);
    }
    parent::eliminar_factura($producto->factura_id);
    echo parent::eliminar_movimiento($producto->id_movimiento)? '<script type="text/javascript">
    alert("¡Generando restauración!");window.location.href="?controller=empleado&method=inventario";
    </script>' : '<script type="text/javascript">
    alert("¡Generando restauración!");window.location.href="?controller=empleado&method=inventario";
    </script>';

   }
   
public function clientes(){
    $title = "Clientes | Inventario El Alfa";
    require_once 'views/layouts/header_empleado.php';
    require_once 'views/empleado/clientes.php';
    require_once 'views/layouts/footer_empleado.php';
}

public function agregar_clientes(){
    $title = "Clientes | Inventario El Alfa";
    require_once 'views/layouts/header_empleado.php';
    require_once 'views/empleado/agregar_clientes.php';
    require_once 'views/layouts/footer_empleado.php';
}

public function crear_personas(){
    echo parent::crear_persona($_POST) ? '<script type="text/javascript">
    alert("¡Cliente creado con éxito!");window.location.href="?controller=empleado&method=clientes";
    </script>' : '<script type="text/javascript">
    alert("¡Cliente creado con éxito!");window.location.href="?controller=empleado&method=clientes";
    </script>';
}

public function editar_clientes(){
    $persona = parent::personas_c($_GET['id_persona']);
    $title = "Actualizar cliente | Inventario El Alfa";
    require_once 'views/layouts/header_empleado.php';
    require_once 'views/empleado/editar_clientes.php';
    require_once 'views/layouts/footer_empleado.php';
}

public function actualizar_personas(){
    echo parent::update_persona($_POST) ? '<script type="text/javascript">
    alert("¡Cliente actualizado con éxito!");window.location.href="?controller=empleado&method=clientes";
    </script>' : '<script type="text/javascript">
    alert("¡Cliente actualizado con éxito!");window.location.href="?controller=empleado&method=clientes";
    </script>';
}

public function facturas(){
    $title = "Facturas | Inventario El Alfa";
    require_once 'views/layouts/header_empleado.php';
    require_once 'views/empleado/facturas.php';
    require_once 'views/layouts/footer_empleado.php';
}

public function movimientos_de_salida(){
    $title = "Movimientos de salida | Inventario El Alfa";
    require_once 'views/layouts/header_empleado.php';
    require_once 'views/empleado/movimientos_de_salida.php';
    require_once 'views/layouts/footer_empleado.php';
}

public function crear_factura(){
    $fact = parent::facturas_codigo_facturas();
    $title = "Generar factura | Inventario El Alfa";
    require_once 'views/layouts/header_empleado.php';
    require_once 'views/empleado/crear_facturas.php';
    require_once 'views/layouts/footer_empleado.php';
}

public function registrar_factura(){
 echo parent::create_sale($_POST)? '<script type="text/javascript">
 alert("¡Factura creada con éxito!");window.location.href="?controller=empleado&method=facturas";
 </script>' : '<script type="text/javascript">
 alert("¡Factura creada con éxito!");window.location.href="?controller=empleado&method=facturas";
 </script>';
 parent::add_movimiento_exit($_POST);
 $consulta = parent::find_factura_for_less($_POST['codigo_factura']);
 $array_js = json_decode($_POST['productos']);
 foreach($array_js as $arr){
   $producto_id = $arr->idprod;
   $total = $arr->cantidad;
   parent::editlessinventarioproducts_exit($total, $producto_id);
  }
}

public function fpdf(){
    $codigo = $_GET['id_factura'];
    $productos = parent::fpdf_productos($_GET['id_factura']);
    $array_js = json_decode($productos->productos);
   $title = 'Factura';
   require_once 'views/empleado/fpdf.php';
}
}