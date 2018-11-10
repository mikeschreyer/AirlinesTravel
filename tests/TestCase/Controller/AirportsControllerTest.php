<?php
namespace App\Test\TestCase\Controller;

use App\Controller\AirportsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\AirportsController Test Case
 */
class AirportsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.airports',
        //'app.airports_city_translation',
        //'app.i18n',
        'app.flights',
        'core.translates'

    ];

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
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {

        $this->get('/airports');
        $this->assertResponseOk();
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->get('/airports/view/1');
        $this->assertResponseOk();
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {

        $this->session([
            'Auth' => [
                'User' => [
                    'id' => 1,
                    'email' => 'Lorem ipsum dolor sit amet',
                    'password' => 'Lorem ipsum dolor sit amet',
                    'role' => 'Lorem ipsum dolor sit amet',
                    'created' => null,
                    'modified' => null
                ]
            ]
        ]);
        $this->get('/airports/add');
        $this->assertResponseSuccess();
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->session([
            'Auth' => [
                'Airport' => ['id' => 1,
                    'Name' => 'Lorem ipsum dolor sit amet',
                    'City' => 'Lorem ipsum dolor sit amet',
                    'Adresse' => 'Lorem ipsum dolor sit amet'
                ]
            ]
        ]);

        $this->get('/airports/edit/1');
        $this->assertResponseSuccess();
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->enableCsrfToken();
        $this->enableSecurityToken();
        $this->delete('/airports/delete/1');
        $this->assertResponseSuccess();

    }

    public function testAddAuthenticated()
    {
        $this->session([
            'Auth' => [
                'User' => [
                    'id' => 1,
                    'email' => 'Lorem ipsum dolor sit amet',
                    'password' => 'Lorem ipsum dolor sit amet',
                    'role' => 'Lorem ipsum dolor sit amet',
                    'created' => null,
                    'modified' => null
                ]
            ]
        ]);
        $this->get('/airports/add');

        $this->assertResponseOk();

    }

    public function testAddUnauthenticatedFail() {
        $this->get('/users/logout');
        $this->assertRedirect(['controller' => 'Users', 'action' => 'login']);

    }

    /**
     * Test isAuthorized method
     *
     * @return void
     */
    public function testIsAuthorized()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
