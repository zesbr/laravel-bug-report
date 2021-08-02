
# Laravel Bug Report

## Setup
**1. Clone the repository**
```
git clone git@github.com:zesbr/laravel-bug-report.git
```

**2. Create a mysql database**

**3. Install composer packages**
```
composer install
```

**4. Create the `.env` file**
```
cp .env.example .env
```

**5. Configure MySQL connection inside `.env`**
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

**6. Generate the application key**
```
php artisan key:generate`
```

**7. Run migrations and seed**
```
php artisan migrate --seed
```

**8. `Illuminate\Database\QueryException` should be thrown from `DatabaseSeeder`:**
```
SQLSTATE[22007]: Invalid datetime format: 1292 Truncated incorrect DOUBLE value: '629b1c4e-4de9-411d-a108-88c1dd8556ac' (SQL: update `post_tag` set `order` = 1 where `post_tag`.`post_id` = c9acd4b2-27b7-48a3-9223-fafc0994ab9c and `tag_id` in (1))
```