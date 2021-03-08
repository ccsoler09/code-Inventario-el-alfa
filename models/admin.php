<?php
class admin extends Database{

    public function register($data){
        try{
        $result = parent::connection()->prepare("INSERT INTO registros (estado, cargo, nombre, email, password) VALUES (1, ?, ?,?,?)");
        $result->bindParam(1,$data['cargo'], PDO::PARAM_STR);
        $result->bindParam(2,$data['nombre'], PDO::PARAM_STR);
        $result->bindParam(3,$data['email'], PDO::PARAM_STR);
        $result->bindParam(4,$data['password'], PDO::PARAM_STR);
        return $result->execute();

        }catch(Exception $e){
            die("No se logro realizar el registro" . $e->getMessage());
        }
    }

    public function query($datas){
        try{
        $result = parent::connection()->prepare("SELECT * FROM registros WHERE email = ?");
        $result->bindParam(1,$datas, PDO::PARAM_STR);
        $result->execute();
        return $result->fetch();

        }catch(Exception $e){
            die('<script type="text/javascript">
            alert("No se logró realizar el registro");window.location.href="?controller=admin&method=edit_medium";
            </script>' . $e->getMessage());
        }
    }

    public function guardar_pregunta($data){
        try{
        $result = parent::connection()->prepare("INSERT INTO seguridades (pregunta_id, usuario_id, respuesta) VALUES (?,?,?)");
        $result->bindParam(1,$data['pregunta_id'], PDO::PARAM_STR);
        $result->bindParam(2,$data['usuario_id'], PDO::PARAM_STR);
        $result->bindParam(3,$data['respuesta'], PDO::PARAM_STR);
        return $result->execute();

        }catch(Exception $e){
            die("No se logro realizar el registro" . $e->getMessage());
        }
    }

    public function cargos(){
        try{
        $result = parent::connection()->prepare("SELECT * FROM cargo");
        $result->execute();
        return $result->fetchAll();

        }catch(Exception $e){
            die('<script type="text/javascript">
            alert("No se logró realizar el registro");window.location.href="?controller=admin&method=edit_medium";
            </script>' . $e->getMessage());
        }
    }

    public function query_questions(){
        try{
        $result = parent::connection()->prepare("SELECT * FROM preguntas");
        $result->execute();
        return $result->fetchAll();

        }catch(Exception $e){
            die("No se logro realizar el registro" . $e->getMessage());
        }
    }

    public function empleados(){
        try{
        $result = parent::connection()->prepare("SELECT * FROM registros INNER JOIN cargo ON registros.cargo = cargo.CodiCargo INNER JOIN estados ON registros.estado = estados.id_estado WHERE cargo = 1");
        $result->execute();
        return $result->fetchAll();

        }catch(Exception $e){
            die('<script type="text/javascript">
            alert("No se logró realizar el registro");window.location.href="?controller=admin&method=edit_medium";
            </script>' . $e->getMessage());
        }
    }

    public function find_user(){
        try{
        $result = parent::connection()->prepare("SELECT * FROM registros WHERE id = ?");
        $result->bindParam(1, $_GET['id'], PDO::PARAM_STR);
        $result->execute();
        return $result->fetch();

        }catch(Exception $e){
            die('<script type="text/javascript">
            alert("No se logró realizar el registro");window.location.href="?controller=admin&method=edit_medium";
            </script>' . $e->getMessage());
        }
    }


    public function activar_user($data){
        try{
        $result = parent::connection()->prepare("UPDATE registros SET estado = 1 WHERE id= ?");
        $result->bindParam(1,$data, PDO::PARAM_INT);
        return $result->execute();

        }catch(Exception $e){
            die("No se logro realizar el registro" . $e->getMessage());
        }
    }

    public function inactivar_user($data){
        try{
        $result = parent::connection()->prepare("UPDATE registros SET estado = 2 WHERE id= ?");
        $result->bindParam(1,$data, PDO::PARAM_INT);
        return $result->execute();

        }catch(Exception $e){
            die("No se logro realizar el registro" . $e->getMessage());
        }
    }

    public function find_questions(){
        try{
        $result = parent::connection()->prepare("SELECT * FROM preguntas");
        $result->execute();
        return $result->fetchAll();

        }catch(Exception $e){
            die('<script type="text/javascript">
            alert("No se logró realizar el registro");window.location.href="?controller=admin&method=edit_medium";
            </script>' . $e->getMessage());
        }
    }

    public function new_question($data){
        try{
        $result = parent::connection()->prepare("INSERT INTO preguntas (pregunta) VALUES (?)");
        $result->bindParam(1,$data['pregunta'], PDO::PARAM_STR);
        return $result->execute();

        }catch(Exception $e){
            die("No se logro realizar el registro" . $e->getMessage());
        }
    }

    public function find_answer(){
        try{
        $result = parent::connection()->prepare("SELECT * FROM preguntas WHERE id_pregunta = ?");
        $result->bindParam(1,$_GET['id_pregunta'], PDO::PARAM_STR);
        $result->execute();
        return $result->fetch();

        }catch(Exception $e){
            die("No se logro realizar el registro" . $e->getMessage());
        }
    }

    public function update_question($data){
        try{
        $result = parent::connection()->prepare("UPDATE preguntas SET pregunta = ? WHERE id_pregunta = ?");
        $result->bindParam(1,$data['pregunta'], PDO::PARAM_STR);
        $result->bindParam(2,$data['id_pregunta'], PDO::PARAM_STR);
        return $result->execute();

        }catch(Exception $e){
            die("No se logro realizar el registro" . $e->getMessage());
        }
    }

    public function preguntas_seguridades(){
        try{
        $result = parent::connection()->prepare("SELECT * FROM seguridades INNER JOIN registros ON seguridades.usuario_id = registros.id INNER JOIN preguntas ON seguridades.pregunta_id = preguntas.id_pregunta INNER JOIN cargo ON registros.cargo = cargo.CodiCargo INNER JOIN estados ON registros.estado = estados.id_estado");
        $result->execute();
        return $result->fetchAll();

        }catch(Exception $e){
            die("No se logro realizar el registro" . $e->getMessage());
        }
    }

    public function user(){
        try{
        $result = parent::connection()->prepare("SELECT * FROM registros INNER JOIN cargo ON registros.cargo = cargo.CodiCargo INNER JOIN estados ON registros.estado = estados.id_estado  WHERE id = ?");
        $result->bindParam(1,$_GET['id'], PDO::PARAM_STR);
        $result->execute();
        return $result->fetch();

        }catch(Exception $e){
            die("No se logro realizar el registro" . $e->getMessage());
        }
    }

    public function user_question(){
        try{
        $result = parent::connection()->prepare("SELECT * FROM seguridades INNER JOIN preguntas ON seguridades.pregunta_id = preguntas.id_pregunta WHERE usuario_id = ?");
        $result->bindParam(1,$_GET['id'], PDO::PARAM_STR);
        $result->execute();
        return $result->fetch();

        }catch(Exception $e){
            die("No se logro realizar el registro" . $e->getMessage());
        }
    }

    public function update_profile_personal($data){
        try{
        $result = parent::connection()->prepare("UPDATE registros SET nombre = ?, email = ? WHERE id = ?");
        $result->bindParam(1,$data['nombre'], PDO::PARAM_STR);
        $result->bindParam(2,$data['email'], PDO::PARAM_STR);
        $result->bindParam(3,$data['id'], PDO::PARAM_STR);
        return $result->execute();

        }catch(Exception $e){
            die("No se logro realizar el registro" . $e->getMessage());
        }
    }

    public function update_profile_personal_question($data){
        try{
        $result = parent::connection()->prepare("UPDATE seguridades SET respuesta = ? WHERE id = ?");
        $result->bindParam(1,$data['respuesta'], PDO::PARAM_STR);
        $result->bindParam(2,$data['id'], PDO::PARAM_STR);
        return $result->execute();

        }catch(Exception $e){
            die("No se logro realizar el registro" . $e->getMessage());
        }
    }

    public function update_password(){
        try{
        $result = parent::connection()->prepare("UPDATE registros SET password = ? WHERE id = ?");
        $result->bindParam(1,$_POST['password'],PDO::PARAM_STR);
        $result->bindParam(2,$_POST['id'],PDO::PARAM_STR);
        $result->execute();
        }catch(Exception $e){
            die("No se logro realizar el registro" . $e->getMessage());
        }
    }

    public function categorias(){
        try{
        $result = parent::connection()->prepare("SELECT * FROM categorias INNER JOIN estados ON categorias.estado = estados.id_estado");
        $result->execute();
        return $result->fetchAll();

        }catch(Exception $e){
            die("No se logro realizar el registro" . $e->getMessage());
        }
    }

    public function query_category_state(){
        try{
        $result = parent::connection()->prepare("SELECT * FROM categorias WHERE idCate = ?");
        $result->bindParam(1, $_GET['idCate'], PDO::PARAM_STR);
        $result->execute();
        return $result->fetch();

        }catch(Exception $e){
            die("No se logro realizar el registro" . $e->getMessage());
        }
    }

    public function register_categories(){
        try{
        $result = parent::connection()->prepare("INSERT INTO categorias (estado, NombCate, Descripcion) VALUES(1, ?,?)");
        $result->bindParam(1,$_POST['NombCate'],PDO::PARAM_STR);
        $result->bindParam(2,$_POST['Descripcion'],PDO::PARAM_STR);
        $result->execute();
        }catch(Exception $e){
            die("No se logro realizar el registro" . $e->getMessage());
        }
    }

    public function activar_categoria($id){
        try{
        $result = parent::connection()->prepare("UPDATE categorias SET estado = 1 WHERE idCate = ?");
        $result->bindParam(1,$id,PDO::PARAM_STR);
        $result->execute();
        }catch(Exception $e){
            die("No se logro realizar el registro" . $e->getMessage());
        }
    }

    public function inactivar_categoria($id){
        try{
        $result = parent::connection()->prepare("UPDATE categorias SET estado = 2 WHERE idCate = ?");
        $result->bindParam(1,$id,PDO::PARAM_STR);
        $result->execute();
        }catch(Exception $e){
            die("No se logro realizar el registro" . $e->getMessage());
        }
    }

    public function update_categories($data){
        try{
        $result = parent::connection()->prepare("UPDATE categorias SET NombCate = ?, Descripcion = ? WHERE idCate = ?");
        $result->bindParam(1,$data['NombCate'],PDO::PARAM_STR);
        $result->bindParam(2,$data['Descripcion'],PDO::PARAM_STR);
        $result->bindParam(3,$data['idCate'],PDO::PARAM_STR);
        $result->execute();
        }catch(Exception $e){
            die("No se logro realizar el registro" . $e->getMessage());
        }
    }

    public function tipomovimientos(){
        try{
        $result = parent::connection()->prepare("SELECT * FROM tipomovimiento");
        $result->execute();
        return $result->fetchAll();

        }catch(Exception $e){
            die("No se logro realizar el registro" . $e->getMessage());
        }
    }

    public function register_typemoves($data){
        try{
        $result = parent::connection()->prepare("INSERT INTO tipomovimiento (TipoMoviDescripcion) VALUES(?)");
        $result->bindParam(1,$data['TipoMoviDescripcion'],PDO::PARAM_STR);
        $result->execute();
        }catch(Exception $e){
            die("No se logro realizar el registro" . $e->getMessage());
        }
    }

    public function find_typemoves(){
        try{
        $result = parent::connection()->prepare("SELECT * FROM tipomovimiento WHERE Idmovi = ?");
        $result->bindParam(1, $_GET['Idmovi'], PDO::PARAM_STR);
        $result->execute();
        return $result->fetch();

        }catch(Exception $e){
            die("No se logro realizar el registro" . $e->getMessage());
        }
    }

    public function update_typemoves(){
        try{
        $result = parent::connection()->prepare("UPDATE tipomovimiento SET TipoMoviDescripcion = ? WHERE Idmovi = ?");
        $result->bindParam(1, $_POST['TipoMoviDescripcion'], PDO::PARAM_STR);
        $result->bindParam(2, $_POST['Idmovi'], PDO::PARAM_STR);
        $result->execute();
        }catch(Exception $e){
            die("No se logro realizar el registro" . $e->getMessage());
        }
    }

    public function register_roles($data){
        try{
        $result = parent::connection()->prepare("INSERT INTO cargo (CarDescripcion) VALUES(?)");
        $result->bindParam(1,$data['CarDescripcion'],PDO::PARAM_STR);
        $result->execute();
        }catch(Exception $e){
            die("No se logro realizar el registro" . $e->getMessage());
        }
    }

    public function find_roles(){
        try{
        $result = parent::connection()->prepare("SELECT * FROM cargo WHERE CodiCargo = ?");
        $result->bindParam(1, $_GET['CodiCargo'], PDO::PARAM_STR);
        $result->execute();
        return $result->fetch();

        }catch(Exception $e){
            die("No se logro realizar el registro" . $e->getMessage());
        }
    }

    public function update_cargo(){
        try{
        $result = parent::connection()->prepare("UPDATE cargo SET CarDescripcion = ? WHERE CodiCargo = ?");
        $result->bindParam(1, $_POST['CarDescripcion'], PDO::PARAM_STR);
        $result->bindParam(2, $_POST['CodiCargo'], PDO::PARAM_STR);
        $result->execute();
        }catch(Exception $e){
            die("No se logro realizar el registro" . $e->getMessage());
        }
    }



    public function proveedores(){
        try{
        $result = parent::connection()->prepare("SELECT * FROM proveedores INNER JOIN estados ON proveedores.estado = estados.id_estado");
        $result->execute();
        return $result->fetchAll();

        }catch(Exception $e){
            die("No se logro realizar el registro" . $e->getMessage());
        }
    }

    public function proveedores_c(){
        try{
        $result = parent::connection()->prepare("SELECT * FROM proveedores INNER JOIN estados ON proveedores.estado = estados.id_estado WHERE estado = 1");
        $result->execute();
        return $result->fetchAll();

        }catch(Exception $e){
            die("No se logro realizar el registro" . $e->getMessage());
        }
    }

    public function estados(){
        try{
        $result = parent::connection()->prepare("SELECT * FROM estados");
        $result->execute();
        return $result->fetchAll();

        }catch(Exception $e){
            die("No se logro realizar el registro" . $e->getMessage());
        }
    }
    

    public function create_proveedor($data){
        try{
        $result = parent::connection()->prepare("INSERT INTO proveedores (ProveNombres, ProveNumDoc, Correo, Direccion, Telefono, estado) VALUES (?,?,?,?,?,1)");
        $result->bindParam(1,$data['ProveNombres'], PDO::PARAM_STR);
        $result->bindParam(2,$data['ProveNumDoc'], PDO::PARAM_STR);
        $result->bindParam(3,$data['Correo'], PDO::PARAM_STR);
        $result->bindParam(4,$data['Direccion'], PDO::PARAM_STR);
        $result->bindParam(5,$data['Telefono'], PDO::PARAM_STR);
        return $result->execute();

        }catch(Exception $e){
            die("No se logro realizar el registro" . $e->getMessage());
        }
    }

    public function find_proveedor(){
        try{
        $result = parent::connection()->prepare("SELECT * FROM proveedores WHERE CodiProve = ?");
        $result->bindParam(1,$_GET['CodiProve'], PDO::PARAM_STR);
        $result->execute();
        return $result->fetch();
        }catch(Exception $e){
            die("No se logro realizar el registro" . $e->getMessage());
        }
    }

    public function modificar_proveedor($data){
        try{
        $result = parent::connection()->prepare("UPDATE proveedores SET ProveNombres = ?, ProveNumDoc = ?, Correo = ?, Direccion = ?, Telefono = ? WHERE CodiProve = ?");
        $result->bindParam(1,$data['ProveNombres'], PDO::PARAM_STR);
        $result->bindParam(2,$data['ProveNumDoc'], PDO::PARAM_STR);
        $result->bindParam(3,$data['Correo'], PDO::PARAM_STR);
        $result->bindParam(4,$data['Direccion'], PDO::PARAM_STR);
        $result->bindParam(5,$data['Telefono'], PDO::PARAM_STR);
        $result->bindParam(6,$data['CodiProve'], PDO::PARAM_STR);
        $result->execute();
        }catch(Exception $e){
            die("No se logro realizar el registro" . $e->getMessage());
        }
    }

    public function activar_proveedor(){
        try{
        $result = parent::connection()->prepare("UPDATE proveedores SET estado = 1 WHERE CodiProve = ?");
        $result->bindParam(1,$_GET['CodiProve'], PDO::PARAM_STR);
        $result->execute();
        }catch(Exception $e){
            die("No se logro realizar el registro" . $e->getMessage());
        }
    }

    public function inactivar_proveedor(){
        try{
        $result = parent::connection()->prepare("UPDATE proveedores SET estado = 2 WHERE CodiProve = ?");
        $result->bindParam(1,$_GET['CodiProve'], PDO::PARAM_STR);
        $result->execute();
        }catch(Exception $e){
            die("No se logro realizar el registro" . $e->getMessage());
        }
    }

    public function productos(){
        try{
        $result = parent::connection()->prepare("SELECT * FROM productos INNER JOIN categorias ON productos.Categorias_idCate = categorias.idCate INNER JOIN proveedores ON productos.Proveedores_CodiProve = proveedores.CodiProve");
        $result->execute();
        return $result->fetchAll();
        }catch(Exception $e){
            die("No se logro realizar el registro" . $e->getMessage());
        }
    }

    public function productos_c(){
        try{
        $result = parent::connection()->prepare("SELECT * FROM productos INNER JOIN categorias ON productos.Categorias_idCate = categorias.idCate INNER JOIN proveedores ON productos.Proveedores_CodiProve = proveedores.CodiProve WHERE productos.Estado = 'Disponible'");
        $result->execute();
        return $result->fetchAll();
        }catch(Exception $e){
            die("No se logro realizar el registro" . $e->getMessage());
        }
    }

    public function categorias_c(){
        try{
        $result = parent::connection()->prepare("SELECT * FROM categorias WHERE estado = 1");
        $result->execute();
        return $result->fetchAll();
        }catch(Exception $e){
            die("No se logro realizar el registro" . $e->getMessage());
        }
    }

    public function create_product($data){
        try{
        $result = parent::connection()->prepare("INSERT INTO productos (Nombproduc, PrecCompproduc, PrecVentProduc, Color, Iva, Estado, Material, Talla, Descripcion, Proveedores_CodiProve, Categorias_idCate) VALUES (?,?,?,?,?, 'Disponible',?,?,?,?,?)");
        $result->bindParam(1,$data['Nombproduc'], PDO::PARAM_STR);
        $result->bindParam(2,$data['PrecCompproduc'], PDO::PARAM_STR);
        $result->bindParam(3,$data['PrecVentProduc'], PDO::PARAM_STR);
        $result->bindParam(4,$data['Color'], PDO::PARAM_STR);
        $result->bindParam(5,$data['Iva'], PDO::PARAM_STR);
        $result->bindParam(6,$data['Material'], PDO::PARAM_STR);
        $result->bindParam(7,$data['Talla'], PDO::PARAM_STR);
        $result->bindParam(8,$data['Descripcion'], PDO::PARAM_STR);
        $result->bindParam(9,$data['Proveedores_CodiProve'], PDO::PARAM_STR);
        $result->bindParam(10,$data['Categorias_idCate'], PDO::PARAM_STR);
        $result->execute();
        }catch(Exception $e){
            die("No se logro realizar el registro" . $e->getMessage());
        }
    }

    public function find_productos(){
        try{
        $result = parent::connection()->prepare("SELECT * FROM productos INNER JOIN categorias ON productos.Categorias_idCate = categorias.idCate INNER JOIN proveedores ON productos.Proveedores_CodiProve = proveedores.CodiProve WHERE idprod = ?");
        $result->bindParam(1, $_GET['idprod'], PDO::PARAM_STR);
        $result->execute();
        return $result->fetch();
        }catch(Exception $e){
            die("No se logro realizar el registro" . $e->getMessage());
        }
    }


    public function edit_product($data){
        try{
        $result = parent::connection()->prepare("UPDATE productos SET Nombproduc = ?, PrecCompproduc = ?, PrecVentProduc = ?, Color = ?, Iva = ?, Material = ?, Talla = ?, Descripcion = ?, Proveedores_CodiProve = ?, Categorias_idCate = ? WHERE idprod = ?");
        $result->bindParam(1,$data['Nombproduc'], PDO::PARAM_STR);
        $result->bindParam(2,$data['PrecCompproduc'], PDO::PARAM_STR);
        $result->bindParam(3,$data['PrecVentProduc'], PDO::PARAM_STR);
        $result->bindParam(4,$data['Color'], PDO::PARAM_STR);
        $result->bindParam(5,$data['Iva'], PDO::PARAM_STR);
        $result->bindParam(6,$data['Material'], PDO::PARAM_STR);
        $result->bindParam(7,$data['Talla'], PDO::PARAM_STR);
        $result->bindParam(8,$data['Descripcion'], PDO::PARAM_STR);
        $result->bindParam(9,$data['Proveedores_CodiProve'], PDO::PARAM_STR);
        $result->bindParam(10,$data['Categorias_idCate'], PDO::PARAM_STR);
        $result->bindParam(11,$data['idprod'], PDO::PARAM_STR);
        $result->execute();
        }catch(Exception $e){
            die("No se logro realizar el registro" . $e->getMessage());
        }
    }
    
    public function agt_state_product(){
        try{
        $result = parent::connection()->prepare("UPDATE productos SET Estado = 'Agotado' WHERE idprod = ?");
        $result->bindParam(1,$_GET['idprod'], PDO::PARAM_STR);
        $result->execute();
        }catch(Exception $e){
            die("No se logro realizar el registro" . $e->getMessage());
        }
    }   
    
    public function dis_state_product(){
        try{
        $result = parent::connection()->prepare("UPDATE productos SET Estado = 'Disponible' WHERE idprod = ?");
        $result->bindParam(1,$_GET['idprod'], PDO::PARAM_STR);
        $result->execute();
        }catch(Exception $e){
            die("No se logro realizar el registro" . $e->getMessage());
        }
    } 
    

    public function find_tipomovimientos(){
        try{
        $result = parent::connection()->prepare("SELECT * FROM tipomovimiento");
        $result->execute();
        return $result->fetchAll();

        }catch(Exception $e){
            die("No se logro realizar el registro" . $e->getMessage());
        }
    }   

    public function store_product($data){
        try{
        $result = parent::connection()->prepare("INSERT INTO inventario (producto_id, tipomovimiento_id, total) VALUES(?,1,?)");
        $result->bindParam(1, $data['producto_id'], PDO::PARAM_STR);
        $result->bindParam(2, $data['total'], PDO::PARAM_STR);
        $result->execute();
        }catch(Exception $e){
            die("No se logro realizar el registro" . $e->getMessage());
        }
    }

public function find_inventario(){
    try{
        $result = parent::connection()->prepare("SELECT * FROM inventario INNER JOIN tipomovimiento ON inventario.tipomovimiento_id = tipomovimiento.Idmovi INNER JOIN productos ON inventario.producto_id = productos.idprod WHERE producto_id = ?");
        $result->bindParam(1, $_POST['producto_id'], PDO::PARAM_STR);
        $result->execute();
        return $result->fetch();
    }catch(Exception $e){
            die("No se logro realizar la consulta" . $e->getMessage());
        }
    }

    public function inventario(){
        try{
            $result = parent::connection()->prepare("SELECT * FROM inventario INNER JOIN tipomovimiento ON inventario.tipomovimiento_id = tipomovimiento.Idmovi INNER JOIN productos ON inventario.producto_id = productos.idprod INNER JOIN categorias ON productos.Categorias_idCate = categorias.idCate");
            $result->execute();
            return $result->fetchAll();
        }catch(Exception $e){
                die("No se logro realizar la consulta" . $e->getMessage());
            }
        }


    public function editplusinventarioproducts($data){
        try{
        $result = parent::connection()->prepare("UPDATE inventario SET total  = total + ? WHERE producto_id = ?");
        $result->bindParam(1,$data['total'], PDO::PARAM_STR);
        $result->bindParam(2,$data['producto_id'], PDO::PARAM_STR);
        return $result->execute();
        }catch(Exception $e){
            die("No se logro realizar el registro" . $e->getMessage());
        }
    }

    public function editlessinventarioproducts($data){
        try{
        $result = parent::connection()->prepare("UPDATE inventario SET total  = total - ? WHERE producto_id = ?");
        $result->bindParam(1,$data['total'], PDO::PARAM_STR);
        $result->bindParam(2,$data['producto_id'], PDO::PARAM_STR);
        return $result->execute();
        }catch(Exception $e){
            die("No se logro realizar el registro" . $e->getMessage());
        }
    }



    public function editlessinventarioproducts_exit($total, $producto_id){
        try{
        $result = parent::connection()->prepare("UPDATE inventario SET total  = total - ? WHERE producto_id = ?");
        $result->bindParam(1,$total, PDO::PARAM_STR);
        $result->bindParam(2,$producto_id, PDO::PARAM_STR);
        return $result->execute();
        }catch(Exception $e){
            die("No se logro realizar el registro" . $e->getMessage());
        }
    }

    public function restaurarsuma($total, $producto_id){
        try{
        $result = parent::connection()->prepare("UPDATE inventario SET total  = total - ? WHERE producto_id = ?");
        $result->bindParam(1,$total, PDO::PARAM_STR);
        $result->bindParam(2,$producto_id, PDO::PARAM_STR);
        return $result->execute();
        }catch(Exception $e){
            die("No se logro realizar el registro" . $e->getMessage());
        }
    }

    public function restaurarresta($total, $producto_id){
        try{
        $result = parent::connection()->prepare("UPDATE inventario SET total  = total + ? WHERE producto_id = ?");
        $result->bindParam(1,$total, PDO::PARAM_STR);
        $result->bindParam(2,$producto_id, PDO::PARAM_STR);
        return $result->execute();
        }catch(Exception $e){
            die("No se logro realizar el registro" . $e->getMessage());
        }
    }

    public function eliminar_factura($codigo_factura){
        try{
        $result = parent::connection()->prepare("DELETE FROM facturas WHERE codigo_factura = ?");
        $result->bindParam(1,$codigo_factura, PDO::PARAM_STR);
        return $result->execute();
        }catch(Exception $e){
            die("No se logro realizar el registro" . $e->getMessage());
        }
    }

    public function restaurardevolucion($id_devolucion){
        try{
        $result = parent::connection()->prepare("DELETE FROM devoluciones WHERE id_devolucion = ?");
        $result->bindParam(1,$id_devolucion, PDO::PARAM_STR);
        return $result->execute();
        }catch(Exception $e){
            die("No se logro realizar el registro" . $e->getMessage());
        }
    }

    public function eliminar_movimiento($id_movimiento){
        try{
        $result = parent::connection()->prepare("DELETE FROM movimientos WHERE id_movimiento = ?");
        $result->bindParam(1,$id_movimiento, PDO::PARAM_STR);
        return $result->execute();
        }catch(Exception $e){
            die("No se logro realizar el registro" . $e->getMessage());
        }
    }
    public function add_movimiento($data){
        try{
            $result = parent::connection()->prepare("INSERT INTO movimientos (producto_id, tipomovimiento_id, usuario_id, total) VALUES (?,1,?,?)");
            $result->bindParam(1,$data['producto_id'], PDO::PARAM_STR);
            $result->bindParam(2,$data['usuario_id'], PDO::PARAM_STR);
            $result->bindParam(3,$data['total'], PDO::PARAM_STR);
            return $result->execute();
            }catch(Exception $e){
                die("No se logro realizar el registro" . $e->getMessage());
            }
    }

    public function cargo(){
        try{
            $result = parent::connection()->prepare("SELECT * FROM cargo");
            $result->execute();
            return $result->fetchAll();
        }catch(Exception $e){
                die("No se logro realizar la consulta" . $e->getMessage());
            }
        }

public function movimientos_query(){
    try{
        $result = parent::connection()->prepare("SELECT movimientos.factura_id AS 'factura_id', movimientos.fecha AS 'fecha', productos.Nombproduc AS 'Nombproduc', tipomovimiento.TipoMoviDescripcion AS 'TipoMoviDescripcion', registros.nombre AS 'nombre', movimientos.total AS 'total', movimientos.id_movimiento AS 'id_movimiento' FROM movimientos INNER JOIN registros ON movimientos.usuario_id = registros.id INNER JOIN tipomovimiento ON movimientos.tipomovimiento_id = tipomovimiento.Idmovi INNER JOIN productos ON movimientos.producto_id = productos.idprod");
        $result->execute();
        return $result->fetchAll();
    }catch(Exception $e){
            die("No se logro realizar la consulta" . $e->getMessage());
        }
    }

    public function movimientos_query_exit(){
        try{
            $result = parent::connection()->prepare("SELECT movimientos.factura_id AS 'factura_id', movimientos.fecha AS 'fecha', tipomovimiento.TipoMoviDescripcion AS 'TipoMoviDescripcion', registros.nombre AS 'nombre', movimientos.id_movimiento AS 'id_movimiento' FROM movimientos INNER JOIN registros ON movimientos.usuario_id = registros.id INNER JOIN tipomovimiento ON movimientos.tipomovimiento_id = tipomovimiento.Idmovi WHERE movimientos.tipomovimiento_id = 2");
            $result->execute();
            return $result->fetchAll();
        }catch(Exception $e){
                die("No se logro realizar la consulta" . $e->getMessage());
            }
        }

    public function personas(){
        try{
            $result = parent::connection()->prepare("SELECT * FROM personas");
            $result->execute();
            return $result->fetchAll();
        }catch(Exception $e){
                die("No se logro realizar la consulta" . $e->getMessage());
            }
        }

        public function personas_c(){
            try{
                $result = parent::connection()->prepare("SELECT * FROM personas WHERE id_persona = ?");
                $result->bindParam(1, $_GET['id_persona'], PDO::PARAM_STR);
                $result->execute();
                return $result->fetch();
            }catch(Exception $e){
                    die("No se logro realizar la consulta" . $e->getMessage());
                }
            }

        public function add_movimiento_dev($data){
            try{
                $result = parent::connection()->prepare("INSERT INTO movimientos (producto_id, tipomovimiento_id, usuario_id, total) VALUES (?,3,?,?)");
                $result->bindParam(1,$data['producto_id'], PDO::PARAM_STR);
                $result->bindParam(2,$data['usuario_id'], PDO::PARAM_STR);
                $result->bindParam(3,$data['total'], PDO::PARAM_STR);
                return $result->execute();
                }catch(Exception $e){
                    die("No se logro realizar el registro" . $e->getMessage());
                }
        }

        public function add_devolucion($data){
            try{
                $result = parent::connection()->prepare("INSERT INTO devoluciones (producto_id, total, descripcion, persona_id) VALUES (?,?,?,?)");
                $result->bindParam(1,$data['producto_id'], PDO::PARAM_STR);
                $result->bindParam(2,$data['total'], PDO::PARAM_STR);
                $result->bindParam(3,$data['descripcion'], PDO::PARAM_STR);
                $result->bindParam(4,$data['persona_id'], PDO::PARAM_STR);
                return $result->execute();
                }catch(Exception $e){
                    die("No se logro realizar el registro" . $e->getMessage());
                }
        }

        public function devoluciones_query(){
            try{
                $result = parent::connection()->prepare("SELECT * FROM devoluciones INNER JOIN productos ON devoluciones.producto_id = productos.idprod INNER JOIN personas ON devoluciones.persona_id = personas.id_persona");
                $result->execute();
                return $result->fetchAll();
                }catch(Exception $e){
                    die("No se logro realizar el registro" . $e->getMessage());
                }
        }

        public function find_producto_revertir(){
            try{
            $result = parent::connection()->prepare("SELECT  movimientos.id_movimiento AS 'id_movimiento', movimientos.tipomovimiento_id AS 'tipomovimiento_id', movimientos.producto_id AS 'producto_id', movimientos.usuario_id AS 'usuario_id', movimientos.total AS 'total', movimientos.fecha AS 'fecha' FROM movimientos INNER JOIN registros ON movimientos.usuario_id = registros.id INNER JOIN tipomovimiento ON movimientos.tipomovimiento_id = tipomovimiento.Idmovi INNER JOIN productos ON movimientos.producto_id = productos.idprod WHERE id_movimiento = ?");
            $result->bindParam(1, $_GET['id_movimiento'], PDO::PARAM_STR);
            $result->execute();
            return $result->fetch();
            }catch(Exception $e){
                die("No se logro realizar el registro" . $e->getMessage());
            }
        }

        public function find_producto_revertir_exit(){
            try{
            $result = parent::connection()->prepare("SELECT * FROM movimientos WHERE id_movimiento = ?");
            $result->bindParam(1, $_GET['id_movimiento'], PDO::PARAM_STR);
            $result->execute();
            return $result->fetch();
            }catch(Exception $e){
                die("No se logro realizar el registro" . $e->getMessage());
            }
        }

        public function find_factura($codigo){
            try{
            $result = parent::connection()->prepare("SELECT * FROM facturas WHERE codigo_factura = ?");
            $result->bindParam(1, $codigo, PDO::PARAM_STR);
            $result->execute();
            return $result->fetch();
            }catch(Exception $e){
                die("No se logro realizar el registro" . $e->getMessage());
            }
        }

        public function buscar_devolucion($fecha){
            try{
            $result = parent::connection()->prepare("SELECT * FROM devoluciones WHERE fecha = ?");
            $result->bindParam(1, $fecha, PDO::PARAM_STR);
            $result->execute();
            return $result->fetch();
            }catch(Exception $e){
                die("No se logro realizar el registro" . $e->getMessage());
            }
        }

        public function crear_persona($data){
            try{
                $result = parent::connection()->prepare("INSERT INTO personas (PersoNombres, Correo, TipoDoc, documento, Direccion, Telefono) VALUES (?,?,?,?,?,?)");
                $result->bindParam(1,$data['PersoNombres'], PDO::PARAM_STR);
                $result->bindParam(2,$data['Correo'], PDO::PARAM_STR);
                $result->bindParam(3,$data['TipoDoc'], PDO::PARAM_STR);
                $result->bindParam(4,$data['documento'], PDO::PARAM_STR);
                $result->bindParam(5,$data['Direccion'], PDO::PARAM_STR);
                $result->bindParam(6,$data['Telefono'], PDO::PARAM_STR);
                return $result->execute();
                }catch(Exception $e){
                    die("No se logro realizar el registro" . $e->getMessage());
                }
        }

        public function update_persona($data){
            try{
                $result = parent::connection()->prepare("UPDATE personas SET PersoNombres = ?, Correo = ?, TipoDoc = ?, documento = ?, Direccion = ?, Telefono = ? WHERE id_persona = ?");
                $result->bindParam(1,$data['PersoNombres'], PDO::PARAM_STR);
                $result->bindParam(2,$data['Correo'], PDO::PARAM_STR);
                $result->bindParam(3,$data['TipoDoc'], PDO::PARAM_STR);
                $result->bindParam(4,$data['documento'], PDO::PARAM_STR);
                $result->bindParam(5,$data['Direccion'], PDO::PARAM_STR);
                $result->bindParam(6,$data['Telefono'], PDO::PARAM_STR);
                $result->bindParam(7,$data['id_persona'], PDO::PARAM_STR);
                return $result->execute();
                }catch(Exception $e){
                    die("No se logro realizar el registro" . $e->getMessage());
                }
        }

        public function facturas_codigo_facturas(){
            try{
            $result = parent::connection()->prepare("SELECT SUM(id_factura+1) AS 'id_factura' FROM facturas ORDER BY id_factura DESC");
            $result->execute();
            return $result->fetch();
            }catch(Exception $e){
                die("No se logro realizar el registro" . $e->getMessage());
            }
        }
    

    public function productos_factura(){
        try{
            $result = parent::connection()->prepare("SELECT * FROM inventario INNER JOIN productos ON inventario.producto_id = productos.idprod INNER JOIN categorias ON productos.Categorias_idCate = categorias.idCate INNER JOIN proveedores ON productos.Proveedores_CodiProve = proveedores.CodiProve WHERE productos.Estado = 'Disponible'");
            $result->execute();
            return $result->fetchAll();
            }catch(Exception $e){
                die("No se logro realizar el registro" . $e->getMessage());
            }
    } 
        public function getApiproductos(){
            $productos = array();
            $productos["productos"] = array();
    
            $result = parent::connection()->prepare("SELECT * FROM inventario INNER JOIN productos ON inventario.producto_id = productos.idprod INNER JOIN categorias ON productos.Categorias_idCate = categorias.idCate INNER JOIN proveedores ON productos.Proveedores_CodiProve = proveedores.CodiProve WHERE productos.Estado = 'Disponible'");
            $result->execute();
            $res = $result;
    
            if($res->rowCount()){
                while ($row = $res->fetch(PDO::FETCH_ASSOC)){
                    $item=array(
                        "idprod" => $row['idprod'],
                        "Nombproduc" => $row['Nombproduc'],
                        "Talla" => $row['Talla'],
                        "PrecCompproduc" => $row['PrecCompproduc'],
                        "total" => $row['total'],
                        "PrecVentProduc" => $row['PrecVentProduc'],
                        "Iva" => $row['Iva']
                    );
                    array_push($productos["productos"], $item);
                }
                echo json_encode($productos);
            }else{
                echo json_encode(array('mensaje' => 'No hay elementos'));
            }
        }

        public function create_sale($data){
            try{
                $result = parent::connection()->prepare("INSERT INTO facturas (codigo_factura, usuario_id, fecha_factura, cliente_id, productos, productos_esp, iva, subtotal, total) VALUES (?,?,?,?,?,?,?,?,?)");
                $result->bindParam(1,$data['codigo_factura'], PDO::PARAM_STR);
                $result->bindParam(2,$data['usuario_id'], PDO::PARAM_STR);
                $result->bindParam(3,$data['fecha_factura'], PDO::PARAM_STR);
                $result->bindParam(4,$data['cliente_id'], PDO::PARAM_STR);
                $result->bindParam(5,$data['productos'], PDO::PARAM_STR);
                $result->bindParam(6,$data['productos_esp'], PDO::PARAM_STR);
                $result->bindParam(7,$data['iva'], PDO::PARAM_STR);
                $result->bindParam(8,$data['subtotal'], PDO::PARAM_STR);
                $result->bindParam(9,$data['total'], PDO::PARAM_STR);
                return $result->execute();
                }catch(Exception $e){
                    die("No se logro realizar el registro" . $e->getMessage());
                }
        }
   
    public function add_movimiento_exit($data){
        try{
            $result = parent::connection()->prepare("INSERT INTO movimientos (factura_id, producto_id, tipomovimiento_id, usuario_id, total) VALUES (?, NULL,2,?, NULL)");
            $result->bindParam(1,$data['factura'], PDO::PARAM_STR);
            $result->bindParam(2,$data['usuario_id'], PDO::PARAM_STR);
            return $result->execute();
            }catch(Exception $e){
                die("No se logro realizar el registro" . $e->getMessage());
            }
    }

    public function find_factura_for_less(){
        try{
        $result = parent::connection()->prepare("SELECT * FROM facturas WHERE codigo_factura = ?");
        $result->bindParam(1, $_POST['codigo_factura'], PDO::PARAM_STR);
        $result->execute();
        return $result->fetch();
        }catch(Exception $e){
            die("No se logro realizar el registro" . $e->getMessage());
        }
    }

    public function total_facturas(){
        try{
        $result = parent::connection()->prepare("SELECT * FROM facturas INNER JOIN registros ON facturas.usuario_id = registros.id INNER JOIN personas ON facturas.cliente_id = personas.id_persona");
        $result->execute();
        return $result->fetchAll();
        }catch(Exception $e){
            die("No se logro realizar el registro" . $e->getMessage());
        }
    }

    

    public function fpdf_productos(){
        try{
        $result = parent::connection()->prepare("SELECT * FROM facturas WHERE id_factura = ?");
        $result->bindParam(1, $_GET['id_factura'], PDO::PARAM_INT);
        $result->execute();
        return $result->fetch();
        }catch(Exception $e){
            die("No se logro realizar el registro" . $e->getMessage());
        }
}
}
