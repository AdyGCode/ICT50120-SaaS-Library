# Making an API 0 - Introduction

This set of tutorials is on how to create an API using
Laravel (v9 or later) and Postman (for testing).

You will also add a plugin to document your API dynamically.

# The Steps

- [Introduction](ReadMe-API-0-introduction.md)  🔗
- [Index and Show](ReadMe-API-1-index-show.md)  🔗
- [Create](ReadMe-API-2-create.md)  🔗
- [Update](ReadMe-API-3-update.md)  🔗
- [Delete](Readme-API-4-delete.md)  🔗
- [Exercises](Readme-API-5-exercises.md)  🔗
- [Documenting API](ReadMe-API-6-documenting.md)  🔗
- [Pagination](ReadMe-API-7-pagination.md)  🔗
- [Authentication](ReadMe-API-8-authentication.md)  🔗


## Required Resources

We are presuming you are using:
- Docker Desktop
- Windows Terminal (or iTerm on Mac)
- Windows Subsystem for Linux v2 (WSL2)
- Ubuntu Linux on WSL2

All code will use PHP 8.1 or later.


## Before you Begin - Postman for API Testing & Development

Postman is an application that will allow you to design and test APIs.

There are a number of alternatives to Postman, including Paw (Mac).

To use Postman you will need to download and install it from:
- [https://www.postman.com/downloads/](https://www.postman.com/downloads/)

To learn how to use Postman the following videos will be useful:

- [The Basics of Using Postman for API Testing](https://www.youtube.com/watch?v=t5n07Ybz7yI)
- [Postman Beginner Tutorial 2022](https://www.youtube.com/playlist?list=PLhW3qG5bs-L9P22XSnRe4suiWL4acXG-g)

> We recommend you use one or both of these video tutorials to learn the basics of Postman.


# Video Tutorials

The following video tutorials should be used to complement these notes. 
Some should be used to learn how to use a particular method, application 
or system.

There are no guarantees on quality of presentation

## Postman
- [The Basics of Using Postman for API Testing](https://www.youtube.com/watch?v=t5n07Ybz7yI&t=403s)
- [Postman Beginner Tutorial 2022](https://www.youtube.com/playlist?list=PLhW3qG5bs-L9P22XSnRe4suiWL4acXG-g)
- [Learn Postman](https://www.youtube.com/playlist?list=PL6iUkDSEH9SvsgM4zyFrTnaewN65NZHAG) 
- [Laravel 8 REST API With Sanctum Authentication](https://www.youtube.com/watch?v=MT-GJQIY3EU) 
  This tutorial uses Postman in the development process

## APIs
- [APIs for Beginners](https://www.youtube.com/watch?v=GZvSYJDk-us)
- [APIs and SDKs](https://www.youtube.com/watch?v=kG-fLp9BTRo)
- [REST APIs](https://www.youtube.com/watch?v=lsMQRaeKNDk)
- [REST APIs and Examples](https://www.youtube.com/watch?v=7YcW25PHnAA)
- [What Are APIs? - Simply Explained](https://www.youtube.com/watch?v=OVvTv9Hy91Q)

## Laravel & Laravel API Development
- [Laravel API Server Full Course - Beginner to Intermediate](https://www.youtube.com/watch?v=_zNi37BJVBk&t=24271s)
- [Laravel 9 for Beginners - Code with Dary](https://www.youtube.com/playlist?list=PLFHz2csJcgk_mM2jEf7t8P678O_jz83on)
- [Laravel 8 REST API With Sanctum Authentication](https://www.youtube.com/watch?v=MT-GJQIY3EU)


## Docker
For those who want to supplement the basics of docker that we use via Laravel's Sail package, 
the following may prove very useful:
- [Docker Crash Course Tutorial](https://www.youtube.com/playlist?list=PL4cUxeGkcC9hxjeEtdHFNYMtCpjNBm3h7)

## TailwindCSS
Not for this particular tutorial, but help for other tutorials were a back-end admin interface 
is being developed:

- [TailwindCSS Tutorial - The Net Ninja](https://www.youtube.com/playlist?list=PL4cUxeGkcC9gpXORlEHjc5bgnIi5HEGhw)
- [TailwindCSS Tutorial - Code with Dary](https://www.youtube.com/playlist?list=PLFHz2csJcgk8lgiRDB7FdsXVr4xy6jE8K)

# Terminology

Before we start on the process, let's get the obligatory terminology out of the way...

| Term              | Definition                                                                                                               |
|-------------------|--------------------------------------------------------------------------------------------------------------------------|
| API               | Application Programming Interface                                                                                        |
| REST              | **Re**presentational **S**tate **T**ransfer                                                                              |
| Endpoint          | This is the "URI" that is used to make a call to an API                                                                  |
| aRoute            | How an API endpoint request is directed to the relevant controller method                                                |
| Resourceful Route | A resourceful route automatically determines the controller and method to use based on the conventions of the framework  |
| JSON              | JavaScript Object Notation                                                                                               |
| XML               | eXtensible Markup Language                                                                                               |
| SOAP              | Simple Object Access Protocol                                                                                            |

## REST and JSON
As we are creating a **REST**ful **API**, we will be returning **JSON** 
based results to any request, as against a **SOAP** based API which 
communicates via **XML**.

# HTTP Response Codes

One part of an API is the response it gives to a request, be that for a
`GET`, `POST`, `DELETE`, `PUT` or `PATCH`.

The commonly used REST specific codes are shown below:

| Code Number | Meaning                | Use? |
|-------------|------------------------|------|
| `200`       | Ok                     | Y    |
| `201`       | Created                | Y    |
| `202`       | Accepted               |      |
| `204`       | No content             |      |
| `301`       | Moved Permanently      |      |
| `302`       | Found                  | Y    |
| `303`       | See Other              |      |
| `304`       | Not Modified           | Y    |
| `307`       | Temporary Redirect     |      |
| `400`       | Bad Request            | Y    |
| `401`       | Unauthorised           | Y    |
| `403`       | Forbidden              | Y    |
| `404`       | Not Found              | Y    |
| `405`       | Method Not Allowed     |      |
| `406`       | Not Acceptable         |      |
| `412`       | Precondition Failed    |      |
| `415`       | Unsupported Media Type |      |
| `500`       | Internal Server Error  |      |
| `501`       | Not Implemented        |      |

The "Use?" column is an indication of commonly used codes.

More details may be found at:
- [REST API Tutorial - HTTP Status Codes](https://restfulapi.net/http-status-codes/).


