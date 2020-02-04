<?php
namespace App\Controller;
use App\Model\User;
use App\Service\Auth;

/**
 * Class SecurityController
 * @package App\Controller
 */
class SecurityController extends AbstractController
{
    /**
     * Login page
     */
    public function index()
    {
        $this->render('/security/index.phtml');
    }

    /**
     * Check the authentification
     */
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

    /**
     * Disconnect the user
     */
    public function logout()
    {
        Auth::disconnect();
        header('Location: /public');
        exit;
    }


}