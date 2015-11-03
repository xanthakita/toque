# MyPetID
## a Laravel project

The MypetID is a pet registry for anyone who wants to register their pet.  It can be for documentations purposes, for tracking gentics, family trees, simply having a registration number for proof of ownership. 


### Basic Data Collected
The following data will be collected:
>pets->pet
- id,
- name,
- species,
- breed,
- birthdate,
- registration_date,
- ownerID,
- neutored, (y/n)
- DameID,
- SireID
- microchipped (y/n)
- chipID

>owners->owner
- id,
- firstname,
- lastname,
- street1,
- street2,
- city,
- state,
- zip,
- email,
- phone,
- number_of_registered_pets,
- regstration_credits_remaining


### Registration fees
The cost to regsiter will be $1 per pet.
If someone has a lot of pets blocks of registrations can be purchased:

- 1 to 15 registrations $1/each
- block up to 25 registrations for $20
- block up to 50 registrations for $30
- block up to 100 registrations for $60
- unlimited registrations $100
- or any combination until you spend $100 then you have unlimited




I am starting on this project the intent is to tie into paypal or some other online payment method to handle the registrations fees. 


This readme will continue to grow as the project proceeds.  Anyone who is interested in helping please


---
## Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, queueing, and caching.

Laravel is accessible, yet powerful, providing powerful tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Official Documentation

Documentation for the framework can be found on the [Laravel website](http://laravel.com/docs).

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

### License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
