<?php


namespace App\Http;


use App\Service\TaskServiceInterface;

class HomeHttpHandler extends HttpHandlerAbstract
{
    public function index(TaskServiceInterface $taskService){
        if (!isset($_SESSION['id'])){
            $this->render('home/index');
        }else{
            $this->render('tasks/index',$taskService->allTasks());
        }
    }
}