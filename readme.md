<p align="center"><img src="https://github.com/austintoddj/laravel-zoom/blob/master/resources/assets/admin/img/laravel-zoom.svg" height="46"></p>

<p align="center">
<a href="https://travis-ci.org/austintoddj/laravel-zoom"><img src="https://travis-ci.org/austintoddj/laravel-zoom.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/austintoddj/laravel-zoom"><img src="https://poser.pugx.org/austintoddj/laravel-zoom/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/austintoddj/laravel-zoom"><img src="https://poser.pugx.org/austintoddj/laravel-zoom/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/austintoddj/laravel-zoom"><img src="https://poser.pugx.org/austintoddj/laravel-zoom/license.svg" alt="License"></a>
</p>

## Introduction

Laravel Zoom is a boilerplate meant to standardize much of the setup that almost every web application needs. Reclaim your first few hours of development on every new project by allowing Laravel Zoom to give you a little speed boost.

## Features

Laravel Zoom is built on [Laravel 5.5](https://github.com/laravel/framework) and includes the necessary features built into most modern-day web applications, such as:

* [PHP Secure Headers](https://github.com/BePsvPT/secure-headers)
* [Laravel Debugbar](https://github.com/barryvdh/laravel-debugbar)
* [Laravel IDE Helper](https://github.com/barryvdh/laravel-ide-helper)
* [Activity Log](https://docs.spatie.be/laravel-activitylog/v1/introduction)
* [User Authentication & Registration](https://laravel.com/docs/5.5/authentication#authentication-quickstart)

## Installation

Laravel Zoom utilizes [Composer](https://getcomposer.org/) to manage its dependencies. So, before using Laravel Zoom, make sure you have Composer installed on your machine.

Install Laravel Zoom by issuing the Composer `create-project` command in your terminal:

```sh
composer create-project --prefer-dist austintoddj/laravel-zoom site
```

## Configuration

Use Laravel Zoom to cater to your specific requirements on the application you're building. Follow the steps below to  configure the base framework and included packages.

### Environment

Since you downloaded Laravel Zoom via Composer, an `.env` file will already have been generated for you. Use it to set some basic application variables.

### Registration

Not every application will require users to register. You can toggle this feature by setting `APP_REGISTRATION` to either `true` or `false` in your `.env`  file.

### PHP Secure Headers

Setting secure headers can be done by modifying `config/secure-headers.php` to fit your needs. Read more from the [official documentation](https://github.com/BePsvPT/secure-headers).

### Activity Log

When you run `php artisan migrate` for the first time, an `activity_log` table will be created for you. Read more from the [official documentation](https://docs.spatie.be/laravel-activitylog/v1/introduction) on basic or advanced usage.

### Resources

Laravel Zoom includes [Bootstrap 4](https://v4-alpha.getbootstrap.com) but does not use a JavaScript framework. The `resources/assets/sass`, `resources/assets/js` and `resources/assets/img` directories are self-explanatory and can be customized to fit your needs. [Laravel Mix](https://laravel.com/docs/5.5/mix) has been included in `package.json`, so all you need to do is run the following commands to compile your assets:

```sh
yarn && yarn dev
```

## License

Laravel Zoom is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
