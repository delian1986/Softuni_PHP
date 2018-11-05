<?php


namespace TaskManagement\Http;


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
    protected $binder;

    /**
     * HttpHandlerAbstract constructor.
     * @param TemplateInterface $template
     * @param DataBinderInterface $binder
     */
    public function __construct(TemplateInterface $template, DataBinderInterface $binder)
    {
        $this->template = $template;
        $this->binder = $binder;
    }

    public function render(string $templateName, $data = null): void
    {
        $this->template->render($templateName, $data);
    }

    public function redirect(string $url): void
    {
        header("Location: $url");
        exit;
    }
}