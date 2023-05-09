<?php

namespace App\Controller\FaQ;


use App\Repository\FaqRepository;
use App\Service\TemplateRenderer;

class FaqController
{
    /**
     * @var TemplateRenderer
     * @var FaqRepository
     */
    private FaqRepository $faqRepository;
    private TemplateRenderer $renderer;


    public function __construct(FaqRepository $faqRepository,TemplateRenderer $renderer)
    {
        $this->renderer = $renderer;
        $this->faqRepository = $faqRepository;


    }

    public function HandleAction()
    {

        $FaQ = $this->faqRepository->findAll();


        $content = $this->renderer->render(__DIR__.'/../../Resources/views/FaQ/view.php',['FaQ' => $FaQ]);

       print $content;
    }
}