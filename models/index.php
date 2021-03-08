<?php

class index extends database{

    //Preguntas de seguridad de la tabla preguntas
    public function query_questions(){
        try{
        $result = parent::connection()->prepare("SELECT * FROM preguntas");
        $result->execute();
        return $result->fetchAll();

        }catch(Exception $e){
            die("No se logro realizar el registro" . $e->getMessage());
        }
    }

    //Registro de usuarios 
    public function register($data){
        try{
        $result = parent::connection()->prepare("INSERT INTO registros (cargo, nombre, email, password) VALUES (1, ?,?,?)");
        $result->bindParam(1,$data['nombre'], PDO::PARAM_STR);
        $result->bindParam(2,$data['email'], PDO::PARAM_STR);
        $result->bindParam(3,$data['password'], PDO::PARAM_STR);
        return $result->execute();

        }catch(Exception $e){
            die("No se logro realizar el registro" . $e->getMessage());
        }
    }

    //Consulta para buscar usuario registrado 
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

    //Registra pregunta de seguridad
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

    //Consultar pregunta de usuario
    public function search($i){
        try{
        $result = parent::connection()->prepare("SELECT * FROM seguridades INNER JOIN preguntas ON seguridades.pregunta_id = preguntas.id_pregunta INNER JOIN registros ON seguridades.usuario_id = registros.id WHERE usuario_id = ?");
        $result->bindParam(1,$i,PDO::PARAM_INT);
        $result->execute();
        return $result->fetch();

        }catch(Exception $e){
            die("No se logro realizar el registro" . $e->getMessage());
        }
    }

    //verificar preguntas y respuestas para recuperar
    public function verificar(){
        try{
        $result = parent::connection()->prepare("SELECT * FROM seguridades WHERE respuesta = ? AND usuario_id = ?");
        $result->bindParam(1,$_POST['respuesta'],PDO::PARAM_STR);
        $result->bindParam(2,$_POST['usuario_id'],PDO::PARAM_INT);
        $result->execute();
        return $result->fetch();

        }catch(Exception $e){
            die("No se logro realizar el registro" . $e->getMessage());
        }
    }

    public function update_password(){
        try{
        $result = parent::connection()->prepare("UPDATE registros SET password = ? WHERE id = ?");
        $result->bindParam(1,$_POST['password'],PDO::PARAM_STR);
        $result->bindParam(2,$_POST['id'],PDO::PARAM_INT);
        $result->execute();
        }catch(Exception $e){
            die("No se logro realizar el registro" . $e->getMessage());
        }
    }

    //Login
    public function validatelogin(){
        try{
            $result = parent::connection()->prepare("SELECT * FROM registros WHERE email = ? ");
            $result->bindParam(1, $_POST['email'], PDO::PARAM_STR);
            $result->execute();
            return $result->fetch();

        }catch(Exception $e){
          die($e->getMessage());
        }
    }
}

?>