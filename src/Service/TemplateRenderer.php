<?php

namespace App\Service;

class TemplateRenderer
{
public function render(string $template, array $variables = []): string
{
    ob_start();

    extract($variables);

    include $template;

     $content = ob_get_clean();

    return $content;
}
}