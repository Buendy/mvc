<?php
namespace Mini\Core;

class TemplatesFactory
{
    private static $templates;

    public static function templates()
    {
        if(!TemplatesFactory::$templates){
            TemplatesFactory::$templates = new League\Plates\Engine(APP . 'view');
            TemplatesFactory::$templates->addData(['titulo' => 'FAQ']);

            return TemplatesFactory::$templates;
        }
    }
}