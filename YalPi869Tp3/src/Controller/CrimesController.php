<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Crimes Controller
 *
 * @property \App\Model\Table\CrimesTable $Crimes
 *
 * @method \App\Model\Entity\Crime[] paginate($object = null, array $settings = [])
 */
class CrimesController extends AppController
{
    public function isAuthorized($user) {
        $action = $this->request->getParam('action');

        // The add and index actions are always allowed.
        if (in_array($action, ['index', 'add', 'view'])) {
            return true;
        }
        // All other actions require an id.
        if (!$this->request->getParam('pass.0')) {
            return false;
        }

        // Check that the bookmark belongs to the current user.
        $id = $this->request->getParam('pass.0');
        $crime = $this->Crimes->get($id);
        if ($crime->user_id == $user['id'] || 2 <= $user['role']) {
            return true;
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
            'contain' => ['Suspects', 'Users']
        ];
        $crimes = $this->paginate($this->Crimes);

        $this->set(compact('crimes'));
        $this->set('_serialize', ['crimes']);
    }

    /**
     * View method
     *
     * @param string|null $id Crime id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $crime = $this->Crimes->get($id, [
            'contain' => ['Suspects', 'Users']
        ]);

        $this->set('crime', $crime);
        $this->set('_serialize', ['crime']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $crime = $this->Crimes->newEntity();
        if ($this->request->is('post')) {
            $crime = $this->Crimes->patchEntity($crime, $this->request->getData(),['translations' => true]);
            $crime->user_id = $this->Auth->user('id');
            
            if($crime->description == 'Agression Sexuelle'){
            $translations = [
                'fr_CA' => ['description' => 'Agression Sexuelle'],
                'en_CA' => ['description' => 'Sexual Assault'],
                'ja_JP' => ['description' => '性的暴力']
            ];
        }
        if($crime->description == 'Bande Organisée'){
            $translations = [
                'fr_CA' => ['description' => 'Bande Organisée'],
                'en_CA' => ['description' => 'Organized Band'],
                'ja_JP' => ['description' => '組織化されたバンド']
            ];
        }
        if($crime->description == 'Bombe Radiologique'){
            $translations = [
                'fr_CA' => ['description' => 'Bombe Radiologique'],
                'en_CA' => ['description' => 'Radiological Bomb'],
                'ja_JP' => ['description' => '放射線爆弾']
            ];
        }
        if($crime->description == 'Crime Passionnel'){
            $translations = [
                'fr_CA' => ['description' => 'Crime Passionnel'],
                'en_CA' => ['description' => 'Passionate Crime'],
                'ja_JP' => ['description' => '情熱的な犯罪']
            ];
        }
        if($crime->description == 'Incendie Volontaire'){
            $translations = [
                'fr_CA' => ['description' => 'Incendie Volontaire'],
                'en_CA' => ['description' => 'Arson'],
                'ja_JP' => ['description' => '火災ボランティア']
            ];
        }
            
            foreach ($translations as $lang => $data) {
                $crime->translation($lang)->set($data, ['guard' => false]);
            }
            
            if ($this->Crimes->save($crime)) {
                $this->Flash->success(__('The crime has been saved.'));
                

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The crime could not be saved. Please, try again.'));
        }
        $suspects = $this->Crimes->Suspects->find('list', ['limit' => 200]);
        $users = $this->Crimes->Users->find('list', ['limit' => 200]);
        $this->set(compact('crime', 'suspects', 'users'));
        $this->set('_serialize', ['crime']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Crime id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $crime = $this->Crimes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $crime = $this->Crimes->patchEntity($crime, $this->request->getData());
            if ($this->Crimes->save($crime)) {
                $this->Flash->success(__('The crime has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The crime could not be saved. Please, try again.'));
        }
        $suspects = $this->Crimes->Suspects->find('list', ['limit' => 200]);
        $users = $this->Crimes->Users->find('list', ['limit' => 200]);
        $this->set(compact('crime', 'suspects', 'users'));
        $this->set('_serialize', ['crime']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Crime id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $crime = $this->Crimes->get($id);
        if ($this->Crimes->delete($crime)) {
            $this->Flash->success(__('The crime has been deleted.'));
        } else {
            $this->Flash->error(__('The crime could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    
    public function langue($crime){
        
        if($crime->description == __('Agression Sexuelle')){
            $translations = [
                'fr_CA' => ['description' => "Un article"],
                'en_CA' => ['description' => 'Un artículo'],
                'ja_JP' => ['description' => "Un article"]
            ];
        }
        if($crime->description == __('Bande Organisée')){
            $translations = [
                'fr_CA' => ['description' => "Un article"],
                'en_CA' => ['description' => 'Un artículo'],
                'ja_JP' => ['description' => "Un article"]
            ];
        }
        if($crime->description == __('Bombe Radiologique')){
            $translations = [
                'fr_CA' => ['description' => "Un article"],
                'en_CA' => ['description' => 'Un artículo'],
                'ja_JP' => ['description' => "Un article"]
            ];
        }
        if($crime->description == __('Crime Passionnel')){
            $translations = [
                'fr_CA' => ['description' => "Un article"],
                'en_CA' => ['description' => 'Un artículo'],
                'ja_JP' => ['description' => "Un article"]
            ];
        }
        if($crime->description == __('Incendie Volontaire')){
            $translations = [
                'fr_CA' => ['description' => "Un article555"],
                'en_CA' => ['description' => 'Un artículo'],
                'ja_JP' => ['description' => "Un article"]
            ];
        }
        
        
        return $translations;
    }
}
