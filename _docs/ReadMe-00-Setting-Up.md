# Books, Authors and a Library to Go!

Steps to set up this application from scratch (as in build it yourself).


## Getting the Terminal Set Up

Open Windows Terminal (or iTerm on the Mac).

Split into three sections, or open two more windows, or tabs.

In each window/section/tab repeat these steps:

- change into the `/mnt/c/Users/YOURUSERNAME` folder
- change into your `source` - `repos` folder (remember that Linux is case-sensitive)
- change into your SaaS folder as required

These are the commands that Adrian would use in room 3-06, running WSL2 and Windows Terminal accessing an Ubuntu
installation:

```shell
cd /mnt/c/Users/GouldA
cd Source/Repos
cd DipIT-SaaS
```

When using a Mac, Adrian would use the steps shown here:

```shell
cd ~
cd Source/Repos
cd DipIT-SaaS
```

> ### Aside: No Source Repos Folder?
> If you do not have a Source/Repos/DipIT-SaaS folder in your user's home folder, then you should create it using:
>
> WSL:
> ```shell
> cd /mnt/c/Users/YOURUSERNAME
> mkdir -p Source/Repos/DipIT-SaaS
> cd Source/Repos/DipIT-SaaS
> ```
>
> MacOS:
> ```shell
> cd ~
> mkdir -p Source/Repos/DipIT-SaaS
> cd Source/Repos/DipIT-SaaS
> ```

If your SaaS repository folder is in a different location, you will need to adjust your commands. For example, if you store
your files on an external, or secondary drive then the drive letter will change from `c` to `d` or similar.

Likewise, if you are not using a Source/Repos folder structure, you will need to adjust as required.

## Creating the base application code

In first window, run the following command

```shell
curl -s https://laravel.build/library?with=mariadb,redis,memcached,meilisearch,selenium,minio,mailhog | bash
```

In all three windows run the command:

```shell
cd library
```

In first window run:

```shell
sail up
```

Once the sail up command shows similar to this:

```text
library-laravel.test-1  |
library-laravel.test-1  |    INFO  Server running on [http://0.0.0.0:80].
library-laravel.test-1  |
library-laravel.test-1  |   Press Ctrl+C to stop the server
library-laravel.test-1  |
```

Then, switch to the second window, and run the following commands:

```shell
sail npm install
sail composer require laravel/breeze
sail artisan breeze:install
sail npm install
sail npm run dev
```

Switch to the third window, and run the following commands:

```shell
sail artisan make:model Book -ars
sail artisan make:model Author -ars
sail artisan make:model AuthorBook -m
```

> ### Important:
>
> Remember that Models are SINGULAR names, whereas the table names are pluralised.
> For example, the `Author` model will have a table named `authors`.
>
> **Never** pluralise the Model name.

## Migrations and Models

> ‼ **IMPORTANT** ‼
> 
> Ensure you verify the most up-to-date version of the 
> database structure shown in the ERD in the document 
> [ReadMe-00-Library-ER.md](ReadMe-00-Library-ER.md) and update any 
> data structures as required.

Edit the migrations, and models for the Author, Book and Author Book tables.

Edit the books migration to contain the fields as shown:

```php
Schema::create('books', function (Blueprint $table) {
    $table->id();
    $table->string('title')->required();
    $table->string('subtitle')->nullable();
    $table->smallInteger('year_published')->zerofill()->nullable();
    $table->integer('edition')->nullable();
    $table->string('isbn_10',10)->nullable();
    $table->string('isbn_13',13)->nullable();
    $table->timestamps();
});
```

The Book model class will contain these additional lines:

```php
protected $fillable = [
    'title',
    'subtitle',
    'year_published',
    'edition',
    'isbn_10',
    'isbn_13',
];

public function authors(){
    return $this->hasMany(Author::class);
}
```

The Author model class will contain these additional lines:

```php
protected $fillable = [
    'given_name',
    'family_name',
    'is_company',
];

public function books() {
    return $this->hasMany(Books::class);
}
```

The Authors migration requires:

```php
Schema::create('authors', function (Blueprint $table) {
    $table->id();
    $table->string('given_name')->nullable();
    $table->string('family_name')->nullable();
    $table->boolean('is_company')->default(false);
    $table->timestamps();
});
```

