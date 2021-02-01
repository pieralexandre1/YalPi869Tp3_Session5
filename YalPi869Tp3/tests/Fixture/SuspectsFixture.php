<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SuspectsFixture
 *
 */
class SuspectsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'autoIncrement' => true, 'precision' => null, 'comment' => null],
        'firstname' => ['type' => 'string', 'fixed' => true, 'length' => null, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'collate' => null],
        'name' => ['type' => 'string', 'fixed' => true, 'length' => null, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'collate' => null],
        'vehicule_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'autoIncrement' => null],
        'user_id' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'autoIncrement' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'firstname' => 'Lorem ipsum dolor sit amet',
            'name' => 'Lorem ipsum dolor sit amet',
            'vehicule_id' => 1,
            'user_id' => 1
        ],
    ];
}
