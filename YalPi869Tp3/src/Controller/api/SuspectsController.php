<?php
namespace App\Controller\Api;
use App\Controller\Api\AppController;
class SuspectsController extends AppController
{
    public $paginate = [
        'page' => 1,
        'limit' => 10,
        'maxLimit' => 100,
        'fields' => [
            'id', 'firstname', 'name','vehicule_id'
        ],
        'sortWhitelist' => [
            'id', 'firstname', 'name','vehicule_id'
        ]
    ];
}