# Laravel Single Page Application (SPA) Authentication

[![Latest Version on Packagist](https://img.shields.io/packagist/v/gostavocms/laravel-spa-authentication.svg?style=flat-square)](https://packagist.org/packages/gostavocms/laravel-spa-authentication)
[![Build Status](https://img.shields.io/travis/gostavocms/laravel-spa-authentication/master.svg?style=flat-square)](https://travis-ci.org/gostavocms/laravel-spa-authentication)
[![Quality Score](https://img.shields.io/scrutinizer/g/gostavocms/laravel-spa-authentication.svg?style=flat-square)](https://scrutinizer-ci.com/g/gostavocms/laravel-spa-authentication)
[![Total Downloads](https://img.shields.io/packagist/dt/gostavocms/laravel-spa-authentication.svg?style=flat-square)](https://packagist.org/packages/gostavocms/laravel-spa-authentication)

This package allows you to add authentication in to your Laravel single page application.

## Installation

You can install the package via composer:

``` bash
composer require gostavocms/laravel-spa-authentication
```

The Passport service provider registers its own database migration directory with the framework, so you should migrate your database after installing the package. The Passport migrations will create the tables your application needs to store clients and access tokens:

``` bash
php artisan migrate
```

Next, you should run the passport:install command. This command will create the encryption keys needed to generate secure access tokens. In addition, the command will create "personal access" and "password grant" clients which will be used to generate access tokens:

``` bash
php artisan passport:install
```

## Usage

Login

``` js
axios.post('api/login', {
    email: 'jdoe@gmail.com',
    password: 'password'
})
.then((data) => {
    window.localStorage.removeItem('token');
    window.sessionStorage.removeItem('token');

    if (data.remember) {
        window.localStorage.setItem('token', data.token);
    } else {
        window.sessionStorage.setItem('token', data.token);
    }
})
.catch(({ response }) => {
    // handle the errors.
})
```

Logout

``` js
axios.post('api/logout')
.then((data) => {
    window.localStorage.removeItem('token');
    window.sessionStorage.removeItem('token');
})
.catch(({ response }) => {
    // handle the errors.
})
```

Register

``` js
axios.post('api/register', {
    name: 'John Doe',
    email: 'jdoe@gmail.com',
    password: 'password'
})
.then((data) => {
    window.localStorage.removeItem('token');
    window.sessionStorage.removeItem('token');

    if (data.remember) {
        window.localStorage.setItem('token', data.token);
    } else {
        window.sessionStorage.setItem('token', data.token);
    }
})
.catch(({ response }) => {
    // handle the errors.
})
```

Forgot Password

``` js
axios.post('api/password/email', {
    email: 'jdoe@gmail.com',
})
.then((data) => {
    // handle success
})
.catch(({ response }) => {
    // handle the errors.
})
```

Reset Password

``` js
axios.post('api/password/reset', {
    token: // token from the url reset link,
    email: // email from the url reset link
    password: // new password
    pasword_confirmation: // confirm new password
})
.then((data) => {
    // handle success
})
.catch(({ response }) => {
    // handle the errors.
})
```

### Configuration

To customize the package configuration, use the vendor:publish Artisan command:

``` bash
php artisan vendor:publish --tag=laravel-spa-authentication-config
```

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email darwinluague9001@gmail.com instead of using the issue tracker.

## Credits

- [Darwin Luague](https://github.com/gostavocms)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Laravel Package Boilerplate

This package was generated using the [Laravel Package Boilerplate](https://laravelpackageboilerplate.com).
