<?php

namespace App\Repository;

use App\Entity\Blog;

class blogRepository
{
    private \PDO $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function find(int $blogId): ?Blog
    {
        $stmt = $this->pdo->prepare('SELECT * FROM blogs WHERE id = ?');
        $stmt->execute([$blogId]);

        $rawData = $stmt->fetch(\PDO::FETCH_ASSOC);

        $blog = new Blog();


        $blog->setId($rawData['id']);
        $blog->setCreatedAt(new \DateTime($rawData['created_at']));
        $blog->setTitle($rawData['title']);
        $blog->setPreview($rawData['preview']);
        $blog->setContent($rawData['content']);

        return $blog;
    }

    public function findAll(): array
    {

        $stmt = $this->pdo->prepare('SELECT * FROM blogs ORDER BY created_at DESC ');
        $stmt->execute();

        $rawData = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $blogs = [];

        foreach ($rawData as $item){
            $blog = new Blog();

            $blog->setId($item['id']);
            $blog->setCreatedAt(new \DateTime($item['created_at']));
            $blog->setTitle($item['title']);
            $blog->setPreview($item['preview']);
            $blog->setContent($item['content']);

            $blogs[] = $blog;
        }
        return $blogs;
    }
}