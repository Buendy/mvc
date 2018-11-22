<?php
namespace Mini\Controller;
use Mini\Core\View;
class ErrorController
{
    private $view = null;
    private $msg;
    public function __construct($msg = "") {
        $this->view = new View;
        $this->msg = $msg;
    }
    public function index()
    {
        $this->view->render('error/index');
    }
}