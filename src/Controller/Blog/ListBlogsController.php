<?php

namespace App\Controller\Blog;

use App\Repository\blogRepository;

class ListBlogsController
{

    private blogRepository $blogRepository;

    public function __construct(blogRepository $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }

    public function handleAction()
    {
        $blogs = $this->blogRepository->findAll();

        include __DIR__ . '/../../Resources/views/Blog/list.php';
    }
}
