<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Modele Controller
 *
 * @property \App\Model\Table\ModeleTable $Modele
 *
 * @method \App\Model\Entity\Modele[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ModeleController extends AppController
{

public function getModele() { //ajouter pour angular
        $this->autoRender = false; // avoid to render view

        $modeles = $this->Modele->find('all', [
            'contain' => ['Colors'],
        ]);

        $modelesJ = json_encode($modeles);
        $this->response->type('json');
        $this->response->body($modelesJ);

    }
    public $paginate = [
        'page' => 1,
        'limit' => 10,
        'maxLimit' => 100,
        'fields' => [
            'id', 'name'
        ],
        'sortWhitelist' => [
            'id', 'name'
        ]
    ];
/*
    public function index()
    {
        $modele = $this->paginate($this->Modele);

        $this->set(compact('modele'));
    }


    public function view($id = null)
    {
        $modele = $this->Modele->get($id, [
            'contain' => ['Couleur']
        ]);

        $this->set('modele', $modele);
    }

    public function add()
    {
        $modele = $this->Modele->newEntity();
        if ($this->request->is('post')) {
            $modele = $this->Modele->patchEntity($modele, $this->request->getData());
            if ($this->Modele->save($modele)) {
                $this->Flash->success(__('The modele has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The modele could not be saved. Please, try again.'));
        }
        $this->set(compact('modele'));
    }

    public function edit($id = null)
    {
        $modele = $this->Modele->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $modele = $this->Modele->patchEntity($modele, $this->request->getData());
            if ($this->Modele->save($modele)) {
                $this->Flash->success(__('The modele has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The modele could not be saved. Please, try again.'));
        }
        $this->set(compact('modele'));
    }


    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $modele = $this->Modele->get($id);
        if ($this->Modele->delete($modele)) {
            $this->Flash->success(__('The modele has been deleted.'));
        } else {
            $this->Flash->error(__('The modele could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }*/

}
