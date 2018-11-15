<?php


namespace Services\User;



interface UserServiceInterface
{
    public function register($obj) ;
    public function login(string $username, string $password) ;
    public function currentUser() ;
    public function edit($obj):bool ;

    /**
     * @return \Generator | $obj[]
     */
    public function allUsers():\Generator;
}