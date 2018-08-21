`Installation`

Before anything, you need to make sure you have Docker properly setup in your environment. For that, refer to the official documentation for both Docker(https://docs.docker.com/) and Docker Compose(https://docs.docker.com/compose/). 

You need to also make sure you have Installed composer in your environment.

Clone this project into the local directory structure

`git clone https://github.com/idesai1210/bluestarsports-roster-bots.git <new-directory-name>`

Cd into the directory. and cd into the directory 'rosterbots'

`cd <new-directory-name>`

`cd rosterbots`

Run composer to get all the dependencies up and running using the following command:

`composer install`

Run tests using phpUnit using the following command:

`composer test`

Build and run the containers:

`docker-compose up -d`

Next we’ll need to set the application key :

`docker-compose exec -T app php artisan key:generate`

This application will be accessed by port 8000.

To run the application go to: 127.0.0.1:8000
