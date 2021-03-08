<?php

class adminController extends admin{

    public function index(){
        $title = "Administrador | Inventario El Alfa";
        require_once 'views/layouts/header_admin.php';
        require_once 'views/admin/index.php';
        require_once 'views/layouts/footer_admin.php';
    }

    public function usuarios(){
        $title = "Ver usuarios | Inventario El Alfa";
        require_once 'views/layouts/header_admin.php';
        require_once 'views/admin/usuarios.php';
        require_once 'views/layouts/footer_admin.php';
    }

    public function registro(){
        $title = "Inventario El Alfa";
        require_once 'views/layouts/header_admin.php';
        require_once 'views/admin/create_user.php';
        require_once 'views/layouts/footer_admin.php';
       }
//crear usuario
public function crear_usuario(){

    $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $registro = parent::register($_POST);

    if($registro){
       $date = $_POST['email'];
       $email = parent::query($date);
       $title = 'Pregunta de seguridad';
          require_once 'views/layouts/header_admin.php';
          require_once 'views/admin/pregunta.php';
          require_once 'views/layouts/footer_admin.php';
    }else{
       echo '<script type="text/javascript">
       alert("Error en el registro");window.location.href="?controller=admin&method=usuarios";
       </script>';
    }
 }
   
 public function user_update_state(){
    $estado = parent::find_user($_GET['id']);
    $user = $_GET['id'];
    
    if($estado->estado==1){
        echo parent::inactivar_user($user) ? '<script type="text/javascript">
    alert("Cambiando estado...!");window.location.href="?controller=admin&method=usuarios";
    </script>' : '<script type="text/javascript">
    alert("Error al cambiar el registro de usuario!");window.location.href="?controller=admin&method=usuarios";
    </script>';
    }else if($estado->estado==2){
        echo parent::activar_user($user) ? '<script type="text/javascript">
    alert("Cambiando estado...!");window.location.href="?controller=admin&method=usuarios";
    </script>' : '<script type="text/javascript">
    alert("Error al cambiar el registro de usuario!");window.location.href="?controller=admin&method=usuarios";
    </script>';
    }
 }

 public function seguridad(){
    echo parent::guardar_pregunta($_POST) ? '<script type="text/javascript">
    alert("Registro realizado con éxito");window.location.href="?controller=admin&method=usuarios";
    </script>' : '<script type="text/javascript">
    alert("Error en el registro");window.location.href="?controller=admin&method=usuarios";
    </script>';
 }

    
    public function seguridades(){
        $title = "Preguntas de seguridad | Inventario El Alfa";
        require_once 'views/layouts/header_admin.php';
        require_once 'views/admin/preguntas_seguridad.php';
        require_once 'views/layouts/footer_admin.php';
    }

    public function create_answer(){
        $title = "Crear pregunta de seguridad | Inventario El Alfa";
        require_once 'views/layouts/header_admin.php';
        require_once 'views/admin/create_answer.php';
        require_once 'views/layouts/footer_admin.php';
    }

    public function crear_pregunta(){
        echo parent::new_question($_POST) ? '<script type="text/javascript">
        alert("Pregunta registrada con éxito");window.location.href="?controller=admin&method=seguridades";
        </script>' : '<script type="text/javascript">
        alert("Error la creación de pregunta");window.location.href="?controller=admin&method=seguridades";
        </script>';
     }

     public function question_update(){
        $pregunta = parent::find_answer($_GET['id_pregunta']);
        $title = "Modificar pregunta | Inventario El Alfa";
        require_once 'views/layouts/header_admin.php';
        require_once 'views/admin/edit_answer.php';
        require_once 'views/layouts/footer_admin.php';
    }

    public function actualizar_pregunta(){
        echo parent::update_question($_POST) ? '<script type="text/javascript">
        alert("Pregunta actualizada con éxito");window.location.href="?controller=admin&method=seguridades";
        </script>' : '<script type="text/javascript">
        alert("Error la actualización de pregunta");window.location.href="?controller=admin&method=seguridades";
        </script>';
     }

     public function preguntas_usuario(){
        $title = "Preguntas de usuario | Inventario El Alfa";
        require_once 'views/layouts/header_admin.php';
        require_once 'views/admin/preguntas_usuario.php';
        require_once 'views/layouts/footer_admin.php';
    }
    
    public function profile(){
        $user = parent::user($_GET['id']);
        $question = parent::user_question($_GET['id']);
        $title = "Mi perfil | Inventario El Alfa";
        require_once 'views/layouts/header_admin.php';
        require_once 'views/admin/profile.php';
        require_once 'views/layouts/footer_admin.php';
    }

