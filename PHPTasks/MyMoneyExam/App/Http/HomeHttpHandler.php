<?php


namespace App\Http;


class HomeHttpHandler extends HttpHandlerAbstract
{
    public function index()
    {
        if (!isset($_SESSION['id'])) {
            $this->render('home/index');
        }else{
            $this->redirect('operations.php');
        }
    }
}