<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Email;
use Cake\Utility\Text;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[] paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    
    public function isAuthorized($user) {
        $action = $this->request->getParam('action');
        // The add and index actions are always allowed.
        if (in_array($action, ['login', 'add','logout','comfirm','comfirmer','changepassword','token'])) {
            return true;
        }
        if (in_array($action, ['index'])) {
            if(3 == $user['role']){
                return true;
            }else{
                return false;;
            }
        }
        // All other actions require an id.
        
        /*
        
        if (!$this->request->getParam('pass.0')) {
            return false;
        }
        
        
        */

        // Check that the bookmark belongs to the current user.
        $id = $this->request->getParam('pass.0');
        $user1 = $this->Users->get($id);
        if ($user1->id == $user['id'] || 3 == $user['role']) {
            return true;
        }else{
            return false;
        }
        return parent::isAuthorized($user);
    }
    
    public function initialize() {
        parent::initialize();
        $this->Auth->allow(['logout', 'add','login']);
    }
    
    
    
    public function logout() {
        $this->Flash->success('You are now logged out.');
        return $this->redirect($this->Auth->logout());
    }

    // In src/Controller/UsersController.php
    public function login() {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('Invalid username or password, try again'));
        }
        
        
    }
    
    
    function changepassword($id = null) {
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->request->session()->read('Auth.User');
            $id = $user->id;
            $user = $this->Users->get($id);
            
            $data = $this->request->input('json_decode');
            
            $user->password = $data->password;
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                $this->Auth->setUser($user);
            }else{
                $this->Flash->error('The user has not been saved.');
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
}

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Comments', 'Crimes', 'Vehicules', 'Suspects']
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->loadComponent('CakeCaptcha.Captcha', [
      'captchaConfig' => 'ExampleCaptcha'
    ]);
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $isHuman = captcha_validate($this->request->data['CaptchaCode']);

            unset($this->request->data['CaptchaCode']);
 
            if ($isHuman) {
                $user->role = 0;
                $user->uuid = Text::uuid();
            if ($this->Users->save($user)) {
                //$email = new Email('default');
                //$confirmation_link = "http://" . $_SERVER['HTTP_HOST'] . $this->request->webroot . "users/comfirmer/" . $user->uuid;
                //$email->to($user->email)->subject('Comfirmation d\'email MTT')->send($confirmation_link);
                $this->Flash->success(__('The user has been saved.'));

                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }else{
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
            } else {
                $this->Flash->error('The captcha is incorrect.');
            }
            
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if($user->uuid == null){
                $user->uuid = Text::uuid();
            }
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }
    

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    
    public function comfirm($id = null)
    {
            $user = $this->Users->get($id);
            $email = new Email('default');
            $confirmation_link = "http://" . $_SERVER['HTTP_HOST'] . $this->request->webroot . "users/comfirmer/" . $user->uuid;
            $email->to($user->email)->subject('Comfirmation d\'email MTT')->send($confirmation_link);
            return $this->redirect(['action' => 'view',$id]);
            
    }
    
    public function comfirmer($uuid = null)
    {
       
            $users = $this->Users->find('all');

            foreach ($users as $row) {
                if($row['uuid'] == $uuid){
                    $id = $row['id'];
                }
            }

            $user = $this->Users->get($id);
            
            $user->comfirmation = true;
            $user->role = 3;
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The email has been comfirm.'));

                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }else{
                $this->Flash->error(__('The email could not be comfirm. Please, try again.'));
            }   
            return $this->redirect(['controller' => 'Suspects', 'action' => 'index']);
    }

}
