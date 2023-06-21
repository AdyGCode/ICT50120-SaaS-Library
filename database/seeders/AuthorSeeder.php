<?php

namespace Database\Seeders;

use App\Models\Author;
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

        $seedAuthors = [
            ['id' => 1, 'family_name' => null, 'given_name' => 'UNKNOWN AUTHOR', 'is_company' => False,],
            ['id' => 2, 'family_name' => null, 'given_name' => 'UNKNOWN CORPORATE AUTHOR', 'is_company' => True,],
            ['given_name' => 'P L', 'family_name' => 'Desh Pande ', 'is_company' => False,],
            ['given_name' => 'Kevin', 'family_name' => 'Yank', 'is_company' => False,],
            ['given_name' => null, 'family_name' => 'Government of Australia', 'is_company' => True,],
            ['given_name' => 'Robert', 'family_name' => 'Pirsig', 'is_company' => False,],
            ['given_name' => 'Stephen', 'family_name' => 'Hawking', 'is_company' => False,],
            ['given_name' => 'Robert', 'family_name' => 'Hoekman, jr.', 'is_company' => False,],
            ['given_name' => 'Microsoft', 'family_name' => null, 'is_company' => True,],
            ['given_name' => 'Luke', 'family_name' => 'Wroblewski', 'is_company' => False,],
            ['given_name' => null, 'family_name' => 'Oracle', 'is_company' => True,],
            ['given_name' => 'Mark', 'family_name' => 'Boulton', 'is_company' => False,],
            ['given_name' => 'Kevin', 'family_name' => 'Potts', 'is_company' => False,],
            ['given_name' => 'Fyodor', 'family_name' => 'Dostoevsky', 'is_company' => False,'notes'=>'Russian: Fyódor Mikháylovich Dostoyévskiy'],

        ];

        foreach ($seedAuthors as $seedAuthor) {
            if (!isset($seedAuthor['given_name']) || is_null($seedAuthor['given_name'])) {
                $seedAuthor['given_name'] = $seedAuthor['family_name'];
                $seedAuthor['family_name'] = null;
            }
            if (!isset($seedAuthor['notes']) || is_null($seedAuthor['notes'])) {
                $seedAuthor['notes'] = null;
            }

            Author::create($seedAuthor);
        }

    }
}
