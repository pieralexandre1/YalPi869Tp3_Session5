<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Files Controller
 *
 * @property \App\Model\Table\FilesTable $Files
 *
 * @method \App\Model\Entity\File[] paginate($object = null, array $settings = [])
 */
class FilesController extends AppController
{
    
    public function isAuthorized($user) {
        $action = $this->request->getParam('action');

        // The add and index actions are always allowed.
        if (in_array($action, ['index', 'add', 'view','edit'])) {
            return true;
        }
        // All other actions require an id.
        if (!$this->request->getParam('pass.0')) {
            return false;
        }

        // Check that the bookmark belongs to the current user.
        $id = $this->request->getParam('pass.0');
        $files = $this->Files->get($id);
        if ($files->user_id == $user['id'] || 2 <= $user['role']) {
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
        
        $files = $this->paginate($this->Files);

        $this->set(compact('files'));
        $this->set('_serialize', ['files']);
        
    }

    /**
     * View method
     *
     * @param string|null $id File id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $file = $this->Files->get($id, [
            'contain' => ['Events']
        ]);

        $this->set('file', $file);
        $this->set('_serialize', ['file']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        
        
        $file = $this->Files->newEntity();
        if ($this->request->is('post')) {

            if (!empty($this->request->data['name']['name'])) {
                $fileName = $this->request->data['name']['name'];
                $uploadPath = 'Files/';
                $uploadFile = $uploadPath . $fileName;
                if (move_uploaded_file($this->request->data['name']['tmp_name'], 'img/' . $uploadFile)) {
                    $file = $this->Files->patchEntity($file, $this->request->getData());
                    $file->name = $fileName;
                    $file->path = $uploadPath;
                    if ($this->Files->save($file)) {
                        $this->Flash->success(__('File has been uploaded and inserted successfully.'));
                        
                        return $this->redirect(['action' => 'index']);
                    } else {
                        $this->Flash->error(__('Unable to upload file, please try again.'));
                    }
                } else {
                    $this->Flash->error(__('Unable to upload file, please try again.'));
                }
            } else {
                $this->Flash->error(__('Please choose a file to upload.'));
            }

        }
        $events = $this->Files->Events->find('list', ['limit' => 200]);
        $this->set(compact('file', 'events'));
        $this->set('_serialize', ['file']);
        
        
        /*
        
        $uploadData = '';
        $file = '';
        if ($this->request->is('post')) {
            
            if(!empty($this->request->data['file']['name'])){
                $fileName = $this->request->data['file']['name'];
                $uploadPath = 'uploads/files/';
                $uploadFile = $uploadPath.$fileName;
                if(move_uploaded_file($this->request->data['file']['tmp_name'],$uploadFile)){
                    //$uploadData = $this->Files->newEntity();
                    //$uploadData->name = $fileName;
                    //$uploadData->path = $uploadPath;
                    //$uploadData->created = date("Y-m-d H:i:s");
                    //$uploadData->modified = date("Y-m-d H:i:s");
                    $file = $this->Files->newEntity();
                    $file = $this->Files->patchEntity($file, $this->request->getData());
                    $file->name = $fileName;
                    $file->path = $uploadPath;
                    $file->created = date("Y-m-d H:i:s");
                    $file->modified = date("Y-m-d H:i:s");
                    if ($this->Files->save($file)) {
                        $this->Flash->success(__('The file has been saved.'));

                    }else{
                        $this->Flash->error(__('Unable to upload file, please try again.'));
                    }
                }else{
                    $this->Flash->error(__('Unable to upload file, please try again.'));
                }
            }else{
                $this->Flash->error(__('Please choose a file to upload.'));
            }
            
        }
        $this->set('uploadData', $uploadData);
        
        
        $files = $this->Files->find('all', ['order' => ['Files.created' => 'DESC']]);
        $filesRowNum = $files->count();
        $events = $this->Files->Events->find('list', ['limit' => 200]);
        $this->set('files',$files);
        $this->set('filesRowNum',$filesRowNum);
        $this->set(compact('file', 'events'));
        $this->set('_serialize', ['file']);
        
        
        
        */
        
        /*
        
        $uploadData = '';
        if ($this->request->is('post')) {
            if(!empty($this->request->data['file']['name'])){
                $fileName = $this->request->data['file']['name'];
                $uploadPath = 'uploads/files/';
                $uploadFile = $uploadPath.$fileName;
                if(move_uploaded_file($this->request->data['file']['tmp_name'],$uploadFile)){
                    $uploadData = $this->Files->newEntity();
                    $uploadData->name = $fileName;
                    $uploadData->path = $uploadPath;
                    $uploadData->created = date("Y-m-d H:i:s");
                    $uploadData->modified = date("Y-m-d H:i:s");
                    if ($this->Files->save($uploadData)) {
                        
                        $this->Flash->success(__('The file has been saved.'));
                        
                        
                    }else{
                        $this->Flash->error(__('Unable to upload file, please try again.'));
                    }
                }else{
                    $this->Flash->error(__('Unable to upload file, please try again.'));
                }
            }else{
                $this->Flash->error(__('Please choose a file to upload.'));
            }
            
        }
        $this->set('uploadData', $uploadData);
        
        $files = $this->Files->find('all', ['order' => ['Files.created' => 'DESC']]);
        $filesRowNum = $files->count();
        $events = $this->Files->Events->find('list', ['limit' => 200]);
        $this->set('files',$files);
        $this->set('filesRowNum',$filesRowNum);
        $this->set(compact('file', 'events'));
        
        */
        
        
        /*
        $file = $this->Files->newEntity();
        if ($this->request->is('post')) {
            $file = $this->Files->patchEntity($file, $this->request->getData());
            if ($this->Files->save($file)) {
                $this->Flash->success(__('The file has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The file could not be saved. Please, try again.'));
        }
        $events = $this->Files->Events->find('list', ['limit' => 200]);
        $this->set(compact('file', 'events'));
        $this->set('_serialize', ['file']);


         */
    }

    /**
     * Edit method
     *
     * @param string|null $id File id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $file = $this->Files->get($id, [
            'contain' => ['Events']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $file = $this->Files->patchEntity($file, $this->request->getData());
            if ($this->Files->save($file)) {
                $this->Flash->success(__('The file has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The file could not be saved. Please, try again.'));
        }
        $events = $this->Files->Events->find('list', ['limit' => 200]);
        $this->set(compact('file', 'events'));
        $this->set('_serialize', ['file']);
    }

    /**
     * Delete method
     *
     * @param string|null $id File id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $file = $this->Files->get($id);
        if ($this->Files->delete($file)) {
            $this->Flash->success(__('The file has been deleted.'));
        } else {
            $this->Flash->error(__('The file could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
