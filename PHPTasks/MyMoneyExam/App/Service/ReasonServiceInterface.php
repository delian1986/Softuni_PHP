<?php


namespace App\Service;


use App\Data\ReasonDTO;

interface ReasonServiceInterface
{
    public function getAll():\Generator;

    public function getOneById(int $id):?ReasonDTO;

}