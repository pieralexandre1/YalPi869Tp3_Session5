<?php
namespace App\Model\Entity;

use Cake\ORM\Behavior\Translate\TranslateTrait;
use Cake\ORM\Entity;

/**
 * Crime Entity
 *
 * @property int $id
 * @property string $description
 * @property int $suspect_id
 * @property int $user_id
 *
 * @property \App\Model\Entity\Suspect $suspect
 * @property \App\Model\Entity\User $user
 */
class Crime extends Entity
{

    use TranslateTrait;

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
