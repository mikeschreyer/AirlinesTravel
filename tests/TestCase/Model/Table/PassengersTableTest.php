<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PassengersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Cake\Validation\Validator;

/**
 * App\Model\Table\PassengersTable Test Case
 */
class PassengersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PassengersTable
     */
    public $PassengersTable;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.passengers',
        'app.flights'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Passengers') ? [] : ['className' => PassengersTable::class];
        $this->PassengersTable = TableRegistry::getTableLocator()->get('Passengers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PassengersTable);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    public function testFindActive()
    {
        $query = $this->PassengersTable->find('active');
        $this->assertInstanceOf('Cake\ORM\Query', $query);
        $result = $query->hydrate(false)->toArray();
        $expected = [
            [
                'id' => 1,
                'name' => 'Lorem ipsum dolor sit amet',
                'slug' => 'Lorem ipsum dolor sit amet',
                'phone' => 'Lorem ipsum dolor sit amet',
                'address' => 'Lorem ipsum dolor sit amet',
                'email' => 'Lorem ipsum dolor sit amet',
                'created' => null,
                'modified' => null,
                'active' => 1
            ],
            [
                'id' => 3,
                'name' => 'Lorem ipsum dolor sit amet',
                'slug' => 'Lorem ipsum dolor sit amet',
                'phone' => 'Lorem ipsum dolor sit amet',
                'address' => 'Lorem ipsum dolor sit amet',
                'email' => 'Lorem ipsum dolor sit amet',
                'created' => null,
                'modified' => null,
                'active' => 1
            ],
        ];

        $this->assertEquals($expected, $result);
    }

    public function testSave(){
        $data = [
            'id' => 4,
            'name' => 'Lorem ipsum dolor sit amet',
            'slug' => 'Lorem ipsum dolor sit amet',
            'phone' => 'Lorem ipsum dolor sit amet',
            'address' => 'Lorem ipsum dolor sit amet',
            'email' => 'Lorem ipsum dolor sit amet',
            'created' => null,
            'modified' => null,
            'active' => 1
        ];

        $Passengers = $this->PassengersTable->newEntity($data);
        $idPassenger = $data['id'];
        $this->PassengersTable->save($Passengers);
        $query = $this->PassengersTable->find('all', ['conditions' => ['Passengers.id' => $idPassenger]]);
        $this->assertNotEmpty($query);
    }

    public function testDelete(){

        $Passenger = $this->PassengersTable->find()->first();
        $idPassenger = $Passenger->id;
        $this->PassengersTable->delete($Passenger);
        $query = $this->PassengersTable->find('all', ['conditions' => ['Passengers.id' => $idPassenger]]);

        $this->assertEmpty($query->toArray());
    }

    public function  testEdit(){

        $passager = $this->PassengersTable->find('all')->first();
        $nom = $passager->name;
        $passager->name = "test";
        $this->PassengersTable->save($passager);
        $query = $this->PassengersTable->find('all', ['conditions' => ['Passengers.name' => $nom]]);
        $this->assertNotEmpty($query);

    }

    public function testValidateEmailOK () {
        $passanger = $this->PassengersTable->find('all')->last()->toArray();
        $errors = $this->PassengersTable->validationDefault(new Validator())->errors($passanger);
        $this->assertTrue(!empty($errors));
    }

    public function testValidateEmailFail () {
        $passager = $this->PassengersTable->find('all')->first()->toArray();
        $passager['email'] = "@mail.ca";
        $errors = $this->PassengersTable->validationDefault(new Validator())->errors($passager);
        $this->assertTrue(!empty($errors['email']));
    }

}
