<?php
require_once 'database.php';

class Producto {
    private $id;
    public $nombre;
    public $precio;
    public $categoria_id;
    public $descripcion;
    public $imagen;

    public function guardar() {
        $data = [
            "nombre" => $this->nombre,
            "precio" => $this->precio,
            "categoria_id" => $this->categoria_id,
            "descripcion" => $this->descripcion,
            "imagen" => $this->imagen
        ];

        $db = new Database();
        return $db->insert("productos", $data);
    }

    public function eliminar() {
        $db = new Database();
        return $db->delete("productos", "id = $this->id");
    }
}
?>
