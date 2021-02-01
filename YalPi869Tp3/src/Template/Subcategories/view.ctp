<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Subcategory $subcategory
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Subcategory'), ['action' => 'edit', $subcategory->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Subcategory'), ['action' => 'delete', $subcategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $subcategory->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Subcategories'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Subcategory'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Vehicules'), ['controller' => 'Vehicules', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Vehicule'), ['controller' => 'Vehicules', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="subcategories view large-9 medium-8 columns content">
    <h3><?= h($subcategory->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Category') ?></th>
            <td><?= $subcategory->has('category') ? $this->Html->link($subcategory->category->name, ['controller' => 'Categories', 'action' => 'view', $subcategory->category->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($subcategory->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($subcategory->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Vehicules') ?></h4>
        <?php if (!empty($subcategory->vehicules)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Type') ?></th>
                <th scope="col"><?= __('Plate') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Subcategory Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($subcategory->vehicules as $vehicules): ?>
            <tr>
                <td><?= h($vehicules->id) ?></td>
                <td><?= h($vehicules->type) ?></td>
                <td><?= h($vehicules->plate) ?></td>
                <td><?= h($vehicules->user_id) ?></td>
                <td><?= h($vehicules->subcategory_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Vehicules', 'action' => 'view', $vehicules->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Vehicules', 'action' => 'edit', $vehicules->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Vehicules', 'action' => 'delete', $vehicules->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vehicules->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
