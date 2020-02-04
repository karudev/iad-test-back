<?php
namespace App\Controller;
use App\Service\Auth;

/**
 * Class AbstractController
 * @package App\Controller
 */
class AbstractController
{

    /**
     * Get Request params
     * @return array
     */
    public function getRequest()
    {

        $request = array_map('htmlentities', $_REQUEST);

        return $request;
    }

    /**
     * Get Post params
     * @return array
     */
    public function getPost()
    {
        $post = array_map('htmlentities', $_POST);
        return $post;
    }

    /**
     * Get Query params
     * @return array
     */
    public function getQuery()
    {
        $get = array_map('htmlentities', $_GET);
        return $get;
    }

    /**
     * Render the view with the params
     * @param $templatePath
     * @param array $data
     */
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