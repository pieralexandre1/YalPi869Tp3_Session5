<?php
namespace App\Test\TestCase\Controller;

use App\Controller\VehiculesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\VehiculesController Test Case
 */
class VehiculesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.vehicules',
        'app.users',
        'app.comments',
        'app.suspects',
        'app.crimes',
        'app.crimes_description_translation',
        'app.i18n',
        'app.events',
        'app.files',
        'app.events_files',
        'app.events_suspects',
        'app.subcategories',
        'app.categories'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
