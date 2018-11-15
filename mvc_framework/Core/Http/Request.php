<?php


namespace Core\Http;


class Request implements RequestInterface
{
    /**
     * @var string
     */
    private $controllerName;

    /**
     * @var string
     */
    private $actionName;

    /**
     * @var string
     */
    private $queryString;

    /**
     * Request constructor.
     * @param string $controllerName
     * @param string $actionName
     * @param $queryString
     */
    public function __construct(string $controllerName, string $actionName, $queryString)
    {
        $this->controllerName = $controllerName;
        $this->actionName = $actionName;
        $this->queryString = $queryString;
    }


    public function getControllerName(): string
    {
        return $this->controllerName;
    }

    public function getActionName(): string
    {
        return $this->actionName;
    }

    public function getQueryString(): string
    {
        return $this->queryString;
    }
}