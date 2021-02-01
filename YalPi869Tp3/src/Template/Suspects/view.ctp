<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Suspect $suspect
  */
?>
<div class="col-lg-3 col-md-3 col-sm-4">
            <ul class="nav nav-pills nav-stacked">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Suspect'), ['action' => 'edit', $suspect->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Suspect'), ['action' => 'delete', $suspect->id], ['confirm' => __('Are you sure you want to delete # {0}?', $suspect->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Suspects'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('List Vehicules'), ['controller' => 'Vehicules', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Comments'), ['controller' => 'Comments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Crimes'), ['controller' => 'Crimes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Files'), ['controller' => 'Files', 'action' => 'index']) ?></li>
    </ul>
</div>
<div class="suspects view large-9 medium-8 columns content">
    
    <h3><?= h($suspect->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Firstname') ?></th>
            <td><?= h($suspect->firstname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($suspect->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Vehicule') ?></th>
            <td><?= $suspect->has('vehicule') ? $this->Html->link($suspect->vehicule->id, ['controller' => 'Vehicules', 'action' => 'view', $suspect->vehicule->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($suspect->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Comments') ?></h4>
        <?php if (!empty($suspect->comments)): ?>
        <table class="table-condensed" cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Address') ?></th>
                <th scope="col"><?= __('Message') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($suspect->comments as $comments): ?>
            <tr>
                <td><?= h($comments->address) ?></td>
                <td><?= h($comments->message) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Comments', 'action' => 'view', $comments->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Comments', 'action' => 'edit', $comments->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Comments', 'action' => 'delete', $comments->id], ['confirm' => __('Are you sure you want to delete # {0}?', $comments->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Crimes') ?></h4>
        <?php if (!empty($suspect->crimes)): ?>
        <table class="table-condensed" cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($suspect->crimes as $crimes): ?>
            <tr>
                <td><?= h($crimes->id) ?></td>
                <td><?= h($crimes->description) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Crimes', 'action' => 'view', $crimes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Crimes', 'action' => 'edit', $crimes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Crimes', 'action' => 'delete', $crimes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $crimes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        
        <h4><?= __('Related Events') ?></h4>
        <?php if (!empty($suspect->events)): ?>
        <table class="table-condensed" cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Date') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($suspect->events as $events): ?>
            <tr>
                <td><?= h($events->id) ?></td>
                <td><?= h($events->date) ?></td>
                <td><?= h($events->description) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Events', 'action' => 'view', $events->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Events', 'action' => 'edit', $events->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Events', 'action' => 'delete', $events->id], ['confirm' => __('Are you sure you want to delete # {0}?', $events->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
