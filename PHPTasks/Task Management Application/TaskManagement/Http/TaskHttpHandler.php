<?php


namespace TaskManagement\Http;

use TaskManagement\Service\CategoryServiceInterface;

class TaskHttpHandler extends HttpHandlerAbstract
{
    public function report(CategoryServiceInterface $categoryService): void
    {
        $reportData=$categoryService->report();
        $this->render('home/report',$reportData);
    }


}