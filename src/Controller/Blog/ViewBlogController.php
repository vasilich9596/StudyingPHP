<?php

namespace App\Controller\Blog;

use App\Repository\BlogCommentRepository;
use App\Repository\blogRepository;

class ViewBlogController
{
    private blogRepository $blogRepository;
    private BlogCommentRepository $blogCommentRepository;

    public function __construct(blogRepository $blogRepository, BlogCommentRepository $blogCommentRepository)
    {
        $this->blogRepository = $blogRepository;
        $this->blogCommentRepository = $blogCommentRepository;
    }

    public function handleAction($blogId)
    {

        $blog = $this->blogRepository->find($blogId);

        if (false === $blog) {
            print 'ahahha page not found';
            exit();
        }

        $comments = $this->blogCommentRepository->findeByBlog($blogId);

        include __DIR__ . '/../../Resources/views/Blog/View.php';
    }
}
