<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Suspects Controller
 *
 * @property \App\Model\Table\SuspectsTable $Suspects
 *
 * @method \App\Model\Entity\Suspect[] paginate($object = null, array $settings = [])
 */
class SuspectsController extends AppController
{
    
    public function initialize() {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }
    
    public function isAuthorized($user) {
        $action = $this->request->getParam('action');

        // The add and index actions are always allowed.
        if (in_array($action, ['index', 'add', 'view','apropos'])) {
            return true;
        }
        // All other actions require an id.
        if (!$this->request->getParam('pass.0')) {
            return false;
        }

        // Check that the bookmark belongs to the current user.
        $id = $this->request->getParam('pass.0');
        $suspect = $this->Suspects->get($id);
        if ($suspect->user_id == $user['id'] || 2 <= $user['role']) {
            return true;
        }else{
            return false;
        }
        return parent::isAuthorized($user);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Vehicules', 'Users']
        ];
        
        $suspects = $this->paginate($this->Suspects);
        
        

        $this->set(compact('suspects'));
        $this->set('_serialize', ['suspects']);
    }

    /**
     * View method
     *
     * @param string|null $id Suspect id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $suspect = $this->Suspects->get($id, [
            'contain' => ['Vehicules', 'Users', 'Events', 'Comments', 'Crimes']
        ]);

        $this->set('suspect', $suspect);
        $this->set('_serialize', ['suspect']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $suspect = $this->Suspects->newEntity();
        if ($this->request->is('post')) {
            $suspect = $this->Suspects->patchEntity($suspect, $this->request->getData());
            $suspect->user_id = $this->Auth->user('id');
            if ($this->Suspects->save($suspect)) {
                $this->Flash->success(__('The suspect has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The suspect could not be saved. Please, try again.'));
        }
        $vehicules = $this->Suspects->Vehicules->find('list', ['limit' => 200]);
        $users = $this->Suspects->Users->find('list', ['limit' => 200]);
        $events = $this->Suspects->Events->find('list', ['limit' => 200]);
        $this->set(compact('suspect', 'vehicules', 'users', 'events'));
        $this->set('_serialize', ['suspect']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Suspect id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $suspect = $this->Suspects->get($id, [
            'contain' => ['Events']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $suspect = $this->Suspects->patchEntity($suspect, $this->request->getData());
            if ($this->Suspects->save($suspect)) {
                $this->Flash->success(__('The suspect has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The suspect could not be saved. Please, try again.'));
        }
        $vehicules = $this->Suspects->Vehicules->find('list', ['limit' => 200]);
        $users = $this->Suspects->Users->find('list', ['limit' => 200]);
        $events = $this->Suspects->Events->find('list', ['limit' => 200]);
        $this->set(compact('suspect', 'vehicules', 'users', 'events'));
        $this->set('_serialize', ['suspect']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Suspect id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $suspect = $this->Suspects->get($id);
        if ($this->Suspects->delete($suspect)) {
            $this->Flash->success(__('The suspect has been deleted.'));
        } else {
            $this->Flash->error(__('The suspect could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    public function apropos()
    {
    }
}
