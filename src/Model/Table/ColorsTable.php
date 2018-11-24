<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Color Model
 *
 * @property \App\Model\Table\ModelesTable|\Cake\ORM\Association\BelongsTo $Modeles
 *
 * @method \App\Model\Entity\Color get($primaryKey, $options = [])
 * @method \App\Model\Entity\Color newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Color[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Color|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Color|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Color patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Color[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Color findOrCreate($search, callable $callback = null, $options = [])
 */
class ColorsTable extends Table
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

        $this->setTable('colors');
        $this->setDisplayField('color');
        $this->setPrimaryKey('id');

        $this->belongsTo('Modele', [
            'foreignKey' => 'modele_id'
        ]);
        $this->hasMany('Flights', [
            'foreignKey' => 'color_id'
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
            ->scalar('color')
            ->requirePresence('color', 'create')
            ->notEmpty('color');

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
        $rules->add($rules->existsIn(['modele_id'], 'Modeles'));

        return $rules;
    }
}
