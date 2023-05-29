<?php

namespace App\Controller\Blog;

use App\Repository\BlogCommentRepository;
use App\Repository\blogRepository;
use App\Service\TemplateRenderer;

class ViewBlogController
{
    private blogRepository $blogRepository;
    private BlogCommentRepository $blogCommentRepository;
    private TemplateRenderer $renderer;

    public function __construct( TemplateRenderer $renderer, blogRepository $blogRepository, BlogCommentRepository $blogCommentRepository)
    {
        $this->blogRepository = $blogRepository;
        $this->blogCommentRepository = $blogCommentRepository;
        $this->renderer = $renderer;
    }

    public function handleAction($blogId)
    {

        $blog = $this->blogRepository->find($blogId);

        if (false === $blog) {
            print 'ahahha page not found';
            exit();
        }

        $comments = $this->blogCommentRepository->findeByBlog($blogId);

        $content = $this->renderer->render(__DIR__.'/../../Resources/views/Blog/View.php' , [
        'blog' => $blog,
        'comments'=> $comments
    ]);

        print $content;
    }
}
