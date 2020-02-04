<?php
namespace App\Controller;
use App\Model\User;
use App\Service\Auth;

class TchatController extends AbstractController
{
    public function index()
    {
        if(!Auth::isConnected()){
            header('Location: /public');
            exit;
        }
        $this->render('/tchat/index.phtml', []);

    }


}