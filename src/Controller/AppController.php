<?php

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\I18n\I18n;

class AppController extends Controller {

    public function initialize() {
        parent::initialize();
        I18n::setLocale($this->request->session()->read('Config.language'));

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            // Added this line
            'authorize' => 'Controller',
            'authenticate' => [
                'Form' => [
                    'fields' => [
                        'username' => 'email',
                        'password' => 'password'
                    ]
                ]
            ],
            'loginAction' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
            'authorize' => ['Controller'],
            // If unauthorized, return them to page they were just on
            'unauthorizedRedirect' => $this->referer()
        ]);

        // Allow the display action so our pages controller
        // continues to work. Also enable the read only actions.
        $this->Auth->allow(['display', 'view', 'index', 'changeLang']);
    }

    public function isAuthorized($user) {
        // By default deny access.
        return false;
    }

    public function changeLang($lang = 'en_US') {
        I18n::setLocale($lang);
        $this->request->session()->write('Config.language', $lang);
        //debug($lang);
        //die();
        return $this->redirect($this->request->referer());
    }

}
