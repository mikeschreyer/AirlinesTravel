<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Color Controller
 *
 *
 * @method \App\Model\Entity\Color[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ColorsController extends AppController
{

    public function initialize() {
        parent::initialize();
        $this->Auth->allow(['getByModele']);
    }

    public function isAuthorized($user) {
        // All actions are allowed to logged in users for subcategories.
        return true;
    }

    public function getByModele() {
        $modele_id = $this->request->query('modele_id');

        $colors = $this->Colors->find('all', [
            'conditions' => ['Colors.modele_id' => $modele_id],
        ]);
        $this->set('colors', $colors);
        $this->set('_serialize', ['colors']);
    }

    public function index()
    {
        $this->paginate = [
            'contain' => ['Modele']
        ];
        $colors = $this->paginate($this->Colors);

        $this->set(compact('colors'));
        $this->set('_serialize', ['colors']);
    }

    /**
     * View method
     *
     * @param string|null $id Color id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $color = $this->Colors->get($id, [
            'contain' => ['Modele']
        ]);
        $this->set('color', $color);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $color = $this->Colors->newEntity();
        if ($this->request->is('post')) {
            $color = $this->Colors->patchEntity($color, $this->request->getData());
            if ($this->Colors->save($color)) {
                $response = ['result' => 'Color was created.'];
            }else {
                $response['error'] = __('The color could not be saved. Please, try again.');
            }
        }

        $this->set(compact('color'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Color id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $color = $this->Colors->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $color = $this->Colors->patchEntity($color, $this->request->getData());
            if ($this->Colors->save($color)) {
                $this->Flash->success(__('The color has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The color could not be saved. Please, try again.'));
        }
        $this->set(compact('color'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Color id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $color = $this->Colors->get($id);
        if ($this->Colors->delete($color)) {
            $this->Flash->success(__('The color has been deleted.'));
        } else {
            $this->Flash->error(__('The color could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
