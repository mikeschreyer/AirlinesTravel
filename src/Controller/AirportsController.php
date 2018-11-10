<?php

namespace App\Controller;

use App\Controller\AppController;

class AirportsController extends AppController {

    public function initialize() {
        parent::initialize();
       // $this->Auth->allow(['autocomplete', 'findAirports', 'add', 'edit', 'delete']);
    }

    public function findAirports() {

        if ($this->request->is('ajax')) {

            $this->autoRender = false;
            $name = $this->request->query['term'];
            $results = $this->Airports->find('all', array(
                'conditions' => array('Airports.name LIKE ' => '%' . $name . '%')
            ));

            $resultArr = array();
            foreach ($results as $result) {
                $resultArr[] = array('label' => $result['name'], 'value' => $result['name']);
            }
            echo json_encode($resultArr);
        }
    }

    public function autocomplete() {

    }

    public function index() {
        $airports = $this->paginate($this->Airports);

        $this->set(compact('airports'));
    }

    public function view($id = null) {
        $airport = $this->Airports->get($id, [
            'contain' => ['Flights']
        ]);

        $this->set('airport', $airport);
    }

    public function add() {
        $airport = $this->Airports->newEntity();
        if ($this->request->is('post')) {
            $airport = $this->Airports->patchEntity($airport, $this->request->getData());
            $airport->user_id = $this->Auth->user('id');
            if ($this->Airports->save($airport)) {
                $this->Flash->success(__('The airport has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your airport.'));
        }
        $this->set('airport', $airport);
    }

    public function edit($id = null) {
        $airport = $this->Airports
                ->findById($id)
                ->contain('') // load associated Tags
                ->firstOrFail();

        if ($this->request->is(['post', 'put'])) {
            $this->Airports->patchEntity($airport, $this->request->getData(), [
                // Added: Disable modification of user_id.
                'accessibleFields' => ['user_id' => false]
            ]);
            if ($this->Airports->save($airport)) {
                $this->Flash->success(__('Your airport has been updated.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to update your airport.'));
        }
        $this->set('airport', $airport);

    }

    public function delete($id = null) {
        $this->request->allowMethod(['post', 'delete']);
        $airport = $this->Airports->get($id);
        if ($this->Airports->delete($airport)) {
            $this->Flash->success(__('The airport has been deleted.'));
        } else {
            $this->Flash->error(__('The airport could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function isAuthorized($user) {
        $action = $this->request->getParam('action');
        
         if (isset($user['role']) && $user['role'] === 'admin') {
            return true;
        }
         
        
        // The add and tags actions are always allowed to logged in users.
        if (in_array($action, ['add', 'tags'])) {
            return true;
        }

        // All other actions require a slug.
        $slug = $this->request->getParam('pass.0');
        if (!$slug) {
            return false;
        }

        // Check that the article belongs to the current user.
        $airport = $this->Airports->findById($slug)->first();

        return $airport->user_id === $user['id'];
    }

}
