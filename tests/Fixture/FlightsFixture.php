<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FlightsFixture
 *
 */
class FlightsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'user_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'passenger_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'airport_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'depart' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'arrival' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'date_reservation' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'created' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'modified' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'user_id' => ['type' => 'index', 'columns' => ['user_id'], 'length' => []],
            'user_id_3' => ['type' => 'index', 'columns' => ['user_id'], 'length' => []],
            'passenger_id_2' => ['type' => 'index', 'columns' => ['passenger_id'], 'length' => []],
            'user_id_4' => ['type' => 'index', 'columns' => ['user_id'], 'length' => []],
            'passenger_id_3' => ['type' => 'index', 'columns' => ['passenger_id'], 'length' => []],
            'user_id_6' => ['type' => 'index', 'columns' => ['user_id', 'passenger_id', 'airport_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'passenger_id' => ['type' => 'unique', 'columns' => ['passenger_id'], 'length' => []],
            'airport_id' => ['type' => 'unique', 'columns' => ['airport_id'], 'length' => []],
            'user_id_2' => ['type' => 'unique', 'columns' => ['user_id'], 'length' => []],
            'user_id_5' => ['type' => 'unique', 'columns' => ['user_id', 'passenger_id', 'airport_id'], 'length' => []],
            'flights_ibfk_1' => ['type' => 'foreign', 'columns' => ['user_id'], 'references' => ['users', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'flights_ibfk_2' => ['type' => 'foreign', 'columns' => ['passenger_id'], 'references' => ['passengers', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'flights_ibfk_3' => ['type' => 'foreign', 'columns' => ['airport_id'], 'references' => ['airports', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_unicode_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'user_id' => 1,
                'passenger_id' => 1,
                'airport_id' => 1,
                'depart' => '2018-09-05 13:46:11',
                'arrival' => '2018-09-05 13:46:11',
                'date_reservation' => '2018-09-05 13:46:11',
                'created' => 1,
                'modified' => 1
            ],
        ];
        parent::init();
    }
}
