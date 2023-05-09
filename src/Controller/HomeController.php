<?php

namespace App\Controller;

use App\Service\TemplateRenderer;

class HomeController
{
    private TemplateRenderer $renderer;

    public function __construct(TemplateRenderer $renderer)
    {
        $this->renderer = $renderer;
    }

    public function HandleAction()
    {
        $content = $this->renderer->render(__DIR__.'/../Resources/views/home.php');

       print $content;

    }
}

