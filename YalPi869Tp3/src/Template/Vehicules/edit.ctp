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
                ['action' => 'delete', $vehicule->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $vehicule->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Vehicules'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Suspects'), ['controller' => 'Suspects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Comments'), ['controller' => 'Comments', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Crimes'), ['controller' => 'Crimes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Events'), ['controller' => 'Events', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Files'), ['controller' => 'Files', 'action' => 'index']) ?></li>
    </ul>
</div>
<div class="vehicules form large-9 medium-8 columns content" ng-app="linkedlists" ng-controller="categoriesController">
    <?= $this->Form->create($vehicule) ?>
    <fieldset>
        <legend><?= __('Edit Vehicule') ?></legend>
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
        <?php
            echo $this->Form->control('plate');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
<?php 
echo $this->Html->script('addVehicule'); 
echo $this->fetch('script');
?>