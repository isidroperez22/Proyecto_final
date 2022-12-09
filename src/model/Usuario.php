<?php
require_once "../db/db.php";
class Usuario
{

    var $id;
    var $usuario;
    var $nombre;
    var $apellido;
    var $email;
    var $password;
    var $role;
    var $conexion;

    public function __construct($id = "", $usuario = "", $nombre = "", $apellido = "", $email = "",  $password = "", $role = "")
    {
        $this->id = $id;
        $this->usuario = $usuario;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
        $this->conexion = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME, DB_PORT);
    }

    //Mostrar todos los datos de los usuarios
    public function mostrar_usuarios()
    {
        $sql = "SELECT * FROM usuarios";
        $result = $this->conexion->query($sql);

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $array[] = $row;
            }
            return $array;
        }
    }

    //Mostrara los datos de un usuario si existe el nombre de usuario
    public function buscar_usuario()
    {
        $buscar_usuario = "SELECT * FROM usuarios WHERE usuario = '{$this->usuario}'";
        $result = $this->conexion->query($buscar_usuario);

        if ($result->num_rows > 0) {
            return $result->fetch_all();
        } else {
            return false;
        }
    }

    //Mostrara los datos de un usuario si existe el id
    public function buscar_id_usuario()
    {
        $buscar_usuario = "SELECT * FROM usuarios WHERE id = '{$this->id}'";
        $result = $this->conexion->query($buscar_usuario);

        if ($result->num_rows > 0) {
            return $result->fetch_all();
        } else {
            return false;
        }
    }

    //Mostrara los datos de un usuario si existe el email
    public function buscar_email_usuario()
    {
        $buscar_usuario = "SELECT * FROM usuarios WHERE email = '{$this->email}'";
        $result = $this->conexion->query($buscar_usuario);

        if ($result->num_rows > 0) {
            return $result->fetch_all();
        } else {
            return false;
        }
    }

    //Podra editar los datos del usuario y el role
    public function edit_admin_usuario()
    {
        $update = "UPDATE usuarios SET usuario = '{$this->usuario}',  
                                        nombre = '{$this->nombre}',
                                        apellido = '{$this->apellido}', 
                                        role = '{$this->role}' 
                                    WHERE id = '{$this->id}'";
        $result = $this->conexion->query($update);

        return $this->conexion->affected_rows;
    }

    //Podra editar los datos del usuario y actualizara la session
    public function edit_usuario()
    {
        if ($this->password == "") {
            $update = "UPDATE usuarios SET usuario = '{$this->usuario}',  
                                            nombre = '{$this->nombre}', 
                                            apellido = '{$this->apellido}', 
                                            email = '{$this->email}' 
                                            WHERE id = '{$this->id}'";

            $result = $this->conexion->query($update);

            if ($this->conexion->affected_rows) {
                $_SESSION["nombre"] = $this->nombre;
                $_SESSION["email"] = $this->email;
                $_SESSION["apellido"] = $this->apellido;
                $_SESSION["usuario"] = $this->usuario;
                return true;
            } else {
                return false;
            }
        } else {
            $md5 = md5($this->password);
            $update = "UPDATE usuarios SET usuario = '{$this->usuario}',  
                                            nombre = '{$this->nombre}', 
                                            apellido = '{$this->apellido}', 
                                            email = '{$this->email}',
                                            password = '{$md5}'
                                            WHERE id = '{$this->id}'";

            $result = $this->conexion->query($update);

            if ($this->conexion->affected_rows) {
                $_SESSION["nombre"] = $this->nombre;
                $_SESSION["email"] = $this->email;
                $_SESSION["apellido"] = $this->apellido;
                $_SESSION["usuario"] = $this->usuario;
                return true;
            } else {
                return false;
            }
        }
    }

    //Podra eliminar los datos del usuario devolvera si true si se ha eliminado y false si no ha habido
    //cambios
    public function del_usuario()
    {
        $delete = "DELETE FROM usuarios WHERE id = {$this->id}";
        $result = $this->conexion->query($delete);
        if ($this->conexion->affected_rows) {
            return true;
        } else {
            return false;
        }
    }

    //Funcion para registrar al usuario ejecutamos un insert a la bd
    public function registrar_usuario()
    {
        $inserta = "INSERT INTO usuarios(usuario, nombre, apellido, email, password, role) 
                    VALUES ('{$this->usuario}', '{$this->nombre}','{$this->apellido}', '{$this->email}', '{$this->password}', '{$this->role}');";
        $result = $this->conexion->query($inserta);
        return $this->conexion->affected_rows;
    }

    // Comprueba que exista el usuario y la password si existe lo almacena en un array
    // si el array esta vacio devolvera al controlador false y si esta lleno devolvera la session rellenada
    public function iniciar_session()
    {
        $sql = "SELECT * FROM usuarios
                            WHERE usuario LIKE '{$this->usuario}' and password LIKE '{$this->password}';";

        $result = $this->conexion->query($sql);
        $array = array();
        while ($row = $result->fetch_assoc()) {
            $array = $row;
        }
        if (empty($array)) {
            return false;
        } else {
            $_SESSION["role"] = $array["role"];
            $_SESSION["nombre"] = $array["nombre"];
            $_SESSION["email"] = $array["email"];
            $_SESSION["apellido"] = $array["apellido"];
            $_SESSION["usuario"] = $array["usuario"];
            $_SESSION["id"] = $array["id"];
            return $_SESSION;
        }
    }
}
