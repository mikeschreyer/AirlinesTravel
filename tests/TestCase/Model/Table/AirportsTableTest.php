<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AirportsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AirportsTable Test Case
 */
class AirportsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AirportsTable
     */
    public $AirportsTable;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.airports',
        //'app.airports_city_translation',
        //'app.i18n',
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
        $config = TableRegistry::getTableLocator()->exists('Airports') ? [] : ['className' => AirportsTable::class];
        $this->AirportsTable = TableRegistry::getTableLocator()->get('Airports', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AirportsTable);

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
}
