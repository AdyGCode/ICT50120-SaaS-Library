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
        $unknownAuthor = [
            'given_name' => 'UNKNOWN',
        'family_name' => 'AUTHOR',
        'is_company' => False,
        ];

        Author::create($unknownAuthor);

    }
}
