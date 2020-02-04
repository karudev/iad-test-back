<?php
namespace App\Controller;
use App\Model\Message;
use App\Service\Auth;

/**
 * Class TchatController
 * @package App\Controller
 */
class TchatController extends AbstractController
{
    /**
     * Tchat page with the messages
     */
    public function index()
    {
        if(!Auth::isConnected()){
            header('Location: /public');
            exit;
        }
        $messageModel = new Message();
        $messages = $messageModel->findBy([], true,'left join user on user.id = message.user_id', 'message.id');
        $this->render('/tchat/index.phtml', ['messages' => $messages]);

    }

    /**
     * Post a message
     */
    public function post()
    {
        $data = $this->getPost();
        $messageModel = new Message();
        $messageModel->insert([
            'message' => $data['message'],
            'created_at' => date('Y-m-d H:i:s'),
            'user_id' => Auth::getUser()['id'],
            ]);

        header('Location: /public/?controller=tchat');
        exit;


    }


}