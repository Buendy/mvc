<?php
namespace Mini\Controller;

use Mini\Model\Song;
use Mini\Core\View;

class CancionesController
{
    private $view = null;
    private $titulo = "Canciones fúnebres";

    public function __construct()
    {
        $this->view = new View;
        $this->titulo = "Canciones fúnebres";
    }

    public function index()
    {

        $this->view->render('canciones/index', ['titulo' => 'Listado de canciones']);
    }

    public function listar()
    {
        $cancion = new Song();
        $canciones = $cancion->getAllSongs();


        $this->view->render('canciones/listar', ['titulo' => 'Listado de cancioness']);
    }


    public function ver($id = 0)
    {
        $id = (int) $id;
        if($id == 0){
            header("Location: /canciones/listar");
        }else{
            $this->titulo = 'Detalles';
            $cancion = new Song();
            $detalles = $cancion->getSong($id);

            require APP . 'view/_templates/header.php';
            require APP . 'view/canciones/ver.php';
            require APP . 'view/_templates/footer.php';




        }
    }

}