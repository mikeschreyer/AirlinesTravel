<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Color Entity
 *
 * @property int $id
 * @property string $color
 * @property int $modele_id
 *
 * @property \App\Model\Entity\Modele $modele
 */
class Color extends Entity
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
        'color' => true,
        'modele_id' => true,
        'modele' => true
    ];
}
