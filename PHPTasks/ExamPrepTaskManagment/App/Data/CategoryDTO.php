<?php


namespace App\Data;


class CategoryDTO
{
    private CONST NAME_MIN_LENGTH=3;
    private CONST NAME_MAX_LENGTH=50;
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @throws \Exception
     */
    public function setName(string $name): void
    {
        if (ValidatorDTO::validate(self::NAME_MIN_LENGTH,self::NAME_MAX_LENGTH,$name,'Category name must be between 3 and 50 symbols long!')){
            $this->name = $name;
        }
    }
    

}