<?php


namespace Core;


class Template implements TemplateInterface
{
    const TEMPLATE_DIRECTORY='app/Templates/';
    const TEMPLATE_EXTENSION='.php';

    public function render(string $templateName, $data=null,$errors=[])
    {
        require_once self::TEMPLATE_DIRECTORY . $templateName . self::TEMPLATE_EXTENSION;
    }
}