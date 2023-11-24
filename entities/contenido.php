<?php

class contenido {
    public $idContenido;
    public $tipo;
    public $url;
    public $formato;
    public $duracion;

    // Constructor
    public function __construct($idContenido, $tipo, $url, $formato, $duracion) {
        $this->idContenido = $idContenido;
        $this->tipo = $tipo;
        $this->url = $url;
        $this->formato = $formato;
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

    // Getter para obtener el tipo
    public function getTipo() {
        return $this->tipo;
    }

    // Setter para establecer el tipo
    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    // Getter para obtener la url
    public function getUrl() {
        return $this->url;
    }

    // Setter para establecer la url
    public function setUrl($url) {
        $this->url = $url;
    }

    // Getter para obtener el formato
    public function getFormato() {
        return $this->formato;
    }

    // Setter para establecer el formato
    public function setFormato($formato) {
        $this->formato = $formato;
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
