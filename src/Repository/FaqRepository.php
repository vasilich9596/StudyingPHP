<?php

namespace App\Repository;

use App\Entity\FaQ;

class FaqRepository
{
    private \PDO $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function findAll(): array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM Faq ORDER BY created_at DESC ');
        $stmt->execute();

        $rawData = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        $question = [];

        foreach ($rawData as $item){
            $Faq = new FaQ();

            $Faq->setId($item['id']);
            $Faq->setCreatedAt(new \DateTime($item['created_at']));
            $Faq->setContentQuestion($item['content_question']);
            $Faq->setContentAnswer($item['content_answer']);

            $question[] = $Faq;
        }
        return $question;
    }
}