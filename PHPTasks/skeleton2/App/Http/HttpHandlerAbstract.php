<?php


namespace App\Http;


use Core\DataBinderInterface;
use Core\TemplateInterface;

abstract class HttpHandlerAbstract
{
    /**
     * @var TemplateInterface
     */
    private $template;

    /**
     * @var DataBinderInterface
     */
    protected $dataBinder;

    /**
     * HttpHandlerAbstract constructor.
     * @param TemplateInterface $template
     * @param DataBinderInterface $binder
     */
    public function __construct(TemplateInterface $template, DataBinderInterface $binder)
    {
        $this->template = $template;
        $this->dataBinder = $binder;
    }

    public function render(string $templateName, $data = null, array $error=[]): void
    {
        $this->template->render($templateName,$data,$error);
    }

    public function redirect(string $url): void
    {
        header("Location: $url");
        exit;
    }
}