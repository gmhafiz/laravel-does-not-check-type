<?php

namespace App\Http\Controllers;

use App\Http\Trait\Type;


/**
 * composer install
 * php artisan serve
 * curl http://localhost:8000/api/users
 *
 * vendor/bin/phpstan analyse app
 */
class UserController extends Controller
{
    use Type;

    public function index() {
        $this->testFromTrait();
    }
}
