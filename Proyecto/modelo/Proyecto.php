<?php
class Proyecto
{
    private $id;
    private $titulo;
    private $peque_descripcion;
    private $url;
    private $subtitulo;
    private $gran_decripcion;
    private $fecha_publicacion;
    private $usuario_id;
    private $archivo_juego;
    private $portada;

    public function __construct($id, $titulo, $peque_descripcion, $url, $subtitulo, $gran_decripcion, $fecha_publicacion, $usuario_id, $archivo_juego, $portada)
    {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->peque_descripcion = $peque_descripcion;
        $this->url = $url;
        $this->subtitulo = $subtitulo;
        $this->gran_decripcion = $gran_decripcion;
        $this->fecha_publicacion = $fecha_publicacion;
        $this->usuario_id = $usuario_id;
        $this->archivo_juego = $archivo_juego;
        $this->portada = $portada;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getTitulo()
    {
        return $this->titulo;
    }
    public function getPeque_descripcion()
    {
        return $this->peque_descripcion;
    }
    public function getUrl()
    {
        return $this->url;
    }
    public function getSubtitulo()
    {
        return $this->subtitulo;
    }
    public function getGran_decripcion()
    {
        return $this->gran_decripcion;
    }
    public function getFecha_publicacion()
    {
        return $this->fecha_publicacion;
    }
    public function getUsuario_id()
    {
        return $this->usuario_id;
    }
    public function getArchivo_juego()
    {
        return $this->archivo_juego;
    }
    public function getPortada()
    {
        return $this->portada;
    }

    //dibuja un proyecto se utiliza para los proyectos principales del index 
    public function printProyect()
    {

        echo '<div class="container my-5" id="redBack">';
        echo '<div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">';
        echo '<div class="col-lg-7 p-3 p-lg-5 pt-lg-3" style="width:43%;"><br>';
        echo '    <h1 class="display-4 fw-bold lh-1" style=" color: white;">' . $this->getTitulo() . '</h1><br><br>';
        echo '    <p class="lead" style=" color: white;">' . $this->getGran_decripcion() . '</p> ';
        echo '    <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3">';

        echo '    </div>';
        echo '</div>';
        echo '<div class="col-lg-4 offset-lg-1 p-0 overflow-hidden shadow-lg" style="width:560px;">';
        echo '     <iframe style="" width="560" height="315" src="' . $this->getUrl() . '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
        echo '</div>';
        echo '</div>';
        echo '</div>';

    }
}
?>