<?php

namespace App\Controller\FaQ;

class FaqController
{
    /**
     * @var \PDO
     */
    private \PDO $pdo;

    public function __construct(\PDO $pdo)
    {
        $this->pdo = $pdo;

    }

    public function HandleAction()
    {
        $stmt = $this->pdo->prepare('SELECT * FROM Faq ORDER BY created_at DESC  ');
        $stmt->execute();

        $rawFaQ = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $FaQ = [];

        foreach ($rawFaQ as $item) {
        $FaQ['id'] = $item['id'];
        $FaQ['created_at'] = $item['created_at'];
        $FaQ['content_question'] = $item['content_question'];
        $FaQ['content_answer'] = $item['content_answer'];

        }

        if (false === $rawFaQ) {
            print 'page not found';
            exit();
        }


        include __DIR__ . '/../../Resources/views/FaQ/view.php';
    }
}