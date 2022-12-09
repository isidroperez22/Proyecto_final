<?php
require_once "../db/db.php";
class Favorito
{ 
    var $id_cripto;
    var $id_usuario;
    var $conexion;

    public function __construct($id_cripto = "", $id_usuario = "")
    {
        $this->id_cripto = $id_cripto;
        $this->id_usuario = $id_usuario;
        $this->conexion = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME, DB_PORT);
    }

    public function add_favoritos()
    {
        $select = "SELECT
            favoritos.id,
            favoritos.id_usuario,
            favoritos.id_cripto
            FROM favoritos
            WHERE
            id_usuario = $this->id_usuario AND id_cripto = '$this->id_cripto';";
            $result = $this->conexion->query($select);

        if ($result->num_rows == 0) {
            $inserta = "INSERT INTO favoritos (id_usuario, id_cripto) VALUES ({$this->id_usuario}, '{$this->id_cripto}');";
            $result = $this->conexion->query($inserta);
            return true;
        } else {
            return false;
        }
    }

    public function del_favoritos()
    {
        $select = "SELECT
            favoritos.id,
            favoritos.id_usuario,
            favoritos.id_cripto
            FROM favoritos
            WHERE
            id_usuario = $this->id_usuario AND id_cripto = '$this->id_cripto';";
            $result = $this->conexion->query($select);

        if ($result->num_rows > 0) {
            $delete = "DELETE FROM favoritos WHERE id_cripto = '{$this->id_cripto}' and id_usuario = {$this->id_usuario};";
            $result = $this->conexion->query($delete);
            return true;
        } else {
            return false;
        }
    }


    public function mostrar_favoritos(){
        $array = [];
        $select = "SELECT c.* from favoritos f 
                    INNER JOIN criptos c ON f.id_cripto = c.id 
                    WHERE f.id_usuario = '{$this->id_usuario}';";
        $result = $this->conexion->query($select);
       
        if($result->num_rows > 0){
            while ($row = $result->fetch_assoc()){
                $array[] = $row ;
            }
        } 
        return $array;
    }

    public function buscar_favoritos_cripto(){
        $array = [];
        $select = "SELECT c.* from favoritos f 
                    INNER JOIN criptos c ON f.id_cripto = c.id 
                    WHERE f.id_usuario = '{$this->id_usuario}' && f.id_cripto='{$this->id_cripto}';";
        $result = $this->conexion->query($select);
       
        if($result->num_rows > 0){ // Si el numero de filas es mayor a 0 me devuelve true
            return true;
        } else {
            return false;
        }
       
    }
}
