<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Passengers Controller
 *
 * @property \App\Model\Table\PassengersTable $Passengers
 *
 * @method \App\Model\Entity\Passenger[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PassengersController extends AppController
{
    public function isAuthorized($user) {
        $action = $this->request->getParam('action');

        if (isset($user['role']) && $user['role'] === 'admin') {
            return true;
        }
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $passengers = $this->paginate($this->Passengers);

        $this->set(compact('passengers'));
    }

    /**
     * View method
     *
     * @param string|null $id Passenger id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $passenger = $this->Passengers->get($id, [
            'contain' => ['Flights']
        ]);

        $this->set('passenger', $passenger);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $passenger = $this->Passengers->newEntity();
        if ($this->request->is('post')) {
            $passenger = $this->Passengers->patchEntity($passenger, $this->request->getData());
            if ($this->Passengers->save($passenger)) {
                $this->Flash->success(__('The passenger has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The passenger could not be saved. Please, try again.'));
        }
        $this->set(compact('passenger'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Passenger id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $passenger = $this->Passengers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $passenger = $this->Passengers->patchEntity($passenger, $this->request->getData());
            if ($this->Passengers->save($passenger)) {
                $this->Flash->success(__('The passenger has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The passenger could not be saved. Please, try again.'));
        }
        $this->set(compact('passenger'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Passenger id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $passenger = $this->Passengers->get($id);
        if ($this->Passengers->delete($passenger)) {
            $this->Flash->success(__('The passenger has been deleted.'));
        } else {
            $this->Flash->error(__('The passenger could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
