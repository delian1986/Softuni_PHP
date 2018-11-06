<?php


namespace TaskManagement\Http;

use TaskManagement\Service\CategoryServiceInterface;
use TaskManagement\Service\TaskServiceInterface;

class TaskHttpHandler extends HttpHandlerAbstract
{
    public function report(CategoryServiceInterface $categoryService): void
    {
        $reportData=$categoryService->report();
        $this->render('home/report',$reportData);
    }

    public function add(TaskServiceInterface $taskService, array $formData=[]){

    }

    public function handleInsertProcess(TaskServiceInterface $taskService){

    }

}