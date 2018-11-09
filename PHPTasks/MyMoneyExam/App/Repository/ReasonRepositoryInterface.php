<?php


namespace App\Repository;


use App\Data\ReasonDTO;

interface ReasonRepositoryInterface
{
    public function getAll():\Generator ;

    public function getOneById(int $id):?ReasonDTO;
}