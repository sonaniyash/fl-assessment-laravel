# Technical Assessment - BE

## Dependencies

Before jumping in, you'll want to make sure you have the system requirements met:
- PHP 8.0 - 8.1 ([Installation Guide](https://www.php.net/manual/en/install.php))
- Composer ([Installation Guide](https://getcomposer.org/download/))
- Laravel 9 ([Installation Guide](https://laravel.com/docs/9.x))

## Installation

Clone this repository and run

```bash
composer install
```

Set the `APP_URL` to the URL of the app.
```bash
APP_URL=http://127.0.0.1:8000
```

To run the app go to the app directory and enter the following command in the terminal.
```bash
php artisan migrate
php artisan db:seed
php artisan serve
```

### For Weather API

Add **`WEATHER_ENDPOINT`** in your `.env` file

Add **`WEATHER_KEY`** in your `.env` file

> https://openweathermap.org/api

### To run tests

```bash
php artisan test
```
