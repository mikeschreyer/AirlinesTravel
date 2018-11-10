<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Flight Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $passenger_id
 * @property int $airport_id
 * @property \Cake\I18n\FrozenTime $depart
 * @property \Cake\I18n\FrozenTime $arrival
 * @property \Cake\I18n\FrozenTime $date_reservation
 * @property int $created
 * @property int $modified
 * @property int $color_id
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Passenger $passenger
 * @property \App\Model\Entity\Airport $airport
 * @property \App\Model\Entity\Tag[] $tags
 */
class Flight extends Entity
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
        'user_id' => true,
        'passenger_id' => true,
        'airport_id' => true,
        'depart' => true,
        'arrival' => true,
        'date_reservation' => true,
        'created' => true,
        'modified' => true,
        'color_id' => true,
        'user' => true,
        'passenger' => true,
        'airport' => true,
        'tags' => true
    ];
}