The Author Books migration requires:

```php
Schema::create('author_books', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('author_id')->default(1);
    $table->unsignedBigInteger('book_id')->default(1);
    $table->timestamps();
});
```

We do not need to add anything to the Model for the Author Books.

Run these migrations to verify code is correct.

```shell
sail artisan migrate:fresh --step --seed
```

## Seeders

We will use some defined seed data to allow for easier testing.

Normally, we would perform the seeding in this order:

- Authors
- Books
- Author Books

This is because the Author is the highest priority for this data, followed by books, and then 
the Author-Books model that joins these two tables.

We will create a few authors without books, including an UNKNOWN author and corporate author, 
to act as a placeholder/error if needed.

Open the database/seeders/AuthorSeeder.php file and add the following to the `run` method:

```php
        $seedAuthors = [
            [ 'given_name' => 'UNKNOWN', 'family_name' => 'AUTHOR',
              'is_company' => False, ],
            [ 'given_name' => 'UNKNOWN', 'family_name' => 'CORPORATE AUTHOR',
              'is_company' => True,  ],
            [ 'given_name' => 'Kevin',   'family_name' => 'Yank',
              'is_company' => False, ],
            [ 'given_name' => 'Mark',    'family_name' => 'Boulton',
              'is_company' => False, ],
            [ 'given_name' => 'Robert',  'family_name' => 'Hoekman, jr.',
              'is_company' => False, ],
            [ 'given_name' => 'Luke',    'family_name' => 'Wroblewski',
              'is_company' => False, ],
            [ 'given_name' => 'Kevin',   'family_name' => 'Potts',
              'is_company' => False, ],
        ];

        foreach ($seedAuthors as $seedAuthor) {
            Author::create($seedAuthor);
        }

```

Now we are going to construct the BNook seeding, but this time we are
going to employ a bit of trickery by listing our books with all the 
required data, and then going through each book, adding missing authors 
and then books as needed, plus finally linking the book to the author 
via Laravel's attach method.

We do this, starting with an Unknown book.

```php
       $unknownBook = [
            'title' => 'UNKNOWN TITLE',
            'subtitle' => null,
            'year_published' => null,
            'edition' => null,
            'isbn_10' => null,
            'isbn_13' => null,
        ];

        Book::create($unknownBook);
```

Now we add the actual seed books, and in this example we are giving just _**one**_ book.

```php
        $seedBooks = [
            ["title" => "Fundamentals of Wavelets", 
            "author" => "Goswami, Jaideva", 
            "genre" => "tech",  
            "sub_genre" => "signal processing", 
            "height" => 228, 
            "publisher" => "Wiley",
            ],
        ];
```

Next we run through the books in the `$seedBooks` array, one at a time:

```php
foreach ($seedBooks as $book) {
   /* Get the author from the book data and extract the author's family
      name (using the whole author field as a precaution), so if the 
      author is empty or the author has just one name, then we are able
      to deal with the situation and add the required information. */
   $author = $book['author'];
   $authorGiven = null;
   $authorFamily = $author;
   if ($comma = mb_strpos($author, ",")) {
       $authorGiven = mb_substr($author, 0, $comma);
       $authorFamily = mb_substr($author, $comma + 1, mb_strlen($author));
   }
   
   /* Now search the authors table to see if the author exists */
   $author = Author::whereGivenName($authorGiven)->whereFamilyName($authorFamily)->first();
   
   /* if the author not found, then create a new author and create! */
   if (is_null($author)) {
       $newAuthor = [
           "given_name" => $authorGiven,
           "family_name" => $authorFamily,
       ];
       $author = Author::create($newAuthor);
   }
   
   #create book record
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
   
   /* attach the book to the author */
   $theBook->authors()->attach($author);
}

```

Full copy of the code is shown in [/database/seeders/BookSeeder.php](/database/seeders/BookSeeder.php).

Finally, we add the Author and Book seeders to the DatabaseSeeder.

```php
$this->call([
   AuthorSeeder::class,
   BookSeeder::class,
]);
```

## Done!

We have created our tables and our sample data ready to create the API.
