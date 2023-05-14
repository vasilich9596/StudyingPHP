<?php

namespace App\Controller\FaQ;

use App\Entity\FaQ;
use App\Repository\FaqRepository;
use Symfony\Component\HttpFoundation\Request;

class CreateFaqQuestionController
{
    private FaqRepository $faqRepository;

    public function __construct(FaqRepository $faqRepository)
    {
        $this->faqRepository = $faqRepository;
    }

    public function handleAction(Request $request): void
    {

        $question = new FaQ();
        $question->setContentQuestion($request->get('content_question'));

        $this->faqRepository->save($question);

        $redirectUrl = '/FAQ';

        header('Location:' . $redirectUrl);
    }
}