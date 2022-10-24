<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Seeder;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Output\ConsoleOutput;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $unknownBook = [
            'id' => 1,
            'title' => 'UNKNOWN TITLE',
            'subtitle' => null,
            'year_published' => null,
            'edition' => null,
            'isbn_10' => null,
            'isbn_13' => null,
        ];

        Book::create($unknownBook);


        $seedBooks = [
            [
                "title" => "Fifty Quick Ideas to Improve your Tests",
                "authors" => [
                    "Adzic, Gojko",
                    "Evans, David",
                    "Roden, Tom"
                ],
                "genre" => "technology",
                "sub_genre" => "programming",
                "height" => 291,
                "publisher" => "Leanpub",
            ],
            [
                "title" => "Fundamentals of Wavelets",
                "authors" => [
                    "Goswami, Jaideva",
                ],
                "genre" => "technology",
                "sub_genre"
                => "signal processing",
                "height" => 228,
                "publisher" => "Wiley",
            ],
            [
                "title" => "Data Smart",
                "authors" => [
                    "Foreman, John",
                ],
                "genre" => "technology",
                "sub_genre" => "data science",
                "height" => 235,
                "publisher" => "Wiley",
            ],
            [
                "title" => "God Created the Integers",
                "authors" => [
                    "Hawking, Stephen",
                ],
                "genre" => "technology",
                "sub_genre" => "mathematics",
                "height" => 197,
                "publisher" => "Penguin",
            ],
            [
                "title" => "Superfreakonomics",
                "authors" => [
                    "Dubner, Stephen",
                ],
                "genre" => "science",
                "sub_genre" => "economics",
                "height" => 179,
                "publisher" => "Harper Collins",
            ],
            [
                "title" => "Orientalism",
                "authors" => [
                    "Said, Edward",
                ],
                "genre" => "non-fiction",
                "sub_genre" => "history",
                "height" => 197,
                "publisher" => "Penguin",
            ],
            [
                "title" => "Nature of Statistical Learning Theory, The",
                "authors" => [
                    "Vapnik, Vladimir",
                ],
                "genre" => "technology",
                "sub_genre" => "data science",
                "height" => 230,
                "publisher" => "Springer",
            ],
            [
                "title" => "Integration of the Indian States",
                "authors" => [
                    "Menon, V P",
                ],
                "genre" => "non-fiction",
                "sub_genre" => "history",
                "height" => 217,
                "publisher" => "Orient Blackswan",
            ],
            [
                "title" => "Drunkard's Walk, The",
                "authors" => [
                    "Mlodinow, Leonard",
                ],
                "genre" => "science",
                "sub_genre" => "mathematics",
                "height" => 197,
                "publisher" => "Penguin",
            ],
            [
                "title" => "Image Processing & Mathematical Morphology",
                "authors" => [
                    "Shih, Frank",
                ],
                "genre" => "technology",
                "sub_genre" => "signal processing",
                "height" => 241,
                "publisher" => "CRC",
            ],
            [
                "title" => "How to Think Like Sherlock Holmes",
                "authors" => [
                    "Konnikova, Maria",
                ],
                "genre" => "non-fiction",
                "sub_genre" => "psychology",
                "height" => 240,
                "publisher" => "Penguin",
            ],
            [
                "title" => "Data Scientists at Work",
                "authors" => [
                    "Gutierrez, Sebastian",
                ],
                "genre" => "technology",
                "sub_genre" => "data science",
                "height" => 230,
                "publisher" => "Apress",
            ],
            [
                "title" => "Slaughterhouse Five",
                "authors" => [
                    "Vonnegut, Kurt",
                ],
                "genre" => "fiction",
                "sub_genre" => "classic",
                "height" => 198,
                "publisher" => "Random House",
            ],
            [
                "title" => "Birth of a Theorem",
                "authors" => [
                    "Villani, Cedric",
                ],
                "genre" => "science",
                "sub_genre" => "mathematics",
                "height" => 234,
                "publisher" => "Bodley Head",
            ],
            [
                "title" => "Structure & Interpretation of Computer Programs",
                "authors" => [
                    "Sussman, Gerald",
                ],
                "genre" => "technology",
                "sub_genre" => "computer science",
                "height" => 240,
                "publisher" => "MIT Press",
            ],
            [
                "title" => "Age of Wrath, The",
                "authors" => [
                    "Eraly, Abraham",
                ],
                "genre" => "non-fiction",
                "sub_genre" => "history",
                "height" => 238,
                "publisher" => "Penguin",
            ],
            [
                "title" => "Trial, The",
                "authors" => [
                    "Kafka, Frank",
                ],
                "genre" => "fiction",
                "sub_genre" => "classic",
                "height" => 198,
                "publisher" => "Random House",
            ],
            [
                "title" => "Statistical Decision Theory'",
                "authors" => [
                    "Pratt, John",
                ],
                "genre" => "technology",
                "sub_genre" => "data science",
                "height" => 236,
                "publisher" => "MIT Press",
            ],
            [
                "title" => "Data Mining Handbook",
                "authors" => [
                    "Nisbet, Robert",
                ],
                "genre" => "technology",
                "sub_genre" => "data science",
                "height" => 242,
                "publisher" => "Apress",
            ],
            [
                "title" => "New Machiavelli, The",
                "authors" => [
                    "Wells, H. G.",
                ],
                "genre" => "fiction",
                "sub_genre" => "novel",
                "height" => 180,
                "publisher" => "Penguin",
            ],
            [
                "title" => "Physics & Philosophy",
                "authors" => [
                    "Heisenberg, Werner",
                ],
                "genre" => "philosophy",
                "sub_genre" => "science",
                "height" => 197,
                "publisher" => "Penguin",
            ],
            [
                "title" => "Making Software",
                "authors" => [
                    "Oram, Andy",
                ],
                "genre" => "technology",
                "sub_genre" => "computer science",
                "height" => 232,
                "publisher" => "O'Reilly",
            ],
            [
                "title" => "Analysis, Vol I",
                "authors" => [
                    "Tao, Terence",
                ],
                "genre" => "technology",
                "sub_genre" => "mathematics",
                "height" => 248,
                "publisher" => "HBA",
            ],
            [
                "title" => "Machine Learning for Hackers",
                "authors" => [
                    "Conway, Drew",
                ],
                "genre" => "technology",
                "sub_genre" => "data science",
                "height" => 233,
                "publisher" => "O'Reilly",
            ],
            [
                "title" => "Signal and the Noise, The",
                "authors" => [
                    "Silver, Nate",
                ],
                "genre" => "technology",
                "sub_genre" => "data science",
                "height" => 233,
                "publisher" => "Penguin",
            ],
            [
                "title" => "Python for Data Analysis",
                "authors" => [
                    "McKinney, Wes",
                ],
                "genre" => "technology",
                "sub_genre" => "data science",
                "height" => 233,
                "publisher" => "O'Reilly",
            ],
            [
                "title" => "Introduction to Algorithms",
                "authors" => [
                    "Cormen, Thomas",
                ],
                "genre" => "technology",
                "sub_genre" => "computer science",
                "height" => 234,
                "publisher" => "MIT Press",
            ],
            [
                "title" => "Beautiful and the Damned, The",
                "authors" => [
                    "Deb, Siddhartha",
                ],
                "genre" => "non-fiction",
                "sub_genre" => "history",
                "height" => 198,
                "publisher" => "Penguin",
            ],
            [
                "title" => "Outsider, The",
                "authors" => [
                    "Camus, Albert",
                ],
                "genre" => "fiction",
                "sub_genre" => "classic",
                "height" => 198,
                "publisher" => "Penguin",
            ],
            [
                "title" => "Complete Sherlock Holmes, The - Vol I",
                "authors" => [
                    "Doyle, Arthur Conan",
                ],
                "genre" => "fiction",
                "sub_genre" => "classic",
                "height" => 176,
                "publisher" => "Random House",
            ],
            [
                "title" => "Complete Sherlock Holmes, The - Vol II",
                "authors" => [
                    "Doyle, Arthur Conan",
                ],
                "genre" => "fiction",
                "sub_genre" => "classic",
                "height" => 176,
                "publisher" => "Random House",
            ],
            [
                "title" => "Wealth of Nations, The",
                "authors" => [
                    "Smith, Adam",
                ],
                "genre" => "science",
                "sub_genre" => "economics",
                "height" => 175,
                "publisher" => "Random House",
            ],
            [
                "title" => "Pillars of the Earth, The",
                "authors" => [
                    "Follett, Ken",
                ],
                "genre" => "fiction",
                "sub_genre" => "novel",
                "height" => 176,
                "publisher" => "Random House",
            ],
            [
                "title" => "Tao of Physics, The",
                "authors" => [
                    "Capra, Fritjof",
                ],
                "genre" => "science",
                "sub_genre" => "physics",
                "height" => 179,
                "publisher" => "Penguin",
            ],
            [
                "title" => "Surely You're Joking Mr Feynman",
                "authors" => [
                    "Feynman, Richard",
                ],
                "genre" => "science",
                "sub_genre" => "physics",
                "height" => 198,
                "publisher" => "Random House",
            ],
            [
                "title" => "Farewell to Arms, A",
                "authors" => [
                    "Hemingway, Ernest",
                ],
                "genre" => "fiction",
                "sub_genre" => "classic",
                "height" => 179,
                "publisher" => "Rupa",
            ],
            [
                "title" => "Veteran, The",
                "authors" => [
                    "Forsyth, Frederick",
                ],
                "genre" => "fiction",
                "sub_genre" => "novel",
                "height" => 177,
                "publisher" => "Transworld",
            ],
            [
                "title" => "False Impressions",
                "authors" => [
                    "Archer, Jeffery",
                ],
                "genre" => "fiction",
                "sub_genre" => "novel",
                "height" => 177,
                "publisher" => "Pan",
            ],
            [
                "title" => "Last Lecture, The",
                "authors" => [
                    "Pausch, Randy",
                ],
                "genre" => "non-fiction",
                "sub_genre" => "autobiography",
                "height" => 197,
                "publisher" => "Hyperion",
            ],
            [
                "title" => "Return of the Primitive",
                "authors" => [
                    "Rand, Ayn",
                ],
                "genre" => "philosophy",
                "sub_genre" => "objectivism",
                "height" => 202,
                "publisher" => "Penguin",
            ],
            [
                "title" => "Jurassic Park",
                "authors" => [
                    "Crichton, Michael",
                ],
                "genre" => "fiction",
                "sub_genre" => "novel",
                "height" => 174,
                "publisher" => "Random House",
            ],
            [
                "title" => "Russian Journal, A",
                "authors" => [
                    "Steinbeck, John",
                ],
                "genre" => "non-fiction",
                "sub_genre" => "history",
                "height" => 196,
                "publisher" => "Penguin",
            ],
            [
                "title" => "Tales of Mystery and Imagination",
                "authors" => [
                    "Poe, Edgar Allen",
                ],
                "genre" => "fiction",
                "sub_genre" => "classic",
                "height" => 172,
                "publisher" => "Harper Collins",
            ],
            [
                "title" => "Freakonomics",
                "authors" => [
                    "Dubner, Stephen",
                ],
                "genre" => "science",
                "sub_genre" => "economics",
                "height" => 197,
                "publisher" => "Penguin",
            ],
            [
                "title" => "Hidden Connections, The",
                "authors" => [
                    "Capra, Fritjof",
                ],
                "genre" => "science",
                "sub_genre" => "physics",
                "height" => 197,
                "publisher" => "Harper Collins",
            ],
            [
                "title" => "Story of Philosophy, The",
                "authors" => [
                    "Durant, Will",
                ],
                "genre" => "philosophy",
                "sub_genre" => "history",
                "height" => 170,
                "publisher" => "Pocket",
            ],
            [
                "title" => "Asami Asami",
                "authors" => [
                    "Desh Pande, P L",
                ],
                "genre" => "fiction",
                "sub_genre" => "novel",
                "height" => 205,
                "publisher" => "Mauj",
            ],
            [
                "title" => "Journal of a Novel",
                "authors" => [
                    "Steinbeck, John",
                ],
                "genre" => "fiction",
                "sub_genre" => "classic",
                "height" => 196,
                "publisher" => "Penguin",
            ],
            [
                "title" => "Once There Was a War",
                "authors" => [
                    "Steinbeck, John",
                ],
                "genre" => "non-fiction",
                "sub_genre" => "history",
                "height" => 196,
                "publisher" => "Penguin",
            ],
            [
                "title" => "Moon is Down, The",
                "authors" => [
                    "Steinbeck, John",
                ],
                "genre" => "fiction",
                "sub_genre" => "classic",
                "height" => 196,
                "publisher" => "Penguin",
            ],
            [
                "title" => "Brethren, The",
                "authors" => [
                    "Grisham, John",
                ],
                "genre" => "fiction",
                "sub_genre" => "novel",
                "height" => 174,
                "publisher" => "Random House",
            ],
            [
                "title" => "In a Free State",
                "authors" => [
                    "Naipaul, V. S.",
                ],
                "genre" => "fiction",
                "sub_genre" => "novel",
                "height" => 196,
                "publisher" => "Rupa",
            ],
            [
                "title" => "Catch 22",
                "authors" => [
                    "Heller, Joseph",
                ],
                "genre" => "fiction",
                "sub_genre" => "classic",
                "height" => 178,
                "publisher" => "Random House",
            ],
            [
                "title" => "Complete Mastermind, The",
                "authors" => [
                    "BBC",
                ],
                "genre" => "non-fiction",
                "sub_genre" => "trivia",
                "height" => 178,
                "publisher" => "BBC",
            ],
            [
                "title" => "Dylan on Dylan",
                "authors" => [
                    "Dylan, Bob",
                ],
                "genre" => "non-fiction",
                "sub_genre" => "autobiography",
                "height" => 197,
                "publisher" => "Random House",
            ],
            [
                "title" => "Soft Computing & Intelligent Systems",
                "authors" => [
                    "Gupta, Madan",
                ],
                "genre" => "technology",
                "sub_genre" => "data science",
                "height" => 242,
                "publisher" => "Elsevier",
            ],
            [
                "title" => "Textbook of Economic Theory",
                "authors" => [
                    "Stonier, Alfred",
                ],
                "genre" => "technology",
                "sub_genre" => "economics",
                "height" => 242,
                "publisher" => "Pearson",
            ],
            [
                "title" => "Econometric Analysis",
                "authors" => [
                    "Greene, W. H.",
                ],
                "genre" => "technology",
                "sub_genre" => "economics",
                "height" => 242,
                "publisher" => "Pearson",
            ],
            [
                "title" => "Learning OpenCV",
                "authors" => [
                    "Bradsky, Gary",
                ],
                "genre" => "technology",
                "sub_genre" => "signal processing",
                "height" => 232,
                "publisher" => "O'Reilly",
            ],
            [
                "title" => "Data Structures Using C & C++",
                "authors" => [
                    "Tanenbaum, Andrew",
                ],
                "genre" => "technology",
                "sub_genre" => "computer science",
                "height" => 235,
                "publisher" => "Prentice Hall",
            ],
            [
                "title" => "Computer Vision, A Modern Approach",
                "authors" => [
                    "Forsyth, David",
                ],
                "genre" => "technology",
                "sub_genre" => "signal processing",
                "height" => 255,
                "publisher" => "Pearson",
            ],
            [
                "title" => "Principles of Communication Systems",
                "authors" => [
                    "Taub, Schilling",
                ],
                "genre" => "technology",
                "sub_genre" => "signal processing",
                "height" => 240,
                "publisher" => "TMH",
            ],
            [
                "title" => "Let Us C",
                "authors" => [
                    "Kanetkar, Yashwant",
                ],
                "genre" => "technology",
                "sub_genre" => "computer science",
                "height" => 213,
                "publisher" => "Prentice Hall",
            ],
            [
                "title" => "Amulet of Samarkand, The",
                "authors" => [
                    "Stroud, Jonathan",
                ],
                "genre" => "fiction",
                "sub_genre" => "novel",
                "height" => 179,
                "publisher" => "Random House",
            ],
            [
                "title" => "Crime and Punishment",
                "authors" => [
                    "Dostoevsky, Fyodor",
                ],
                "genre" => "fiction",
                "sub_genre" => "classic",
                "height" => 180,
                "publisher" => "Penguin",
            ],
            [
                "title" => "Angels & Demons",
                "authors" => [
                    "Brown, Dan",
                ],
                "genre" => "fiction",
                "sub_genre" => "novel",
                "height" => 178,
                "publisher" => "Random House",
            ],
            [
                "title" => "Argumentative Indian, The",
                "authors" => [
                    "Sen, Amartya",
                ],
                "genre" => "non-fiction",
                "sub_genre" => "history",
                "height" => 209,
                "publisher" => "Picador",
            ],
            [
                "title" => "Sea of Poppies",
                "authors" => [
                    "Ghosh, Amitav",
                ],
                "genre" => "fiction",
                "sub_genre" => "novel",
                "height" => 197,
                "publisher" => "Penguin",
            ],
            [
                "title" => "Idea of Justice, The",
                "authors" => [
                    "Sen, Amartya",
                ],
                "genre" => "philosophy",
                "sub_genre" => "economics",
                "height" => 212,
                "publisher" => "Penguin",
            ],
            [
                "title" => "Raisin in the Sun, A",
                "authors" => [
                    "Hansberry, Lorraine",
                ],
                "genre" => "fiction",
                "sub_genre" => "novel",
                "height" => 175,
                "publisher" => "Penguin",
            ],
            [
                "title" => "All the President's Men",
                "authors" => [
                    "Woodward, Bob",
                ],
                "genre" => "non-fiction",
                "sub_genre" => "history",
                "height" => 177,
                "publisher" => "Random House",
            ],
            [
                "title" => "Prisoner of Birth, A",
                "authors" => [
                    "Archer, Jeffery",
                ],
                "genre" => "fiction",
                "sub_genre" => "novel",
                "height" => 176,
                "publisher" => "Pan",
            ],
            [
                "title" => "Scoop!",
                "authors" => [
                    "Nayar, Kuldip",
                ],
                "genre" => "non-fiction",
                "sub_genre" => "history",
                "height" => 216,
                "publisher" => "Harper Collins",
            ],
            [
                "title" => "Ahe Manohar Tari",
                "authors" => [
                    "Desh Pande, Sunita",
                ],
                "genre" => "non-fiction",
                "sub_genre" => "autobiography",
                "height" => 213,
                "publisher" => "Mauj",
            ],
            [
                "title" => "Last Mughal, The",
                "authors" => [
                    "Dalrymple, William",
                ],
                "genre" => "non-fiction",
                "sub_genre" => "history",
                "height" => 199,
                "publisher" => "Penguin",
            ],
            [
                "title" => "Social Choice & Welfare, Vol 39 No. 1",
                "authors" => [
                    "Various",
                ],
                "genre" => "technology",
                "sub_genre" => "economics",
                "height" => 235,
                "publisher" => "Springer",
            ],
            [
                "title" => "Radiowaril Bhashane & Shrutika",
                "authors" => [
                    "Desh Pande, P L",
                ],
                "genre" => "non-fiction",
                "sub_genre" => "misc",
                "height" => 213,
                "publisher" => "Mauj",
            ],
            [
                "title" => "Gun Gayin Awadi",
                "authors" => [
                    "Desh Pande, P L",
                ],
                "genre" => "non-fiction",
                "sub_genre" => "misc",
                "height" => 212,
                "publisher" => "Mauj",
            ],
            [
                "title" => "Aghal Paghal",
                "authors" => [
                    "Desh Pande, P L",
                ],
                "genre" => "non-fiction",
                "sub_genre" => "misc",
                "height" => 212,
                "publisher" => "Mauj",
            ],
            [
                "title" => "Maqta-e-Ghalib",
                "authors" => [
                    "Garg, Sanjay",
                ],
                "genre" => "non-fiction",
                "sub_genre" => "poetry",
                "height" => 221,
                "publisher" => "Mauj",
            ],
            [
                "title" => "Beyond Degrees",
                "authors" => [
                    "",
                ],
                "genre" => "philosophy",
                "sub_genre" => "education",
                "height"
                => 222,
                "publisher" => "Harper Collins",
            ],
            [
                "title" => "Manasa",
                "authors" => [
                    "Kale, V P",
                ],
                "genre" => "non-fiction",
                "sub_genre" => "misc",
                "height" =>
                    213,
                "publisher" => "Mauj",
            ],
            [
                "title" => "India from Midnight to Milennium",
                "authors" => [
                    "Tharoor, Shashi",
                ],
                "genre" => "non-fiction",
                "sub_genre" => "history",
                "height" => 198,
                "publisher" => "Penguin",
            ],
            [
                "title" => "World's Greatest Trials, The",
                "authors" => [
                    "",
                ],
                "genre" => "non-fiction",
                "sub_genre" => "history",
                "height" => 210,
                "publisher" => "",
            ],
            [
                "title" => "Great Indian Novel, The",
                "authors" => [
                    "Tharoor, Shashi",
                ],
                "genre" => "fiction",
                "sub_genre" => "novel",
                "height" => 198,
                "publisher" => "Penguin",
            ],
            [
                "title" => "O Jerusalem!",
                "authors" => [
                    "Lapierre, Dominique",
                ],
                "genre" => "non-fiction",
                "sub_genre" => "history",
                "height" => 217,
                "publisher" => "vikas",
            ],
            [
                "title" => "City of Joy, The",
                "authors" => [
                    "Lapierre, Dominique",
                ],
                "genre" => "fiction",
                "sub_genre" => "novel",
                "height" => 177,
                "publisher" => "vikas",
            ],
            [
                "title" => "Freedom at Midnight",
                "authors" => [
                    "Lapierre, Dominique",
                ],
                "genre" => "non-fiction",
                "sub_genre"
                => "history",
                "height" => 167,
                "publisher" => "vikas",
            ],
            [
                "title" => "Winter of Our Discontent, The",
                "authors" => [
                    "Steinbeck, John",
                ],
                "genre" => "fiction",
                "sub_genre"
                => "classic",
                "height" => 196,
                "publisher" => "Penguin",
            ],
            [
                "title" => "On Education",
                "authors" => [
                    "Russell, Bertrand",
                ],
                "genre" => "philosophy",
                "sub_genre" => "education",
                "height" => 203,
                "publisher" => "Routledge",
            ],
            [
                "title" => "Free Will",
                "authors" => [
                    "Harris, Sam",
                ],
                "genre" => "non-fiction",
                "sub_genre" => "psychology",
                "height" => 203,
                "publisher" => "FreePress",
            ],
            [
                "title" => "Bookless in Baghdad",
                "authors" => [
                    "Tharoor, Shashi",
                ],
                "genre" => "non-fiction",
                "sub_genre" => "history",
                "height" => 206,
                "publisher" => "Penguin",
            ],
            [
                "title" => "Case of the Lame Canary, The",
                "authors" => [
                    "Gardner, Earle Stanley",
                ],
                "genre" => "fiction",
                "sub_genre" => "novel",
                "height" => 179,
                "publisher" => "",
            ],
            [
                "title" => "Theory of Everything, The",
                "authors" => [
                    "Hawking, Stephen",
                ],
                "genre" => "science",
                "sub_genre" => "physics",
                "height" => 217,
                "publisher" => "Jaico",
            ],
            [
                "title" => "New Markets & Other Essays",
                "authors" => [
                    "Drucker, Peter",
                ],
                "genre" => "science",
                "sub_genre" => "economics",
                "height" => 176,
                "publisher" => "Penguin",
            ],
            [
                "title" => "Electric Universe",
                "authors" => [
                    "Bodanis, David",
                ],
                "genre" => "science",
                "sub_genre" => "physics",
                "height" => 201,
                "publisher" => "Penguin",
            ],
            [
                "title" => "Hunchback of Notre Dame, The",
                "authors" => [
                    "Hugo, Victor",
                ],
                "genre" => "fiction",
                "sub_genre" => "classic",
                "height" => 175,
                "publisher" => "Random House",
            ],
            [
                "title" => "Burning Bright",
                "authors" => [
                    "Steinbeck, John",
                ],
                "genre" => "fiction",
                "sub_genre" => "classic",
                "height" => 175,
                "publisher" => "Penguin",
            ],
            [
                "title" => "Age of Discontuinity, The",
                "authors" => [
                    "Drucker, Peter",
                ],
                "genre" => "non-fiction",
                "sub_genre"
                => "economics",
                "height" => 178,
                "publisher" => "Random House",
            ],
            [
                "title" => "Doctor in the Nude",
                "authors" => [
                    "Gordon, Richard",
                ],
                "genre" => "fiction",
                "sub_genre" => "novel",
                "height" => 179,
                "publisher" => "Penguin",
            ],
            [
                "title" => "Down and Out in Paris & London",
                "authors" => [
                    "Orwell, George",
                ],
                "genre" => "non-fiction",
                "sub_genre" => "autobiography",
                "height" => 179,
                "publisher" => "Penguin",
            ],
            [
                "title" => "Identity & Violence",
                "authors" => [
                    "Sen, Amartya",
                ],
                "genre" => "philosophy",
                "sub_genre" => "philosophy",
                "height" => 219,
                "publisher" => "Penguin",
            ],
            [
                "title" => "Beyond the Three Seas",
                "authors" => [
                    "Dalrymple, William",
                ],
                "genre" => "non-fiction",
                "sub_genre"
                => "history",
                "height" => 197,
                "publisher" => "Random House",
            ],
            [
                "title" => "World's Greatest Short Stories, The",
                "authors" => [
                    "",
                ],
                "genre" => "fiction",
                "sub_genre" => "classic",
                "height" => 217,
                "publisher" => "Jaico",
            ],
            [
                "title" => "Talking Straight",
                "authors" => [
                    "Iacoca, Lee",
                ],
                "genre" => "non-fiction",
                "sub_genre" => "autobiography",
                "height" => 175,
                "publisher" => "",
            ],
            [
                "title" => "Maugham's Collected Short Stories, Vol 3",
                "authors" => [
                    "Maugham, William S",
                ],
                "genre" => "fiction",
                "sub_genre" => "classic",
                "height" => 171,
                "publisher" => "Vintage",
            ],
            [
                "title" => "Phantom of Manhattan, The",
                "authors" => [
                    "Forsyth, Frederick",
                ],
                "genre" => "fiction",
                "sub_genre"
                => "classic",
                "height" => 180,
                "publisher" => "",
            ],
            [
                "title" => "Ashenden of The British Agent",
                "authors" => [
                    "Maugham, William S",
                ],
                "genre" => "fiction",
                "sub_genre" => "classic",
                "height" => 160,
                "publisher" => "Vintage",
            ],
            [
                "title" => "Zen & The Art of Motorcycle Maintenance",
                "authors" => [
                    "Pirsig, Robert",
                ],
                "genre" => "philosophy",
                "sub_genre" => "autobiography",
                "height" => 172,
                "publisher" => "Vintage",
            ],
            [
                "title" => "Great War for Civilization, The",
                "authors" => [
                    "Fisk, Robert",
                ],
                "genre" => "non-fiction",
                "sub_genre" => "history",
                "height" => 197,
                "publisher" => "Harper Collins",
            ],
            [
                "title" => "We the Living",
                "authors" => [
                    "Rand, Ayn",
                ],
                "genre" => "fiction",
                "sub_genre" => "novel",
                "height"
                => 178,
                "publisher" => "Penguin",
            ],
            [
                "title" => "Artist and the Mathematician, The",
                "authors" => [
                    "Aczel, Amir",
                ],
                "genre" => "science",
                "sub_genre"
                => "mathematics",
                "height" => 186,
                "publisher" => "HighStakes",
            ],
            [
                "title" => "History of Western Philosophy",
                "authors" => [
                    "Russell, Bertrand",
                ],
                "genre" => "philosophy",
                "sub_genre" => "philosophy",
                "height" => 213,
                "publisher" => "Routledge",
            ],
            [
                "title" => "Selected Short Stories",
                "authors" => [
                    "",
                ],
                "genre" => "fiction",
                "sub_genre" => "classic",
                "height" => 215,
                "publisher" => "Jaico",
            ],
            [
                "title" => "Rationality & Freedom",
                "authors" => [
                    "Sen, Amartya",
                ],
                "genre" => "science",
                "sub_genre" => "economics",
                "height" => 213,
                "publisher" => "Springer",
            ],
            [
                "title" => "Clash of Civilizations and Remaking of the World Order",
                "authors" => [
                    "Huntington, Samuel",
                ],
                "genre" => "non-fiction",
                "sub_genre" => "history",
                "height" => 228,
                "publisher" => "Simon & Schuster",
            ],
            [
                "title" => "Uncommon Wisdom",
                "authors" => [
                    "Capra, Fritjof",
                ],
                "genre" => "non-fiction",
                "sub_genre" => "anthology",
                "height" => 197,
                "publisher" => "Fontana",
            ],
            [
                "title" => "One",
                "authors" => [
                    "Bach, Richard",
                ],
                "genre" => "non-fiction",
                "sub_genre" => "autobiography",
                "height" => 172,
                "publisher" => "Dell",
            ],
            [
                "title" => "Karl Marx Biography",
                "authors" => [
                    "",
                ],
                "genre" => "non-fiction",
                "sub_genre" => "autobiography",
                "height" => 162,
                "publisher" => "",
            ],
            [
                "title" => "To Sir With Love",
                "authors" => [
                    "Braithwaite",
                ],
                "genre" => "fiction",
                "sub_genre" => "classic",
                "height" => 197,
                "publisher" => "Penguin",
            ],
            [
                "title" => "Half A Life",
                "authors" => [
                    "Naipaul, V S",
                ],
                "genre" => "fiction",
                "sub_genre" => "novel",
                "height"
                => 196,
                "publisher" => "",
            ],
            [
                "title" => "Discovery of India, The",
                "authors" => [
                    "Nehru, Jawaharlal",
                ],
                "genre" => "non-fiction",
                "sub_genre"
                => "history",
                "height" => 230,
                "publisher" => "",
            ],
            [
                "title" => "Apulki",
                "authors" => [
                    "Desh Pande, P L",
                ],
                "genre" => "non-fiction",
                "sub_genre" => "misc",
                "height" => 211,
                "publisher" => "",
            ],
            [
                "title" => "Unpopular Essays",
                "authors" => [
                    "Russell, Bertrand",
                ],
                "genre" => "philosophy",
                "sub_genre" => "philosophy",
                "height" => 198,
                "publisher" => "",
            ],
            [
                "title" => "Deceiver, The",
                "authors" => [
                    "Forsyth, Frederick",
                ],
                "genre" => "fiction",
                "sub_genre" => "novel",
                "height" => 178,
                "publisher" => "",
            ],
            [
                "title" => "Veil: Secret Wars of the CIA",
                "authors" => [
                    "Woodward, Bob",
                ],
                "genre" => "non-fiction",
                "sub_genre" => "history",
                "height" => 171,
                "publisher" => "",
            ],
            [
                "title" => "Char Shabda",
                "authors" => [
                    "Desh Pande, P L",
                ],
                "genre" => "non-fiction",
                "sub_genre" => "misc",
                "height" => 214,
                "publisher" => "",
            ],
            [
                "title" => "Rosy is My Relative",
                "authors" => [
                    "Durrell, Gerald",
                ],
                "genre" => "fiction",
                "sub_genre" => "novel",
                "height" => 176,
                "publisher" => "",
            ],
            [
                "title" => "Moon and Sixpence, The",
                "authors" => [
                    "Maugham, William S",
                ],
                "genre" => "fiction",
                "sub_genre" => "classic",
                "height" => 180,
                "publisher" => "",
            ],
            [
                "title" => "Political Philosophers",
                "authors" => [
                    "",
                ],
                "genre" => "philosophy",
                "sub_genre" => "politics",
                "height" => 162,
                "publisher" => "",
            ],
            [
                "title" => "Short history of the World, A",
                "authors" => [
                    "Wells, H G",
                ],
                "genre" => "non-fiction",
                "sub_genre"
                => "history",
                "height" => 197,
                "publisher" => "",
            ],
            [
                "title" => "Trembling of a Leaf, The",
                "authors" => [
                    "Maugham, William S",
                ],
                "genre" => "fiction",
                "sub_genre"
                => "novel",
                "height" => 205,
                "publisher" => "",
            ],
            [
                "title" => "Doctor on the Brain",
                "authors" => [
                    "Gordon, Richard",
                ],
                "genre" => "fiction",
                "sub_genre" => "novel",
                "height" => 204,
                "publisher" => "",
            ],
            [
                "title" => "Simpsons & Their Mathematical Secrets",
                "authors" => [
                    "Singh, Simon",
                ],
                "genre" => "science",
                "sub_genre" => "mathematics",
                "height" => 233,
                "publisher" => "",
            ],
            [
                "title" => "Pattern Classification",
                "authors" => [
                    "Duda, Hart",
                ],
                "genre" => "technology",
                "sub_genre" => "data science",
                "height" => 241,
                "publisher" => "",
            ],
            [
                "title" => "From Beirut to Jerusalem",
                "authors" => [
                    "Friedman, Thomas",
                ],
                "genre" => "non-fiction",
                "sub_genre"
                => "history",
                "height" => 202,
                "publisher" => "",
            ],
            [
                "title" => "Code Book, The",
                "authors" => [
                    "Singh, Simon",
                ],
                "genre" => "science",
                "sub_genre" => "mathematics",
                "height" => 197,
                "publisher" => "",
            ],
            [
                "title" => "Age of the Warrior, The",
                "authors" => [
                    "Fisk, Robert",
                ],
                "genre" => "non-fiction",
                "sub_genre" => "history",
                "height" => 197,
                "publisher" => "",
            ],
            [
                "title" => "Final Crisis",
                "authors" => [
                    "",
                ],
                "genre" => "fiction",
                "sub_genre" => "comic",
                "height" => 257,
                "publisher" => "",
            ],
            [
                "title" => "Killing Joke, The",
                "authors" => [
                    "",
                ],
                "genre" => "fiction",
                "sub_genre" => "comic",
                "height" =>
                    283,
                "publisher" => "",
            ],
            [
                "title" => "Flashpoint",
                "authors" => [
                    "",
                ],
                "genre" => "fiction",
                "sub_genre" => "comic",
                "height" => 265,
                "publisher" => "",
            ],
            [
                "title" => "Batman Earth One",
                "authors" => [
                    "",
                ],
                "genre" => "fiction",
                "sub_genre" => "comic",
                "height" =>
                    265,
                "publisher" => "",
            ],
            [
                "title" => "Crisis on Infinite Earths",
                "authors" => [
                    "",
                ],
                "genre" => "fiction",
                "sub_genre" => "comic",
                "height" => 258,
                "publisher" => "",
            ],
            [
                "title" => "Numbers Behind Numb3rs, The",
                "authors" => [
                    "Devlin, Keith",
                ],
                "genre" => "science",
                "sub_genre" => "mathematics",
                "height" => 202,
                "publisher" => "",
            ],
            [
                "title" => "Superman Earth One - 1",
                "authors" => [
                    "",
                ],
                "genre" => "fiction",
                "sub_genre" => "comic",
                "height"
                => 259,
                "publisher" => "",
            ],
            [
                "title" => "Superman Earth One - 2",
                "authors" => [
                    "",
                ],
                "genre" => "fiction",
                "sub_genre" => "comic",
                "height"
                => 258,
                "publisher" => "",
            ],
            [
                "title" => "Justice League: Throne of Atlantis",
                "authors" => [
                    "",
                ],
                "genre" => "fiction",
                "sub_genre" => "comic",
                "height" => 258,
                "publisher" => "",
            ],
            [
                "title" => "Justice League: The Villain's Journey",
                "authors" => [
                    "",
                ],
                "genre" => "fiction",
                "sub_genre" => "comic",
                "height" => 258,
                "publisher" => "",
            ],
            [
                "title" => "Death of Superman, The",
                "authors" => [
                    "",
                ],
                "genre" => "fiction",
                "sub_genre" => "comic",
                "height"
                => 258,
                "publisher" => "",
            ],
            [
                "title" => "History of the DC Universe",
                "authors" => [
                    "",
                ],
                "genre" => "fiction",
                "sub_genre" => "comic",
                "height" => 258,
                "publisher" => "",
            ],
            [
                "title" => "Batman: The Long Halloween",
                "authors" => [
                    "",
                ],
                "genre" => "fiction",
                "sub_genre" => "comic",
                "height" => 258,
                "publisher" => "",
            ],
            [
                "title" => "Life in Letters, A",
                "authors" => [
                    "Steinbeck, John",
                ],
                "genre" => "non-fiction",
                "sub_genre" => "autobiography",
                "height" => 196,
                "publisher" => "",
            ],
            [
                "title" => "Information, The",
                "authors" => [
                    "Gleick, James",
                ],
                "genre" => "science",
                "sub_genre" => "mathematics",
                "height" => 233,
                "publisher" => "",
            ],
            [
                "title" => "Journal of Economics, vol 106 No 3",
                "authors" => [
                    "",
                ],
                "genre" => "science",
                "sub_genre" => "economics",
                "height" => 235,
                "publisher" => "",
            ],
            [
                "title" => "Elements of Information Theory",
                "authors" => [
                    "Thomas, Joy",
                ],
                "genre" => "technology",
                "sub_genre"
                => "signal processing",
                "height" => 229,
                "publisher" => "",
            ],
            [
                "title" => "Power Electronics - Rashid",
                "authors" => [
                    "Rashid, Muhammad",
                ],
                "genre" => "technology",
                "sub_genre" => "computer science",
                "height" => 235,
                "publisher" => "",
            ],
            [
                "title" => "Power Electronics - Mohan",
                "authors" => [
                    "Mohan, Ned",
                ],
                "genre" => "technology",
                "sub_genre" => "computer science",
                "height" => 237,
                "publisher" => "",
            ],
            [
                "title" => "Neural Networks",
                "authors" => [
                    "Haykin, Simon",
                ],
                "genre" => "technology",
                "sub_genre" => "data science",
                "height" => 240,
                "publisher" => "",
            ],
            [
                "title" => "Grapes of Wrath, The",
                "authors" => [
                    "Steinbeck, John",
                ],
                "genre" => "fiction",
                "sub_genre" => "classic",
                "height" => 196,
                "publisher" => "",
            ],
            [
                "title" => "Vyakti ani Valli",
                "authors" => [
                    "Desh Pande, P L",
                ],
                "genre" => "non-fiction",
                "sub_genre" => "misc",
                "height" => 211,
                "publisher" => "",
            ],
            [
                "title" => "Statistical Learning Theory",
                "authors" => [
                    "Vapnik, Vladimir",
                ],
                "genre" => "technology",
                "sub_genre" => "data science",
                "height" => 228,
                "publisher" => "",
            ],
            [
                "title" => "Empire of the Mughal - The Tainted Throne",
                "authors" => [
                    "Rutherford, Alex",
                ],
                "genre" => "non-fiction",
                "sub_genre" => "history",
                "height" => 180,
                "publisher" => "",
            ],
            [
                "title" => "Empire of the Mughal - Brothers at War",
                "authors" => [
                    "Rutherford, Alex",
                ],
                "genre" => "non-fiction",
                "sub_genre" => "history",
                "height" => 180,
                "publisher" => "",
            ],
            [
                "title" => "Empire of the Mughal - Ruler of the World",
                "authors" => [
                    "Rutherford, Alex",
                ],
                "genre" => "non-fiction",
                "sub_genre" => "history",
                "height" => 180,
                "publisher" => "",
            ],
            [
                "title" => "Empire of the Mughal - The Serpent's Tooth",
                "authors" => [
                    "Rutherford, Alex",
                ],
                "genre" => "non-fiction",
                "sub_genre" => "history",
                "height" => 180,
                "publisher" => "",
            ],
            [
                "title" => "Empire of the Mughal - Raiders from the North",
                "authors" => [
                    "Rutherford, Alex",
                ],
                "genre" => "non-fiction",
                "sub_genre" => "history",
                "height" => 180,
                "publisher" => "",
            ],
            [
                "title" => "Mossad",
                "authors" => [
                    "Baz-Zohar, Michael",
                ],
                "genre" => "non-fiction",
                "sub_genre" => "history",
                "height" => 236,
                "publisher" => "",
            ],
            [
                "title" => "Jim Corbett Omnibus",
                "authors" => [
                    "Corbett, Jim",
                ],
                "genre" => "non-fiction",
                "sub_genre" => "history",
                "height" => 223,
                "publisher" => "",
            ],
            [
                "title" => "20000 Leagues Under the Sea",
                "authors" => [
                    "Verne, Jules",
                ],
                "genre" => "fiction",
                "sub_genre" => "novel",
                "height" => 190,
                "publisher" => "",
            ],
            [
                "title" => "Batatyachi Chal",
                "authors" => [
                    "Desh Pande P L",
                ],
                "genre" => "fiction",
                "sub_genre" => "novel",
                "height" => 200,
                "publisher" => "",
            ],
            [
                "title" => "Hafasavnuk",
                "authors" => [
                    "Desh Pande P L",
                ],
                "genre" => "fiction",
                "sub_genre" => "novel",
                "height" => 211,
                "publisher" => "",
            ],
            [
                "title" => "Urlasurla",
                "authors" => [
                    "Desh Pande P L",
                ],
                "genre" => "fiction",
                "sub_genre" => "novel",
                "height"
                => 211,
                "publisher" => "",
            ],
            [
                "title" => "Pointers in C",
                "authors" => [
                    "Kanetkar, Yashwant",
                ],
                "genre" => "technology",
                "sub_genre" => "computer science",
                "height" => 213,
                "publisher" => "",
            ],
            [
                "title" => "Cathedral and the Bazaar, The",
                "authors" => [
                    "Raymond, Eric",
                ],
                "genre" => "technology",
                "sub_genre" => "computer science",
                "height" => 217,
                "publisher" => "",
            ],
            [
                "title" => "Design with OpAmps",
                "authors" => [
                    "Franco, Sergio",
                ],
                "genre" => "technology",
                "sub_genre" => "computer science",
                "height" => 240,
                "publisher" => "",
            ],
            [
                "title" => "Think Complexity",
                "authors" => [
                    "Downey, Allen",
                ],
                "genre" => "technology",
                "sub_genre" => "data science",
                "height" => 230,
                "publisher" => "",
            ],
            [
                "title" => "Devil's Advocate, The",
                "authors" => [
                    "West, Morris",
                ],
                "genre" => "fiction",
                "sub_genre" => "novel",
                "height" => 178,
                "publisher" => "",
            ],
            [
                "title" => "Ayn Rand Answers",
                "authors" => [
                    "Rand, Ayn",
                ],
                "genre" => "philosophy",
                "sub_genre" => "objectivism",
                "height" => 203,
                "publisher" => "",
            ],
            [
                "title" => "Philosophy: Who Needs It",
                "authors" => [
                    "Rand, Ayn",
                ],
                "genre" => "philosophy",
                "sub_genre" => "objectivism",
                "height" => 171,
                "publisher" => "",
            ],
            [
                "title" => "World's Great Thinkers, The",
                "authors" => [
                    "",
                ],
                "genre" => "science",
                "sub_genre" => "physics",
                "height" => 189,
                "publisher" => "",
            ],
            [
                "title" => "Data Analysis with Open Source Tools",
                "authors" => [
                    "Janert, Phillip",
                ],
                "genre" => "technology",
                "sub_genre" => "data science",
                "height" => 230,
                "publisher" => "",
            ],
            [
                "title" => "Broca's Brain",
                "authors" => [
                    "Sagan, Carl",
                ],
                "genre" => "science",
                "sub_genre" => "physics",
                "height" => 174,
                "publisher" => "",
            ],
            [
                "title" => "Men of Mathematics",
                "authors" => [
                    "Bell, E T",
                ],
                "genre" => "science",
                "sub_genre" => "mathematics",
                "height" => 217,
                "publisher" => "",
            ],
            [
                "title" => "Oxford book of Modern Science Writing",
                "authors" => [
                    "Dawkins, Richard",
                ],
                "genre" => "science",
                "sub_genre" => "science",
                "height" => 240,
                "publisher" => "",
            ],
            [
                "title" => "Justice, Judiciary and Democracy",
                "authors" => [
                    "Ranjan, Sudhanshu",
                ],
                "genre" => "non-fiction",
                "sub_genre" => "legal",
                "height" => 224,
                "publisher" => "",
            ],
            [
                "title" => "Arthashastra, The",
                "authors" => [
                    "Kautiyla    ",
                ],
                "genre" => "philosophy",
                "sub_genre" => "philosophy",
                "height" => 214,
                "publisher" => "",
            ],
            [
                "title" => "We the People",
                "authors" => [
                    "Palkhivala, Nani",
                ],
                "genre" => "philosophy",
                "sub_genre" => "philosophy",
                "height" => 216,
                "publisher" => "",
            ],
            [
                "title" => "We the Nation",
                "authors" => [
                    "Palkhivala, Nani",
                ],
                "genre" => "philosophy",
                "sub_genre" => "philosophy",
                "height" => 216,
                "publisher" => "",
            ],
            [
                "title" => "Courtroom Genius, The",
                "authors" => [
                    "Sorabjee, Soli  ",
                ],
                "genre" => "non-fiction",
                "sub_genre" => "autobiography",
                "height" => 217,
                "publisher" => "",
            ],
            [
                "title" => "Dongri to Dubai",
                "authors" => [
                    "Zaidi, Hussain",
                ],
                "genre" => "non-fiction",
                "sub_genre" => "history",
                "height" => 216,
                "publisher" => "",
            ],
            [
                "title" => "History of England, Foundation",
                "authors" => [
                    "Ackroyd, Peter",
                ],
                "genre" => "non-fiction",
                "sub_genre" => "history",
                "height" => 197,
                "publisher" => "",
            ],
            [
                "title" => "City of Djinns",
                "authors" => [
                    "Dalrymple, William",
                ],
                "genre" => "non-fiction",
                "sub_genre" => "history",
                "height" => 198,
                "publisher" => "",
            ],
            [
                "title" => "India's Legal System",
                "authors" => [
                    "Nariman",
                ],
                "genre" => "non-fiction",
                "sub_genre" => "legal",
                "height" => 177,
                "publisher" => "",
            ],
            [
                "title" => "More Tears to Cry",
                "authors" => [
                    "Sassoon, Jean",
                ],
                "genre" => "fiction",
                "sub_genre" => "novel",
                "height" => 235,
                "publisher" => "",
            ],
            [
                "title" => "Ropemaker, The",
                "authors" => [
                    "Dickinson, Peter",
                ],
                "genre" => "fiction",
                "sub_genre" => "novel",
                "height" => 196,
                "publisher" => "",
            ],
            [
                "title" => "Angels & Demons",
                "authors" => [
                    "Brown, Dan",
                ],
                "genre" => "fiction",
                "sub_genre" => "novel",
                "height" => 170,
                "publisher" => "",
            ],
            [
                "title" => "Judge, The",
                "authors" => [
                    "",
                ],
                "genre" => "fiction",
                "sub_genre" => "novel",
                "height" => 170,
                "publisher" => "",
            ],
            [
                "title" => "Attorney, The",
                "authors" => [
                    "",
                ],
                "genre" => "fiction",
                "sub_genre" => "novel",
                "height" => 170,
                "publisher" => "",
            ],
            [
                "title" => "Prince, The",
                "authors" => [
                    "Machiavelli",
                ],
                "genre" => "fiction",
                "sub_genre" => "classic",
                "height" => 173,
                "publisher" => "",
            ],
            [
                "title" => "Eyeless in Gaza",
                "authors" => [
                    "Huxley, Aldous",
                ],
                "genre" => "fiction",
                "sub_genre" => "novel",
                "height" => 180,
                "publisher" => "",
            ],
            [
                "title" => "Tales of Beedle the Bard",
                "authors" => [
                    "Rowling, J K",
                ],
                "genre" => "fiction",
                "sub_genre" => "novel",
                "height" => 184,
                "publisher" => "",
            ],
            [
                "title" => "Girl with the Dragon Tattoo",
                "authors" => [
                    "Larsson, Steig",
                ],
                "genre" => "fiction",
                "sub_genre" => "novel",
                "height" => 179,
                "publisher" => "",
            ],
            [
                "title" => "Girl who kicked the Hornet's Nest",
                "authors" => [
                    "Larsson, Steig",
                ],
                "genre" => "fiction",
                "sub_genre" => "novel",
                "height" => 179,
                "publisher" => "",
            ],
            [
                "title" => "Girl who played with Fire",
                "authors" => [
                    "Larsson, Steig",
                ],
                "genre" => "fiction",
                "sub_genre" => "novel",
                "height" => 179,
                "publisher" => "",
            ],
            [
                "title" => "Batman Handbook",
                "authors" => [
                    "",
                ],
                "genre" => "fiction",
                "sub_genre" => "comic",
                "height" => 270,
                "publisher" => "",
            ],
            [
                "title" => "Murphy's Law",
                "authors" => [
                    "",
                ],
                "genre" => "philosophy",
                "sub_genre" => "psychology",
                "height" =>
                    178,
                "publisher" => "",
            ],
            [
                "title" => "Structure and Randomness",
                "authors" => [
                    "Tao, Terence",
                ],
                "genre" => "science",
                "sub_genre" => "mathematics",
                "height" => 252,
                "publisher" => "",
            ],
            [
                "title" => "Image Processing with MATLAB",
                "authors" => [
                    "Eddins, Steve",
                ],
                "genre" => "technology",
                "sub_genre"
                => "signal processing",
                "height" => 241,
                "publisher" => "",
            ],
            [
                "title" => "Animal Farm",
                "authors" => [
                    "Orwell, George",
                ],
                "genre" => "fiction",
                "sub_genre" => "classic",
                "height" => 180,
                "publisher" => "",
            ],
            [
                "title" => "Idiot, The",
                "authors" => [
                    "Dostoevsky, Fyodor",
                ],
                "genre" => "fiction",
                "sub_genre" => "classic",
                "height" => 197,
                "publisher" => "",
            ],
            [
                "title" => "Christmas Carol, A",
                "authors" => [
                    "Dickens, Charles",
                ],
                "genre" => "fiction",
                "sub_genre" => "classic",
                "height" => 196,
                "publisher" => "",
            ],
        ];


        $countItems = count($seedBooks);

        $output = new ConsoleOutput();
        $progressBar = new ProgressBar($output, $countItems);

        $this->command->getOutput()->writeln("<info>Seeding with {$countItems} Books.");

        foreach ($seedBooks as $book) {

            $authors = $book['authors'];    // Get the list of authors for the book
            $author_list = [];  // create an empty list of authors

            // Go through the authors one by one
            foreach ($authors as $author) {

                // Expand the author name (family name, given name) into Given and Family names
                $authorGiven = null;
                $authorFamily = $author;
                if ($comma = mb_strpos($author, ",")) {
                    $authorFamily = trim(mb_substr($author, 0, $comma));
                    $authorGiven = trim(mb_substr($author, $comma + 1, mb_strlen($author)));
                }

                // Check to see if we have the author in the table (yes => author, no => null)
                // if null then we create the new author
                $author = Author::whereGivenName($authorGiven)->whereFamilyName($authorFamily)->first();
                if (is_null($author)) {
                    $newAuthor = [
                        "given_name" => $authorGiven,
                        "family_name" => $authorFamily,
                    ];
                    // The author wasn't found so we create them
                    $author = Author::create($newAuthor);
                }
                // add the existing, or new author's id to the author list
                $author_list[] = $author->id;
            }

            # Create book record
            $newBook = [
                'title' => $book['title'] ?? null,
                'subtitle' => $book['subtitle'] ?? null,
                'year_published' => $book['year_published'] ?? null,
                'edition' => $book['edition'] ?? null,
                'isbn_10' => $book['isbn_10'] ?? null,
                'isbn_13' => $book['isbn_13'] ?? null,
                'height' => $book['height'] ?? null,
                'genre' => $book['genre'] ?? null,
                'sub_genre' => $book['sub_genre'] ?? null,
            ];
            $theBook = Book::create($newBook);

            # Link the authors to the book
            $theBook->authors()->attach($author_list);

            $progressBar->advance();
        }
        $progressBar->finish();
        $this->command->getOutput()->writeln("");

    }

}
