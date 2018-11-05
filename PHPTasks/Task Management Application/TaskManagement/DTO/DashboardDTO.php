<?php


namespace TaskManagement\DTO;


class DashboardDTO
{
    /**
     * @var \Generator | TaskDTO[]
     */
    private $tasks;

    /**
     * @var int
     */
    private $currentPage;

    /**
     * @var int
     */
    private $allPages;


    /**
     * @var bool
     */
    private $hasPrevious;

    /**
     * @var bool
     */
    private $hasNext;

    /**
     * @return \Generator|TaskDTO[]
     */
    public function getTasks()
    {
        return $this->tasks;
    }

    /**
     * @param \Generator|TaskDTO[] $tasks
     */
    public function setTasks($tasks): void
    {
        $this->tasks = $tasks;
    }

    /**
     * @return int
     */
    public function getCurrentPage(): int
    {
        return $this->currentPage;
    }

    /**
     * @param int $currentPage
     */
    public function setCurrentPage(int $currentPage): void
    {
        $this->currentPage = $currentPage;
    }

    /**
     * @return int
     */
    public function getAllPages(): int
    {
        return $this->allPages;
    }

    /**
     * @param int $allPages
     */
    public function setAllPages(int $allPages): void
    {
        $this->allPages = $allPages;
    }

    /**
     * @return bool
     */
    public function hasPrevious(): bool
    {
        return $this->hasPrevious;
    }

    /**
     * @param bool $hasPrevious
     */
    public function setPrevious(bool $hasPrevious): void
    {
        $this->hasPrevious = $hasPrevious;
    }

    /**
     * @return bool
     */
    public function hasNext(): bool
    {
        return $this->hasNext;
    }

    /**
     * @param bool $hasNext
     */
    public function setNext(bool $hasNext): void
    {
        $this->hasNext = $hasNext;
    }


}