<?php

namespace App\Http\Controllers\Passport;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\TokenService;
use Illuminate\Http\Request;
use Laravel\Passport\TokenRepository;

class PersonalAcccesTokenController extends Controller
{
    protected TokenService $tokenService;

    public function __construct(TokenService $tokenService)
    {
        $this->tokenService = $tokenService;
    }

    /**
     * Получение токенов
     *
     * @return void
     */
    public function index(Request $request)
    {
        return response($this->tokenService->getUserTokens($request->user()));
    }

    /**
     * Создание токена
     *
     * @return void
     */
    public function create() {}

    /**
     * Удаление токена
     *
     * @param Request $request
     * @param string $token_id
     * @return void
     */
    public function delete(Request $request, string $token_id)
    {
        $this->tokenService->deleteUserToken($request->user(), $token_id);
    }
}
