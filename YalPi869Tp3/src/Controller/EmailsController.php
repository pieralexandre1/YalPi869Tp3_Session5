<?php
   namespace App\Controller;
   use App\Controller\AppController;
   use Cake\Mailer\Email;

   class EmailsController extends AppController{
       
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
        return parent::isAuthorized($user);
    }
       
       
      public function index(){
         $email = new Email('default');
         $confirmation_link = "http://" . $_SERVER['HTTP_HOST'] . $this->request->webroot . "users/confirm/uuidxyz";
         $email->to('applicationcegep@gmail.com')->subject('Essai de CakePHP Mailer')->send($confirmation_link);
      }
   }
?>

