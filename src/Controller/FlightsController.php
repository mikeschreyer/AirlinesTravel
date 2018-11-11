<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Flights Controller
 *
 * @property \App\Model\Table\FlightsTable $Flights
 *
 * @method \App\Model\Entity\Flight[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FlightsController extends AppController
{


    public function isAuthorized($user) {
        $action = $this->request->getParam('action');
        // The add and tags actions are always allowed to logged in users.
        if (in_array($action, ['add', 'tags'])) {
            return true;
        }

        // All other actions require a slug.
        $id = $this->request->getParam('pass.0');
        if (!$id) {
            return false;
        }

        // Check that the article belongs to the current user.
        $flight = $this->Flights->findById($id)->first();

        if ($flight->user_id === $user['id']) {
            return true;
        } else {
            if ($user['role_id'] === 1) {
                return true;
            }
            parent::isAuthorized($user);
        }
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Passengers', 'Airports']
        ];
        $flights = $this->paginate($this->Flights);

        $this->set(compact('flights'));
    }

    /**
     * View method
     *
     * @param string|null $id Flight id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $flight = $this->Flights->get($id, [
            'contain' => ['Users', 'Passengers', 'Airports', 'Tags', 'colors']
        ]);

        $this->set('flight', $flight);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $flight = $this->Flights->newEntity();
        if ($this->request->is('post')) {
            $flight = $this->Flights->patchEntity($flight, $this->request->getData());

            $flight->user_id = $this->Auth->user('id');
            if ($this->Flights->save($flight)) {
                $this->Flash->success(__('The flight has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The flight could not be saved. Please, try again.'));
        }

        // Bâtir la liste des catégories
        $this->loadModel('Modele');
        $modele = $this->Modele->find('list', ['limit' => 200]);

        // Extraire le id de la première catégorie
        $modele = $modele->toArray();
        reset($modele);
        $modele_id = key($modele);



        // Bâtir la liste des sous-catégories reliées à cette catégorie
        $color = $this->Flights->Colors->find('list', [
            'conditions' => ['colors.modele_id' => $modele_id],
        ]);

        $users = $this->Flights->Users->find('list', ['limit' => 200]);
        $passengers = $this->Flights->Passengers->find('list', ['limit' => 200]);
        $airports = $this->Flights->Airports->find('list', ['limit' => 200]);
        $tags = $this->Flights->Tags->find('list', ['limit' => 200]);
        $this->set(compact('flight', 'users', 'passengers', 'airports', 'tags', 'color', 'modele'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Flight id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $flight = $this->Flights->get($id, [
            'contain' => ['colors' => ['modele']]
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $flight = $this->Flights->patchEntity($flight, $this->request->getData());
            if ($this->Flights->save($flight)) {
                $this->Flash->success(__('The flight has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The flight could not be saved. Please, try again.'));
        }

        // Bâtir la liste des catégories
        $this->loadModel('Modele');
        $modele = $this->Modele->find('list', ['limit' => 200]);
        // Extraire le id de la première catégorie
        $modele = $modele->toArray();
        reset($modele);

      if(isset($flight->color->modele_id)) {
            $color = $this->Flights->Colors->find('list',
                ['conditions' => ['colors.modele_id' => $flight->color->modele_id],
            ]);

        } else {

            $modele = key($modele);
            $color = $this->Flights->Colors->find('list',
                ['conditions' => ['colors.modele_id' => modele_id],
            ]);

        }


        $users = $this->Flights->Users->find('list', ['limit' => 200]);
        $passengers = $this->Flights->Passengers->find('list', ['limit' => 200]);
        $airports = $this->Flights->Airports->find('list', ['limit' => 200]);
        $tags = $this->Flights->Tags->find('list', ['limit' => 200]);
        $this->set(compact('flight', 'users', 'passengers', 'airports', 'tags', 'color', 'modele'));

    }


    /**
     * Delete method
     *
     * @param string|null $id Flight id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $flight = $this->Flights->get($id);
        if ($this->Flights->delete($flight)) {
            $this->Flash->success(__('The flight has been deleted.'));
        } else {
            $this->Flash->error(__('The flight could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


}
