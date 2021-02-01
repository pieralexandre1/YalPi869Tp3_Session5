<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="col-lg-3 col-md-3 col-sm-4">
            <ul class="nav nav-pills nav-stacked">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $file->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $file->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Files'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Crimes'), ['controller' => 'Crimes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Suspects'), ['controller' => 'Suspects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Vehicules'), ['controller' => 'Vehicules', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Comments'), ['controller' => 'Comments', 'action' => 'index']) ?></li>
    </ul>
</div>
<div class="files form large-9 medium-8 columns content">
    <?= $this->Form->create($file) ?>
    <fieldset>
        <legend><?= __('Edit File') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('path');
            echo $this->Form->control('status');
            echo $this->Form->control('events._ids', ['options' => $events]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
