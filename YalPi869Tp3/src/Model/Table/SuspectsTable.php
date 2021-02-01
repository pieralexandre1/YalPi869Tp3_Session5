<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Suspects Model
 *
 * @property \App\Model\Table\VehiculesTable|\Cake\ORM\Association\BelongsTo $Vehicules
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\CommentsTable|\Cake\ORM\Association\HasMany $Comments
 * @property \App\Model\Table\CrimesTable|\Cake\ORM\Association\HasMany $Crimes
 * @property \App\Model\Table\EventsTable|\Cake\ORM\Association\BelongsToMany $Events
 *
 * @method \App\Model\Entity\Suspect get($primaryKey, $options = [])
 * @method \App\Model\Entity\Suspect newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Suspect[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Suspect|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Suspect patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Suspect[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Suspect findOrCreate($search, callable $callback = null, $options = [])
 */
class SuspectsTable extends Table
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

        $this->setTable('suspects');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Vehicules', [
            'foreignKey' => 'vehicule_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Comments', [
            'foreignKey' => 'suspect_id'
        ]);
        $this->hasMany('Crimes', [
            'foreignKey' => 'suspect_id'
        ]);
        $this->belongsToMany('Events', [
            'foreignKey' => 'suspect_id',
            'targetForeignKey' => 'event_id',
            'joinTable' => 'events_suspects'
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
            ->requirePresence('firstname', 'create')
            ->notEmpty('firstname');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

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
        $rules->add($rules->existsIn(['vehicule_id'], 'Vehicules'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
