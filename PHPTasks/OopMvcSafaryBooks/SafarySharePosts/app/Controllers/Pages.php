<?php


class Pages extends Controller
{
    public function __construct()
    {

    }


    public function index(): void
    {
        if (isLoggedIn()){
            redirect('posts');
        }
        $data = [
            'title' => 'Safary MVC Shareposts!',
            'description'=>'Simple social network'
            ];
        $this->view('pages/index', $data);
    }

    public function about(): void
    {
        $data = [
            'title' => 'About!',
            'description'=>'Simple social network'
            ];

        $this->view('pages/about', $data);
    }
}