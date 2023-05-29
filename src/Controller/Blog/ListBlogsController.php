<?php

namespace App\Controller\Blog;

use App\Repository\blogRepository;
use App\Service\TemplateRenderer;

class ListBlogsController
{

    private blogRepository $blogRepository;
    private TemplateRenderer $renderer;

    public function __construct(blogRepository $blogRepository,TemplateRenderer $renderer)
    {
        $this->blogRepository = $blogRepository;
        $this->renderer = $renderer;
    }

    public function handleAction()
    {
        $blogs = $this->blogRepository->findAll();

       $content = $this->renderer->render(__DIR__.'/../../Resources/views/Blog/list.php' ,['blogs' => $blogs]);

       print $content;
    }

}
