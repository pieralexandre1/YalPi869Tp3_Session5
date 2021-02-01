<?php
/**
  * @var \App\View\AppView $this
  */
?>
<?= $this->Html->css(captcha_layout_stylesheet_url(), ['inline' => false]) ?>
<div class="col-lg-3 col-md-3 col-sm-4">
            <ul class="nav nav-pills nav-stacked">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('List Suspects'), ['controller' => 'Suspects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('List Vehicules'), ['controller' => 'Vehicules', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Comments'), ['controller' => 'Comments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Crimes'), ['controller' => 'Crimes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Files'), ['controller' => 'Files', 'action' => 'index']) ?></li>
    </ul>
</div>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
            echo $this->Form->control('email');
            echo $this->Form->control('password');
        ?>
        <?= captcha_image_html() ?>


  <!-- Captcha code user input textbox -->
  <?= $this->Form->input('CaptchaCode', [
    'label' => 'Retype the characters from the picture:',
    'maxlength' => '10',
    'style' => 'width: 270px;',
    'id' => 'CaptchaCode'
  ]) ?>
    </fieldset>
    
    

    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
