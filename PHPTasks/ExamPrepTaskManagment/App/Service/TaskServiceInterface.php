<?php


namespace App\Service;


interface TaskServiceInterface
{
    public function allTasks():\Generator;
}