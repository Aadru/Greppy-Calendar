## Greppy Callendar

### Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. 

### Prerequisites

What things you need to install the software.

```
- PHP 7
- Laravel 6
- XAMPP Control Panel v3.2.2
- Any MySql administrator software
- Any IDE for PHP(eg. Visual Studio Code)
- A Postman account
```
### Setup

```
 1. Open XAMPP and start Apache and MySQL.
 2. Open your MySql administrator software and create a new database called "greppy".
 3. Open project location into Command Prompt and run `php artisan migrate` in order to migrate the database tables. 
 4. Than run 'php artisan passport:install' to create token keys for security.
 5. Than run 'php artisan serve' to start the server.
 6. From here you have to use Postman to access the endpoints of the API
 7. In order to acces the endpoints you need to register and authenticate first also via Postman.
 8. The register URL is http://127.0.0.1:8000/api/register .
 9. The authentication URL is http://127.0.0.1:8000/api/login .
 10. After authentication use the token provided in the suscces message and use it as value for 'Authentication' key in the Headers tab next to Authorization tab. Also you need a second key value pair 'Accept' with 'aplication/json' .
 11. From here you can go through all the endpoints.

```