    public function edit_profile(){
        $user = parent::user($_GET['id']);
        $title = "Editar mi perfil | Inventario El Alfa";
        require_once 'views/layouts/header_admin.php';
        require_once 'views/admin/edit_profile.php';
        require_once 'views/layouts/footer_admin.php';
    }

    public function editar_datos_perfil(){
        echo parent::update_profile_personal($_POST) ? '<script type="text/javascript">
        alert("Perfil actualizado con éxito, vuelve a iniciar sesión para ver los cambios guardados");window.location.href="?controller=admin";
        </script>' : '<script type="text/javascript">
        alert("Error la actualización del perfil");window.location.href="?controller=admin";
        </script>';
     }

     public function edit_profile_question(){
        $user = parent::user($_GET['id']);
        $question = parent::user_question($_GET['id']);
        $title = "Editar mi respuesta | Inventario El Alfa";
        require_once 'views/layouts/header_admin.php';
        require_once 'views/admin/edit_profile_question.php';
        require_once 'views/layouts/footer_admin.php';
    }

    public function editar_respuesta_perfil(){
        echo parent::update_profile_personal_question($_POST) ? '<script type="text/javascript">
        alert("Respuesta actualizada con éxito");window.location.href="?controller=admin";
        </script>' : '<script type="text/javascript">
        alert("Error la actualización de la respuesta");window.location.href="?controller=admin";
        </script>';
     }

     public function change_passwords(){
        $user = parent::user($_GET['id']);
        $title = "Editar mis contraseñas | Inventario El Alfa";
        require_once 'views/layouts/header_admin.php';
        require_once 'views/admin/change_passwords.php';
        require_once 'views/layouts/footer_admin.php';
    }

    public function cambiar(){
        $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
         
        echo parent::update_password($_POST) ? '<script type="text/javascript">
              alert("Contraseñas modificadas con éxito");window.location.href="?controller=admin";
              </script>' : '<script type="text/javascript">
              alert("Contraseñas modificadas con éxito");window.location.href="?controller=admin";
              </script>';
          }

          public function categorias(){
             $title = "Categorías | Inventario El Alfa";
             require_once 'views/layouts/header_admin.php';
             require_once 'views/admin/categorias.php';
             require_once 'views/layouts/footer_admin.php';
         }

         public function agregar_categorias(){
            $title = "Agregar categorías | Inventario El Alfa";
            require_once 'views/layouts/header_admin.php';
            require_once 'views/admin/agregar_categorias.php';
            require_once 'views/layouts/footer_admin.php';
        }

        public function crear_categoria(){
             echo parent::register_categories($_POST) ? '<script type="text/javascript">
                  alert("Categoría registrada con éxito");window.location.href="?controller=admin&method=categorias";
                  </script>' : '<script type="text/javascript">
                  alert("Categoría registrada con éxito");window.location.href="?controller=admin&method=categorias";
                  </script>';
        }

       public function modificar_estado_categorias(){
           $estado = parent::query_category_state($_GET['idCate']);
           $id = $_GET['idCate'];
           if($estado->estado==1){
            echo parent::inactivar_categoria($id) ? '<script type="text/javascript">
                  alert("Actualizando estado...!");window.location.href="?controller=admin&method=categorias";
                  </script>' : '<script type="text/javascript">
                  alert("Actualizando estado...!");window.location.href="?controller=admin&method=categorias";
                  </script>';
           }else if($estado->estado==2){
            echo parent::activar_categoria($id) ? '<script type="text/javascript">
            alert("Actualizando estado...!");window.location.href="?controller=admin&method=categorias";
            </script>' : '<script type="text/javascript">
            alert("Actualizando estado...!");window.location.href="?controller=admin&method=categorias";
            </script>';
           }
        }

        
        public function modificar_categorias(){
            $cat = parent::query_category_state($_GET['idCate']);
            $title = "Modificar categorías | Inventario El Alfa";
            require_once 'views/layouts/header_admin.php';
            require_once 'views/admin/modificar_categorias.php';
            require_once 'views/layouts/footer_admin.php';
        }

        public function actualizar_categoria(){
            echo parent::update_categories($_POST) ? '<script type="text/javascript">
                 alert("Categoría actualizada con éxito");window.location.href="?controller=admin&method=categorias";
                 </script>' : '<script type="text/javascript">
                 alert("Categoría actualizada con éxito");window.location.href="?controller=admin&method=categorias";
                 </script>';
       }

         public function tipomovimientos(){
            $title = "Tipo de movimientos | Inventario El Alfa";
            require_once 'views/layouts/header_admin.php';
            require_once 'views/admin/tipomovimientos.php';
            require_once 'views/layouts/footer_admin.php';
        }

