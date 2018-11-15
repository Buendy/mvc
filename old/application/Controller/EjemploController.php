<?php

namespace Mini\Controller;

class EjemploController
{
    //Ejemplo de uso de la libreria Kint
    private $prop1 = 'Propiedad 1';

    public function index()
    {
        echo "Estoy en el método index del controlador de ejemplo<br>";
    }

    public function acercade()
    {
        echo 'Somos el curso de 2 DAW del Ingeniero<br>';
        //Ejemplo de uso de la libreria Kint
        d($this);
    }
}