<?php


namespace App\Http;


use App\Data\CategoryDTO;
use App\Data\EditTaskDTO;
use App\Data\ErrorDTO;
use App\Data\TaskDTO;
use App\Data\UserDTO;
use App\Service\CategoryServiceInterface;
use App\Service\TaskServiceInterface;
use App\Service\UserServiceInterface;
use Core\DataBinderInterface;

class TaskHttpHandler extends HttpHandlerAbstract
{
    public function addTask(TaskServiceInterface $taskService, CategoryServiceInterface $categoryService, UserServiceInterface $userService, $formData = [])
    {
        if (!isset($_POST['save'])) {
            $categories = $categoryService->getAll();
            $this->render('tasks/add', $categories);
        } else {
            $this->handleInsertProcess($taskService, $categoryService, $userService);
        }
    }

    public function editTask(TaskServiceInterface $taskService, CategoryServiceInterface $categoryService, UserServiceInterface $userService, $formData = [], $getData = [])
    {
        if (!isset($_SESSION['id'])) {
            $this->redirect('index.php');
        }

        if (!isset($formData['edit'])) {
            /**
             * @var TaskDTO $task
             * @var CategoryDTO[] $categories
             * @var EditTaskDTO $editTaskDTO
             */
            $task = $taskService->getOne(intval($getData['id']));
            $categories = $categoryService->getAll();
            $editTaskDTO = new EditTaskDTO();
            $editTaskDTO->setTask($task);
            $editTaskDTO->setCategories($categories);

            $this->render('tasks/edit', $editTaskDTO);
        } else {
            $this->handleEditProcess($taskService, $categoryService, $userService,$formData);
        }
    }

    public function remove(TaskServiceInterface $taskService,array $getData=[]){
        if (!isset($_SESSION['id'])) {
            $this->redirect('index.php');
        }

        $taskService->remove(intval($getData['id']));
        $this->redirect('index.php');
    }

    /**
     * @param TaskServiceInterface $taskService
     * @param CategoryServiceInterface $categoryService
     * @param UserServiceInterface $userService
     */
    public function handleInsertProcess(TaskServiceInterface $taskService, CategoryServiceInterface $categoryService, UserServiceInterface $userService): void
    {
        /**
         * @var TaskDTO $task
         * @var UserDTO $author
         * @var CategoryDTO $category
         */
        $task = $this->dataBinder->bind($_POST, TaskDTO::class);
        $author = $userService->currentUser();
        $category = $categoryService->getById(intval($_POST['category']));
        $task->setAuthor($author);
        $task->setCategory($category);

        if ($taskService->insert($task)) {
            $this->redirect('index.php');
        } else {
            $this->render('app/error', new ErrorDTO('Task was not added'));
        }
    }

    private function handleEditProcess(TaskServiceInterface $taskService, CategoryServiceInterface $categoryService, UserServiceInterface $userService,$formData)
    {
        /**
         * @var TaskDTO $task
         * @var UserDTO $author
         * @var CategoryDTO $category
         */
        $task = $this->dataBinder->bind($_POST, TaskDTO::class);
        $author = $userService->currentUser();
        $category = $categoryService->getById(intval($_POST['category']));
        $task->setAuthor($author);
        $task->setCategory($category);

        if ($taskService->insert($task)) {
            $this->redirect('index.php');
        } else {
            $this->render('app/error', new ErrorDTO('Task was not added'));
        }
    }
}