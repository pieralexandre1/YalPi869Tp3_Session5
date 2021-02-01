<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Event $event
  */
?>
<div class="col-lg-3 col-md-3 col-sm-4">
            <ul class="nav nav-pills nav-stacked">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Event'), ['action' => 'edit', $event->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Event'), ['action' => 'delete', $event->id], ['confirm' => __('Are you sure you want to delete # {0}?', $event->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Events'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Event'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Files'), ['controller' => 'Files', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Crimes'), ['controller' => 'Crimes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Suspects'), ['controller' => 'Suspects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Vehicules'), ['controller' => 'Vehicules', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Comments'), ['controller' => 'Comments', 'action' => 'index']) ?></li>
    </ul>
</div>
<div class="events view large-9 medium-8 columns content">
    <h3><?= h($event->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($event->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($event->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($event->date) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Files') ?></h4>
        <?php if (!empty($event->files)): ?>
        <table class="table-condensed" cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Image') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Path') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Modified') ?></th>
                <th scope="col"><?= __('Status') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($event->files as $files): ?>
            <tr>
                <?php $path= "../../webroot/img/" . $files->path . $files->name;  ?>
                <td><?php echo '<img src="'.$path.'" alt="Cover"  width="50px" height="50px">';?></td>
                <td><?= h($files->name) ?></td>
                <td><?= h($files->path) ?></td>
                <td><?= h($files->created) ?></td>
                <td><?= h($files->modified) ?></td>
                <td><?= h($files->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Files', 'action' => 'view', $files->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Files', 'action' => 'edit', $files->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Files', 'action' => 'delete', $files->id], ['confirm' => __('Are you sure you want to delete # {0}?', $files->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Suspects') ?></h4>
        <?php if (!empty($event->suspects)): ?>
        <table class="table-condensed" cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Firstname') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Vehicule Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($event->suspects as $suspects): ?>
            <tr>
                <td><?= h($suspects->id) ?></td>
                <td><?= h($suspects->firstname) ?></td>
                <td><?= h($suspects->name) ?></td>
                <td><?= h($suspects->vehicule_id) ?></td>
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
