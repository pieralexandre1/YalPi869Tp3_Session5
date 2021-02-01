<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
           <?php echo $this->Html->link('MTT', ['controller' => 'Suspects', 'action' => 'index'],['class' => 'navbar-brand']);?>
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
          <ul class="nav navbar-nav">
            <li>
<?php $loguser = $this->request->session()->read('Auth.User');
 if ($loguser) {
     echo $this->Html->link(__(' Profil'), ['controller' => 'Users', 'action' => 'view', $loguser['id']]);
}
?></li>
                <li>
<?php
 if ($loguser) {
     if($loguser['role'] == 3){
     echo $this->Html->link(__(' Users'), ['controller' => 'Users', 'action' => 'index']);
     }
}
?></li>

          </ul>

          <ul class="nav navbar-nav navbar-right">
              <li><a href="<?php echo $this->request->webroot; ?>webroot/coverage/Controller/index.html">Test</a></li>
              <li><?php echo $this->Html->link('À propos', ['controller' => 'Suspects','action' => 'apropos']); ?></li>
            <li>
<?php
 if ($loguser) {
} else {
    echo $this->Html->link(__('Register'), ['controller' => 'Users', 'action' => 'add']);
}
?></li>
<li>
<?php
 if ($loguser) {
    $user = $loguser['email'];
    echo $this->Html->link($user . __(' logout'), ['controller' => 'Users', 'action' => 'logout']);
} else {
    echo $this->Html->link(__('Login'), ['controller' => 'Users', 'action' => 'login']);
}
?></li>
<li><?php echo $this->Html->link('Français', ['action' => 'changeLang', 'fr_CA'], ['escape' => false]); ?>
</li>
<li><?php echo $this->Html->link('English', ['action' => 'changeLang', 'en_CA'], ['escape' => false]); ?>
</li>
<li><?php echo $this->Html->link('Japanesse', ['action' => 'changeLang', 'ja_JP'], ['escape' => false]); ?>
</li>
          </ul>

        </div>
      </div>
</nav>