<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Vehicules Controller
 *
 * @property \App\Model\Table\VehiculesTable $Vehicules
 *
 * @method \App\Model\Entity\Vehicule[] paginate($object = null, array $settings = [])
 */
class VehiculesController extends AppController
{
    
    
    
    public function initialize() {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }
    
    public function isAuthorized($user) {
        $action = $this->request->getParam('action');

        // The add and index actions are always allowed.
        if (in_array($action, ['index', 'addVehicule', 'view','add','getVehicule','editVehicule','deleteVehicule','findPlates'])) {
            return true;
        }
        // All other actions require an id.
        if (!$this->request->getParam('pass.0')) {
            return false;
        }

        // Check that the bookmark belongs to the current user.
        $id = $this->request->getParam('pass.0');
        $vehicule = $this->Vehicules->get($id);
        if ($vehicule->user_id == $user['id'] || 2 <= $user['role']) {
            return true;
        }else{
            return false;
        }
        return parent::isAuthorized($user);
    }
    
    public function addVehicule() {
        $response = ['result' => 'fail'];
        $errors = $this->Vehicules->validator()->errors($this->request->data);
        if (empty($errors)) {
            $vehicule = $this->Vehicules->newEntity($this->request->data);
            $vehicule->user_id = $this->Auth->user('id');
            
            if ($this->Vehicules->save($vehicule)) {
                $response = ['result' => 'Vehicule has been created'];
            }
        } else {
            $response['error'] = __('La plaque doit faire exactement 6 charactères');
            echo "test";
        }
        

        $this->set(compact('response'));
        $this->set('_serialize', ['response']);
        
    }
    
    public function editVehicule() {
        $response = ['result' => 'fail'];
        $errors = $this->Vehicules->validator()->errors($this->request->data);
        if (empty($errors)) {
            $vehicule = $this->Vehicules->newEntity($this->request->data);
            $vehicule->id = $this->request->data('id');
            
            if ($this->Vehicules->save($vehicule)) {
                $response = ['result' => 'Vehicule has been updated'];
            }
        } else {
            $response['error'] = __('La plaque doit faire exactement 6 charactères');
            echo "test";
        }
        $this->set(compact('response'));
        $this->set('_serialize', ['response']);
    }
    
    public function getVehicule($id = 0) {
        $id = $this->request->data('id');
        if($id == null){
            $vehicules = $this->Vehicules->find('all');
        }else{
            $vehicules = $this->Vehicules->get($id);
        }
        
        $this->set(compact('vehicules'));
        $this->set('_serialize', ['vehicules']);
    }
    
    public function deleteVehicule()
    {
        $response = ['result' => 'fail'];
        $id = $this->request->data('id');
        
        $vehicule = $this->Vehicules->get($id);
        if ($this->Vehicules->delete($vehicule)) {
            $response = ['result' => 'Vehicule has been deleted'];
        }

        
        $this->set(compact('response'));
        $this->set('_serialize', ['response']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Subcategories']
        ];
        $vehicules = $this->paginate($this->Vehicules);

        $this->set(compact('vehicules'));
        $this->set('_serialize', ['vehicules']);
    }

    /**
     * View method
     *
     * @param string|null $id Vehicule id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $vehicule = $this->Vehicules->get($id, [
            'contain' => ['Users', 'Subcategories', 'Suspects']
        ]);

        $this->set('vehicule', $vehicule);
        $this->set('_serialize', ['vehicule']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $vehicule = $this->Vehicules->newEntity();
        if ($this->request->is('post')) {
            $vehicule = $this->Vehicules->patchEntity($vehicule, $this->request->getData());
            $vehicule->user_id = $this->Auth->user('id');
            if ($this->Vehicules->save($vehicule)) {
                $this->Flash->success(__('The vehicule has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The vehicule could not be saved. Please, try again.'));
        }
        $users = $this->Vehicules->Users->find('list', ['limit' => 200]);
        $subcategories = $this->Vehicules->Subcategories->find('list', ['limit' => 200]);
        $this->set(compact('vehicule', 'users', 'subcategories'));
        $this->set('_serialize', ['vehicule']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Vehicule id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $vehicule = $this->Vehicules->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $vehicule = $this->Vehicules->patchEntity($vehicule, $this->request->getData());
            if ($this->Vehicules->save($vehicule)) {
                $this->Flash->success(__('The vehicule has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The vehicule could not be saved. Please, try again.'));
        }
        $users = $this->Vehicules->Users->find('list', ['limit' => 200]);
        $subcategories = $this->Vehicules->Subcategories->find('list', ['limit' => 200]);
        $this->set(compact('vehicule', 'users', 'subcategories'));
        $this->set('_serialize', ['vehicule']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Vehicule id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $vehicule = $this->Vehicules->get($id);
        if ($this->Vehicules->delete($vehicule)) {
            $this->Flash->success(__('The vehicule has been deleted.'));
        } else {
            $this->Flash->error(__('The vehicule could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
