<?php

namespace App\Http\Controllers;

use App\Http\Responses\JsonResponse as Response;
use App\Http\Requests\StoreIdentityRequest;
use App\Models\User;
use App\Notifications\IdentityConfirmed;
use App\Notifications\IdentityRejected;
use App\Services\UploadService;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class IdentityController extends Controller
{
    public function __construct(
        private UploadService $uploadService
    ){}

    public function show(User $user): View
    {
        return view('admin.identity-verification', [
            'user' => $user->load(['identity'])
        ]);
    }

    public function store(StoreIdentityRequest $request): JsonResponse
    {
        $filenames = $this->uploadService->upload($request, $request->user()->user_id);

        $request->user()->identity()->create([
            'id_front' => $filenames[0],
            'id_back' => $filenames[1],
        ]);

        return Response::success('We are now processing your request');
    }

    public function verify(string $id): JsonResponse
    {
        $user = User::findOrFail($id);
        $user->update(['is_verified' => 1]);

        $user->notify(new IdentityConfirmed());

        return Response::success('User identity was confirmed');
    }

    public function reject(string $id): JsonResponse
    {
        $user = User::findOrFail($id);
        $identity = $user->identity;

         $this->uploadService->deleteUpload(
            ['id_fronts/', 'id_backs/'],
            [$identity->id_front, $identity->id_back]
        );

        $identity->delete();
        $user->notify(new IdentityRejected());

        return Response::success('User identity was rejected');
    }
}
