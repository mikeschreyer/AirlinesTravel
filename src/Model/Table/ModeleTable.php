<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Modele Model
 *
 * @property |\Cake\ORM\Association\HasMany $Color
 *
 * @method \App\Model\Entity\Modele get($primaryKey, $options = [])
 * @method \App\Model\Entity\Modele newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Modele[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Modele|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Modele|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Modele patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Modele[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Modele findOrCreate($search, callable $callback = null, $options = [])
 */
class ModeleTable extends Table
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

        $this->setTable('modele');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Flights', [
            'foreignKey' => 'modele_id'
        ]);

        $this->hasMany('Colors', [
            'foreignKey' => 'modele_id'
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
            ->scalar('name')
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        return $validator;
    }
}
