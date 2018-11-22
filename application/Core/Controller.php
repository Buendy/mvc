<?php
namespace Mini\Core;

class Controller
{
    protected $view;
    public function __construct()
    {
        $this->view = TemplatesFactory::templates();
        Session::init();

    }
}