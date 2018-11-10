<?php
use Migrations\AbstractSeed;

/**
 * Flights seed.
 */
class FlightsSeed extends AbstractSeed
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
                'user_id' => '1',
                'passenger_id' => '1',
                'airport_id' => '1',
                'depart' => '2018-09-27 14:18:00',
                'arrival' => '2018-09-27 14:18:00',
                'date_reservation' => '2018-09-27 14:18:00',
                'created' => '18',
                'modified' => '10',
                'color_id' => NULL,
            ],
        ];

        $table = $this->table('flights');
        $table->insert($data)->save();
    }
}
