<?php


class Pages extends Controller
{
    public function __construct()
    {

    }


    public function index(): void
    {
        $data = [
            'title' => 'SafaryMVC!',

            ];
        $this->view('pages/index', $data);
    }

    public function about(): void
    {
        $data = ['title' => 'About!'];

        $this->view('pages/about', $data);
    }
}