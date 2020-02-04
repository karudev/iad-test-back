<?php
namespace App\Controller;
use App\Model\User;
use App\Service\Auth;

class SecurityController extends AbstractController
{
    public function index()
    {

        $data = ['test' => 'test2'];
        $this->render('/security/index.phtml', $data);

    }

    public function loginCheck()
    {
        $data = $this->getPost();

        if(isset($data['login']) && $data['login'] != null && isset($data['password']) && $data['password'] != null){
            $user = new User();
            $user = $user->findBy(['email' => $data['login'], 'password' => hash('sha256', $data['password'])]);
            if($user){
                Auth::connect($user);
                header('Location: /public/?controller=tchat');
                exit;
            }
        }

        header('Location: /public');
        exit;

    }
    public function logout()
    {
        Auth::disconnect();
        header('Location: /public');
        exit;
    }


}