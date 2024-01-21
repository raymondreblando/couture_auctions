<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Responses\JsonResponse as Response;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class RegisterController extends Controller
{
    public function index(): View
    {
        return view('register');
    }

    public function store(RegisterRequest $request): JsonResponse
    {
        User::create($request->validated());

        return Response::success("Account was created");
    }
}
