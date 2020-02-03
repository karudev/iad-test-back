<?php


namespace App\Controller;


class AbstractController
{
    public function render($templatePath, $data)
    {
        $view = $data;
        $templatePath = __DIR__.'/../View/'.$templatePath;
        include $templatePath;
    }

}