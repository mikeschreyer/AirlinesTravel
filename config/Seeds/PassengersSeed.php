<?php
use Migrations\AbstractSeed;

/**
 * Passengers seed.
 */
class PassengersSeed extends AbstractSeed
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
                'name' => 'Michel',
                'slug' => 'michel',
                'phone' => '5147756994',
                'address' => '1660 bld souvenir',
                'email' => 'mschreyer@gmail.com',
                'created' => '2018-09-05 13:51:46',
                'modified' => '2018-09-05 13:51:46',
                'active' => NULL,
            ],
        ];

        $table = $this->table('passengers');
        $table->insert($data)->save();
    }
}
