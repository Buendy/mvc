<?php
namespace Mini\Core;
use League\Plates\Engine;

class TemplatesFactory
{
    private static $templates;

    public static function templates()
    {
        if(!TemplatesFactory::$templates){
            TemplatesFactory::$templates = new Engine(APP . 'view');
            TemplatesFactory::$templates->addData(['titulo' => 'FAQ']);

            return TemplatesFactory::$templates;
        }
    }
}