<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Suspect[]|\Cake\Collection\CollectionInterface $suspects
  */
?>
<br/><br/><br/>
<div class="col-lg-3 col-md-3 col-sm-4">
            <ul class="nav nav-pills nav-stacked">
  <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Suspect'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Vehicules'), ['controller' => 'Vehicules', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Comments'), ['controller' => 'Comments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Crimes'), ['controller' => 'Crimes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Files'), ['controller' => 'Files', 'action' => 'index']) ?></li>
</ul>
          </div>
<div class="suspects index large-9 medium-8 columns content">
    <h5><?php 
    $loguser = $this->request->session()->read('Auth.User');
    if($loguser['comfirmation'] == 0){
        echo "Vous n'avez pas comfirmer votre Email, vous actuellement restreint sur le site. Vous pouvez renvoyer le email de comfirmation " . $this->Html->link(__('Here'), ['controller' => 'Users', 'action' => 'comfirm', $loguser['id']]);
    }
    
    ?></h5>
    
    <h3><?= __('Suspects') ?></h3>
    <table class="table" cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('firstname') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('vehicule_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($suspects as $suspect): ?>
            <tr>
                <td><?= h($suspect->firstname) ?></td>
                <td><?= h($suspect->name) ?></td>
                <td><?= $suspect->has('vehicule') ? $this->Html->link($suspect->vehicule->plate, ['controller' => 'Vehicules', 'action' => 'view', $suspect->vehicule->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $suspect->id]) ?>
                    <?= $this->Html->link('(pdf)', ['action' => 'view', $suspect->id . '.pdf']) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $suspect->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $suspect->id], ['confirm' => __('Are you sure you want to delete # {0}?', $suspect->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
