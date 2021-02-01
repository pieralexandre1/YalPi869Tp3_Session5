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
                ['action' => 'delete', $crime->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $crime->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Crimes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Suspects'), ['controller' => 'Suspects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Vehicules'), ['controller' => 'Vehicules', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Comments'), ['controller' => 'Comments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Files'), ['controller' => 'Files', 'action' => 'index']) ?></li>
    </ul>
</div>
<div class="crimes form large-9 medium-8 columns content">
    <?= $this->Form->create($crime) ?>
    <fieldset>
        <legend><?= __('Edit Crime') ?></legend>
        <?php
            echo $this->Form->control('description', ['options' => ['Agression Sexuelle' => __('Agression Sexuelle'),'Bande Organisée' => __('Bande Organisée'),'Bombe Radiologique' => __('Bombe Radiologique'),'Crime Passionnel' => __('Crime Passionnel'),'Incendie Volontaire' => __('Incendie Volontaire')]]);
            echo $this->Form->control('suspect_id', ['options' => $suspects]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
