<?php

namespace App\Entity;

class blogComment
{
    private int $id;
    private int $blogId;
    private \DateTime $createdAt;
    private string $title;
    private string $massage;


    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

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
     * @return int
     */
    public function getBlogId(): int
    {
        return $this->blogId;
    }

    /**
     * @param int $blogId
     */
    public function setBlogId(int $blogId): void
    {
        $this->blogId = $blogId;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt(\DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return string
     */
    public function getMassage(): string
    {
        return $this->massage;
    }

    /**
     * @param string $massage
     */
    public function setMassage(string $massage): void
    {
        $this->massage = $massage;
    }
}
