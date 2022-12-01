<?php

use LDAP\Result;

class Moneda
{
   var $id;
   var $nombre;
   var $descripcion;
   var $market;
   var $price;
   var $h24;
   var $foto;
   var $color;
   var $conexion;

   //Constructor del objeto
   public function __construct($id = "", $nombre = "", $descripcion = "", $market = 0, $price = 0, $h24 = 0, $foto = "", $color = "")
   {
      $this->id = $id;
      $this->nombre = $nombre;
      $this->descripcion = $descripcion;
      $this->market = $market;
      $this->price = $price;
      $this->h24 = $h24;
      $this-> foto = $foto;
      $this-> color = $color;
      $this->conexion = new mysqli('localhost', 'root', '', 'proyecto');
   }

   //Muestra la informacion de todas las monedas
   function datos_monedas()
   {

      $sql = "SELECT * FROM criptos";
      $result = $this->conexion->query($sql);

      if ($result) {
         while ($row = $result->fetch_assoc()) {
            $array[] = $row;
         }
         return $array;
      }
   }

   //Filtra la informacion de una criptomoneda por la id
   function buscar_moneda()
   {

      $sql = "SELECT * FROM criptos WHERE id LIKE '{$this->id}'; ";
      $result = $this->conexion->query($sql);
      return $result->fetch_all();
   }

   //Funcion para eliminar monedas
   function del_monedas()
   {
      $delete = "DELETE FROM criptos WHERE id = '{$this->id}';";
      $result = $this->conexion->query($delete);
      if ($this->conexion->affected_rows) {
         return true;
      } else {
         return false;
      }
   }

   //Funcion para aniadir monedas
   function add_monedas()
   {
      $inserta = "INSERT INTO criptos(id, nombre, descripcion, market_cap, price, change_h, foto) 
                  VALUES ('{$this->id}', '{$this->nombre}','{$this->descripcion}', {$this->market}, {$this->price}, {$this->h24}, '{$this->foto}');";
      $result = $this->conexion->query($inserta);
      return $this->conexion->affected_rows;
   }

   //Funcion para editar nombre y descripcion de una moneda
   function edit_monedas()
   {
      $update = "UPDATE criptos SET nombre = '{$this->nombre}', descripcion = '{$this->descripcion}', color = '{$this->color}' WHERE id LIKE '{$this->id}'";
      $result = $this->conexion->query($update);

      return $result;
   }

   //Funcion para actualizar de una moneda el precio, capitalizacion de mercado y porcentaje que ha variado el precio
   //en las ultimas 24 horas
   function update_valores()
   {
      $update = "UPDATE criptos SET market_cap = '{$this->market}',  price = '{$this->price}', change_h = '{$this->h24}'
                  WHERE id = '{$this->id}' ;";
      $result = $this->conexion->query($update);
      return $this->conexion->affected_rows;
   }
}
