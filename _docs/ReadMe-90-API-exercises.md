# Exercises

So far you have practiced the creation of API endpoints for the books.

In this section you will be continuing your practice. There will also be
references to parts 7 and 8 of this series. When we do, you will be, at
first, expected to follow the section through then return to these
exercises.

## Tutorial Index

- [Introduction](ReadMe-10-API-introduction.md)  🔗
- [Index and Show](ReadMe-11-API-index-show.md)  🔗
- [Create](ReadMe-12-API-create.md)  🔗
- [Update](ReadMe-13-API-update.md)  🔗
- [Delete](ReadMe-14-API-delete.md)  🔗
- [Documenting API](ReadMe-15-API-documenting.md)  🔗
- [Exercises](ReadMe-90-API-exercises.md)  🔗
- [Pagination](ReadMe-16-API-pagination.md)  🔗
- [Authentication](ReadMe-20-API-authentication.md)  🔗

---

These exercises are divided into sections. The idea is to create the features of the project step by step.

## Books, Authors, Publishers and More

The relationships between the three tables, Books, Authors and Publishers is shown in the ER Diagram below.

Some key points to note from it are:
- An author may have many books
- A book belongs to many authors
- A book belongs to a publisher
- A publisher has many books

Due to the many authors to many books we needed to create a 'pivot' table.

This is the author-books table.

> ‼ **IMPORTANT** ‼
>
> Ensure you verify the most up-to-date version of the
> database structure shown in the ERD in the document
> [ReadMe-00-Library-ER.md](ReadMe-00-Library-ER.md) and update any
> data structures as required.

# Exercises

Complete each of these exercises. They are split into each of
the BREAD/CRUD actions.

---
# 1 Book Exercises

## Exercise 1-01: Create skeleton for Books API

- Create the resourceful controller skeleton for the Books API
- Create the resourceful route for the Books API

> Remember that the Books API will be `API/BooksAPIController`

## Exercise 1-02: Create Books Index API method

- Edit the API/BooksAPIController and have the index method return
  **all the books**
- Do a "brute force" Test using (`http://localhost/api/books`)[http://localhost/api/books]
- Create a Postman request to test using same URI

## Exercise 1-03: Create Show One Book API endpoint

- Edit the BooksAPIController and the show method for the Books API
- Make the methods return a single book given the `id` for the book
- Brute force test using (`http://localhost/api/books/45`)[http://localhost/api/books/45]
- Create a Postman request to test for an existing book
- Create a Postman request to test for a non-existent book

## Exercise 1-04: Add suitable error results

- Update your Book Index and Show methods to ensure they have suitable
  error results
- Update the Author index to also respond with a suitable error (when
  no authors in database)

---
### Exercise 1-05: Create the Books API create endpoint

- Add the `create` method to `BooksAPIController.php`.
- Make sure you verify all the required data is submitted.
- If the data is not submitted, it will return HTML for the time being,
  this is ok, until we look at error responses in a later stage.
- Store the new book in the database.

### Exercise 1-06: Test the create method

- Create a suitable test in Postman to verify that you create a record
  using the API only.
- Create a test to check that missing data provides the expected error
  messages in response.

### Exercise 1-07: Add the Book-Author relationship

- Update the book create API endpoint so that when a book is added,
  its author is linked via the author-book model.
- The Author is passed as TWO text fields (family name(s) or corporate
  name, and an optional, null if omitted, given name(s)).
- Using these two fields, check the author exists (if so use that id)
- If not create the author first, then use the new ID as the id.
- Refer to the seeders for help on this one.


### Exercise 1-08: Test the updated create method

- Create a suitable test in Postman to verify that you create a
  record (and link the associated author) using the API only.

### Exercise 1-09: Add multiple authors to a book

- When submitting the author details, allow for an 'array of
  authors' (with family name(s) or corporate name, and an
  optional, null if omitted, given name(s) for each author)
- Use this to add multiple authors, in a similar way to the previous problem.


### Exercise 1-10: Modify Author Create Request

Four improvements to be done with the author's create request:

- Update the author create so that if the author already exists then
  the author is returned.
- Ensure a suitable error message is given.
- Provide a suitable response code of 202 to represent the author was
  accepted but not created.
- If the author's given name is provided, and the family name is
  missing, move the given name into the family name.

---
## Exercise 1-11: Create Update Author


## Exercise 1-12: Test Update Author

---
## Exercise 1-13: Create Delete Author


## Exercise 1-14: Test Delete Author



# 2 Publisher Exercises

## Exercise 2-01: Publishers

Create the base requirements for publishers. 

The publisher details to be stored are:

| Field      | Notes                                 |
|------------|---------------------------------------|
| Identifier | Unique identifier for the publisher   |
| Name       | Required, Unique, max 255 characters  |
| City       | Nullable                              |

You will need to create the required stubs for Model, Migration, 
API Controller, Requests, Seeder and Routes for the Publishers.

Use resourceful routes for the publishers.

## Exercise 2-02: Model, Migration and Seed

Complete the code for the Publisher's Model, Migration and Sample Seed data.

Run the migration (fresh) and seeders to check all is ok.

## Exercise 2-03: Retrieve (aka Browse & Read)

Create the `index` method for the publishers, returning the publisher list (index).

Create the `show` method so it returns the requested  publisher.

Create and test these two endpoints using Postman.

## Exercise 2-04: Create (aka Add)

Complete the method for `create` publisher.

Ensure you have suitable validation of the data, and suitable messages for failure/success.

Create and use Postman to test the create method.

## Exercise 2-05: Update (aka Edit)
Complete the method for `update` publisher.

Ensure you have suitable validation of the data, and suitable messages for failure/success.

Create and use Postman to test the update method.

## Exercise 2-06: Delete 

Complete the method to `delete` a publisher.

Ensure you have suitable messages for failure/success.

Create and use Postman to test the delete method.



