<?php

/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Vehicule[]|\Cake\Collection\CollectionInterface $vehicules
  */


echo $this->Html->css('materialize.min.css');
echo $this->Html->css('https://fonts.googleapis.com/icon?family=Material+Icons');
?>




<div class="col-lg-3 col-md-3 col-sm-4">
    <ul class="nav nav-pills nav-stacked">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Vehicule'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Subcategories'), ['controller' => 'Subcategories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Subcategory'), ['controller' => 'Subcategories', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Suspects'), ['controller' => 'Suspects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Suspect'), ['controller' => 'Suspects', 'action' => 'add']) ?></li>
    </ul>
</div>

<div class="container" ng-app="myApp" ng-controller="vehiculesController">
    
    <div class="row">
        <div class="col s12">
            <h4>Vehicules</h4>
            <p>Choice of type 1=Voiture,2=Camion,3=Moto,4=Helicoptere,5=Avion,6=Bateau,7=Jet Ski,8=Aucun</p>
            <!-- used for searching the current list -->
            <input type="text" ng-model="search" class="form-control" placeholder="Search vehicules..." />

            <!-- table that shows product record list -->
            <table class="hoverable bordered">

                <thead>
                    <tr>
                        <th class="text-align-center">ID</th>
                        <th class="width-30-pct">plate</th>
                        <th class="width-30-pct">subcategory_id</th>
                        <th class="text-align-center">Action</th>
                    </tr>
                </thead>

                <tbody ng-init="getAll()">
                    <tr ng-repeat="d in plates| filter:search">
                        <td class="text-align-center">{{ d.id}}</td>
                        <td>{{ d.plate}}</td>
                        <td>{{ d.subcategory_id}}</td>
                        <td>
                            <a ng-click="readOne(d.id)" class="waves-effect waves-light btn margin-bottom-1em"><i class="material-icons left">edit</i>Edit</a>
                            <a ng-click="deleteVehicule(d.id)" class="waves-effect waves-light btn margin-bottom-1em"><i class="material-icons left">delete</i>Delete</a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- modal for for creating new product -->
            <div id="modal-vehicule-form" class="modal">
                <div class="modal-content">
                    <h4 id="modal-vehicule-title">Create New Vehicule</h4>
                    <div class="row">
                        <div class="input-field col s12">
                            <input ng-model="plate" type="text" class="validate" id="form-name" placeholder="Type plate here..." />
                            <label for="name">Plate</label>
                        </div>

                        <div class="input-field col s12">
                            <textarea ng-model="subcategory_id" type="text" class="validate materialize-textarea" placeholder="Type the type here...(Must be a number)"></textarea>
                            <label for="description">Type</label>
                        </div>


                        <div class="input-field col s12">
                            <a id="btn-create-vehicule" class="waves-effect waves-light btn margin-bottom-1em" ng-click="createVehicule()"><i class="material-icons left">add</i>Create</a>

                            <a id="btn-update-vehicule" class="waves-effect waves-light btn margin-bottom-1em" ng-click="updateVehicule()"><i class="material-icons left">edit</i>Save Changes</a>

                            <a class="modal-action modal-close waves-effect waves-light btn margin-bottom-1em"><i class="material-icons left">close</i>Close</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end col s12 -->
    </div> <!-- end row -->
</div> <!-- end container -->
<!-- floating button for creating product -->
<div class="fixed-action-btn" style="bottom:45px; right:24px;">
    <a class="waves-effect waves-light btn modal-trigger btn-floating btn-large red" href="#modal-vehicule-form" ng-click="showCreateForm()"><i class="large material-icons">add</i></a>
</div>

<?php 
echo $this->Html->script('materialize.min.js'); 
echo $this->Html->script('Vehicules'); 
echo $this->fetch('script');
?>