<?php

namespace App\Repository;

use App\Entity\blogComment;

class BlogCommentRepository
{
    private \PDO $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }
    public function save(BlogComment $comment): void
    {
        $sql = 'INSERT INTO blog_comments (blog_id, created_at,comment_title, massage) VALUES (?,?,?,?)';

        $now = new \DateTime();

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            $comment->getBlogId(),
            $now->format('Y-m-d H:i:s'),
            \htmlspecialchars($comment->getTitle()),
            \htmlspecialchars($comment->getMassage())
        ]);
    }

    public function findeByBlog(int $blogId): array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM blog_comments WHERE blog_id = ? ORDER BY created_at DESC');
        $stmt->execute([$blogId]);

        $rawData = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $comments = [];

        foreach ($rawData as $item) {
            $comment = new blogComment();

            $comment->setId($item['id']);
            $comment->setBlogId($item['blog_id']);
            $comment->setCreatedAt(new \DateTime($item['created_at']));
            $comment->setTitle($item['comment_title']);
            $comment->setMassage($item['massage']);

            $comments[] = $comment;

        }
        return $comments;
    }
}