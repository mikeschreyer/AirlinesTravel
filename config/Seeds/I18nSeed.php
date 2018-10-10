<?php
use Migrations\AbstractSeed;

/**
 * I18n seed.
 */
class I18nSeed extends AbstractSeed
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
                'locale' => 'en_US',
                'model' => 'Articles',
                'foreign_key' => '6',
                'field' => 'title',
                'content' => 'Admin\'s article',
            ],
            [
                'id' => '2',
                'locale' => 'en_US',
                'model' => 'Articles',
                'foreign_key' => '6',
                'field' => 'body',
                'content' => 'Admin\'s new article to translate',
            ],
            [
                'id' => '3',
                'locale' => 'en_US',
                'model' => 'Tags',
                'foreign_key' => '4',
                'field' => 'title',
                'content' => 'English tag',
            ],
            [
                'id' => '4',
                'locale' => 'en_US',
                'model' => 'Tags',
                'foreign_key' => '1',
                'field' => 'title',
                'content' => 'Learning',
            ],
            [
                'id' => '5',
                'locale' => 'en_US',
                'model' => 'Tags',
                'foreign_key' => '2',
                'field' => 'title',
                'content' => 'global',
            ],
            [
                'id' => '6',
                'locale' => 'en_US',
                'model' => 'Tags',
                'foreign_key' => '3',
                'field' => 'title',
                'content' => 'health',
            ],
            [
                'id' => '7',
                'locale' => 'en_US',
                'model' => 'Articles',
                'foreign_key' => '1',
                'field' => 'title',
                'content' => 'First Post',
            ],
            [
                'id' => '8',
                'locale' => 'en_US',
                'model' => 'Articles',
                'foreign_key' => '1',
                'field' => 'body',
                'content' => 'This is the first post',
            ],
            [
                'id' => '9',
                'locale' => 'fr_CA',
                'model' => 'Airports',
                'foreign_key' => '1',
                'field' => 'city',
                'content' => 'Montréal',
            ],
            [
                'id' => '11',
                'locale' => 'en_US',
                'model' => 'Airports',
                'foreign_key' => '3',
                'field' => 'city',
                'content' => 'test',
            ],
        ];

        $table = $this->table('i18n');
        $table->insert($data)->save();
    }
}
