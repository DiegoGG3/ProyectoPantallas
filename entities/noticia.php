<?php
class Noticia {
    public $id;
    public $comienzo;
    public $fin;
    public $titulo;
    public $prioridad;
    public $perfil;
    public $duracion;
    public $idContenido;

    // Constructor
    public function __construct($id, $comienzo, $fin, $titulo, $prioridad, $perfil, $duracion, $idContenido) {
        $this->id = $id;
        $this->comienzo = $comienzo;
        $this->fin = $fin;
        $this->titulo = $titulo;
        $this->prioridad = $prioridad;
        $this->perfil = $perfil;
        $this->duracion = $duracion;
        $this->idContenido = $idContenido;
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

    // Getter para obtener el perfil
    public function getPerfil() {
        return $this->perfil;
    }

    // Setter para establecer el perfil
    public function setPerfil($perfil) {
        $this->perfil = $perfil;
    }

    // Getter para obtener la duracion
    public function getDuracion() {
        return $this->duracion;
    }

    // Setter para establecer la duracion
    public function setDuracion($duracion) {
        $this->duracion = $duracion;
    }

    // Getter para obtener el idContenido
    public function getIdContenido() {
        return $this->idContenido;
    }

    // Setter para establecer el idContenido
    public function setIdContenido($idContenido) {
        $this->idContenido = $idContenido;
    }
}
?>
