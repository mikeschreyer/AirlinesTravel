<?php
use Migrations\AbstractSeed;

/**
 * Airports seed.
 */
class AirportsSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => '1',
                'name' => 'Montreal',
                'city' => 'Montreal',
                'address' => 'Aéroport international Pierre-Elliott-Trudeau de Montréal,',
                'created' => '2018-09-24 16:20:17',
                'modified' => '2018-09-24 16:35:56',
            ],
            [
                'id' => '2',
                'name' => 'Roma',
                'city' => 'Rome',
                'address' => 'Via dell\' Aeroporto di Fiumicino, 00054 Fiumicino RM, Italie',
                'created' => '2018-09-24 16:37:49',
                'modified' => '2018-09-24 16:38:02',
            ],
        ];

        $table = $this->table('airports');
        $table->insert($data)->save();
    }
}
