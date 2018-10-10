<?php
use Migrations\AbstractSeed;

/**
 * Files seed.
 */
class FilesSeed extends AbstractSeed
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
                'id' => '3',
                'name' => '2-jpg-tiger-hrc-siberie_21253111.jpg',
                'path' => 'Files/',
                'created' => '2018-09-27 13:12:11',
                'modified' => '2018-09-27 13:12:11',
                'status' => '1',
            ],
            [
                'id' => '4',
                'name' => 'img_lights.jpg',
                'path' => 'Files/',
                'created' => '2018-09-27 13:25:50',
                'modified' => '2018-09-27 13:25:50',
                'status' => '1',
            ],
            [
                'id' => '5',
                'name' => 'img_lights.jpg',
                'path' => 'Files/',
                'created' => '2018-09-27 13:26:03',
                'modified' => '2018-09-27 13:26:03',
                'status' => '1',
            ],
            [
                'id' => '6',
                'name' => 'penda.jpg',
                'path' => 'Files/',
                'created' => '2018-09-27 13:26:19',
                'modified' => '2018-09-27 13:26:19',
                'status' => '1',
            ],
            [
                'id' => '7',
                'name' => 'paysage_sable.jpg',
                'path' => 'Files/',
                'created' => '2018-10-04 13:21:42',
                'modified' => '2018-10-04 13:21:42',
                'status' => '1',
            ],
            [
                'id' => '8',
                'name' => 'iamge_bleue.jpg',
                'path' => 'Files/',
                'created' => '2018-10-09 16:47:52',
                'modified' => '2018-10-09 16:47:52',
                'status' => '1',
            ],
        ];

        $table = $this->table('files');
        $table->insert($data)->save();
    }
}
