<?php

namespace App\Http\Responses;

use Illuminate\Http\JsonResponse as Response;

class JsonResponse
{
    public static function invalidCredentials(): Response
    {
        return response()->json([
            'errors' => true,
            'message' => 'Invalid account credentials',
        ], 401);
    }

    public static function error(string|object|array $message, int $statusCode = 422): Response
    {
        return response()->json([
            'errors' => true,
            'message' => $message,
        ], $statusCode);
    }

    public static function success(string|object $message): Response
    {
        return response()->json([
            'success' => true,
            'message' => $message,
        ], 200);
    }
}