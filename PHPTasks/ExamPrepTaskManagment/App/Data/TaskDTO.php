<?php


namespace App\Data;


class TaskDTO
{
    private CONST TITLE_MIN_LENGTH = 3;
    private CONST TITLE_MAX_LENGTH = 50;
    private CONST DESCRIPTION_MIN_LENGTH = 10;
    private CONST DESCRIPTION_MAX_LENGTH = 10000;
    private CONST LOCATION_MIN_LENGTH = 3;
    private CONST LOCATION_MAX_LENGTH = 100;

    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $location;

    /**
     * @var UserDTO
     */
    private $author;

    /**
     * @var CategoryDTO
     */
    private $category;

    /**
     * @var string
     */
    private $startedOn;

    /**
     * @var string
     */
    private $dueDate;

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
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @throws \Exception
     */
    public function setTitle(string $title): void
    {
        if (ValidatorDTO::validate(self::TITLE_MIN_LENGTH, self::TITLE_MAX_LENGTH, $title, 'Title must be between 3 and 50 symbols long!')) {
            $this->title = $title;
        }
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @throws \Exception
     */
    public function setDescription(string $description): void
    {
        if (ValidatorDTO::validate(self::DESCRIPTION_MIN_LENGTH, self::DESCRIPTION_MAX_LENGTH, $description, 'Description must be between 10 and 10000 chars long!')) {
            $this->description = $description;
        }
    }

    /**
     * @return string
     */
    public function getLocation(): string
    {
        return $this->location;
    }

    /**
     * @param string $location
     * @throws \Exception
     */
    public function setLocation(string $location): void
    {
        if (ValidatorDTO::validate(self::LOCATION_MIN_LENGTH,self::LOCATION_MAX_LENGTH,$location,'Location must be between 3 and 100 chars long!'))
        $this->location = $location;
    }

    /**
     * @return UserDTO
     */
    public function getAuthor(): UserDTO
    {
        return $this->author;
    }

    /**
     * @param UserDTO $author
     */
    public function setAuthor(UserDTO $author): void
    {
        $this->author = $author;
    }

    /**
     * @return CategoryDTO
     */
    public function getCategory(): CategoryDTO
    {
        return $this->category;
    }

    /**
     * @param CategoryDTO $category
     */
    public function setCategory(CategoryDTO $category): void
    {
        $this->category = $category;
    }

    /**
     * @return string
     */
    public function getStartedOn(): string
    {
        return $this->startedOn;
    }

    /**
     * @param string $startedOn
     */
    public function setStartedOn(string $startedOn): void
    {
        $this->startedOn = $startedOn;
    }

    /**
     * @return string
     */
    public function getDueDate(): string
    {
        return $this->dueDate;
    }

    /**
     * @param string $dueDate
     */
    public function setDueDate(string $dueDate): void
    {
        $this->dueDate = $dueDate;
    }


}