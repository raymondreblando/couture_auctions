<?php

namespace App\Http\Controllers;

use App\Http\Responses\JsonResponse as Response;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AccountController extends Controller
{
    public function index(): View
    {
        return view('admin.accounts', [
            'users' => User::users()->with([
                'profile', 'identity'
            ])->latest()->get()
        ]);
    }

    public function updateStatus(string $id): JsonResponse
    {
        $user = User::findOrFail($id);
        $status = $user->is_active ? 0 : 1;

        $user->update([
            'is_active' => $status,
        ]);

        return Response::success('Account status was updated');
    }
}
