## Masterlease - recruitment task

### How to start?
To run the project you need to have docker installed, 

- git clone - Clone the repository (if you are using Windows, clone the repository into the WSL2 filesystem)
- Run the command
```
    docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php83-composer:latest \
    composer install --ignore-platform-reqs
```
- Run the command
```
    ./vendor/bin/sail up
```
- You are all set :) Server is running on localhost:80

## Endpoints
All endpoints parameters have to be passed either as query parameters (ex. /test?param=value&secondParam=value) or as JSON in the request body.

- POST /api/register 

parameters: name, email, password

returns: message

HTTP status codes: 201 - created, 409 - conflict, 500 - internal server error

- POST /api/login

parameters: email, password

returns: token (Bearer)

HTTP status codes: 200 - ok, 401 - unauthorized

- GET /api/multiply

parameters: size

returns: array of arrays (of a multiplication table)

HTTP status codes: 200 - ok, 401 - unauthorized, 422 - unprocessable content
