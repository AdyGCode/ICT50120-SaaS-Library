<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $unknownAuthors = [
            [
                'id' => 1,
                'given_name' => 'UNKNOWN',
                'family_name' => 'AUTHOR',
                'is_company' => False,
            ],
            [
                'id' => 2 ,
                'family_name' => 'UNKNOWN CORPORATE AUTHOR',
                'is_company' => True,
            ],
        ];

        foreach ($unknownAuthors as $seedAuthor) {
            Author::create($seedAuthor);
        }

        $seedAuthors = [
            [ 'given_name' => 'UNKNOWN', 'family_name' => 'AUTHOR',           'is_company' => False, ],
            [ 'given_name' => 'UNKNOWN', 'family_name' => 'CORPORATE AUTHOR', 'is_company' => True,  ],
            [ 'given_name' => 'Kevin',   'family_name' => 'Yank',             'is_company' => False, ],
            [ 'given_name' => 'Mark',    'family_name' => 'Boulton',          'is_company' => False, ],
            [ 'given_name' => 'Robert',  'family_name' => 'Hoekman, jr.',     'is_company' => False, ],
            [ 'given_name' => 'Luke',    'family_name' => 'Wroblewski',       'is_company' => False, ],
            [ 'given_name' => 'Kevin',   'family_name' => 'Potts',            'is_company' => False, ],
        ];

        foreach ($seedAuthors as $seedAuthor) {
            Author::create($seedAuthor);
        }

    }
}
