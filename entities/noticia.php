<?php
class Noticia {
    public $id;
    public $comienzo;
    public $fin;
    public $titulo;
    public $prioridad;
    public $duracion;

    // Constructor
    public function __construct($id, $comienzo, $fin, $titulo, $prioridad, $duracion) {
        $this->id = $id;
        $this->comienzo = $comienzo;
        $this->fin = $fin;
        $this->titulo = $titulo;
        $this->prioridad = $prioridad;
        $this->duracion = $duracion;
    }

    // Getter para obtener el id
    public function getId() {
        return $this->id;
    }

    // Getter para obtener el comienzo
    public function getComienzo() {
        return $this->comienzo;
    }

    // Setter para establecer el comienzo
    public function setComienzo($comienzo) {
        $this->comienzo = $comienzo;
    }

    // Getter para obtener el fin
    public function getFin() {
        return $this->fin;
    }

    // Setter para establecer el fin
    public function setFin($fin) {
        $this->fin = $fin;
    }

    // Getter para obtener el titulo
    public function getTitulo() {
        return $this->titulo;
    }

    // Setter para establecer el titulo
    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    // Getter para obtener la prioridad
    public function getPrioridad() {
        return $this->prioridad;
    }

    // Setter para establecer la prioridad
    public function setPrioridad($prioridad) {
        $this->prioridad = $prioridad;
    }

    // Getter para obtener la duracion
    public function getDuracion() {
        return $this->duracion;
    }

    // Setter para establecer la duracion
    public function setDuracion($duracion) {
        $this->duracion = $duracion;
    }
}
?>
