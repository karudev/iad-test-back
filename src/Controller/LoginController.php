<?php
namespace App\Controller;

class LoginController extends AbstractController
{
    public function index()
    {

        $data = ['test' => 'test2'];
        $this->render('/login/index.phtml', $data);

    }

}