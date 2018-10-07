<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Passenger Entity
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $phone
 * @property string $address
 * @property string $email
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Flight[] $flights
 */
class Passenger extends Entity
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
        'name' => true,
        'slug' => true,
        'phone' => true,
        'address' => true,
        'email' => true,
        'created' => true,
        'modified' => true,
        'flights' => true
    ];
}