        public function agregar_tipomovimientos(){
            $title = "Agregar tipo de movimientos | Inventario El Alfa";
            require_once 'views/layouts/header_admin.php';
            require_once 'views/admin/agregar_tipomovimientos.php';
            require_once 'views/layouts/footer_admin.php';
        }

        public function crear_tipomovimiento(){
             echo parent::register_typemoves($_POST) ? '<script type="text/javascript">
                  alert("Tipo de movimiento registrado con éxito");window.location.href="?controller=admin&method=tipomovimientos";
                  </script>' : '<script type="text/javascript">
                  alert("Tipo de movimiento registrado con éxito");window.location.href="?controller=admin&method=tipomovimientos";
                  </script>';
        }

        public function modificar_tipomovimientos(){
            $move = parent::find_typemoves($_GET['Idmovi']);
            $title = "Modificar tipo de movimientos | Inventario El Alfa";
            require_once 'views/layouts/header_admin.php';
            require_once 'views/admin/modificar_tipomovimientos.php';
            require_once 'views/layouts/footer_admin.php';
        }

        public function actualizar_tipomovimiento(){
             echo parent::update_typemoves($_POST) ? '<script type="text/javascript">
                  alert("Tipo de movimiento actualizado con éxito");window.location.href="?controller=admin&method=tipomovimientos";
                  </script>' : '<script type="text/javascript">
                  alert("Tipo de movimiento actualizado con éxito");window.location.href="?controller=admin&method=tipomovimientos";
                  </script>';
        }

        public function cargos(){
           $title = "Cargos | Inventario El Alfa";
           require_once 'views/layouts/header_admin.php';
           require_once 'views/admin/cargos.php';
           require_once 'views/layouts/footer_admin.php';
       }
    
       public function agregar_cargos(){
        $title = "Agregar cargo | Inventario El Alfa";
        require_once 'views/layouts/header_admin.php';
        require_once 'views/admin/agregar_cargos.php';
        require_once 'views/layouts/footer_admin.php';
    }
    public function crear_cargo(){
        echo parent::register_roles($_POST) ? '<script type="text/javascript">
             alert("Cargo registrado con éxito");window.location.href="?controller=admin&method=cargos";
             </script>' : '<script type="text/javascript">
             alert("Cargo registrado con éxito");window.location.href="?controller=admin&method=cargos";
             </script>';
   }
    
