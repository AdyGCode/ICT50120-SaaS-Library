# Documenting the API

There are many ways of documenting your API. 

You may do the documentation using any of the following, each will have pros and cons, but in the end the choice is up to 
you, the developer, and, if the API is to be public, the marketing/UX developers.

- [Postman]()
- [Scribe](https://scribe.knuckles.wtf/laravel) - a composer package
- [RapidAPI]()
and more


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



## Scribe

To install and use Scribe, follow these steps: 

Install the package:
```shell
sail composer require --dev knuckleswtf/scribe
```
Publish the vendor specific configuration and other files:
```sail
php artisan vendor:publish --provider="Knuckles\Scribe\ScribeServiceProvider" --tag=scribe-config
```
This will create a config file for Scribe that we can potentially use to customise its behaviour.

Generate the basic documentation:
```shell
sail artisan scribe:generate
```

Test the publication worked by visiting: `http://localhost/docs`

### Making the Documentation Better

The basic docs do not give much information, and a well documented API is very important.

---
TODO: Finish this section

---


# What's next?

Next it's onto [Pagination](ReadMe-16-API-pagination.md).

Before that though, remember to [complete the exercises](ReadMe-90-API-exercises.md).
