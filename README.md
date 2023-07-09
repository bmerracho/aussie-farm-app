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

```bash
composer install
```

Run your MySQL Server then migrate and seed the db
```bash
php artisan migrate:fresh --seed --seeder=KangarooInfoSeeder
```

To run the app, excecute the following

```bash
php artisan serve
```

