<?php


namespace Controllers;


use Core\Http\RequestInterface;
use Core\View\View;

abstract class AbstractController
{
    /**
     * @var View
     */
    protected $view;

    /**
     * @var RequestInterface
     */
    protected $request;

    /**
     * AbstractController constructor.
     * @param View $view
     * @param RequestInterface $request
     */
    public function __construct(View $view, RequestInterface $request)
    {
        $this->view = $view;
        $this->request=$request;
    }


}