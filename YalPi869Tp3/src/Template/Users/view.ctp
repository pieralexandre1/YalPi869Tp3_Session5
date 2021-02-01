<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\User $user
  */
?>
<div class="col-lg-3 col-md-3 col-sm-4">
            <ul class="nav nav-pills nav-stacked">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Change Password'), ['action' => 'changepassword', $user->id]) ?> </li>
        <li><?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?> </li>
        <?php if($user->comfirmation == 0){
            ?><li><?= $this->Html->link(__('Comfirmer Email'), ['action' => 'comfirm',$user->id]) ?></li>
        <?php }
        ?>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('List Suspects'), ['controller' => 'Suspects', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('List Vehicules'), ['controller' => 'Vehicules', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Comments'), ['controller' => 'Comments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Crimes'), ['controller' => 'Crimes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Files'), ['controller' => 'Files', 'action' => 'index']) ?></li>
    </ul>
</div>
<div class="users view large-9 medium-8 columns content">
    <h3><?= h($user->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Email') ?></th>
            <td><?= h($user->email) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($user->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Role') ?></th>
            <td><?= $this->Number->format($user->role) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($user->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($user->modified) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Comfirmation') ?></th>
            <td><?= h($user->comfirmation) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Comments') ?></h4>
        <?php if (!empty($user->comments)): ?>
        <table class="table-condensed" cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Address') ?></th>
                <th scope="col"><?= __('Message') ?></th>
                <th scope="col"><?= __('Suspect Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->comments as $comments): ?>
            <tr>
                <td><?= h($comments->id) ?></td>
                <td><?= h($comments->address) ?></td>
                <td><?= h($comments->message) ?></td>
                <td><?= h($comments->suspect_id) ?></td>
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
        <?php if (!empty($user->crimes)): ?>
        <table class="table-condensed" cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Suspect Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->crimes as $crimes): ?>
            <tr>
                <td><?= h($crimes->id) ?></td>
                <td><?= h($crimes->description) ?></td>
                <td><?= h($crimes->suspect_id) ?></td>
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
        <h4><?= __('Related Suspects') ?></h4>
        <?php if (!empty($user->suspects)): ?>
        <table class="table-condensed" cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Firstname') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Vehicule Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($user->suspects as $suspects): ?>
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
