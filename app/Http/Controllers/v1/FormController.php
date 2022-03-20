<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\FillRequest;
use App\Repositories\UserRepository;
use App\Events\UserRegisteredEvent; 

class FormController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(FillRequest $request, UserRepository $userRepository)
    {
        $user = $userRepository->update($request);

        UserRegisteredEvent::dispatch($user);

        return response()->json([
            'data' => $user
        ]);
    }
}
