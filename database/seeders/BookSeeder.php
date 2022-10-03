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
            'title' => 'UNKNOWN TITLE',
            'subtitle' => null,
            'year_published' => null,
            'edition' => null,
            'isbn_10' => null,
            'isbn_13' => null,
        ];

        Book::create($unknownBook);


        $seedBooks = [
            ["title" => "Fundamentals of Wavelets", "author" => "Goswami, Jaideva", "genre" => "technology", "sub_genre" => "signal processing", "height" => 228, "publisher" => "Wiley",],
            ["title" => "Data Smart", "author" => "Foreman, John", "genre" => "technology", "sub_genre" => "data science", "height" => 235, "publisher" => "Wiley",],
            ["title" => "God Created the Integers", "author" => "Hawking, Stephen", "genre" => "technology", "sub_genre" => "mathematics", "height" => 197, "publisher" => "Penguin",],
            ["title" => "Superfreakonomics", "author" => "Dubner, Stephen", "genre" => "science", "sub_genre" => "economics", "height" => 179, "publisher" => "Harper Collins",],
            ["title" => "Orientalism", "author" => "Said, Edward", "genre" => "non-fiction", "sub_genre" => "history", "height" => 197, "publisher" => "Penguin",],
            ["title" => "Nature of Statistical Learning Theory, The", "author" => "Vapnik, Vladimir", "genre" => "technology", "sub_genre" => "data science", "height" => 230, "publisher" => "Springer",],
            ["title" => "Integration of the Indian States", "author" => "Menon, V P", "genre" => "non-fiction", "sub_genre" => "history", "height" => 217, "publisher" => "Orient Blackswan",],
            ["title" => "Drunkard's Walk, The", "author" => "Mlodinow, Leonard", "genre" => "science", "sub_genre" => "mathematics", "height" => 197, "publisher" => "Penguin",],
            ["title" => "Image Processing & Mathematical Morphology", "author" => "Shih, Frank", "genre" => "technology", "sub_genre" => "signal processing", "height" => 241, "publisher" => "CRC",],
            ["title" => "How to Think Like Sherlock Holmes", "author" => "Konnikova, Maria", "genre" => "non-fiction", "sub_genre" => "psychology", "height" => 240, "publisher" => "Penguin",],
            ["title" => "Data Scientists at Work", "author" => "Sebastian Gutierrez", "genre" => "technology", "sub_genre" => "data science", "height" => 230, "publisher" => "Apress",],
            ["title" => "Slaughterhouse Five", "author" => "Vonnegut, Kurt", "genre" => "fiction", "sub_genre" => "classic", "height" => 198, "publisher" => "Random House",],
            ["title" => "Birth of a Theorem", "author" => "Villani, Cedric", "genre" => "science", "sub_genre" => "mathematics", "height" => 234, "publisher" => "Bodley Head",],
            ["title" => "Structure & Interpretation of Computer Programs", "author" => "Sussman, Gerald", "genre" => "technology", "sub_genre" => "computer science", "height" => 240, "publisher" => "MIT Press",],
            ["title" => "Age of Wrath, The", "author" => "Eraly, Abraham", "genre" => "non-fiction", "sub_genre" => "history", "height" => 238, "publisher" => "Penguin",],
            ["title" => "Trial, The", "author" => "Kafka, Frank", "genre" => "fiction", "sub_genre" => "classic", "height" => 198, "publisher" => "Random House",],
            ["title" => "Statistical Decision Theory'", "author" => "Pratt, John", "genre" => "technology", "sub_genre" => "data science", "height" => 236, "publisher" => "MIT Press",],
            ["title" => "Data Mining Handbook", "author" => "Nisbet, Robert", "genre" => "technology", "sub_genre" => "data science", "height" => 242, "publisher" => "Apress",],
            ["title" => "New Machiavelli, The", "author" => "Wells, H. G.", "genre" => "fiction", "sub_genre" => "novel", "height" => 180, "publisher" => "Penguin",],
            ["title" => "Physics & Philosophy", "author" => "Heisenberg, Werner", "genre" => "philosophy", "sub_genre" => "science", "height" => 197, "publisher" => "Penguin",],
            ["title" => "Making Software", "author" => "Oram, Andy", "genre" => "technology", "sub_genre" => "computer science", "height" => 232, "publisher" => "O'Reilly",],
            ["title" => "Analysis, Vol I", "author" => "Tao, Terence", "genre" => "technology", "sub_genre" => "mathematics", "height" => 248, "publisher" => "HBA",],
            ["title" => "Machine Learning for Hackers", "author" => "Conway, Drew", "genre" => "technology", "sub_genre" => "data science", "height" => 233, "publisher" => "O'Reilly",],
            ["title" => "Signal and the Noise, The", "author" => "Silver, Nate", "genre" => "technology", "sub_genre" => "data science", "height" => 233, "publisher" => "Penguin",],
            ["title" => "Python for Data Analysis", "author" => "McKinney, Wes", "genre" => "technology", "sub_genre" => "data science", "height" => 233, "publisher" => "O'Reilly",],
            ["title" => "Introduction to Algorithms", "author" => "Cormen, Thomas", "genre" => "technology", "sub_genre" => "computer science", "height" => 234, "publisher" => "MIT Press",],
            ["title" => "Beautiful and the Damned, The", "author" => "Deb, Siddhartha", "genre" => "non-fiction", "sub_genre" => "history", "height" => 198, "publisher" => "Penguin",],
            ["title" => "Outsider, The", "author" => "Camus, Albert", "genre" => "fiction", "sub_genre" => "classic", "height" => 198, "publisher" => "Penguin",],
            ["title" => "Complete Sherlock Holmes, The - Vol I", "author" => "Doyle, Arthur Conan", "genre" => "fiction", "sub_genre" => "classic", "height" => 176, "publisher" => "Random House",],
            ["title" => "Complete Sherlock Holmes, The - Vol II", "author" => "Doyle, Arthur Conan", "genre" => "fiction", "sub_genre" => "classic", "height" => 176, "publisher" => "Random House",],
            ["title" => "Wealth of Nations, The", "author" => "Smith, Adam", "genre" => "science", "sub_genre" => "economics", "height" => 175, "publisher" => "Random House",],
            ["title" => "Pillars of the Earth, The", "author" => "Follett, Ken", "genre" => "fiction", "sub_genre" => "novel", "height" => 176, "publisher" => "Random House",],
            ["title" => "Tao of Physics, The", "author" => "Capra, Fritjof", "genre" => "science", "sub_genre" => "physics", "height" => 179, "publisher" => "Penguin",],
            ["title" => "Surely You're Joking Mr Feynman", "author" => "Feynman, Richard", "genre" => "science", "sub_genre" => "physics", "height" => 198, "publisher" => "Random House",],
            ["title" => "Farewell to Arms, A", "author" => "Hemingway, Ernest", "genre" => "fiction", "sub_genre" => "classic", "height" => 179, "publisher" => "Rupa",],
            ["title" => "Veteran, The", "author" => "Forsyth, Frederick", "genre" => "fiction", "sub_genre" => "novel", "height" => 177, "publisher" => "Transworld",],
            ["title" => "False Impressions", "author" => "Archer, Jeffery", "genre" => "fiction", "sub_genre" => "novel", "height" => 177, "publisher" => "Pan",],
            ["title" => "Last Lecture, The", "author" => "Pausch, Randy", "genre" => "non-fiction", "sub_genre" => "autobiography", "height" => 197, "publisher" => "Hyperion",],
            ["title" => "Return of the Primitive", "author" => "Rand, Ayn", "genre" => "philosophy", "sub_genre" => "objectivism", "height" => 202, "publisher" => "Penguin",],
            ["title" => "Jurassic Park", "author" => "Crichton, Michael", "genre" => "fiction", "sub_genre" => "novel", "height" => 174, "publisher" => "Random House",],
            ["title" => "Russian Journal, A", "author" => "Steinbeck, John", "genre" => "non-fiction", "sub_genre" => "history", "height" => 196, "publisher" => "Penguin",],
            ["title" => "Tales of Mystery and Imagination", "author" => "Poe, Edgar Allen", "genre" => "fiction", "sub_genre" => "classic", "height" => 172, "publisher" => "Harper Collins",],
            ["title" => "Freakonomics", "author" => "Dubner, Stephen", "genre" => "science", "sub_genre" => "economics", "height" => 197, "publisher" => "Penguin",],
            ["title" => "Hidden Connections, The", "author" => "Capra, Fritjof", "genre" => "science", "sub_genre" => "physics", "height" => 197, "publisher" => "Harper Collins",],
            ["title" => "Story of Philosophy, The", "author" => "Durant, Will", "genre" => "philosophy", "sub_genre" => "history", "height" => 170, "publisher" => "Pocket",],
            ["title" => "Asami Asami", "author" => "Desh Pande, P L", "genre" => "fiction", "sub_genre" => "novel", "height" => 205, "publisher" => "Mauj",],
            ["title" => "Journal of a Novel", "author" => "Steinbeck, John", "genre" => "fiction", "sub_genre" => "classic", "height" => 196, "publisher" => "Penguin",],
            ["title" => "Once There Was a War", "author" => "Steinbeck, John", "genre" => "non-fiction", "sub_genre" => "history", "height" => 196, "publisher" => "Penguin",],
            ["title" => "Moon is Down, The", "author" => "Steinbeck, John", "genre" => "fiction", "sub_genre" => "classic", "height" => 196, "publisher" => "Penguin",],
            ["title" => "Brethren, The", "author" => "Grisham, John", "genre" => "fiction", "sub_genre" => "novel", "height" => 174, "publisher" => "Random House",],
            ["title" => "In a Free State", "author" => "Naipaul, V. S.", "genre" => "fiction", "sub_genre" => "novel", "height" => 196, "publisher" => "Rupa",],
            ["title" => "Catch 22", "author" => "Heller, Joseph", "genre" => "fiction", "sub_genre" => "classic", "height" => 178, "publisher" => "Random House",],
            ["title" => "Complete Mastermind, The", "author" => "BBC", "genre" => "non-fiction", "sub_genre" => "trivia", "height" => 178, "publisher" => "BBC",],
            ["title" => "Dylan on Dylan", "author" => "Dylan, Bob", "genre" => "non-fiction", "sub_genre" => "autobiography", "height" => 197, "publisher" => "Random House",],
            ["title" => "Soft Computing & Intelligent Systems", "author" => "Gupta, Madan", "genre" => "technology", "sub_genre" => "data science", "height" => 242, "publisher" => "Elsevier",],
            ["title" => "Textbook of Economic Theory", "author" => "Stonier, Alfred", "genre" => "technology", "sub_genre" => "economics", "height" => 242, "publisher" => "Pearson",],
            ["title" => "Econometric Analysis", "author" => "Greene, W. H.", "genre" => "technology", "sub_genre" => "economics", "height" => 242, "publisher" => "Pearson",],
            ["title" => "Learning OpenCV", "author" => "Bradsky, Gary", "genre" => "technology", "sub_genre" => "signal processing", "height" => 232, "publisher" => "O'Reilly",],
            ["title" => "Data Structures Using C & C++", "author" => "Tanenbaum, Andrew", "genre" => "technology", "sub_genre" => "computer science", "height" => 235, "publisher" => "Prentice Hall",],
            ["title" => "Computer Vision, A Modern Approach", "author" => "Forsyth, David", "genre" => "technology", "sub_genre" => "signal processing", "height" => 255, "publisher" => "Pearson",],
            ["title" => "Principles of Communication Systems", "author" => "Taub, Schilling", "genre" => "technology", "sub_genre" => "signal processing", "height" => 240, "publisher" => "TMH",],
            ["title" => "Let Us C", "author" => "Kanetkar, Yashwant", "genre" => "technology", "sub_genre" => "computer science", "height" => 213, "publisher" => "Prentice Hall",],
            ["title" => "Amulet of Samarkand, The", "author" => "Stroud, Jonathan", "genre" => "fiction", "sub_genre" => "novel", "height" => 179, "publisher" => "Random House",],
            ["title" => "Crime and Punishment", "author" => "Dostoevsky, Fyodor", "genre" => "fiction", "sub_genre" => "classic", "height" => 180, "publisher" => "Penguin",],
            ["title" => "Angels & Demons", "author" => "Brown, Dan", "genre" => "fiction", "sub_genre" => "novel", "height" => 178, "publisher" => "Random House",],
            ["title" => "Argumentative Indian, The", "author" => "Sen, Amartya", "genre" => "non-fiction", "sub_genre" => "history", "height" => 209, "publisher" => "Picador",],
            ["title" => "Sea of Poppies", "author" => "Ghosh, Amitav", "genre" => "fiction", "sub_genre" => "novel", "height" => 197, "publisher" => "Penguin",],
            ["title" => "Idea of Justice, The", "author" => "Sen, Amartya", "genre" => "philosophy", "sub_genre" => "economics", "height" => 212, "publisher" => "Penguin",],
            ["title" => "Raisin in the Sun, A", "author" => "Hansberry, Lorraine", "genre" => "fiction", "sub_genre" => "novel", "height" => 175, "publisher" => "Penguin",],
            ["title" => "All the President's Men", "author" => "Woodward, Bob", "genre" => "non-fiction", "sub_genre" => "history", "height" => 177, "publisher" => "Random House",],
            ["title" => "Prisoner of Birth, A", "author" => "Archer, Jeffery", "genre" => "fiction", "sub_genre" => "novel", "height" => 176, "publisher" => "Pan",],
            ["title" => "Scoop!", "author" => "Nayar, Kuldip", "genre" => "non-fiction", "sub_genre" => "history", "height" => 216, "publisher" => "Harper Collins",],
            ["title" => "Ahe Manohar Tari", "author" => "Desh Pande, Sunita", "genre" => "non-fiction", "sub_genre" => "autobiography", "height" => 213, "publisher" => "Mauj",],
            ["title" => "Last Mughal, The", "author" => "Dalrymple, William", "genre" => "non-fiction", "sub_genre" => "history", "height" => 199, "publisher" => "Penguin",],
            ["title" => "Social Choice & Welfare, Vol 39 No. 1", "author" => "Various", "genre" => "technology", "sub_genre" => "economics", "height" => 235, "publisher" => "Springer",],
            ["title" => "Radiowaril Bhashane & Shrutika", "author" => "Desh Pande, P L", "genre" => "non-fiction", "sub_genre" => "misc", "height" => 213, "publisher" => "Mauj",],
            ["title" => "Gun Gayin Awadi", "author" => "Desh Pande, P L", "genre" => "non-fiction", "sub_genre" => "misc", "height" => 212, "publisher" => "Mauj",],
            ["title" => "Aghal Paghal", "author" => "Desh Pande, P L", "genre" => "non-fiction", "sub_genre" => "misc", "height" => 212, "publisher" => "Mauj",],
            ["title" => "Maqta-e-Ghalib", "author" => "Garg, Sanjay", "genre" => "non-fiction", "sub_genre" => "poetry", "height" => 221, "publisher" => "Mauj",],
            ["title" => "Beyond Degrees", "author" => "", "genre" => "philosophy", "sub_genre" => "education", "height" => 222, "publisher" => "Harper Collins",],
            ["title" => "Manasa", "author" => "Kale, V P", "genre" => "non-fiction", "sub_genre" => "misc", "height" => 213, "publisher" => "Mauj",],
            ["title" => "India from Midnight to Milennium", "author" => "Tharoor, Shashi", "genre" => "non-fiction", "sub_genre" => "history", "height" => 198, "publisher" => "Penguin",],
            ["title" => "World's Greatest Trials, The", "author" => "", "genre" => "non-fiction", "sub_genre" => "history", "height" => 210, "publisher" => "",],
            ["title" => "Great Indian Novel, The", "author" => "Tharoor, Shashi", "genre" => "fiction", "sub_genre" => "novel", "height" => 198, "publisher" => "Penguin",],
            ["title" => "O Jerusalem!", "author" => "Lapierre, Dominique", "genre" => "non-fiction", "sub_genre" => "history", "height" => 217, "publisher" => "vikas",],
            ["title" => "City of Joy, The", "author" => "Lapierre, Dominique", "genre" => "fiction", "sub_genre" => "novel", "height" => 177, "publisher" => "vikas",],
            ["title" => "Freedom at Midnight", "author" => "Lapierre, Dominique", "genre" => "non-fiction", "sub_genre" => "history", "height" => 167, "publisher" => "vikas",],
            ["title" => "Winter of Our Discontent, The", "author" => "Steinbeck, John", "genre" => "fiction", "sub_genre" => "classic", "height" => 196, "publisher" => "Penguin",],
            ["title" => "On Education", "author" => "Russell, Bertrand", "genre" => "philosophy", "sub_genre" => "education", "height" => 203, "publisher" => "Routledge",],
            ["title" => "Free Will", "author" => "Harris, Sam", "genre" => "non-fiction", "sub_genre" => "psychology", "height" => 203, "publisher" => "FreePress",],
            ["title" => "Bookless in Baghdad", "author" => "Tharoor, Shashi", "genre" => "non-fiction", "sub_genre" => "history", "height" => 206, "publisher" => "Penguin",],
            ["title" => "Case of the Lame Canary, The", "author" => "Gardner, Earle Stanley", "genre" => "fiction", "sub_genre" => "novel", "height" => 179, "publisher" => "",],
            ["title" => "Theory of Everything, The", "author" => "Hawking, Stephen", "genre" => "science", "sub_genre" => "physics", "height" => 217, "publisher" => "Jaico",],
            ["title" => "New Markets & Other Essays", "author" => "Drucker, Peter", "genre" => "science", "sub_genre" => "economics", "height" => 176, "publisher" => "Penguin",],
            ["title" => "Electric Universe", "author" => "Bodanis, David", "genre" => "science", "sub_genre" => "physics", "height" => 201, "publisher" => "Penguin",],
            ["title" => "Hunchback of Notre Dame, The", "author" => "Hugo, Victor", "genre" => "fiction", "sub_genre" => "classic", "height" => 175, "publisher" => "Random House",],
            ["title" => "Burning Bright", "author" => "Steinbeck, John", "genre" => "fiction", "sub_genre" => "classic", "height" => 175, "publisher" => "Penguin",],
            ["title" => "Age of Discontuinity, The", "author" => "Drucker, Peter", "genre" => "non-fiction", "sub_genre" => "economics", "height" => 178, "publisher" => "Random House",],
            ["title" => "Doctor in the Nude", "author" => "Gordon, Richard", "genre" => "fiction", "sub_genre" => "novel", "height" => 179, "publisher" => "Penguin",],
            ["title" => "Down and Out in Paris & London", "author" => "Orwell, George", "genre" => "non-fiction", "sub_genre" => "autobiography", "height" => 179, "publisher" => "Penguin",],
            ["title" => "Identity & Violence", "author" => "Sen, Amartya", "genre" => "philosophy", "sub_genre" => "philosophy", "height" => 219, "publisher" => "Penguin",],
            ["title" => "Beyond the Three Seas", "author" => "Dalrymple, William", "genre" => "non-fiction", "sub_genre" => "history", "height" => 197, "publisher" => "Random House",],
            ["title" => "World's Greatest Short Stories, The", "author" => "", "genre" => "fiction", "sub_genre" => "classic", "height" => 217, "publisher" => "Jaico",],
            ["title" => "Talking Straight", "author" => "Iacoca, Lee", "genre" => "non-fiction", "sub_genre" => "autobiography", "height" => 175, "publisher" => "",],
            ["title" => "Maugham's Collected Short Stories, Vol 3", "author" => "Maugham, William S", "genre" => "fiction", "sub_genre" => "classic", "height" => 171, "publisher" => "Vintage",],
            ["title" => "Phantom of Manhattan, The", "author" => "Forsyth, Frederick", "genre" => "fiction", "sub_genre" => "classic", "height" => 180, "publisher" => "",],
            ["title" => "Ashenden of The British Agent", "author" => "Maugham, William S", "genre" => "fiction", "sub_genre" => "classic", "height" => 160, "publisher" => "Vintage",],
            ["title" => "Zen & The Art of Motorcycle Maintenance", "author" => "Pirsig, Robert", "genre" => "philosophy", "sub_genre" => "autobiography", "height" => 172, "publisher" => "Vintage",],
            ["title" => "Great War for Civilization, The", "author" => "Fisk, Robert", "genre" => "non-fiction", "sub_genre" => "history", "height" => 197, "publisher" => "Harper Collins",],
            ["title" => "We the Living", "author" => "Rand, Ayn", "genre" => "fiction", "sub_genre" => "novel", "height" => 178, "publisher" => "Penguin",],
            ["title" => "Artist and the Mathematician, The", "author" => "Aczel, Amir", "genre" => "science", "sub_genre" => "mathematics", "height" => 186, "publisher" => "HighStakes",],
            ["title" => "History of Western Philosophy", "author" => "Russell, Bertrand", "genre" => "philosophy", "sub_genre" => "philosophy", "height" => 213, "publisher" => "Routledge",],
            ["title" => "Selected Short Stories", "author" => "", "genre" => "fiction", "sub_genre" => "classic", "height" => 215, "publisher" => "Jaico",],
            ["title" => "Rationality & Freedom", "author" => "Sen, Amartya", "genre" => "science", "sub_genre" => "economics", "height" => 213, "publisher" => "Springer",],
            ["title" => "Clash of Civilizations and Remaking of the World Order", "author" => "Huntington, Samuel", "genre" => "non-fiction", "sub_genre" => "history", "height" => 228, "publisher" => "Simon & Schuster",],
            ["title" => "Uncommon Wisdom", "author" => "Capra, Fritjof", "genre" => "non-fiction", "sub_genre" => "anthology", "height" => 197, "publisher" => "Fontana",],
            ["title" => "One", "author" => "Bach, Richard", "genre" => "non-fiction", "sub_genre" => "autobiography", "height" => 172, "publisher" => "Dell",],
            ["title" => "Karl Marx Biography", "author" => "", "genre" => "non-fiction", "sub_genre" => "autobiography", "height" => 162, "publisher" => "",],
            ["title" => "To Sir With Love", "author" => "Braithwaite", "genre" => "fiction", "sub_genre" => "classic", "height" => 197, "publisher" => "Penguin",],
            ["title" => "Half A Life", "author" => "Naipaul, V S", "genre" => "fiction", "sub_genre" => "novel", "height" => 196, "publisher" => "",],
            ["title" => "Discovery of India, The", "author" => "Nehru, Jawaharlal", "genre" => "non-fiction", "sub_genre" => "history", "height" => 230, "publisher" => "",],
            ["title" => "Apulki", "author" => "Desh Pande, P L", "genre" => "non-fiction", "sub_genre" => "misc", "height" => 211, "publisher" => "",],
            ["title" => "Unpopular Essays", "author" => "Russell, Bertrand", "genre" => "philosophy", "sub_genre" => "philosophy", "height" => 198, "publisher" => "",],
            ["title" => "Deceiver, The", "author" => "Forsyth, Frederick", "genre" => "fiction", "sub_genre" => "novel", "height" => 178, "publisher" => "",],
            ["title" => "Veil: Secret Wars of the CIA", "author" => "Woodward, Bob", "genre" => "non-fiction", "sub_genre" => "history", "height" => 171, "publisher" => "",],
            ["title" => "Char Shabda", "author" => "Desh Pande, P L", "genre" => "non-fiction", "sub_genre" => "misc", "height" => 214, "publisher" => "",],
            ["title" => "Rosy is My Relative", "author" => "Durrell, Gerald", "genre" => "fiction", "sub_genre" => "novel", "height" => 176, "publisher" => "",],
            ["title" => "Moon and Sixpence, The", "author" => "Maugham, William S", "genre" => "fiction", "sub_genre" => "classic", "height" => 180, "publisher" => "",],
            ["title" => "Political Philosophers", "author" => "", "genre" => "philosophy", "sub_genre" => "politics", "height" => 162, "publisher" => "",],
            ["title" => "Short history of the World, A", "author" => "Wells, H G", "genre" => "non-fiction", "sub_genre" => "history", "height" => 197, "publisher" => "",],
            ["title" => "Trembling of a Leaf, The", "author" => "Maugham, William S", "genre" => "fiction", "sub_genre" => "novel", "height" => 205, "publisher" => "",],
            ["title" => "Doctor on the Brain", "author" => "Gordon, Richard", "genre" => "fiction", "sub_genre" => "novel", "height" => 204, "publisher" => "",],
            ["title" => "Simpsons & Their Mathematical Secrets", "author" => "Singh, Simon", "genre" => "science", "sub_genre" => "mathematics", "height" => 233, "publisher" => "",],
            ["title" => "Pattern Classification", "author" => "Duda, Hart", "genre" => "technology", "sub_genre" => "data science", "height" => 241, "publisher" => "",],
            ["title" => "From Beirut to Jerusalem", "author" => "Friedman, Thomas", "genre" => "non-fiction", "sub_genre" => "history", "height" => 202, "publisher" => "",],
            ["title" => "Code Book, The", "author" => "Singh, Simon", "genre" => "science", "sub_genre" => "mathematics", "height" => 197, "publisher" => "",],
            ["title" => "Age of the Warrior, The", "author" => "Fisk, Robert", "genre" => "non-fiction", "sub_genre" => "history", "height" => 197, "publisher" => "",],
            ["title" => "Final Crisis", "author" => "", "genre" => "fiction", "sub_genre" => "comic", "height" => 257, "publisher" => "",],
            ["title" => "Killing Joke, The", "author" => "", "genre" => "fiction", "sub_genre" => "comic", "height" => 283, "publisher" => "",],
            ["title" => "Flashpoint", "author" => "", "genre" => "fiction", "sub_genre" => "comic", "height" => 265, "publisher" => "",],
            ["title" => "Batman Earth One", "author" => "", "genre" => "fiction", "sub_genre" => "comic", "height" => 265, "publisher" => "",],
            ["title" => "Crisis on Infinite Earths", "author" => "", "genre" => "fiction", "sub_genre" => "comic", "height" => 258, "publisher" => "",],
            ["title" => "Numbers Behind Numb3rs, The", "author" => "Devlin, Keith", "genre" => "science", "sub_genre" => "mathematics", "height" => 202, "publisher" => "",],
            ["title" => "Superman Earth One - 1", "author" => "", "genre" => "fiction", "sub_genre" => "comic", "height" => 259, "publisher" => "",],
            ["title" => "Superman Earth One - 2", "author" => "", "genre" => "fiction", "sub_genre" => "comic", "height" => 258, "publisher" => "",],
            ["title" => "Justice League: Throne of Atlantis", "author" => "", "genre" => "fiction", "sub_genre" => "comic", "height" => 258, "publisher" => "",],
            ["title" => "Justice League: The Villain's Journey", "author" => "", "genre" => "fiction", "sub_genre" => "comic", "height" => 258, "publisher" => "",],
            ["title" => "Death of Superman, The", "author" => "", "genre" => "fiction", "sub_genre" => "comic", "height" => 258, "publisher" => "",],
            ["title" => "History of the DC Universe", "author" => "", "genre" => "fiction", "sub_genre" => "comic", "height" => 258, "publisher" => "",],
            ["title" => "Batman: The Long Halloween", "author" => "", "genre" => "fiction", "sub_genre" => "comic", "height" => 258, "publisher" => "",],
            ["title" => "Life in Letters, A", "author" => "Steinbeck, John", "genre" => "non-fiction", "sub_genre" => "autobiography", "height" => 196, "publisher" => "",],
            ["title" => "Information, The", "author" => "Gleick, James", "genre" => "science", "sub_genre" => "mathematics", "height" => 233, "publisher" => "",],
            ["title" => "Journal of Economics, vol 106 No 3", "author" => "", "genre" => "science", "sub_genre" => "economics", "height" => 235, "publisher" => "",],
            ["title" => "Elements of Information Theory", "author" => "Thomas, Joy", "genre" => "technology", "sub_genre" => "signal processing", "height" => 229, "publisher" => "",],
            ["title" => "Power Electronics - Rashid", "author" => "Rashid, Muhammad", "genre" => "technology", "sub_genre" => "computer science", "height" => 235, "publisher" => "",],
            ["title" => "Power Electronics - Mohan", "author" => "Mohan, Ned", "genre" => "technology", "sub_genre" => "computer science", "height" => 237, "publisher" => "",],
            ["title" => "Neural Networks", "author" => "Haykin, Simon", "genre" => "technology", "sub_genre" => "data science", "height" => 240, "publisher" => "",],
            ["title" => "Grapes of Wrath, The", "author" => "Steinbeck, John", "genre" => "fiction", "sub_genre" => "classic", "height" => 196, "publisher" => "",],
            ["title" => "Vyakti ani Valli", "author" => "Desh Pande, P L", "genre" => "non-fiction", "sub_genre" => "misc", "height" => 211, "publisher" => "",],
            ["title" => "Statistical Learning Theory", "author" => "Vapnik, Vladimir", "genre" => "technology", "sub_genre" => "data science", "height" => 228, "publisher" => "",],
            ["title" => "Empire of the Mughal - The Tainted Throne", "author" => "Rutherford, Alex", "genre" => "non-fiction", "sub_genre" => "history", "height" => 180, "publisher" => "",],
            ["title" => "Empire of the Mughal - Brothers at War", "author" => "Rutherford, Alex", "genre" => "non-fiction", "sub_genre" => "history", "height" => 180, "publisher" => "",],
            ["title" => "Empire of the Mughal - Ruler of the World", "author" => "Rutherford, Alex", "genre" => "non-fiction", "sub_genre" => "history", "height" => 180, "publisher" => "",],
            ["title" => "Empire of the Mughal - The Serpent's Tooth", "author" => "Rutherford, Alex", "genre" => "non-fiction", "sub_genre" => "history", "height" => 180, "publisher" => "",],
            ["title" => "Empire of the Mughal - Raiders from the North", "author" => "Rutherford, Alex", "genre" => "non-fiction", "sub_genre" => "history", "height" => 180, "publisher" => "",],
            ["title" => "Mossad", "author" => "Baz-Zohar, Michael", "genre" => "non-fiction", "sub_genre" => "history", "height" => 236, "publisher" => "",],
            ["title" => "Jim Corbett Omnibus", "author" => "Corbett, Jim", "genre" => "non-fiction", "sub_genre" => "history", "height" => 223, "publisher" => "",],
            ["title" => "20000 Leagues Under the Sea", "author" => "Verne, Jules", "genre" => "fiction", "sub_genre" => "novel", "height" => 190, "publisher" => "",],
            ["title" => "Batatyachi Chal", "author" => "Desh Pande P L", "genre" => "fiction", "sub_genre" => "novel", "height" => 200, "publisher" => "",],
            ["title" => "Hafasavnuk", "author" => "Desh Pande P L", "genre" => "fiction", "sub_genre" => "novel", "height" => 211, "publisher" => "",],
            ["title" => "Urlasurla", "author" => "Desh Pande P L", "genre" => "fiction", "sub_genre" => "novel", "height" => 211, "publisher" => "",],
            ["title" => "Pointers in C", "author" => "Kanetkar, Yashwant", "genre" => "technology", "sub_genre" => "computer science", "height" => 213, "publisher" => "",],
            ["title" => "Cathedral and the Bazaar, The", "author" => "Raymond, Eric", "genre" => "technology", "sub_genre" => "computer science", "height" => 217, "publisher" => "",],
            ["title" => "Design with OpAmps", "author" => "Franco, Sergio", "genre" => "technology", "sub_genre" => "computer science", "height" => 240, "publisher" => "",],
            ["title" => "Think Complexity", "author" => "Downey, Allen", "genre" => "technology", "sub_genre" => "data science", "height" => 230, "publisher" => "",],
            ["title" => "Devil's Advocate, The", "author" => "West, Morris", "genre" => "fiction", "sub_genre" => "novel", "height" => 178, "publisher" => "",],
            ["title" => "Ayn Rand Answers", "author" => "Rand, Ayn", "genre" => "philosophy", "sub_genre" => "objectivism", "height" => 203, "publisher" => "",],
            ["title" => "Philosophy: Who Needs It", "author" => "Rand, Ayn", "genre" => "philosophy", "sub_genre" => "objectivism", "height" => 171, "publisher" => "",],
            ["title" => "World's Great Thinkers, The", "author" => "", "genre" => "science", "sub_genre" => "physics", "height" => 189, "publisher" => "",],
            ["title" => "Data Analysis with Open Source Tools", "author" => "Janert, Phillip", "genre" => "technology", "sub_genre" => "data science", "height" => 230, "publisher" => "",],
            ["title" => "Broca's Brain", "author" => "Sagan, Carl", "genre" => "science", "sub_genre" => "physics", "height" => 174, "publisher" => "",],
            ["title" => "Men of Mathematics", "author" => "Bell, E T", "genre" => "science", "sub_genre" => "mathematics", "height" => 217, "publisher" => "",],
            ["title" => "Oxford book of Modern Science Writing", "author" => "Dawkins, Richard", "genre" => "science", "sub_genre" => "science", "height" => 240, "publisher" => "",],
            ["title" => "Justice, Judiciary and Democracy", "author" => "Ranjan, Sudhanshu", "genre" => "non-fiction", "sub_genre" => "legal", "height" => 224, "publisher" => "",],
            ["title" => "Arthashastra, The", "author" => "Kautiyla    ", "genre" => "philosophy", "sub_genre" => "philosophy", "height" => 214, "publisher" => "",],
            ["title" => "We the People", "author" => ",Palkhivala", "genre" => "philosophy", "sub_genre" => "philosophy", "height" => 216, "publisher" => "",],
            ["title" => "We the Nation", "author" => ",Palkhivala", "genre" => "philosophy", "sub_genre" => "philosophy", "height" => 216, "publisher" => "",],
            ["title" => "Courtroom Genius, The", "author" => "Sorabjee   ", "genre" => "non-fiction", "sub_genre" => "autobiography", "height" => 217, "publisher" => "",],
            ["title" => "Dongri to Dubai", "author" => "Zaidi, Hussain", "genre" => "non-fiction", "sub_genre" => "history", "height" => 216, "publisher" => "",],
            ["title" => "History of England, Foundation", "author" => "Ackroyd, Peter", "genre" => "non-fiction", "sub_genre" => "history", "height" => 197, "publisher" => "",],
            ["title" => "City of Djinns", "author" => "Dalrymple, William", "genre" => "non-fiction", "sub_genre" => "history", "height" => 198, "publisher" => "",],
            ["title" => "India's Legal System", "author" => "Nariman", "genre" => "non-fiction", "sub_genre" => "legal", "height" => 177, "publisher" => "",],
            ["title" => "More Tears to Cry", "author" => "Sassoon, Jean", "genre" => "fiction", "sub_genre" => "novel", "height" => 235, "publisher" => "",],
            ["title" => "Ropemaker, The", "author" => "Dickinson, Peter", "genre" => "fiction", "sub_genre" => "novel", "height" => 196, "publisher" => "",],
            ["title" => "Angels & Demons", "author" => "Brown, Dan", "genre" => "fiction", "sub_genre" => "novel", "height" => 170, "publisher" => "",],
            ["title" => "Judge, The", "author" => "", "genre" => "fiction", "sub_genre" => "novel", "height" => 170, "publisher" => "",],
            ["title" => "Attorney, The", "author" => "", "genre" => "fiction", "sub_genre" => "novel", "height" => 170, "publisher" => "",],
            ["title" => "Prince, The", "author" => "Machiavelli", "genre" => "fiction", "sub_genre" => "classic", "height" => 173, "publisher" => "",],
            ["title" => "Eyeless in Gaza", "author" => "Huxley, Aldous", "genre" => "fiction", "sub_genre" => "novel", "height" => 180, "publisher" => "",],
            ["title" => "Tales of Beedle the Bard", "author" => "Rowling, J K", "genre" => "fiction", "sub_genre" => "novel", "height" => 184, "publisher" => "",],
            ["title" => "Girl with the Dragon Tattoo", "author" => "Larsson, Steig", "genre" => "fiction", "sub_genre" => "novel", "height" => 179, "publisher" => "",],
            ["title" => "Girl who kicked the Hornet's Nest", "author" => "Larsson, Steig", "genre" => "fiction", "sub_genre" => "novel", "height" => 179, "publisher" => "",],
            ["title" => "Girl who played with Fire", "author" => "Larsson, Steig", "genre" => "fiction", "sub_genre" => "novel", "height" => 179, "publisher" => "",],
            ["title" => "Batman Handbook", "author" => "", "genre" => "fiction", "sub_genre" => "comic", "height" => 270, "publisher" => "",],
            ["title" => "Murphy's Law", "author" => "", "genre" => "philosophy", "sub_genre" => "psychology", "height" => 178, "publisher" => "",],
            ["title" => "Structure and Randomness", "author" => "Tao, Terence", "genre" => "science", "sub_genre" => "mathematics", "height" => 252, "publisher" => "",],
            ["title" => "Image Processing with MATLAB", "author" => "Eddins, Steve", "genre" => "technology", "sub_genre" => "signal processing", "height" => 241, "publisher" => "",],
            ["title" => "Animal Farm", "author" => "Orwell, George", "genre" => "fiction", "sub_genre" => "classic", "height" => 180, "publisher" => "",],
            ["title" => "Idiot, The", "author" => "Dostoevsky, Fyodor", "genre" => "fiction", "sub_genre" => "classic", "height" => 197, "publisher" => "",],
            ["title" => "Christmas Carol, A", "author" => "Dickens, Charles", "genre" => "fiction", "sub_genre" => "classic", "height" => 196, "publisher" => "",],
        ];


        $countItems = count($seedBooks);

        $output = new ConsoleOutput();
        $progressBar = new ProgressBar($output, $countItems);

        $this->command->getOutput()->writeln("<info>Seeding with {$countItems} Books.");

        foreach ($seedBooks as $book) {
            # check if author exists, if not, add new author
            $author = $book['author'];
            $authorGiven = null;
            $authorFamily = $author;
            if ($comma = mb_strpos($author, ",")) {
                $authorGiven = trim(mb_substr($author, 0, $comma));
                $authorFamily =trim(mb_substr($author, $comma + 1, mb_strlen($author)));
            }

            $author = Author::whereGivenName($authorGiven)->whereFamilyName($authorFamily)->first();
            if (is_null($author)) {
                $newAuthor = [
                    "given_name" => $authorGiven,
                    "family_name" => $authorFamily,
                ];
                $author = Author::create($newAuthor);
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

            # Link the author to the book
            $theBook->authors()->attach($author);

            $progressBar->advance();
        }
        $progressBar->finish();
        $this->command->getOutput()->writeln("");

    }

}
