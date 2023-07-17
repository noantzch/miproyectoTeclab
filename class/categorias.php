<?php
require_once 'database.php';

class Categoria {
    private $id;
    public $nombre;

    public function guardar() {
        $data = [
            "nombre" => $this->nombre
        ];

        $db = new Database();
        return $db->insert("categorias", $data);
    }

    public function eliminar() {
        $db = new Database();
        return $db->delete("categorias", "categoria_id = $this->id");
    }
}
/* @autor Luis Noel Antezana */
?>