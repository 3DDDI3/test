<?php

namespace App\Http\Controllers\Passport;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TokenController extends Controller
{
    /**
     * Получение токена
     *
     * @return void
     */
    public function index() {}

    /**
     * Обновление токена
     *
     * @return void
     */
    public function refresh() {}

    /**
     * Создание токена
     *
     * @return void
     */
    public function create() {}

    /**
     * Удаление токена
     *
     * @param string $token_id id токена
     * @return void
     */
    public function delete(string $token_id) {}
}
