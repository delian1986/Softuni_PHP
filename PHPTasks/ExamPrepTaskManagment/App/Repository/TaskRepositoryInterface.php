<?php


namespace App\Repository;


interface TaskRepositoryInterface
{
    public function all():\Generator;
}