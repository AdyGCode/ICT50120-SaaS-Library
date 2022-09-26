# Making an API III - Updating Data

So far we have browsed (index), read (show) and added (create) authors. 
Now we need to look at updating them.


## Tutorial Index

- [Introduction](ReadMe-10-API-introduction.md)  🔗
- [Index and Show](ReadMe-11-API-index-show.md)  🔗
- [Create](ReadMe-12-API-create.md)  🔗
- [Update](ReadMe-13-API-update.md)  🔗
- [Delete](ReadMe-14-API-delete.md)  🔗
- [Documenting API](ReadMe-15-API-documenting.md)  🔗
- [Exercises](ReadMe-30-API-exercises.md)  🔗
- [Pagination](ReadMe-16-API-pagination.md)  🔗
- [Authentication](ReadMe-20-API-authentication.md)  🔗

---

# Author API - Update an Author

Updating an author is very similar to creating an author. The main
steps in the process are:

- retrieve author 
- patch the author data
- save the changes
- report back updated author and success

There are other parts we have not included, but will implement them as we get to the relevant point.

# Update Author API Request

Let's start with the `UpdateAuthorAPIRequest` as it is very similar to the Store version.

To create the request stub we use the command:

```shell
sail artisan make:request UpdateAuthorAPIRequest
```

The code for the Update request is identical (for the time
being) to the Store.

Copy the code over from one to the other, as needed.

## Update Method

Next we can hit the update method in the AuthorAPIController.

This method will do the following:

- validate data being used for update
- attempt to retrieve the author
- set up default response JSON
- if the author exists, then:
  - update the changed parts of the author
  - save the changes
  - update the response JSON
- send the response

### Retrieve Author



### Default Response



### If author exists...


### Send response


