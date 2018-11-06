<?php


namespace App\Http;


use App\Service\TaskServiceInterface;

class TaskHttpHandler extends HttpHandlerAbstract
{
    public function index(TaskServiceInterface $taskService){
        if (!isset($_SESSION['id'])){
            $this->redirect('index.php');
        }else{
            $this->render('tasks/index',$taskService->allTasks());
        }
    }
}