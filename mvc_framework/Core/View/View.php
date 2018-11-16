<?php


namespace Core\View;


use Core\Http\RequestInterface;
use Core\Http\UrlBuilderInterface;

class View implements ViewInterface
{
    /**
     * @var RequestInterface
     */
    private $request;

    /**
     * @var UrlBuilderInterface
     */
    private $urlBuilder;

    /**
     * View constructor.
     * @param RequestInterface $request
     * @param UrlBuilderInterface $urlBuilder
     */
    public function __construct(RequestInterface $request, UrlBuilderInterface $urlBuilder)
    {
        $this->request = $request;
        $this->urlBuilder = $urlBuilder;
    }


    public function render($viewName = null, $model = null)
    {
        if (null == $viewName || is_object($viewName)) {
            $model = $viewName;
            $viewName = $this->request->getControllerName() . DIRECTORY_SEPARATOR . $this->request->getActionName();
        }
        require_once 'views/' . $viewName . '.php';
    }

    public function url($controller, $action, ...$param)
    {
        return $this->urlBuilder->build($controller, $action, $param);
    }
}