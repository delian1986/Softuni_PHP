<?php


namespace Control;


interface Control
{
    public function validateId($id):bool ;
    public function getId():string ;
}