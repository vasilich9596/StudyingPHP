<?php

namespace App\Entity;

class FaQ
{
    private int $id;
    private \DateTime $created_at;
    private string $content_question;
    private string $content_answer;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->created_at;
    }

    /**
     * @param \DateTime $created_at
     */
    public function setCreatedAt(\DateTime $created_at): void
    {
        $this->created_at = $created_at;
    }

    /**
     * @return string
     */
    public function getContentQuestion(): string
    {
        return $this->content_question;
    }

    /**
     * @param string $content_question
     */
    public function setContentQuestion(string $content_question): void
    {
        $this->content_question = $content_question;
    }

    /**
     * @return string
     */
    public function getContentAnswer(): string
    {
        return $this->content_answer;
    }

    /**
     * @param string|null $content_answer
     */
    public function setContentAnswer(? string $content_answer): void
    {
        if ($content_answer == null){
            $content_answer = 'wait for answer';
        }

        $this->content_answer = $content_answer;
    }

}
