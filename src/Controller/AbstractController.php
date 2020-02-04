<?php


namespace App\Controller;


use App\Service\Auth;

class AbstractController
{

    public function getRequest()
    {
        $request = $_REQUEST;

        return $request;
    }

    public function getPost()
    {
        $post = $_POST;

        return $post;
    }

    public function getQuery()
    {
        $get = $_GET;

        return $get;
    }
    public function render($templatePath, $data = [])
    {
        $view = $data;
        $user = Auth::getUser();
        if($user){
            $view = array_merge($view, ['_user' => $user]);
        }
        $templatePath = __DIR__.'/../View/'.$templatePath;
        include $templatePath;
    }

}