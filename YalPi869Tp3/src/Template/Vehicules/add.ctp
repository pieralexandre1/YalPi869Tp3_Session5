<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Vehicules'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Subcategories'), ['controller' => 'Subcategories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Subcategory'), ['controller' => 'Subcategories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Suspects'), ['controller' => 'Suspects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Suspect'), ['controller' => 'Suspects', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="vehicules form large-9 medium-8 columns content" ng-app="linkedlists" ng-controller="categoriesController">
    <?= $this->Form->create($vehicule) ?>
    <fieldset>
        <legend><?= __('Add Vehicule') ?></legend>
        <?php
            echo $this->Form->control('plate');
        ?>
        <div>
            Categories: 
            <select name="Category_id"
                    id="category-id" 
                    ng-model="category" 
                    ng-options="category.name for category in categories track by category.id"
                    >
                <option value=''>Select</option>
            </select>
        </div>
        <div>
            Subcategories: 
            <select name="subcategory_id"
                    id="subcategory-id" 
                    ng-disabled="!category" 
                    ng-model="subcategory"
                    ng-options="subcategory.name for subcategory in category.subcategories track by subcategory.id"
                    >
                <option value=''>Select</option>
            </select>
        </div>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
    
</div>
<?php 
echo $this->Html->script('addVehicule'); 
echo $this->fetch('script');
?>