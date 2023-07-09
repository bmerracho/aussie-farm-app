# aussie-farm-app

## Requirements
* PHP
* Composer
* MySQL

## Common setup

Clone the repo and install the dependencies.

```bash
git clone https://github.com/bmerracho/aussie-farm-app.git
cd aussie-farm-app
```
To install dependencies run the command
```bash
composer install
```

To Setup Database and populate it with data
Run your MySQL Server then excecute this command
```bash
php artisan migrate:fresh --seed --seeder=KangarooInfoSeeder
```

To run the app, excecute the following

```bash
php artisan serve
```

