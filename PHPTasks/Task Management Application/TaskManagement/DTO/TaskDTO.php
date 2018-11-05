<?php


namespace TaskManagement\DTO;


use TaskManagement\Repository\TaskRepositoryInterface;

class TaskDTO
{
    const FIELDS_MAX_LENGTH = 255;

    const TITLE_MIN_LENGTH = 3;
    const TITLE_MAX_LENGTH = 50;

    const DESCRIPTION_MIN_LENGTH = 10;
    const DESCRIPTION_MAX_LENGTH = 10000;

    const LOCATION_MIN_LENGTH = 3;
    const LOCATION_MAX_LENGTH = 100;



    private $id;

    private $title;

    private $description;

    private $location;

    /**
     * @var UserDTO
     */
    private $author;

    /**
     * @var CategoryDTO
     */
    private $category;

    private $startedOn;

    private $dueDate;




    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     * @throws \Exception
     */
    public function setTitle($title): void
    {
        DTOValidator::validate(self::TITLE_MIN_LENGTH,self::TITLE_MAX_LENGTH,$title,"Title out of range!");
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     * @throws \Exception
     */
    public function setDescription($description): void
    {
        DTOValidator::validate(self::DESCRIPTION_MIN_LENGTH,self::DESCRIPTION_MAX_LENGTH,$description,"Description out of range!");
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param mixed $location
     * @throws \Exception
     */
    public function setLocation($location): void
    {
        DTOValidator::validate(self::LOCATION_MIN_LENGTH,self::LOCATION_MAX_LENGTH,$location,"Location name length out of range!");
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
     * @return mixed
     */
    public function getStartedOn()
    {
        return $this->startedOn;
    }

    /**
     * @param mixed $startedOn
     */
    public function setStartedOn($startedOn): void
    {
        $this->startedOn = $startedOn;
    }

    /**
     * @return mixed
     */
    public function getDueDate()
    {
        return $this->dueDate;
    }

    /**
     * @param mixed $dueDate
     */
    public function setDueDate($dueDate): void
    {
        $this->dueDate = $dueDate;
    }

}