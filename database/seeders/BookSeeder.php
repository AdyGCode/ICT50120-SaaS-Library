<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
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
            'created_at' => Carbon::timestamp(Carbon::now()->subYears(200)),
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
                "genres" => [
                    "technology",
                    "programming",
                    "testing",
                    "non-fiction",
                ],
                "height" => 291,
                "publisher" => "Leanpub",
            ],
            [
                "title" => "Fundamentals of Wavelets",
                "authors" => [
                    "Goswami, Jaideva",
                ],
                "genres" => [
                    "technology",
                    "signal processing",
                    "non-fiction",
                ],
                "height" => 228,
                "publisher" => "Wiley",
            ],
            [
                "title" => "Data Smart",
                "authors" => [
                    "Foreman, John",
                ],
                "genres" => [
                    "technology",
                    "data science",
                    "non-fiction",
                ],
                "height" => 235,
                "publisher" => "Wiley",
            ],
            [
                "title" => "God Created the Integers",
                "authors" => [
                    "Hawking, Stephen",
                ],
                "genres" => [
                    "technology",
                    "mathematics",
                    "non-fiction",
                ],
                "height" => 197,
                "publisher" => "Penguin",
            ],
            [
                "title" => "Superfreakonomics",
                "authors" => [
                    "Dubner, Stephen",
                ],
                "genres" => [
                    "science",
                    "economics",
                    "non-fiction",
                ],
                "height" => 179,
                "publisher" => "Harper Collins",
            ],
            [
                "title" => "Orientalism",
                "authors" => [
                    "Said, Edward",
                ],
                "genres" => [
                    "non-fiction",
                    "history",
                ],
                "height" => 197,
                "publisher" => "Penguin",
            ],
            [
                "title" => "Nature of Statistical Learning Theory, The",
                "authors" => [
                    "Vapnik, Vladimir",
                ],
                "genres" => [
                    "technology",
                    "data science",
                ],
                "height" => 230,
                "publisher" => "Springer",
            ],
            [
                "title" => "Integration of the Indian States",
                "authors" => [
                    "Menon, V P",
                ],
                "genres" => [
                    "non-fiction",
                    "history",
                ],
                "height" => 217,
                "publisher" => "Orient Blackswan",
            ],
            [
                "title" => "Drunkard's Walk, The",
                "authors" => [
                    "Mlodinow, Leonard",
                ],
                "genres" => [
                    "science",
                    "mathematics",
                ],
                "height" => 197,
                "publisher" => "Penguin",
            ],
            [
                "title" => "Image Processing & Mathematical Morphology",
                "authors" => [
                    "Shih, Frank",
                ],
                "genres" => [
                    "technology",
                    "signal processing",
                ],
                "height" => 241,
                "publisher" => "CRC",
            ],
            [
                "title" => "How to Think Like Sherlock Holmes",
                "authors" => [
                    "Konnikova, Maria",
                ],
                "genres" => [
                    "non-fiction",
                    "psychology",
                ],
                "height" => 240,
                "publisher" => "Penguin",
            ],
            [
                "title" => "Data Scientists at Work",
                "authors" => [
                    "Gutierrez, Sebastian",
                ],
                "genres" => [
                    "technology",
                    "data science",
                ],
                "height" => 230,
                "publisher" => "Apress",
            ],
            [
                "title" => "Slaughterhouse Five",
                "authors" => [
                    "Vonnegut, Kurt",
                ],
                "genres" => [
                    "fiction",
                    "classic",
                ],
                "height" => 198,
                "publisher" => "Random House",
            ],
            [
                "title" => "Birth of a Theorem",
                "authors" => [
                    "Villani, Cedric",
                ],
                "genres" => [
                    "science",
                    "mathematics",
                ],
                "height" => 234,
                "publisher" => "Bodley Head",
            ],
            [
                "title" => "Structure & Interpretation of Computer Programs",
                "authors" => [
                    "Sussman, Gerald",
                ],
                "genres" => [
                    "technology",
                    "computer science",
                ],
                "height" => 240,
                "publisher" => "MIT Press",
            ],
            [
                "title" => "Age of Wrath, The",
                "authors" => [
                    "Eraly, Abraham",
                ],
                "genres" => [
                    "non-fiction",
                    "history",
                ],
                "height" => 238,
                "publisher" => "Penguin",
            ],
            [
                "title" => "Trial, The",
                "authors" => [
                    "Kafka, Frank",
                ],
                "genres" => [
                    "fiction",
                    "classic",
                ],
                "height" => 198,
                "publisher" => "Random House",
            ],
            [
                "title" => "Statistical Decision Theory'",
                "authors" => [
                    "Pratt, John",
                ],
                "genres" => [
                    "technology",
                    "data science",
                    "non-fiction",
                ],
                "height" => 236,
                "publisher" => "MIT Press",
            ],
            [
                "title" => "Data Mining Handbook",
                "authors" => [
                    "Nisbet, Robert",
                ],
                "genres" => [
                    "technology",
                    "data science",
                    "non-fiction",
                ],
                "height" => 242,
                "publisher" => "Apress",
            ],
            [
                "title" => "New Machiavelli, The",
                "authors" => [
                    "Wells, H. G.",
                ],
                "genres" => [
                    "fiction",
                    "novel",
                ],
                "height" => 180,
                "publisher" => "Penguin",
            ],
            [
                "title" => "Physics & Philosophy",
                "authors" => [
                    "Heisenberg, Werner",
                ],
                "genres" => [
                    "philosophy",
                    "science",
                ],
                "height" => 197,
                "publisher" => "Penguin",
            ],
            [
                "title" => "Making Software",
                "authors" => [
                    "Oram, Andy",
                ],
                "genres" => [
                    "technology",
                    "computer science",
                    "non-fiction",
                ],
                "height" => 232,
                "publisher" => "O'Reilly",
            ],
            [
                "title" => "Analysis, Vol I",
                "authors" => [
                    "Tao, Terence",
                ],
                "genres" => [
                    "technology",
                    "mathematics",
                    "non-fiction",
                ],
                "height" => 248,
                "publisher" => "HBA",
            ],
            [
                "title" => "Machine Learning for Hackers",
                "authors" => [
                    "Conway, Drew",
                ],
                "genres" => [
                    "technology",
                    "data science",
                    "artificial intelligence",
                    "non-fiction",
                ],
                "height" => 233,
                "publisher" => "O'Reilly",
            ],
            [
                "title" => "Signal and the Noise, The",
                "authors" => [
                    "Silver, Nate",
                ],
                "genres" => [
                    "technology",
                    "data science",
                ],
                "height" => 233,
                "publisher" => "Penguin",
            ],
            [
                "title" => "Python for Data Analysis",
                "authors" => [
                    "McKinney, Wes",
                ],
                "genres" => [
                    "technology",
                    "data science",
                    "programming",
                    "python",
                ],
                "height" => 233,
                "publisher" => "O'Reilly",
            ],
            [
                "title" => "Introduction to Algorithms",
                "authors" => [
                    "Cormen, Thomas",
                ],
                "genres" => [
                    "technology",
                    "computer science",
                    "algorithms",
                ],
                "height" => 234,
                "publisher" => "MIT Press",
            ],
            [
                "title" => "Beautiful and the Damned, The",
                "authors" => [
                    "Deb, Siddhartha",
                ],
                "genres" => [
                    "non-fiction",
                    "history",
                ],
                "height" => 198,
                "publisher" => "Penguin",
            ],
            [
                "title" => "Outsider, The",
                "authors" => [
                    "Camus, Albert",
                ],
                "genres" => [
                    "fiction",
                    "classic",
                ],
                "height" => 198,
                "publisher" => "Penguin",
            ],
            [
                "title" => "Complete Sherlock Holmes, The - Vol I",
                "authors" => [
                    "Doyle, Arthur Conan",
                ],
                "genres" => [
                    "fiction",
                    "classic",
                    "crime",
                ],
                "height" => 176,
                "publisher" => "Random House",
            ],
            [
                "title" => "Complete Sherlock Holmes, The - Vol II",
                "authors" => [
                    "Doyle, Arthur Conan",
                ],
                "genres" => [
                    "fiction",
                    "classic",
                    "crime",
                ],
                "height" => 176,
                "publisher" => "Random House",
            ],
            [
                "title" => "Wealth of Nations, The",
                "authors" => [
                    "Smith, Adam",
                ],
                "genres" => [
                    "science",
                    "economics",
                ],
                "height" => 175,
                "publisher" => "Random House",
            ],
            [
                "title" => "Pillars of the Earth, The",
                "authors" => [
                    "Follett, Ken",
                ],
                "genres" => [
                    "fiction",
                    "novel",
                ],
                "height" => 176,
                "publisher" => "Random House",
            ],
            [
                "title" => "Tao of Physics, The",
                "authors" => [
                    "Capra, Fritjof",
                ],
                "genres" => [
                    "science",
                    "physics",
                ],
                "height" => 179,
                "publisher" => "Penguin",
            ],
            [
                "title" => "Surely You're Joking Mr Feynman",
                "authors" => [
                    "Feynman, Richard",
                ],
                "genres" => [
                    "science",
                    "physics",
                ],
                "height" => 198,
                "publisher" => "Random House",
            ],
            [
                "title" => "Farewell to Arms, A",
                "authors" => [
                    "Hemingway, Ernest",
                ],
                "genres" => [
                    "fiction",
                    "classic",
                ],
                "height" => 179,
                "publisher" => "Rupa",
            ],
            [
                "title" => "Veteran, The",
                "authors" => [
                    "Forsyth, Frederick",
                ],
                "genres" => [
                    "fiction",
                    "novel",
                ],
                "height" => 177,
                "publisher" => "Transworld",
            ],
            [
                "title" => "False Impressions",
                "authors" => [
                    "Archer, Jeffery",
                ],
                "genres" => [
                    "fiction",
                    "novel",
                ],
                "height" => 177,
                "publisher" => "Pan",
            ],
            [
                "title" => "Last Lecture, The",
                "authors" => [
                    "Pausch, Randy",
                ],
                "genres" => [
                    "non-fiction",
                    "autobiography",
                ],
                "height" => 197,
                "publisher" => "Hyperion",
            ],
            [
                "title" => "Return of the Primitive",
                "authors" => [
                    "Rand, Ayn",
                ],
                "genres" => [
                    "philosophy",
                    "objectivism",
                ],
                "height" => 202,
                "publisher" => "Penguin",
            ],
            [
                "title" => "Jurassic Park",
                "authors" => [
                    "Crichton, Michael",
                ],
                "genres" => [
                    "fiction",
                    "novel",
                ],
                "height" => 174,
                "publisher" => "Random House",
            ],
            [
                "title" => "Russian Journal, A",
                "authors" => [
                    "Steinbeck, John",
                ],
                "genres" => [
                    "non-fiction",
                    "history",
                ],
                "height" => 196,
                "publisher" => "Penguin",
            ],
            [
                "title" => "Tales of Mystery and Imagination",
                "authors" => [
                    "Poe, Edgar Allen",
                ],
                "genres" => [
                    "fiction",
                    "classic",
                ],
                "height" => 172,
                "publisher" => "Harper Collins",
            ],
            [
                "title" => "Freakonomics",
                "authors" => [
                    "Dubner, Stephen",
                ],
                "genres" => [
                    "science",
                    "economics",
                ],
                "height" => 197,
                "publisher" => "Penguin",
            ],
            [
                "title" => "Hidden Connections, The",
                "authors" => [
                    "Capra, Fritjof",
                ],
                "genres" => [
                    "science",
                    "physics",
                ],
                "height" => 197,
                "publisher" => "Harper Collins",
            ],
            [
                "title" => "Story of Philosophy, The",
                "authors" => [
                    "Durant, Will",
                ],
                "genres" => [
                    "philosophy",
                    "history",
                ],
                "height" => 170,
                "publisher" => "Pocket",
            ],
            [
                "title" => "Asami Asami",
                "authors" => [
                    "Desh Pande, P L",
                ],
                "genres" => [
                    "fiction",
                    "novel",
                ],
                "height" => 205,
                "publisher" => "Mauj",
            ],
            [
                "title" => "Journal of a Novel",
                "authors" => [
                    "Steinbeck, John",
                ],
                "genres" => [
                    "fiction",
                    "classic",
                ],
                "height" => 196,
                "publisher" => "Penguin",
            ],
            [
                "title" => "Once There Was a War",
                "authors" => [
                    "Steinbeck, John",
                ],
                "genres" => [
                    "non-fiction",
                    "history",
                ],
                "height" => 196,
                "publisher" => "Penguin",
            ],
            [
                "title" => "Moon is Down, The",
                "authors" => [
                    "Steinbeck, John",
                ],
                "genres" => [
                    "fiction",
                    "classic",
                ],
                "height" => 196,
                "publisher" => "Penguin",
            ],
            [
                "title" => "Brethren, The",
                "authors" => [
                    "Grisham, John",
                ],
                "genres" => [
                    "fiction",
                    "novel",
                ],
                "height" => 174,
                "publisher" => "Random House",
            ],
            [
                "title" => "In a Free State",
                "authors" => [
                    "Naipaul, V. S.",
                ],
                "genres" => [
                    "fiction",
                    "novel",
                ],
                "height" => 196,
                "publisher" => "Rupa",
            ],
            [
                "title" => "Catch 22",
                "authors" => [
                    "Heller, Joseph",
                ],
                "genres" => [
                    "fiction",
                    "classic",
                ],
                "height" => 178,
                "publisher" => "Random House",
            ],
            [
                "title" => "Complete Mastermind, The",
                "authors" => [
                    "BBC",
                ],
                "genres" => [
                    "non-fiction",
                    "trivia",
                ],
                "height" => 178,
                "publisher" => "BBC",
            ],
            [
                "title" => "Dylan on Dylan",
                "authors" => [
                    "Dylan, Bob",
                ],
                "genres" => [
                    "non-fiction",
                    "autobiography",
                ],
                "height" => 197,
                "publisher" => "Random House",
            ],
            [
                "title" => "Soft Computing & Intelligent Systems",
                "authors" => [
                    "Gupta, Madan",
                ],
                "genres" => [
                    "technology",
                    "data science",
                ],
                "height" => 242,
                "publisher" => "Elsevier",
            ],
            [
                "title" => "Textbook of Economic Theory",
                "authors" => [
                    "Stonier, Alfred",
                ],
                "genres" => [
                    "technology",
                    "economics",
                ],
                "height" => 242,
                "publisher" => "Pearson",
            ],
            [
                "title" => "Econometric Analysis",
                "authors" => [
                    "Greene, W. H.",
                ],
                "genres" => [
                    "technology",
                    "economics",
                ],
                "height" => 242,
                "publisher" => "Pearson",
            ],
            [
                "title" => "Learning OpenCV",
                "authors" => [
                    "Bradsky, Gary",
                ],
                "genres" => [
                    "technology",
                    "signal processing",
                ],
                "height" => 232,
                "publisher" => "O'Reilly",
            ],
            [
                "title" => "Data Structures Using C & C++",
                "authors" => [
                    "Tanenbaum, Andrew",
                ],
                "genres" => [
                    "technology",
                    "computer science",
                ],
                "height" => 235,
                "publisher" => "Prentice Hall",
            ],
            [
                "title" => "Computer Vision, A Modern Approach",
                "authors" => [
                    "Forsyth, David",
                ],
                "genres" => [
                    "technology",
                    "signal processing",
                ],
                "height" => 255,
                "publisher" => "Pearson",
            ],
            [
                "title" => "Principles of Communication Systems",
                "authors" => [
                    "Taub, Schilling",
                ],
                "genres" => [
                    "technology",
                    "signal processing",
                ],
                "height" => 240,
                "publisher" => "TMH",
            ],
            [
                "title" => "Let Us C",
                "authors" => [
                    "Kanetkar, Yashwant",
                ],
                "genres" => [
                    "technology",
                    "computer science",
                ],
                "height" => 213,
                "publisher" => "Prentice Hall",
            ],
            [
                "title" => "Amulet of Samarkand, The",
                "authors" => [
                    "Stroud, Jonathan",
                ],
                "genres" => [
                    "fiction",
                    "novel",
                ],
                "height" => 179,
                "publisher" => "Random House",
            ],
            [
                "title" => "Crime and Punishment",
                "authors" => [
                    "Dostoevsky, Fyodor",
                ],
                "genres" => [
                    "fiction",
                    "classic",
                ],
                "height" => 180,
                "publisher" => "Penguin",
            ],
            [
                "title" => "Angels & Demons",
                "authors" => [
                    "Brown, Dan",
                ],
                "genres" => [
                    "fiction",
                    "novel",
                ],
                "height" => 178,
                "publisher" => "Random House",
            ],
            [
                "title" => "Argumentative Indian, The",
                "authors" => [
                    "Sen, Amartya",
                ],
                "genres" => [
                    "non-fiction",
                    "history",
                ],
                "height" => 209,
                "publisher" => "Picador",
            ],
            [
                "title" => "Sea of Poppies",
                "authors" => [
                    "Ghosh, Amitav",
                ],
                "genres" => [
                    "fiction",
                    "novel",
                ],
                "height" => 197,
                "publisher" => "Penguin",
            ],
            [
                "title" => "Idea of Justice, The",
                "authors" => [
                    "Sen, Amartya",
                ],
                "genres" => [
                    "philosophy",
                    "economics",
                ],
                "height" => 212,
                "publisher" => "Penguin",
            ],
            [
                "title" => "Raisin in the Sun, A",
                "authors" => [
                    "Hansberry, Lorraine",
                ],
                "genres" => [
                    "fiction",
                    "novel",
                ],
                "height" => 175,
                "publisher" => "Penguin",
            ],
            [
                "title" => "All the President's Men",
                "authors" => [
                    "Woodward, Bob",
                ],
                "genres" => [
                    "non-fiction",
                    "history",
                ],
                "height" => 177,
                "publisher" => "Random House",
            ],
            [
                "title" => "Prisoner of Birth, A",
                "authors" => [
                    "Archer, Jeffery",
                ],
                "genres" => [
                    "fiction",
                    "novel",
                ],
                "height" => 176,
                "publisher" => "Pan",
            ],
            [
                "title" => "Scoop!",
                "authors" => [
                    "Nayar, Kuldip",
                ],
                "genres" => [
                    "non-fiction",
                    "history",
                ],
                "height" => 216,
                "publisher" => "Harper Collins",
            ],
            [
                "title" => "Ahe Manohar Tari",
                "authors" => [
                    "Desh Pande, Sunita",
                ],
                "genres" => [
                    "non-fiction",
                    "autobiography",
                ],
                "height" => 213,
                "publisher" => "Mauj",
            ],
            [
                "title" => "Last Mughal, The",
                "authors" => [
                    "Dalrymple, William",
                ],
                "genres" => [
                    "non-fiction",
                    "history",
                ],
                "height" => 199,
                "publisher" => "Penguin",
            ],
            [
                "title" => "Social Choice & Welfare, Vol 39 No. 1",
                "authors" => [
                    "Various",
                ],
                "genres" => [
                    "technology",
                    "economics",
                ],
                "height" => 235,
                "publisher" => "Springer",
            ],
            [
                "title" => "Radiowaril Bhashane & Shrutika",
                "authors" => [
                    "Desh Pande, P L",
                ],
                "genres" => [
                    "non-fiction",
                    "misc",
                ],
                "height" => 213,
                "publisher" => "Mauj",
            ],
            [
                "title" => "Gun Gayin Awadi",
                "authors" => [
                    "Desh Pande, P L",
                ],
                "genres" => [
                    "non-fiction",
                    "misc",
                ],
                "height" => 212,
                "publisher" => "Mauj",
            ],
            [
                "title" => "Aghal Paghal",
                "authors" => [
                    "Desh Pande, P L",
                ],
                "genres" => [
                    "non-fiction",
                    "misc",
                ],
                "height" => 212,
                "publisher" => "Mauj",
            ],
            [
                "title" => "Maqta-e-Ghalib",
                "authors" => [
                    "Garg, Sanjay",
                ],
                "genres" => [
                    "non-fiction",
                    "poetry",
                ],
                "height" => 221,
                "publisher" => "Mauj",
            ],
            [
                "title" => "Beyond Degrees",
                "authors" => [
                    "",
                ],
                "genres" => [
                    "philosophy",
                    "education",
                ],
                "height"
                => 222,
                "publisher" => "Harper Collins",
            ],
            [
                "title" => "Manasa",
                "authors" => [
                    "Kale, V P",
                ],
                "genres" => [
                    "non-fiction",
                    "misc",
                ],
                "height" =>
                    213,
                "publisher" => "Mauj",
            ],
            [
                "title" => "India from Midnight to Milennium",
                "authors" => [
                    "Tharoor, Shashi",
                ],
                "genres" => [
                    "non-fiction",
                    "history",
                ],
                "height" => 198,
                "publisher" => "Penguin",
            ],
            [
                "title" => "World's Greatest Trials, The",
                "authors" => [
                    "",
                ],
                "genres" => [
                    "non-fiction",
                    "history",
                ],
                "height" => 210,
                "publisher" => "",
            ],
            [
                "title" => "Great Indian Novel, The",
                "authors" => [
                    "Tharoor, Shashi",
                ],
                "genres" => [
                    "fiction",
                    "novel",
                ],
                "height" => 198,
                "publisher" => "Penguin",
            ],
            [
                "title" => "O Jerusalem!",
                "authors" => [
                    "Lapierre, Dominique",
                ],
                "genres" => [
                    "non-fiction",
                    "history",
                ],
                "height" => 217,
                "publisher" => "vikas",
            ],
            [
                "title" => "City of Joy, The",
                "authors" => [
                    "Lapierre, Dominique",
                ],
                "genres" => [
                    "fiction",
                    "novel",
                ],
                "height" => 177,
                "publisher" => "vikas",
            ],
            [
                "title" => "Freedom at Midnight",
                "authors" => [
                    "Lapierre, Dominique",
                ],
                "genres" => [
                    "non-fiction",
                    "history",
                ],
                "height" => 167,
                "publisher" => "vikas",
            ],
            [
                "title" => "Winter of Our Discontent, The",
                "authors" => [
                    "Steinbeck, John",
                ],
                "genres" => [
                    "fiction",
                    "classic",
                ],
                "height" => 196,
                "publisher" => "Penguin",
            ],
            [
                "title" => "On Education",
                "authors" => [
                    "Russell, Bertrand",
                ],
                "genres" => [
                    "philosophy",
                    "education",
                ],
                "height" => 203,
                "publisher" => "Routledge",
            ],
            [
                "title" => "Free Will",
                "authors" => [
                    "Harris, Sam",
                ],
                "genres" => [
                    "non-fiction",
                    "psychology",
                ],
                "height" => 203,
                "publisher" => "FreePress",
            ],
            [
                "title" => "Bookless in Baghdad",
                "authors" => [
                    "Tharoor, Shashi",
                ],
                "genres" => [
                    "non-fiction",
                    "history",
                ],
                "height" => 206,
                "publisher" => "Penguin",
            ],
            [
                "title" => "Case of the Lame Canary, The",
                "authors" => [
                    "Gardner, Earle Stanley",
                ],
                "genres" => [
                    "fiction",
                    "novel",
                ],
                "height" => 179,
                "publisher" => "",
            ],
            [
                "title" => "Theory of Everything, The",
                "authors" => [
                    "Hawking, Stephen",
                ],
                "genres" => [
                    "science",
                    "physics",
                ],
                "height" => 217,
                "publisher" => "Jaico",
            ],
            [
                "title" => "New Markets & Other Essays",
                "authors" => [
                    "Drucker, Peter",
                ],
                "genres" => [
                    "science",
                    "economics",
                ],
                "height" => 176,
                "publisher" => "Penguin",
            ],
            [
                "title" => "Electric Universe",
                "authors" => [
                    "Bodanis, David",
                ],
                "genres" => [
                    "science",
                    "physics",
                ],
                "height" => 201,
                "publisher" => "Penguin",
            ],
            [
                "title" => "Hunchback of Notre Dame, The",
                "authors" => [
                    "Hugo, Victor",
                ],
                "genres" => [
                    "fiction",
                    "classic",
                ],
                "height" => 175,
                "publisher" => "Random House",
            ],
            [
                "title" => "Burning Bright",
                "authors" => [
                    "Steinbeck, John",
                ],
                "genres" => [
                    "fiction",
                    "classic",
                ],
                "height" => 175,
                "publisher" => "Penguin",
            ],
            [
                "title" => "Age of Discontuinity, The",
                "authors" => [
                    "Drucker, Peter",
                ],
                "genres" => [
                    "non-fiction",
                    "economics",
                ],
                "height" => 178,
                "publisher" => "Random House",
            ],
            [
                "title" => "Doctor in the Nude",
                "authors" => [
                    "Gordon, Richard",
                ],
                "genres" => [
                    "fiction",
                    "novel",
                ],
                "height" => 179,
                "publisher" => "Penguin",
            ],
            [
                "title" => "Down and Out in Paris & London",
                "authors" => [
                    "Orwell, George",
                ],
                "genres" => [
                    "non-fiction",
                    "autobiography",
                ],
                "height" => 179,
                "publisher" => "Penguin",
            ],
            [
                "title" => "Identity & Violence",
                "authors" => [
                    "Sen, Amartya",
                ],
                "genres" => [
                    "philosophy",
                ],
                "height" => 219,
                "publisher" => "Penguin",
            ],
            [
                "title" => "Beyond the Three Seas",
                "authors" => [
                    "Dalrymple, William",
                ],
                "genres" => [
                    "non-fiction",
                    "history",
                ],
                "height" => 197,
                "publisher" => "Random House",
            ],
            [
                "title" => "World's Greatest Short Stories, The",
                "authors" => [
                    "",
                ],
                "genres" => [
                    "fiction",
                    "classic",
                ],
                "height" => 217,
                "publisher" => "Jaico",
            ],
            [
                "title" => "Talking Straight",
                "authors" => [
                    "Iacoca, Lee",
                ],
                "genres" => [
                    "non-fiction",
                    "autobiography",
                ],
                "height" => 175,
                "publisher" => "",
            ],
            [
                "title" => "Maugham's Collected Short Stories, Vol 3",
                "authors" => [
                    "Maugham, William S",
                ],
                "genres" => [
                    "fiction",
                    "classic",
                ],
                "height" => 171,
                "publisher" => "Vintage",
            ],
            [
                "title" => "Phantom of Manhattan, The",
                "authors" => [
                    "Forsyth, Frederick",
                ],
                "genres" => [
                    "fiction",
                    "classic",
                ],
                "height" => 180,
                "publisher" => "",
            ],
            [
                "title" => "Ashenden of The British Agent",
                "authors" => [
                    "Maugham, William S",
                ],
                "genres" => [
                    "fiction",
                    "classic",
                ],
                "height" => 160,
                "publisher" => "Vintage",
            ],
            [
                "title" => "Zen & The Art of Motorcycle Maintenance",
                "authors" => [
                    "Pirsig, Robert",
                ],
                "genres" => [
                    "philosophy",
                    "autobiography",
                ],
                "height" => 172,
                "publisher" => "Vintage",
            ],
            [
                "title" => "Great War for Civilization, The",
                "authors" => [
                    "Fisk, Robert",
                ],
                "genres" => [
                    "non-fiction",
                    "history",
                ],
                "height" => 197,
                "publisher" => "Harper Collins",
            ],
            [
                "title" => "We the Living",
                "authors" => [
                    "Rand, Ayn",
                ],
                "genres" => [
                    "fiction",
                    "novel",
                ],
                "height"
                => 178,
                "publisher" => "Penguin",
            ],
            [
                "title" => "Artist and the Mathematician, The",
                "authors" => [
                    "Aczel, Amir",
                ],
                "genres" => [
                    "science",
                    "mathematics",
                ],
                "height" => 186,
                "publisher" => "HighStakes",
            ],
            [
                "title" => "History of Western Philosophy",
                "authors" => [
                    "Russell, Bertrand",
                ],
                "genres" => [
                    "philosophy",
                    "philosophy",
                ],
                "height" => 213,
                "publisher" => "Routledge",
            ],
            [
                "title" => "Selected Short Stories",
                "authors" => [
                    "",
                ],
                "genres" => [
                    "fiction",
                    "classic",
                ],
                "height" => 215,
                "publisher" => "Jaico",
            ],
            [
                "title" => "Rationality & Freedom",
                "authors" => [
                    "Sen, Amartya",
                ],
                "genres" => [
                    "science",
                    "economics",
                ],
                "height" => 213,
                "publisher" => "Springer",
            ],
            [
                "title" => "Clash of Civilizations and Remaking of the World Order",
                "authors" => [
                    "Huntington, Samuel",
                ],
                "genres" => [
                    "non-fiction",
                    "history",
                ],
                "height" => 228,
                "publisher" => "Simon & Schuster",
            ],
            [
                "title" => "Uncommon Wisdom",
                "authors" => [
                    "Capra, Fritjof",
                ],
                "genres" => [
                    "non-fiction",
                    "anthology",
                ],
                "height" => 197,
                "publisher" => "Fontana",
            ],
            [
                "title" => "One",
                "authors" => [
                    "Bach, Richard",
                ],
                "genres" => [
                    "non-fiction",
                    "autobiography",
                ],
                "height" => 172,
                "publisher" => "Dell",
            ],
            [
                "title" => "Karl Marx Biography",
                "authors" => [
                    "",
                ],
                "genres" => [
                    "non-fiction",
                    "autobiography",
                ],
                "height" => 162,
                "publisher" => "",
            ],
            [
                "title" => "To Sir With Love",
                "authors" => [
                    "Braithwaite, E.R",
                ],
                "genres" => [
                    "fiction",
                    "classic",
                ],
                "height" => 197,
                "publisher" => "Penguin",
            ],
            [
                "title" => "Half A Life",
                "authors" => [
                    "Naipaul, V S",
                ],
                "genres" => [
                    "fiction",
                    "novel",
                ],
                "height"
                => 196,
                "publisher" => "",
            ],
            [
                "title" => "Discovery of India, The",
                "authors" => [
                    "Nehru, Jawaharlal",
                ],
                "genres" => [
                    "non-fiction",
                    "history",
                ],
                "height" => 230,
                "publisher" => "",
            ],
            [
                "title" => "Apulki",
                "authors" => [
                    "Desh Pande, P L",
                ],
                "genres" => [
                    "non-fiction",
                    "misc",
                ],
                "height" => 211,
                "publisher" => "",
            ],
            [
                "title" => "Unpopular Essays",
                "authors" => [
                    "Russell, Bertrand",
                ],
                "genres" => [
                    "philosophy",
                ],
                "height" => 198,
                "publisher" => "",
            ],
            [
                "title" => "Deceiver, The",
                "authors" => [
                    "Forsyth, Frederick",
                ],
                "genres" => [
                    "fiction",
                    "novel",
                ],
                "height" => 178,
                "publisher" => "",
            ],
            [
                "title" => "Veil: Secret Wars of the CIA",
                "authors" => [
                    "Woodward, Bob",
                ],
                "genres" => [
                    "non-fiction",
                    "history",
                ],
                "height" => 171,
                "publisher" => "",
            ],
            [
                "title" => "Char Shabda",
                "authors" => [
                    "Desh Pande, P L",
                ],
                "genres" => [
                    "non-fiction",
                    "misc",
                ],
                "height" => 214,
                "publisher" => "",
            ],
            [
                "title" => "Rosy is My Relative",
                "authors" => [
                    "Durrell, Gerald",
                ],
                "genres" => [
                    "fiction",
                    "novel",
                ],
                "height" => 176,
                "publisher" => "",
            ],
            [
                "title" => "Moon and Sixpence, The",
                "authors" => [
                    "Maugham, William S",
                ],
                "genres" => [
                    "fiction",
                    "classic",
                ],
                "height" => 180,
                "publisher" => "",
            ],
            [
                "title" => "Political Philosophers",
                "authors" => [
                    "",
                ],
                "genres" => [
                    "philosophy",
                    "politics",
                ],
                "height" => 162,
                "publisher" => "",
            ],
            [
                "title" => "Short history of the World, A",
                "authors" => [
                    "Wells, H G",
                ],
                "genres" => [
                    "non-fiction",
                    "history",
                ],
                "height" => 197,
                "publisher" => "",
            ],
            [
                "title" => "Trembling of a Leaf, The",
                "authors" => [
                    "Maugham, William S",
                ],
                "genres" => [
                    "fiction",
                    "novel",
                ],
                "height" => 205,
                "publisher" => "",
            ],
            [
                "title" => "Doctor on the Brain",
                "authors" => [
                    "Gordon, Richard",
                ],
                "genres" => [
                    "fiction",
                    "novel",
                ],
                "height" => 204,
                "publisher" => "",
            ],
            [
                "title" => "Simpsons & Their Mathematical Secrets",
                "authors" => [
                    "Singh, Simon",
                ],
                "genres" => [
                    "science",
                    "mathematics",
                ],
                "height" => 233,
                "publisher" => "",
            ],
            [
                "title" => "Pattern Classification",
                "authors" => [
                    "Duda, Hart",
                ],
                "genres" => [
                    "technology",
                    "data science",
                ],
                "height" => 241,
                "publisher" => "",
            ],
            [
                "title" => "From Beirut to Jerusalem",
                "authors" => [
                    "Friedman, Thomas",
                ],
                "genres" => [
                    "non-fiction",
                    "history",
                ],
                "height" => 202,
                "publisher" => "",
            ],
            [
                "title" => "Code Book, The",
                "authors" => [
                    "Singh, Simon",
                ],
                "genres" => [
                    "science",
                    "mathematics",
                ],
                "height" => 197,
                "publisher" => "",
            ],
            [
                "title" => "Age of the Warrior, The",
                "authors" => [
                    "Fisk, Robert",
                ],
                "genres" => [
                    "non-fiction",
                    "history",
                ],
                "height" => 197,
                "publisher" => "",
            ],
            [
                "title" => "Final Crisis",
                "authors" => [
                    "",
                ],
                "genres" => [
                    "fiction",
                    "comic",
                ],
                "height" => 257,
                "publisher" => "",
            ],
            [
                "title" => "Killing Joke, The",
                "authors" => [
                    "",
                ],
                "genres" => [
                    "fiction",
                    "comic",
                ],
                "height" =>
                    283,
                "publisher" => "",
            ],
            [
                "title" => "Flashpoint",
                "authors" => [
                    "",
                ],
                "genres" => [
                    "fiction",
                    "comic",
                ],
                "height" => 265,
                "publisher" => "",
            ],
            [
                "title" => "Batman Earth One",
                "authors" => [
                    "",
                ],
                "genres" => [
                    "fiction",
                    "comic",
                ],
                "height" =>
                    265,
                "publisher" => "",
            ],
            [
                "title" => "Crisis on Infinite Earths",
                "authors" => [
                    "",
                ],
                "genres" => [
                    "fiction",
                    "comic",
                ],
                "height" => 258,
                "publisher" => "",
            ],
            [
                "title" => "Numbers Behind Numb3rs, The",
                "authors" => [
                    "Devlin, Keith",
                ],
                "genres" => [
                    "science",
                    "mathematics",
                ],
                "height" => 202,
                "publisher" => "",
            ],
            [
                "title" => "Superman Earth One - 1",
                "authors" => [
                    "",
                ],
                "genres" => [
                    "fiction",
                    "comic",
                ],
                "height"
                => 259,
                "publisher" => "",
            ],
            [
                "title" => "Superman Earth One - 2",
                "authors" => [
                    "",
                ],
                "genres" => [
                    "fiction",
                    "comic",
                ],
                "height"
                => 258,
                "publisher" => "",
            ],
            [
                "title" => "Justice League: Throne of Atlantis",
                "authors" => [
                    "",
                ],
                "genres" => [
                    "fiction",
                    "comic",
                ],
                "height" => 258,
                "publisher" => "",
            ],
            [
                "title" => "Justice League: The Villain's Journey",
                "authors" => [
                    "",
                ],
                "genres" => [
                    "fiction",
                    "comic",
                ],
                "height" => 258,
                "publisher" => "",
            ],
            [
                "title" => "Death of Superman, The",
                "authors" => [
                    "",
                ],
                "genres" => [
                    "fiction",
                    "comic",
                ],
                "height"
                => 258,
                "publisher" => "",
            ],
            [
                "title" => "History of the DC Universe",
                "authors" => [
                    "",
                ],
                "genres" => [
                    "fiction",
                    "comic",
                ],
                "height" => 258,
                "publisher" => "",
            ],
            [
                "title" => "Batman: The Long Halloween",
                "authors" => [
                    "",
                ],
                "genres" => [
                    "fiction",
                    "comic",
                ],
                "height" => 258,
                "publisher" => "",
            ],
            [
                "title" => "Life in Letters, A",
                "authors" => [
                    "Steinbeck, John",
                ],
                "genres" => [
                    "non-fiction",
                    "autobiography",
                ],
                "height" => 196,
                "publisher" => "",
            ],
            [
                "title" => "Information, The",
                "authors" => [
                    "Gleick, James",
                ],
                "genres" => [
                    "science",
                    "mathematics",
                ],
                "height" => 233,
                "publisher" => "",
            ],
            [
                "title" => "Journal of Economics, vol 106 No 3",
                "authors" => [
                    "",
                ],
                "genres" => [
                    "science",
                    "economics",
                ],
                "height" => 235,
                "publisher" => "",
            ],
            [
                "title" => "Elements of Information Theory",
                "authors" => [
                    "Thomas, Joy",
                ],
                "genres" => [
                    "technology",
                    "signal processing",
                ],
                "height" => 229,
                "publisher" => "",
            ],
            [
                "title" => "Power Electronics - Rashid",
                "authors" => [
                    "Rashid, Muhammad",
                ],
                "genres" => [
                    "technology",
                    "computer science",
                ],
                "height" => 235,
                "publisher" => "",
            ],
            [
                "title" => "Power Electronics - Mohan",
                "authors" => [
                    "Mohan, Ned",
                ],
                "genres" => [
                    "technology",
                    "computer science",
                ],
                "height" => 237,
                "publisher" => "",
            ],
            [
                "title" => "Neural Networks",
                "authors" => [
                    "Haykin, Simon",
                ],
                "genres" => [
                    "technology",
                    "data science",
                ],
                "height" => 240,
                "publisher" => "",
            ],
            [
                "title" => "Grapes of Wrath, The",
                "authors" => [
                    "Steinbeck, John",
                ],
                "genres" => [
                    "fiction",
                    "classic",
                ],
                "height" => 196,
                "publisher" => "",
            ],
            [
                "title" => "Vyakti ani Valli",
                "authors" => [
                    "Desh Pande, P L",
                ],
                "genres" => [
                    "non-fiction",
                    "misc",
                ],
                "height" => 211,
                "publisher" => "",
            ],
            [
                "title" => "Statistical Learning Theory",
                "authors" => [
                    "Vapnik, Vladimir",
                ],
                "genres" => [
                    "technology",
                    "data science",
                ],
                "height" => 228,
                "publisher" => "",
            ],
            [
                "title" => "Empire of the Mughal - The Tainted Throne",
                "authors" => [
                    "Rutherford, Alex",
                ],
                "genres" => [
                    "non-fiction",
                    "history",
                ],
                "height" => 180,
                "publisher" => "",
            ],
            [
                "title" => "Empire of the Mughal - Brothers at War",
                "authors" => [
                    "Rutherford, Alex",
                ],
                "genres" => [
                    "non-fiction",
                    "history",
                ],
                "height" => 180,
                "publisher" => "",
            ],
            [
                "title" => "Empire of the Mughal - Ruler of the World",
                "authors" => [
                    "Rutherford, Alex",
                ],
                "genres" => [
                    "non-fiction",
                    "history",
                ],
                "height" => 180,
                "publisher" => "",
            ],
            [
                "title" => "Empire of the Mughal - The Serpent's Tooth",
                "authors" => [
                    "Rutherford, Alex",
                ],
                "genres" => [
                    "non-fiction",
                    "history",
                ],
                "height" => 180,
                "publisher" => "",
            ],
            [
                "title" => "Empire of the Mughal - Raiders from the North",
                "authors" => [
                    "Rutherford, Alex",
                ],
                "genres" => [
                    "non-fiction",
                    "history",
                ],
                "height" => 180,
                "publisher" => "",
            ],
            [
                "title" => "Mossad",
                "authors" => [
                    "Baz-Zohar, Michael",
                ],
                "genres" => [
                    "non-fiction",
                    "history",
                ],
                "height" => 236,
                "publisher" => "",
            ],
            [
                "title" => "Jim Corbett Omnibus",
                "authors" => [
                    "Corbett, Jim",
                ],
                "genres" => [
                    "non-fiction",
                    "history",
                ],
                "height" => 223,
                "publisher" => "",
            ],
            [
                "title" => "20000 Leagues Under the Sea",
                "authors" => [
                    "Verne, Jules",
                ],
                "genres" => [
                    "fiction",
                    "novel",
                ],
                "height" => 190,
                "publisher" => "",
            ],
            [
                "title" => "Batatyachi Chal",
                "authors" => [
                    "Desh Pande, P L",
                ],
                "genres" => [
                    "fiction",
                    "novel",
                ],
                "height" => 200,
                "publisher" => "",
            ],
            [
                "title" => "Hafasavnuk",
                "authors" => [
                    "Desh Pande, P L",
                ],
                "genres" => [
                    "fiction",
                    "novel",
                ],
                "height" => 211,
                "publisher" => "",
            ],
            [
                "title" => "Urlasurla",
                "authors" => [
                    "Desh Pande, P L",
                ],
                "genres" => [
                    "fiction",
                    "novel",
                ],
                "height"
                => 211,
                "publisher" => "",
            ],
            [
                "title" => "Pointers in C",
                "authors" => [
                    "Kanetkar, Yashwant",
                ],
                "genres" => [
                    "technology",
                    "computer science",
                ],
                "height" => 213,
                "publisher" => "",
            ],
            [
                "title" => "Cathedral and the Bazaar, The",
                "authors" => [
                    "Raymond, Eric",
                ],
                "genres" => [
                    "technology",
                    "computer science",
                ],
                "height" => 217,
                "publisher" => "",
            ],
            [
                "title" => "Design with OpAmps",
                "authors" => [
                    "Franco, Sergio",
                ],
                "genres" => [
                    "technology",
                    "computer science",
                ],
                "height" => 240,
                "publisher" => "",
            ],
            [
                "title" => "Think Complexity",
                "authors" => [
                    "Downey, Allen",
                ],
                "genres" => [
                    "technology",
                    "data science",
                ],
                "height" => 230,
                "publisher" => "",
            ],
            [
                "title" => "Devil's Advocate, The",
                "authors" => [
                    "West, Morris",
                ],
                "genres" => [
                    "fiction",
                    "novel",
                ],
                "height" => 178,
                "publisher" => "",
            ],
            [
                "title" => "Ayn Rand Answers",
                "authors" => [
                    "Rand, Ayn",
                ],
                "genres" => [
                    "philosophy",
                    "objectivism",
                ],
                "height" => 203,
                "publisher" => "",
            ],
            [
                "title" => "Philosophy: Who Needs It",
                "authors" => [
                    "Rand, Ayn",
                ],
                "genres" => [
                    "philosophy",
                    "objectivism",
                ],
                "height" => 171,
                "publisher" => "",
            ],
            [
                "title" => "World's Great Thinkers, The",
                "authors" => [
                    "",
                ],
                "genres" => [
                    "science",
                    "physics",
                ],
                "height" => 189,
                "publisher" => "",
            ],
            [
                "title" => "Data Analysis with Open Source Tools",
                "authors" => [
                    "Janert, Phillip",
                ],
                "genres" => [
                    "technology",
                    "data science",
                ],
                "height" => 230,
                "publisher" => "",
            ],
            [
                "title" => "Broca's Brain",
                "authors" => [
                    "Sagan, Carl",
                ],
                "genres" => [
                    "science",
                    "physics",
                ],
                "height" => 174,
                "publisher" => "",
            ],
            [
                "title" => "Men of Mathematics",
                "authors" => [
                    "Bell, E T",
                ],
                "genres" => [
                    "science",
                    "mathematics",
                ],
                "height" => 217,
                "publisher" => "",
            ],
            [
                "title" => "Oxford book of Modern Science Writing",
                "authors" => [
                    "Dawkins, Richard",
                ],
                "genres" => [
                    "science",
                    "science",
                ],
                "height" => 240,
                "publisher" => "",
            ],
            [
                "title" => "Justice, Judiciary and Democracy",
                "authors" => [
                    "Ranjan, Sudhanshu",
                ],
                "genres" => [
                    "non-fiction",
                    "legal",
                ],
                "height" => 224,
                "publisher" => "",
            ],
            [
                "title" => "Arthashastra, The",
                "authors" => [
                    "Kautiyla    ",
                ],
                "genres" => [
                    "philosophy",
                    "philosophy",
                ],
                "height" => 214,
                "publisher" => "",
            ],
            [
                "title" => "We the People",
                "authors" => [
                    "Palkhivala, Nani",
                ],
                "genres" => [
                    "philosophy",
                    "philosophy",
                ],
                "height" => 216,
                "publisher" => "",
            ],
            [
                "title" => "We the Nation",
                "authors" => [
                    "Palkhivala, Nani",
                ],
                "genres" => [
                    "philosophy",
                    "philosophy",
                ],
                "height" => 216,
                "publisher" => "",
            ],
            [
                "title" => "Courtroom Genius, The",
                "authors" => [
                    "Sorabjee, Soli  ",
                ],
                "genres" => [
                    "non-fiction",
                    "autobiography",
                ],
                "height" => 217,
                "publisher" => "",
            ],
            [
                "title" => "Dongri to Dubai",
                "authors" => [
                    "Zaidi, Hussain",
                ],
                "genres" => [
                    "non-fiction",
                    "history",
                ],
                "height" => 216,
                "publisher" => "",
            ],
            [
                "title" => "History of England, Foundation",
                "authors" => [
                    "Ackroyd, Peter",
                ],
                "genres" => [
                    "non-fiction",
                    "history",
                ],
                "height" => 197,
                "publisher" => "",
            ],
            [
                "title" => "City of Djinns",
                "authors" => [
                    "Dalrymple, William",
                ],
                "genres" => [
                    "non-fiction",
                    "history",
                ],
                "height" => 198,
                "publisher" => "",
            ],
            [
                "title" => "India's Legal System",
                "authors" => [
                    "Nariman",
                ],
                "genres" => [
                    "non-fiction",
                    "legal",
                ],
                "height" => 177,
                "publisher" => "",
            ],
            [
                "title" => "More Tears to Cry",
                "authors" => [
                    "Sassoon, Jean",
                ],
                "genres" => [
                    "fiction",
                    "novel",
                ],
                "height" => 235,
                "publisher" => "",
            ],
            [
                "title" => "Ropemaker, The",
                "authors" => [
                    "Dickinson, Peter",
                ],
                "genres" => [
                    "fiction",
                    "novel",
                ],
                "height" => 196,
                "publisher" => "",
            ],
            [
                "title" => "Angels & Demons",
                "authors" => [
                    "Brown, Dan",
                ],
                "genres" => [
                    "fiction",
                    "novel",
                ],
                "height" => 170,
                "publisher" => "",
            ],
            [
                "title" => "Judge, The",
                "authors" => [
                    "",
                ],
                "genres" => [
                    "fiction",
                    "novel",
                ],
                "height" => 170,
                "publisher" => "",
            ],
            [
                "title" => "Attorney, The",
                "authors" => [
                    "",
                ],
                "genres" => [
                    "fiction",
                    "novel",
                ],
                "height" => 170,
                "publisher" => "",
            ],
            [
                "title" => "Prince, The",
                "authors" => [
                    "Machiavelli",
                ],
                "genres" => [
                    "fiction",
                    "classic",
                ],
                "height" => 173,
                "publisher" => "",
            ],
            [
                "title" => "Eyeless in Gaza",
                "authors" => [
                    "Huxley, Aldous",
                ],
                "genres" => [
                    "fiction",
                    "novel",
                ],
                "height" => 180,
                "publisher" => "",
            ],
            [
                "title" => "Tales of Beedle the Bard",
                "authors" => [
                    "Rowling, J K",
                ],
                "genres" => [
                    "fiction",
                    "novel",
                ],
                "height" => 184,
                "publisher" => "",
            ],
            [
                "title" => "Girl with the Dragon Tattoo",
                "authors" => [
                    "Larsson, Steig",
                ],
                "genres" => [
                    "fiction",
                    "novel",
                ],
                "height" => 179,
                "publisher" => "",
            ],
            [
                "title" => "Girl who kicked the Hornet's Nest",
                "authors" => [
                    "Larsson, Steig",
                ],
                "genres" => [
                    "fiction",
                    "novel",
                ],
                "height" => 179,
                "publisher" => "",
            ],
            [
                "title" => "Girl who played with Fire",
                "authors" => [
                    "Larsson, Steig",
                ],
                "genres" => [
                    "fiction",
                    "novel",
                ],
                "height" => 179,
                "publisher" => "",
            ],
            [
                "title" => "Batman Handbook",
                "authors" => [
                    "",
                ],
                "genres" => [
                    "fiction",
                    "comic",
                ],
                "height" => 270,
                "publisher" => "",
            ],
            [
                "title" => "Murphy's Law",
                "authors" => [
                    "",
                ],
                "genres" => [
                    "philosophy",
                    "psychology",
                ],
                "height" =>
                    178,
                "publisher" => "",
            ],
            [
                "title" => "Structure and Randomness",
                "authors" => [
                    "Tao, Terence",
                ],
                "genres" => [
                    "science",
                    "mathematics",
                ],
                "height" => 252,
                "publisher" => "",
            ],
            [
                "title" => "Image Processing with MATLAB",
                "authors" => [
                    "Eddins, Steve",
                ],
                "genres" => [
                    "technology",
                    "signal processing",
                ],
                "height" => 241,
                "publisher" => "",
            ],
            [
                "title" => "Animal Farm",
                "authors" => [
                    "Orwell, George",
                ],
                "genres" => [
                    "fiction",
                    "classic",
                ],
                "height" => 180,
                "publisher" => "",
            ],
            [
                "title" => "Idiot, The",
                "authors" => [
                    "Dostoevsky, Fyodor",
                ],
                "genres" => [
                    "fiction",
                    "classic",
                ],
                "height" => 197,
                "publisher" => "",
            ],
            [
                "title" => "Christmas Carol, A",
                "authors" => [
                    "Dickens, Charles",
                ],
                "genres" => [
                    "fiction",
                    "classic",
                ],
                "height" => 196,
                "publisher" => "",
            ],
            [
                "title" => "PHP & MySQL: Novice to Ninja",
                "authors" => [
                    "Butler, Tom",
                    "Yank, Kevin",
                ],
                "genres" => [
                    "non-fiction",
                    "programming",
                    "web",
                    "PHP",
                    "MySQL",
                ],
                "height" => 233,
                "publisher" => "SitePoint",
                "isbn_10" => "0994346980",
                "isbn_13" => "9780994346988",
            ],
        ];


        $countItems = count($seedBooks);

        $output = new ConsoleOutput();
        $progressBar = new ProgressBar($output, $countItems);

        $this->command->getOutput()->writeln("<info>Seeding with {$countItems} Books.");

        foreach ($seedBooks as $book) {

            $authors = $book['authors'];    // Get the list of authors for the book
            $authors_list = [];  // create an empty list of authors

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
                $authors_list[] = $author->id;
            }

            // ------ Genre Processing --------
            $genres = $book['genres'];
            $genres_list = [];

            // Go through the genres one by one
            foreach ($genres as $genre) {
                $genres_list[] = $genre;
            }

            // This is getting the genre and sub-genre until
            // proper processing of the genres is completed
            $genre = $genres_list[0] ?? null;
            $sub_genre = $genres_list[1] ?? null;


            # Create book record
            $newBook = [
                'title' => $book['title'] ?? null,
                'subtitle' => $book['subtitle'] ?? null,
                'year_published' => $book['year_published'] ?? null,
                'edition' => $book['edition'] ?? null,
                'isbn_10' => $book['isbn_10'] ?? null,
                'isbn_13' => $book['isbn_13'] ?? null,
                'height' => $book['height'] ?? null,
                /* ----- Genres and Sub-Genres -----
                   You will need to remove these two lines and use a
                   similar process to the Authors.  */
                'genre' => $genre ?? null,
                'sub_genre' => $sub_genre ?? null,
                'created_at' => Carbon::now()->addHours(random_int(-10000, -100)),
            ];
            $theBook = Book::create($newBook);

            # Link the authors to the book
            $theBook->authors()->attach($authors_list);

            # Link the genres with the book
            # This is part of the exercises / portfolio

            $progressBar->advance();
        }
        $progressBar->finish();
        $this->command->getOutput()->writeln("");

    }

}
