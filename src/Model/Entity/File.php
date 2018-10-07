<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class File extends Entity
{

    protected $_accessible = [
        'name' => true,
        'path' => true,
        'created' => true,
        'modified' => true,
        'status' => true
    ];
}
