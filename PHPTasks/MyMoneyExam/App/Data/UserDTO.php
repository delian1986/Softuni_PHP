<?php


namespace App\Data;


class UserDTO
{
    private CONST USERNAME_MIN_LENGTH=4;
    private CONST USERNAME_MAX_LENGTH=255;

    private CONST PASSWORD_MIN_LENGTH=4;
    private CONST PASSWORD_MAX_LENGTH=255;


    private $id;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var string
     */
    private $bornOn;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return UserDTO
     */
    public function setId( $id): UserDTO
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     * @return void
     * @throws \Exception
     */
    public function setUsername(string $username): void
    {
        DtoValidator::validate(self::USERNAME_MIN_LENGTH,self::USERNAME_MAX_LENGTH,$username,'text','Username');
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return void
     * @throws \Exception
     */
    public function setPassword(string $password): void
    {
        DtoValidator::validate(self::PASSWORD_MIN_LENGTH,self::PASSWORD_MAX_LENGTH,$password,'text','Password');
        $this->password = $password;

    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return void
     */
    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @return void
     */
    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getBornOn(): string
    {
        return $this->bornOn;
    }

    /**
     * @param string $bornOn
     * @return void
     */
    public function setBornOn(string $bornOn): void
    {
        $this->bornOn = $bornOn;
    }

}