<?php


namespace TaskManagement\DTO;


class CategoryDTO
{

    const NAME_MIN_LENGTH=3;
    const NAME_MAX_LENGTH=50;


    private $id;

    private $name;

    private $taskCount;

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
    public function getName()
    {

        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        DTOValidator::validate(
            self::NAME_MIN_LENGTH,
            self::NAME_MAX_LENGTH,
            $name,
            "Name otu of range!"
        );

        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getTaskCount()
    {
        return $this->taskCount;
    }

    /**
     * @param mixed $taskCount
     */
    public function setTaskCount($taskCount): void
    {
        $this->taskCount = $taskCount;
    }



}