Use Laravel if you want silent bugs

```shell
composer install
# edit `.env` file
php artisan serve
curl http://localhost:8000/api/users
vendor/bin/phpstan analyse app/Http/Trait/Type.php
```
