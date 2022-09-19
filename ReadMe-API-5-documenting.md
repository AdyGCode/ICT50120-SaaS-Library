# Documenting the API

There are many ways of documenting your API. 

You may do the documentation using any of the following, each will have pros and cons, but in the end the choice is up to 
you, the developer, and, if the API is to be public, the marketing/UX developers.

- [Postman]()
- [Scribe](https://scribe.knuckles.wtf/laravel) - a composer package
- [RapidAPI]()
and more


## Tutorial Index

- [Introduction](ReadMe-API-0-introduction.md)  🔗
- [Index and Show](ReadMe-API-1-index-show.md)  🔗
- [Create](ReadMe-API-2-create.md)  🔗
- [Update](ReadMe-API-3-update.md)  🔗
- [Delete](Readme-API-4-delete.md)  🔗
- [Documenting API](ReadMe-API-5-documenting.md)  🔗
- [Exercises](Readme-API-6-exercises.md)  🔗
- [Pagination](ReadMe-API-7-pagination.md)  🔗
- [Authentication](ReadMe-API-8-authentication.md)  🔗



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
