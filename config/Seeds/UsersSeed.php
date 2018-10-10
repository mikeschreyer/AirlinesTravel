<?php
use Migrations\AbstractSeed;

/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
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
                'email' => 'michelschreyer18@gmail.com',
                'password' => '$2y$10$lGT5hZvjOn/sQfJe3SJ8AONWoy8.Rw6aS5v503r4A8u5gvyDxAZNi',
                'role' => 'admin',
                'created' => '2018-09-19 15:02:58',
                'modified' => '2018-09-19 15:02:58',
            ],
            [
                'id' => '2',
                'email' => 'admin@admin.ca',
                'password' => '$2y$10$Lv3qU9bA/Arfvih42BRxBOqoa1jRAM41JxH8sE3cFoMZYvU3loo0y',
                'role' => 'admin',
                'created' => '2018-09-19 15:03:16',
                'modified' => '2018-09-19 15:03:16',
            ],
            [
                'id' => '3',
                'email' => 'test@test.ca',
                'password' => '$2y$10$EP9SyDTgH6WtKEoBFp0WBemBXB5Fig6o9yesVW2RaAtPEbBtYu5aG',
                'role' => '',
                'created' => '2018-09-24 16:41:09',
                'modified' => '2018-09-24 16:41:09',
            ],
            [
                'id' => '4',
                'email' => 'michel.schreyer21@gmail.com',
                'password' => '$2y$10$rGQTsoJchkHvXpu9O/Zt4.kNr3iKtFotbwJ7FkE.G14xfWwKBuP8e',
                'role' => '',
                'created' => '2018-09-27 13:42:40',
                'modified' => '2018-09-27 13:42:40',
            ],
            [
                'id' => '5',
                'email' => 'pavel@pavel.ca',
                'password' => '$2y$10$xsYZqShAhaISsUjKux4Nq.dvr6VVYsyv9ySXVDwD7or3cqWk34ixW',
                'role' => 'supervisor',
                'created' => '2018-10-10 13:57:22',
                'modified' => '2018-10-10 13:57:22',
            ],
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
