<?php

namespace Mini\Controller;
use Mini\Model\Pregunta;
use Mini\Core\View;


class PreguntasController
{
    private $view = null;
    private $titulo;

    public function __construct()
    {
        $this->view = new View;
        $this->titulo = "Preguntas sin respuesta";
    }


    public function todas()
    {
        $pregunta = new Pregunta();
        $preguntas = $pregunta->getAll();


        $this->view->render('preguntas/todas', ['preguntas' => $preguntas, 'titulo' => $this->titulo]);
    }


    public function crear()
    {
        if( ! $_POST){
            $this->view->render('preguntas/formulariopregunta');
        }else{
            if(!isset($_POST['asunto'])){
                $_POST['asunto'] = "";
            }
            if(!isset($_POST['cuerpo'])){
                $_POST['cuerpo'] = "";
            }
            $datos = ['asunto' => $_POST['asunto'], 'cuerpo' => $_POST['cuerpo']];
            if (Preguntas::insert($datos)){
                $this->view->render('preguntas/preguntainsertada');
            }else{
                $this->view->render('preguntas/formulariopregunta', ['errores' => ['Error al insertar'], 'datos' => $_POST]);

            }
        }

    }
}


?>