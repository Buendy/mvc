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
		Session::init();
		$this->titulo = 'Preguntas';
	}
	public function todas()
	{
		$pregunta = new Pregunta();
		$preguntas = $pregunta->getAll();
		$this->view->render('preguntas/todas',[
			'preguntas' => $preguntas,
			'titulo' => $this->titulo
		]);
	}
	public function crear()
	{
		if ( ! $_POST ) {
			$this->view->render('preguntas/formulariopregunta');
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
				$this->view->render('preguntas/preguntainsertada');
			} else {
				$this->view->render('preguntas/formulariopregunta', [
					'errores' => $errores,
					'datos' => $_POST
				]);
			}
		}
	}


    public function editar($id = 0) {
        if ( ! $_POST ) {
            $pregunta = Pregunta::getId($id);
            if ($pregunta) {
                $this->view->render('preguntas/formulariopregunta', [
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
                $this->view->render('preguntas/formulariopregunta', [
                    'errores'	=>	['Error al editar'],
                    'accion'	=>	'editar',
                    'datos'		=> 	$_POST
                ]);
            }
        }

    }
}
