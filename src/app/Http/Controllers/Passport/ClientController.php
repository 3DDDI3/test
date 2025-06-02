<?php

namespace App\Http\Controllers\Passport;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Получение клиентов
     *
     * @return void
     */
    public function index() {}

    /**
     * Создание клиента
     *
     * @return void
     */
    public function create() {}

    /**
     * Обнволение клиента
     *
     * @param string $client_id
     * @return void
     */
    public function update(string $client_id) {}

    /**
     * Удаление клиента
     *
     * @param string $client_id
     * @return void
     */
    public function delete(string $client_id) {}
}
