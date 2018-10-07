<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Passengers Model
 *
 * @property \App\Model\Table\FlightsTable|\Cake\ORM\Association\HasMany $Flights
 *
 * @method \App\Model\Entity\Passenger get($primaryKey, $options = [])
 * @method \App\Model\Entity\Passenger newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Passenger[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Passenger|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Passenger|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Passenger patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Passenger[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Passenger findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PassengersTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);
        $this->setTable('passengers');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Flights', [
            'foreignKey' => 'passenger_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator) {
        $validator
                ->integer('id')
                ->allowEmpty('id', 'create');

        $validator
                ->scalar('name')
                ->maxLength('name', 255)
                ->requirePresence('name', 'create')
                ->notEmpty('name');

        $validator
                ->scalar('slug')
                ->maxLength('slug', 191)
                ->requirePresence('slug', 'create')
                ->notEmpty('slug');

        $validator
                ->scalar('phone')
                ->maxLength('phone', 255)
                ->requirePresence('phone', 'create')
                ->notEmpty('phone');

        $validator
                ->scalar('address')
                ->maxLength('address', 255)
                ->requirePresence('address', 'create')
                ->notEmpty('address');

        $validator
                ->email('email')
                ->requirePresence('email', 'create')
                ->notEmpty('email');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules) {
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }

}
