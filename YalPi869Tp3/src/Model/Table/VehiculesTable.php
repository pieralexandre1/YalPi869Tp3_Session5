<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Vehicules Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\SubcategoriesTable|\Cake\ORM\Association\BelongsTo $Subcategories
 * @property \App\Model\Table\SuspectsTable|\Cake\ORM\Association\HasMany $Suspects
 *
 * @method \App\Model\Entity\Vehicule get($primaryKey, $options = [])
 * @method \App\Model\Entity\Vehicule newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Vehicule[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Vehicule|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Vehicule patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Vehicule[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Vehicule findOrCreate($search, callable $callback = null, $options = [])
 */
class VehiculesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('vehicules');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
        $this->belongsTo('Subcategories', [
            'foreignKey' => 'subcategory_id'
        ]);
        $this->hasMany('Suspects', [
            'foreignKey' => 'vehicule_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('plate', 'create')
            ->notEmpty('plate');
        
        $validator
            ->requirePresence('subcategory_id', 'create')
            ->notEmpty('subcategory_id');
        
        $validator
                ->add('plate', [
                    'minLength' => [
                        'rule' => ['minLength', 6],
                        'last' => true,
                        'message' => __('La plaque doit faire exactement 6 charactères')
                    ],
                    'maxLength' => [
                        'rule' => ['maxLength', 6],
                        'last' => true,
                        'message' => __('La plaque doit faire exactement 6 charactères')
                    ]
        ]);

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['subcategory_id'], 'Subcategories'));

        return $rules;
    }
}
