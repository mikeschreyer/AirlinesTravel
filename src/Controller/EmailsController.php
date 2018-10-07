<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Email;

class EmailsController extends AppController {
    
    public function isAuthorized($user) {
        $action = $this->request->getParam('action');

        if (isset($user['role']) && $user['role'] === 'admin') {
            return true;
        }
    }

    public function index() {

           $email1 = 'michel.schreyer21@gmail.com';
           $email = new Email('default');
           $email->setTo($email1)->setSubject('Airports Travels site de Schreyer Michel')->send('Voici un email envoyer depuis le site crée et développé par Michel Schreyer en cakePHP'. ' Veuillez ne pas répondre a cet email. Merci'); 
        
    }

}
?>

