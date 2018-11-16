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
     * @var array
     */
    private $parameters;

    /**
     * @var string
     */
    private $queryString;

    /**
     * @var string
     */
    private $executingPath;

    /**
     * @var string
     */
    private $host;

    /**
     * Request constructor.
     * @param string $controllerName
     * @param string $actionName
     * @param array $parameters
     * @param string $queryString
     * @param $executingPath
     * @param $host
     */
    public function __construct(string $controllerName, ?string $actionName, array $parameters, string $queryString, $executingPath, $host)
    {
        $this->setControllerName($controllerName);
        $this->setActionName($actionName);
        $this->parameters = $parameters;
        $this->queryString = $queryString;
        $this->executingPath = $executingPath;
        $this->host = $host;
    }

    /**
     * @param string $controllerName
     */
    public function setControllerName(string $controllerName)
    {
        if ('' === $controllerName) {
            $this->controllerName = 'home';
        } else {
            $this->controllerName = $controllerName;
        }
    }

    /**
     * @param string $actionName|null
     */
    public function setActionName(?string $actionName)
    {
        if (null === $actionName) {
            $this->actionName = 'index';
        } else {
            $this->actionName = $actionName;
        }
    }


    /**
     * @return string
     */
    public function getControllerName(): string
    {
        return $this->controllerName;
    }

    /**
     * @return string
     */
    public function getActionName(): string
    {
        return $this->actionName;
    }

    /**
     * @return array
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }

    /**
     * @return string
     */
    public function getQueryString(): string
    {
        return $this->queryString;
    }

    /**
     * @return string
     */

    public function getExecutingPath(): string
    {
        return $this->executingPath;
    }

    /**
     * @return string
     */
    public function getHost(): string
    {
        return $this->host;
    }

    public function redirect($url)
    {
        header("Location: $url");
        exit;
    }
}