<?php


namespace Models\ViewModels;


class UserProfileViewModel
{
    /**
     * @var string
     */
    private $fullName;



    /**
     * UserProfileViewModel constructor.
     * @param string $fullName
     */
    public function __construct(string $fullName)
    {
        $this->fullName = $fullName;
    }

    /**
     * @return string
     */
    public function getFullName(): string
    {
        return $this->fullName;
    }




}