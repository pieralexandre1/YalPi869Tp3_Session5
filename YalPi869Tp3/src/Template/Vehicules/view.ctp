<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Vehicule $vehicule
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Vehicule'), ['action' => 'edit', $vehicule->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Vehicule'), ['action' => 'delete', $vehicule->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vehicule->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Vehicules'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vehicule'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Subcategories'), ['controller' => 'Subcategories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Subcategory'), ['controller' => 'Subcategories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Suspects'), ['controller' => 'Suspects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Suspect'), ['controller' => 'Suspects', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="vehicules view large-9 medium-8 columns content">
    <h3><?= h($vehicule->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Plate') ?></th>
            <td><?= h($vehicule->plate) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $vehicule->has('user') ? $this->Html->link($vehicule->user->id, ['controller' => 'Users', 'action' => 'view', $vehicule->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Subcategory') ?></th>
            <td><?= $vehicule->has('subcategory') ? $this->Html->link($vehicule->subcategory->name, ['controller' => 'Subcategories', 'action' => 'view', $vehicule->subcategory->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($vehicule->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Suspects') ?></h4>
        <?php if (!empty($vehicule->suspects)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Firstname') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Vehicule Id') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($vehicule->suspects as $suspects): ?>
            <tr>
                <td><?= h($suspects->id) ?></td>
                <td><?= h($suspects->firstname) ?></td>
                <td><?= h($suspects->name) ?></td>
                <td><?= h($suspects->vehicule_id) ?></td>
                <td><?= h($suspects->user_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Suspects', 'action' => 'view', $suspects->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Suspects', 'action' => 'edit', $suspects->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Suspects', 'action' => 'delete', $suspects->id], ['confirm' => __('Are you sure you want to delete # {0}?', $suspects->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
