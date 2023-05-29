<?php

namespace App\Controller\Blog;

use App\Entity\blogComment;
use App\Repository\BlogCommentRepository;
use Symfony\Component\HttpFoundation\Request;

class CreateBlogCommentController
{

    private BlogCommentRepository $commentRepository;

    /**
     * constructor
     */
    public function __construct(BlogCommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;

    }


    public function handleAction(Request $request): void
    {
        $comment = new blogComment();
        $comment->setBlogId($request->get('blog_id'));
        $comment->setTitle($request->get('comment_title'));
        $comment->setMassage($request->get('massage'));

        $this->commentRepository->save($comment);

        $redirectUrl = '/Blogs/' . $request->get('blog_id');

        header('Location:' . $redirectUrl);
    }
}

