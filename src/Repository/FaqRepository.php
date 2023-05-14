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

    public function save(FaQ $question): void
    {
        $sql = 'INSERT INTO Faq (created_at,content_question) VALUES (?,?)';

        $now = new \DateTime();

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            $now->format('Y-m-d H:i:s'),
            \htmlspecialchars($question->getContentQuestion())
        ]);
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