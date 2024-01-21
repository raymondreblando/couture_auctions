<?php

namespace App\Http\Controllers;

use App\Http\Requests\GetInTouchReplyRequest;
use App\Http\Requests\GetInTouchRequest;
use App\Http\Responses\JsonResponse as Response;
use App\Mail\GetInTouchRespond;
use App\Models\GetInTouch;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class GetInTouchController extends Controller
{
    public function index(): View
    {
        return view('admin.get-in-touch',[
            'messages' => GetInTouch::all()
        ]);
    }

    public function store(GetInTouchRequest $request): JsonResponse
    {
        GetInTouch::create($request->validated());

        return Response::success('Thankyou for getting in touch with us');
    }

    public function show(GetInTouch $getInTouch): View
    {
        return view('admin.get-in-touch-reply', [
            'getInTouch' => $getInTouch,
        ]);
    }

    public function update(GetInTouchReplyRequest $request, string $id): JsonResponse
    {
        $getIntouch = GetInTouch::findOrFail($id);
        $getIntouch->update($request->validated());

        Mail::to($getIntouch->email)->send(
            new GetInTouchRespond($getIntouch->fresh())
        );

        return Response::success('Reply has been sent');
    }
}
