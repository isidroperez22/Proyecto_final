<?php

class Transaccion
{

    var $id;
    var $usuario;
    var $cripto;
    var $fecha;
    var $cantidad;
    var $conexion;

    public function __construct($usuario, $cripto, $fecha, $cantidad)
    {
        $this->usuario = $usuario;
        $this->cripto = $cripto;
        $this->fecha = $fecha;
        $this->cantidad = $cantidad;
        $this->conexion = new mysqli('localhost', 'root', '', 'proyecto');
    }

    public function add_transaccion()
    {
        $inserta = "INSERT INTO transacciones(usuario, cripto, fecha, cantidad ) 
        VALUES ('{$this->usuario}', '{$this->cripto}', '{$this->fecha}', '{$this->cantidad}');";
        $result = $this->conexion->query($inserta);
        return $this->conexion->affected_rows;
    }

    public function mostrar_transacciones()
    {
        $array = [];
        $select = "SELECT 
                        c.nombre AS 'Nombre', 
                        c.price as 'Precio', 
                        SUM(t.cantidad) as 'Cantidad', 
                        (c.price * SUM(t.cantidad)) as Total
                    FROM transacciones t INNER JOIN criptos c ON t.cripto = c.id 
                        WHERE t.usuario = {$this->usuario}
                        GROUP BY t.cripto;";
        $result = $this->conexion->query($select);
        if ($result->num_rows > 0) {
         while ($row = $result->fetch_assoc()) {
            $array[] = $row;            
         }
         return $array;
      }
    }
}
