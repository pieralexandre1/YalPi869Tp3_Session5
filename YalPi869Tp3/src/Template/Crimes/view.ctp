<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Crime $crime
  */
?>
<div class="col-lg-3 col-md-3 col-sm-4">
            <ul class="nav nav-pills nav-stacked">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Crime'), ['action' => 'edit', $crime->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Crime'), ['action' => 'delete', $crime->id], ['confirm' => __('Are you sure you want to delete # {0}?', $crime->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Crimes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Crime'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Suspects'), ['controller' => 'Suspects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Vehicules'), ['controller' => 'Vehicules', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Comments'), ['controller' => 'Comments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Files'), ['controller' => 'Files', 'action' => 'index']) ?></li>
    </ul>
</div>
<div class="crimes view large-9 medium-8 columns content">
    <h3><?= h($crime->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($crime->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Suspect') ?></th>
            <td><?= $crime->has('suspect') ? $this->Html->link($crime->suspect->name, ['controller' => 'Suspects', 'action' => 'view', $crime->suspect->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($crime->id) ?></td>
        </tr>
    </table>
</div>
