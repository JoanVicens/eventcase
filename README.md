# Eventcase Techical Test

The goal is to creat a DVD rental website.

Summarizing, the user has to be able to:
* See a list of all avaliable movies with it's title, it's launch year and the avaliable copies.
* Rent a movie by adding some personal info.

## Tech stack

### Aplication
Since I have no prior experience with Symfony or any other php framework I sticked to php vanilla. However I used [Simple php Router](https://github.com/skipperbent/simple-php-router) to manage the "entry points" of the app. [PHPUnit](https://phpunit.de/) and [Faker](https://fakerphp.github.io/) to automatizate the tests. And mysqli, pdo and pdo_mysql to connect to the database (see [Dockerfile](./docker/php/Dockerfile)) and prepare sql queries.

To manage those dependecies I have used composer. As you will see in the [docker-compse file](./docker-compose.yml) I have created 2 services to manage the depencies. One for installing and the other to updating, I have done this simply because I haven't find a better way doing an update.

### Database
For the database I have used MySQL as the enunciate indicated and adminer to manage it.

As for the Migrations and Fixtures as I was totally unawared of those conceps I used an initalization file that will create the sql structure and will populate the tables with some information. Also, for convenience it also resets the entries every time the aplication is runned.

---

All those services are managed via Docker and Docker Compose.


## How to use it

To run de server the only thing needed is git and docker.

1. Clone this repo:
    ``` bash
    git clone https://github.com/JoanVicens/eventcase
    ```

2. Build all needed Dockerfiles:
    ``` bash
    docker-compose build
    ```

3. Run the application:
    ``` bash
    docker-compose up
    ```

With this 3 steps the aplication shoud be ready to check on your local machine. To do that go visit your [localhost/movies](http://localhost/movies).

Note that the root route localhost/ is going to display an error due that there is where the landing page would be and that was out of the escope of the test.

# How to run the test

In order to run the test we will need to acces the php aplication container, to do that:

``` bash
docker exec -it php_server bash
clear && ./app/vendor/bin/phpunit ./app/src/test/
```

> :pushpin: **NOTE**: Since this project has no future and there will not have any real sensitive data, the .env file has not been ignored