   public function modificar_cargos(){
    $role = parent::find_roles($_GET['CodiCargo']);
    $title = "Modificar cargo | Inventario El Alfa";
    require_once 'views/layouts/header_admin.php';
    require_once 'views/admin/modificar_cargos.php';
    require_once 'views/layouts/footer_admin.php';
}
public function actualizar_cargo(){
    echo parent::update_cargo($_POST) ? '<script type="text/javascript">
         alert("Cargo registrado con éxito");window.location.href="?controller=admin&method=cargos";
         </script>' : '<script type="text/javascript">
         alert("Cargo registrado con éxito");window.location.href="?controller=admin&method=cargos";
         </script>';
}


public function proveedores(){
    $title = "Proveedores | Inventario El Alfa";
    require_once 'views/layouts/header_admin.php';
    require_once 'views/admin/proveedores.php';
    require_once 'views/layouts/footer_admin.php';
}

public function agregar_proveedor(){
   $title = "Agregar proveedor | Inventario El Alfa";
   require_once 'views/layouts/header_admin.php';
   require_once 'views/admin/agregar_proveedor.php';
   require_once 'views/layouts/footer_admin.php';
}

public function crear_proveedor(){
echo parent::create_proveedor($_POST) ? '<script type="text/javascript">
      alert("Proveedor creado con éxito");window.location.href="?controller=admin&method=proveedores";
      </script>' : '<script type="text/javascript">
      alert("Proveedor creado con éxito");window.location.href="?controller=admin&method=proveedores";
      </script>';
}

public function update_proveedor(){
$proveedor = parent::find_proveedor($_GET['CodiProve']);
$title = "Modificar proveedor | Inventario El Alfa";
require_once 'views/layouts/header_admin.php';
require_once 'views/admin/modificar_proveedor.php';
require_once 'views/layouts/footer_admin.php';
}

public function actualizar_proveedor(){
echo parent::modificar_proveedor($_POST) ? '<script type="text/javascript">
   alert("Actualizando datos..!");window.location.href="?controller=admin&method=proveedores";
   </script>' : '<script type="text/javascript">
   alert("Actualizando datos..!");window.location.href="?controller=admin&method=proveedores";
   </script>';
}

public function state_proveedor(){
$proveedor = parent::find_proveedor($_GET['CodiProve']);
if($proveedor->estado==1){
    echo parent::inactivar_proveedor($_POST) ? '<script type="text/javascript">
    alert("Cambiando estado..!");window.location.href="?controller=admin&method=proveedores";
    </script>' : '<script type="text/javascript">
    alert("Cambiando estado..!");window.location.href="?controller=admin&method=proveedores";
    </script>';
}else if($proveedor->estado==2){
    echo parent::activar_proveedor($_POST) ? '<script type="text/javascript">
    alert("Cambiando estado..!");window.location.href="?controller=admin&method=proveedores";
    </script>' : '<script type="text/javascript">
    alert("Cambiando estado..!");window.location.href="?controller=admin&method=proveedores";
    </script>';
}
}

public function productos(){
$title = "Productos | Inventario El Alfa";
require_once 'views/layouts/header_admin.php';
require_once 'views/admin/productos.php';
require_once 'views/layouts/footer_admin.php';
}

public function agregar_productos(){
$title = "Agregar productos | Inventario El Alfa";
require_once 'views/layouts/header_admin.php';
require_once 'views/admin/agregar_productos.php';
require_once 'views/layouts/footer_admin.php';
}

public function crear_productos(){
echo parent::create_product($_POST) ? '<script type="text/javascript">
alert("¡Producto registrado con éxito!");window.location.href="?controller=admin&method=productos";
</script>' : '<script type="text/javascript">
alert("¡Producto registrado con éxito!");window.location.href="?controller=admin&method=productos";
</script>';
}

public function update_productos(){
$producto = parent::find_productos($_GET['idprod']);
$title = "Editar productos | Inventario El Alfa";
require_once 'views/layouts/header_admin.php';
require_once 'views/admin/update_productos.php';
require_once 'views/layouts/footer_admin.php';
}

public function actualizar_productos(){
echo parent::edit_product($_POST) ? '<script type="text/javascript">
alert("¡Producto actualizado con éxito!");window.location.href="?controller=admin&method=productos";
</script>' : '<script type="text/javascript">
alert("¡Producto actualizado con éxito!");window.location.href="?controller=admin&method=productos";
</script>';
}



public function state_productos(){
$producto = parent::find_productos($_GET['idprod']);
if($producto->Estado == "Disponible"){
    echo parent::agt_state_product($_GET['idprod']) ? '<script type="text/javascript">
    alert("¡Cambiando estado...!");window.location.href="?controller=admin&method=productos";
    </script>' : '<script type="text/javascript">
    alert("¡Cambiando estado...!");window.location.href="?controller=admin&method=productos";
    </script>';

}else if($producto->Estado == "Agotado"){
    echo parent::dis_state_product($_GET['idprod']) ? '<script type="text/javascript">
    alert("¡Cambiando estado...!");window.location.href="?controller=admin&method=productos";
    </script>' : '<script type="text/javascript">
    alert("¡Cambiando estado...!");window.location.href="?controller=admin&method=productos";
    </script>';

}
}

public function tipomovimiento(){
$title = "Tipo de movimiento | Inventario El Alfa";
require_once 'views/layouts/header_admin.php';
require_once 'views/admin/tipomovimiento.php';
require_once 'views/layouts/footer_admin.php';
}

public function inventario(){
$title = "Inventario de productos | Inventario El Alfa";
require_once 'views/layouts/header_admin.php';
require_once 'views/admin/inventario.php';
require_once 'views/layouts/footer_admin.php';
}

public function ingresar_producto(){
$title = "Inventario de productos | Inventario El Alfa";
require_once 'views/layouts/header_admin.php';
require_once 'views/admin/ingresar_producto.php';
require_once 'views/layouts/footer_admin.php';
}

public function insert_product(){

$producto = parent::find_inventario($_POST);
if(isset($producto->producto_id)){
echo parent::editplusinventarioproducts($_POST) ? '<script type="text/javascript">
alert("¡Producto insertado con éxito!");window.location.href="?controller=admin&method=inventario";
</script>' : '<script type="text/javascript">
alert("¡Producto insertado con éxito!");window.location.href="?controller=admin&method=inventario";
</script>';
}else{
echo parent::store_product($_POST) ? '<script type="text/javascript">
alert("¡Producto insertado con éxito!");window.location.href="?controller=admin&method=inventario";
</script>' : '<script type="text/javascript">
alert("¡Producto insertado con éxito!");window.location.href="?controller=admin&method=inventario";
</script>';
}
parent::add_movimiento($_POST); 
}

public function cargo(){
$title = "Cargos | Inventario El Alfa";
require_once 'views/layouts/header_admin.php';
require_once 'views/admin/cargo.php';
require_once 'views/layouts/footer_admin.php';
}

public function movimientos(){
$title = "Movimientos | Inventario El Alfa";
require_once 'views/layouts/header_admin.php';
require_once 'views/admin/movimientos.php';
require_once 'views/layouts/footer_admin.php';
}

public function devoluciones(){
$title = "Devoluciones | Inventario El Alfa";
require_once 'views/layouts/header_admin.php';
require_once 'views/admin/devoluciones.php';
require_once 'views/layouts/footer_admin.php';
}

public function agregar_devoluciones(){
$title = "Ingresar devoluciones | Inventario El Alfa";
require_once 'views/layouts/header_admin.php';
require_once 'views/admin/agregar_devoluciones.php';
require_once 'views/layouts/footer_admin.php';
}

public function insert_devolucion(){
echo parent::add_devolucion($_POST) ? '<script type="text/javascript">
alert("¡Generando devolución!");window.location.href="?controller=admin&method=devoluciones";
</script>' : '<script type="text/javascript">
alert("¡Generando devolución!");window.location.href="?controller=admin&method=devoluciones";
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
alert("¡Generando restauración!");window.location.href="?controller=admin&method=inventario";
</script>' : '<script type="text/javascript">
alert("¡Generando restauración!");window.location.href="?controller=admin&method=inventario";
</script>';
}else if($producto->tipomovimiento_id == 3){
echo parent::restaurardevolucion($find->id_devolucion) ? '<script type="text/javascript">
alert("¡Generando restauración!");window.location.href="?controller=admin&method=inventario";
</script>' : '<script type="text/javascript">
alert("¡Generando restauración!");window.location.href="?controller=admin&method=inventario";
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
alert("¡Generando restauración!");window.location.href="?controller=admin&method=inventario";
</script>' : '<script type="text/javascript">
alert("¡Generando restauración!");window.location.href="?controller=admin&method=inventario";
</script>';

}

public function clientes(){
$title = "Clientes | Inventario El Alfa";
require_once 'views/layouts/header_admin.php';
require_once 'views/admin/clientes.php';
require_once 'views/layouts/footer_admin.php';
}

public function agregar_clientes(){
$title = "Clientes | Inventario El Alfa";
require_once 'views/layouts/header_admin.php';
require_once 'views/admin/agregar_clientes.php';
require_once 'views/layouts/footer_admin.php';
}

public function crear_personas(){
echo parent::crear_persona($_POST) ? '<script type="text/javascript">
alert("¡Cliente creado con éxito!");window.location.href="?controller=admin&method=clientes";
</script>' : '<script type="text/javascript">
alert("¡Cliente creado con éxito!");window.location.href="?controller=admin&method=clientes";
</script>';
}

public function editar_clientes(){
$persona = parent::personas_c($_GET['id_persona']);
$title = "Actualizar cliente | Inventario El Alfa";
require_once 'views/layouts/header_admin.php';
require_once 'views/admin/editar_clientes.php';
require_once 'views/layouts/footer_admin.php';
}

public function actualizar_personas(){
echo parent::update_persona($_POST) ? '<script type="text/javascript">
alert("¡Cliente actualizado con éxito!");window.location.href="?controller=admin&method=clientes";
</script>' : '<script type="text/javascript">
alert("¡Cliente actualizado con éxito!");window.location.href="?controller=admin&method=clientes";
</script>';
}

public function facturas(){
$title = "Facturas | Inventario El Alfa";
require_once 'views/layouts/header_admin.php';
require_once 'views/admin/facturas.php';
require_once 'views/layouts/footer_admin.php';
}

public function movimientos_de_salida(){
$title = "Movimientos de salida | Inventario El Alfa";
require_once 'views/layouts/header_admin.php';
require_once 'views/admin/movimientos_de_salida.php';
require_once 'views/layouts/footer_admin.php';
}

public function crear_factura(){
$fact = parent::facturas_codigo_facturas();
$title = "Generar factura | Inventario El Alfa";
require_once 'views/layouts/header_admin.php';
require_once 'views/admin/crear_facturas.php';
require_once 'views/layouts/footer_admin.php';
}

public function registrar_factura(){
echo parent::create_sale($_POST)? '<script type="text/javascript">
alert("¡Factura creada con éxito!");window.location.href="?controller=admin&method=facturas";
</script>' : '<script type="text/javascript">
alert("¡Factura creada con éxito!");window.location.href="?controller=admin&method=facturas";
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
require_once 'views/admin/fpdf.php';
}

}   
