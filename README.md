# Destore

Videogame store for the masses.

## About Demo

Destore is intended to leverage laravel framework to create a simple videogame store, with users, assets storage and comments. All functionality is available via web app and REST Api

## Requirements

The project is built using:

-   [DECSS](https://github.com/daroxs95/decss) for quick styling with minimal footprint and full control

Tooling used for local development:

-   [Ray](https://myray.app) for sending debug info to a separate app (paid)
-   [Debugbar](https://github.com/barryvdh/laravel-debugbar) for displaying profiling data (free)

## Installation instructions

Clone the repository and install the dependencies:

```bash
git clone https://github.com/daroxs95/destore.git
```

```bash
composer install
```

Create a database and set the credentials in the .env file.

(Re)generate the tables and seed with dummy data

```bash
php artisan migrate:fresh --seed
```

## Running in dev mode

Start vite dev server

```bash
yarn dev
```

Start laravel dev server

```bash
php artisan serve
```

### TODO
- [ ] Fix seeding errors due unique constraints.
