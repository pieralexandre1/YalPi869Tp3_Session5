<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Suspect Entity
 *
 * @property int $id
 * @property string $firstname
 * @property string $name
 * @property int $vehicule_id
 * @property int $user_id
 *
 * @property \App\Model\Entity\Vehicule $vehicule
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Comment[] $comments
 * @property \App\Model\Entity\Crime[] $crimes
 * @property \App\Model\Entity\Event[] $events
 */
class Suspect extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
