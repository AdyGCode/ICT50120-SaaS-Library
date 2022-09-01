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
> Never pluralise the Model name.

## Migrations and Models

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

Seeding will be performed in this order:
- Authors
- Books
- Author Books

Author Seeder


Book Seeder


Author Book Seeder

