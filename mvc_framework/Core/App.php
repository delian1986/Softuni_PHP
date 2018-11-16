<?php


namespace Core;


use Core\DependencyManagement\ContainerInterface;
use Core\Http\RequestInterface;
use Core\ModelBinding\ModelBinderInterface;
use Core\View\View;
use Core\View\ViewInterface;

class App implements AppInterface
{
    /**
     * @var RequestInterface
     */
    private $request;
    /**
     * @var ModelBinderInterface
     */
    private $modelBinder;

    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * @var ViewInterface
     */
    private $view;


    /**
     * App constructor.
     * @param RequestInterface $request
     * @param ModelBinderInterface $modelBinder
     * @param ContainerInterface $container
     */
    public function __construct(RequestInterface $request, ModelBinderInterface $modelBinder, ContainerInterface $container, ViewInterface $view)
    {
        $this->request = $request;
        $this->modelBinder = $modelBinder;
        $this->container = $container;
        $this->view = $view;
    }


    public function run()
    {
        try {
            $controllerName = 'Controllers\\' . ucfirst($this->request->getControllerName()) . 'Controller';
            $controller = $this->container->resolve($controllerName);


            $actionInfo = new \ReflectionMethod($controllerName, $this->request->getActionName());
            $requestParameters = $this->request->getParameters();

            foreach ($actionInfo->getParameters() as $parameter) {
                $class = $parameter->getClass();
                if ($class) {
                    $className = $class->getName();
                    if ($this->container->exists($className)) {
                        $parameter = $this->container->resolve($className);
                    } else {
                        $parameter = $this->modelBinder->bind($_POST, $className);
                    }

                    $requestParameters[] = $parameter;
                }
            }
            call_user_func_array(
                [
                    $controller,
                    $this->request->getActionName()
                ],
                $requestParameters
            );
        } catch (\Exception $e) {
            $this->view->render('system/notFound', 'Resource Unavailable');
        }

    }


}