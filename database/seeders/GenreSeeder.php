<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genres = [
            ["id" => 1, "name" => "", "description" => "This title has not been given a genre",],
            ["name" => "15th century", "description" => "",],
            ["name" => "16th century", "description" => "",],
            ["name" => "17th century", "description" => "",],
            ["name" => "18th century", "description" => "",],
            ["name" => "19th century", "description" => "",],
            ["name" => "20th century", "description" => "",],
            ["name" => "21st century", "description" => "",],
            ["name" => "C#", "description" => "",],
            ["name" => "comedy", "description" => null,],
            ["name" => "fantasy", "description" => "Set in mythical worlds, alternative timelines",],
            ["name" => "glamour", "description" => "Novels set against a backdrop of the rich and famous",],
            ["name" => "Go", "description" => "",],
            ["name" => "historical romance", "description" => "Love stories set in the past",],
            ["name" => "historical", "description" => "Stories set in the past, fictional telling of a historical topic",],
            ["name" => "Internet", "description" => "the Internet, not to be confused with 'an internet' of systems",],
            ["name" => "medical", "description" => "Novels in a medical setting, thrillers, disease outbreaks ",],
            ["name" => "NoSQL", "description" => "",],
            ["name" => "PHP", "description" => "",],
            ["name" => "Python", "description" => "",],
            ["name" => "romance", "description" => "Love stories set against a contemporary background",],
            ["name" => "Rust", "description" => "Computer programming language",],
            ["name" => "SQL", "description" => "Computer programming language dedicated to database interaction",],
            [
                "name" => "school stories",
                "description" => "Stories usually set in a boarding school in the 19th and 20th centuries",
            ],
            [
                "name" => "science fiction",
                "description" => "Set in the future, located in space, other galaxies, alternative realities",
            ],
            ["name" => "supernatural", "description" => "Ghosts, hauntings, vampires and more",],
            ["name" => "thrillers", "description" => "Spies, intrigue, espionage",],
            ["name" => "urban fantasy", "description" => "Magic and mythical creatures transplanted in our world",],
            ["name" => "algorithms", "description" => "",],
            ["name" => "artificial intelligence", "description" => "Robots, computer generated environments, virtual reality",],
            ["name" => "astronomy", "description" => "",],
            ["name" => "autobiography", "description" => "The life story of someone’s life told by the subject",],
            ["name" => "back-end development", "description" => "",],
            ["name" => "biography", "description" => "The life story of a person or group told by another author",],
            ["name" => "classics", "description" => "",],
            ["name" => "comic-book", "description" => "Stories told in picture form with speech bubbles or titles",],
            ["name" => "computer science", "description" => "",],
            ["name" => "crime", "description" => "Fiction featuring police or amateur detectives solving mysteries",],
            ["name" => "data science", "description" => "",],
            ["name" => "economics", "description" => "",],
            ["name" => "education", "description" => "Textbooks on education theory and practice",],
            ["name" => "front-end development", "description" => "",],
            ["name" => "history", "description" => "",],
            ["name" => "horror", "description" => "Things that go bump in the night and scare you",],
            ["name" => "information technology", "description" => "",],
            ["name" => "manga", "description" => "Japanese graphic novels",],
            ["name" => "mathematics", "description" => "",],
            ["name" => "networking", "description" => "",],
            [
                "name" => "non-fiction",
                "description" => "Autobiographies, Mathematics, Physics and other books that do not constitute fictional works.",
            ],
            ["name" => "novel", "description" => "General works of fiction",],
            ["name" => "philosophy", "description" => "Study of the fundamental questions of life",],
            ["name" => "physics", "description" => "",],
            ["name" => "poetry", "description" => "Poems, blank verse,",],
            ["name" => "programming", "description" => "",],
            ["name" => "psychology", "description" => "",],
            ["name" => "religion", "description" => "",],
            ["name" => "science", "description" => "",],
            ["name" => "signal processing", "description" => "",],
            ["name" => "spiritual", "description" => "Religion and spirituality",],
            ["name" => "technology", "description" => "",],
            ["name" => "testing", "description" => "",],
            ["name" => "true crime", "description" => "The true stories behind crimes that have shocked the world",],
            ["name" => "web design", "description" => "",],
            ["name" => "web", "description" => "",],
        ];

// Go through the genres one by one
        foreach ($genres as $genre) {
            Genre::create($genre);
        }

    }
}
