<?php

/**
 * Class Core
 * Create url and load core controller
 * URL Format * /controller/method/params
 */
class Core
{
    protected $url;
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct()
    {
        $this->url = $this->getUrl();
        $this->requireController();
        $this->requireMethod();
        $this->requireParams();


    }

    protected function requireMethod(): void
    {
        /**
         * check for second part of url
         */
        if (isset($this->url[1])) {
            if (method_exists($this->currentController, $this->url[1])) {
                $this->currentMethod = $this->url[1];
                unset($this->url[1]);
            }
        }
    }

    protected function requireController(): void
    {
        /**
         * require controller
         */
        if (file_exists('../app/Controllers/' . ucwords($this->url[0]) . '.php')) {
            $this->currentController = ucwords($this->url[0]);
            unset($this->url[0]);
        }
        require_once '../app/Controllers/' . $this->currentController . '.php';
        $this->currentController = new $this->currentController;

    }

    public function getUrl(): ?array
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
        return null;
    }

    public function requireParams(): void
    {
        /**
         * Get params
         */
        $this->params = $this->url ? array_values($this->url) : [];

        //Call a callback an array of params
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }
}

