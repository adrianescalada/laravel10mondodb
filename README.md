
<h1 align="center">External API integration, search engine with Laravel 10, MongoDb and Docker.</h1>

###  :heavy_check_mark:	Requirements

- PHP 8.1 or higher;
- Extensions:
- PDO-Mysql PHP extension 
- docker-php-ext-enable extension
- mongodb enabled extension
- Also install mongo compass at the following url https://www.mongodb.com/try/download/compass

### :heavy_check_mark:	Docker

- <code>docker compose build</code>
- <code>docker compose up -d</code>

### :heavy_check_mark:	Facilities

1. <code>php artisan key:generate</code>
2. <code>php artisan migrate</code>
3. <code>php artisan update:characters</code> (Allows you to migrate character content to a local database)
4- <code>php artisan test</code>

### :heavy_check_mark:	 Laravel 10 + mongoDb

- Integration with docker and mongoDB

- Personal migration script connecting to the api https://hp-api.onrender.com with command: 

<code>php artisan update:characters</code>

- Search engine with criteria pattern

- Main page

### :hammer: Project Features

- Character search engine by name and by house. They can be searches
of one character or several at a time but you can only search for 1 house at a time.
- As a result, the image of the character and basic data will be displayed
(Name, Age, Sex, and the house to which it belongs)
- A counter with the total results
- If there are more than 10 results the result will be paginated
- Character page
- If you click on a character on the home page you will access the page
of the character where the rest of the character information will be displayed.
provides us with the API.

### :yarn: Used technology. 
####Built With:

* [![Docker][Docker.com]][Docker-url]
* [![Laravel10][Laravel.com]][Laravel-url]
* [![MongoDb][MongoDb.com]][MongoDb-url]
* [![Bootstrap][Bootstrap.com]][Bootstrap-url]
* [![JQuery][JQuery.com]][JQuery-url]


![Buscador con laravel y mongo](/capture.png)
![Buscador con laravel y mongo](/capture_show.png)
![Buscador con laravel y mongo](/mondobd.png)





