# Making an API 0 - Introduction

This set of tutorials is on how to create an API using
Laravel (v9 or later) and Postman (for testing).

You will also add a plugin to document your API dynamically.

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

## Required Resources

We are presuming you are using:

- Docker Desktop
- Windows Terminal (or iTerm on Mac)
- Windows Subsystem for Linux v2 (WSL2)
- Ubuntu Linux on WSL2

All code will use PHP 8.1 or later.

## Links

Links to useful resources on Docker, Laravel, 



# Terminology

Before we start on the process, let's get the obligatory terminology out of the way...


| Term              | Definition                                                                                                              |
| ----------------- | ----------------------------------------------------------------------------------------------------------------------- |
| API               | Application Programming Interface                                                                                       |
| REST              | **Re**presentational **S**tate **T**ransfer                                                                             |
| Endpoint          | This is the "URI" that is used to make a call to an API                                                                 |
| aRoute            | How an API endpoint request is directed to the relevant controller method                                               |
| Resourceful Route | A resourceful route automatically determines the controller and method to use based on the conventions of the framework |
| JSON              | JavaScript Object Notation                                                                                              |
| XML               | eXtensible Markup Language                                                                                              |
| SOAP              | Simple Object Access Protocol                                                                                           |

## REST and JSON

As we are creating a **REST**ful **API**, we will be returning **JSON**
based results to any request, as against a **SOAP** based API which
communicates via **XML**.

# HTTP Response Codes

One part of an API is the response it gives to a request, be that for a
`GET`, `POST`, `DELETE`, `PUT` or `PATCH`.

The commonly used REST specific codes are shown below:

| Code Number | Meaning                | Commonly Used |
| ----------- | ---------------------- |---------------|
| `200`       | Ok                     | Y             |
| `201`       | Created                | Y             |
| `202`       | Accepted               |               |
| `204`       | No content             |               |
| `301`       | Moved Permanently      |               |
| `302`       | Found                  | Y             |
| `303`       | See Other              |               |
| `304`       | Not Modified           | Y             |
| `307`       | Temporary Redirect     |               |
| `400`       | Bad Request            | Y             |
| `401`       | Unauthorised           | Y             |
| `403`       | Forbidden              | Y             |
| `404`       | Not Found              | Y             |
| `405`       | Method Not Allowed     |               |
| `406`       | Not Acceptable         |               |
| `412`       | Precondition Failed    |               |
| `415`       | Unsupported Media Type |               |
| `500`       | Internal Server Error  |               |
| `501`       | Not Implemented        |               |

The "Use?" column is an indication of commonly used codes.

More details may be found at:

- [REST API Tutorial - HTTP Status Codes](https://restfulapi.net/http-status-codes/).

