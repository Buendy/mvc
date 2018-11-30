<?php
namespace Mini\Controller;
use Mini\Model\Pregunta;
use Mini\Core\View;
use Mini\Core\Session;
use Mini\Core\Controller;
class PreguntasController extends Controller
{

    private $titulo;
    public function __construct()
    {
        parent::__construct();
        $this->titulo = 'Preguntas';
    }
    public function todas()
    {
        $pregunta = new Pregunta();
        $preguntas = $pregunta->getAll();
        echo $this->view->render('preguntas/todas',[
            'preguntas' => $preguntas,
            'titulo' => $this->titulo
        ]);

    }
    public function crear()
    {
        if ( ! $_POST ) {
            echo $this->view->render('preguntas/formulariopregunta');
        } else {
            $errores = [];
            if ( ! isset($_POST['asunto'])) {
                $errores['asunto'] = "El campo asunto no puede estar vacío";
                $_POST['asunto'] = "";
            }
            if ( ! isset($_POST['cuerpo'])) {
                $errores['cuerpo'] = "El campo cuerpo no puede estar vacío";
                $_POST['cuerpo'] = "";
            }
            $datos = [
                'asunto' => $_POST['asunto'],
                'cuerpo' => $_POST['cuerpo']
            ];
            if ( Pregunta::insert($datos) ) {
                if (! is_null(Session::get('feedback_positive')) && count(Session::get('feedback_positive'))>0){
                    $feedback = 'positive';
                    $errors = Session::get('feedback_positive');
                }
               echo $this->view->render('preguntas/preguntaInsertada');
            } else {
                if (! is_null(Session::get('feedback_negative')) && count(Session::get('feedback_negative'))>0){
                    $feedback = 'negative';
                    $errors = Session::get('feedback_negative');
                }
                echo $this->view->render('preguntas/formulariopregunta', [
                    'datos' => $_POST,
                    'feedback' => $feedback,
                    'errors' => $errors
                ]);
            }
        }
    }
    public function editar($id = 0) {
        if ( ! $_POST ) {
            $pregunta = Pregunta::getId($id);
            if ($pregunta) {
                echo $this->view->render('preguntas/formulariopregunta', [
                    'accion'	=>	'editar',
                    'datos'		=> 	get_object_vars($pregunta)
                ]);
            } else {
                header("location: /preguntas/todas");
            }
        } else {
            $datos = [
                'id'		=> (isset($_POST['id'])) ? $_POST['id'] : 0 ,
                'asunto'	=> (isset($_POST['asunto'])) ? $_POST['asunto'] : '' ,
                'cuerpo'	=> (isset($_POST['cuerpo'])) ? $_POST['cuerpo'] : ''
            ];
            if (Pregunta::edit($datos)) {
                header('location: /preguntas/todas');
            } else {
                echo $this->view->render('preguntas/formulariopregunta', [
                    'errores'	=>	['Error al editar'],
                    'accion'	=>	'editar',
                    'datos'		=> 	$_POST
                ]);
            }
        }

    }
}