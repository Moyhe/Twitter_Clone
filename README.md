## Twitter Clone

laravel 10 twitter clone with docker, Tailwindcss, livewire, and Alpine js.

<!-- ![My logo](public/images/2023-08-07_03-17.png) -->

## Demo

    comming soon...

## Installation with docker

1.Clone the project

    git clone https://github.com/Moyhe/Twitter_Clone.git

2.Run composer install

Navigate into project folder using terminal and run

    docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs

3.Copy .env.example into .env

    cp .env.example .env

4.Start the project in detached mode

    ./vendor/bin/sail up -d

From now on whenever you want to run artisan command you should do this from the container.
Access to the docker container

    ./vendor/bin/sail shell

5.Set encryption key

    php artisan key:generate --ansi
