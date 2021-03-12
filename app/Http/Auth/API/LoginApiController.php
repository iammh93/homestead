<?php

namespace App\Http\Auth\API;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Auth\Controllers\LoginController;
use phpDocumentor\Reflection\Types\Boolean;

/**
 * @group Authentication
 *
 * APIs for authentication
 */
class LoginApiController extends LoginController
{
    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     * 
     * @queryParam email required No-example
     * @queryParam password required No-example
     * @response {
     *  "access_token": "eyJ0eXAiOiJKV1QiL...",
     *  "token_type": "Bearer",
     *  "expires_at": "2022-03-12 02:49:46"
     * }
     */

    public function login(Request $request)
    {
        $this->validateLogin($request);

        if (
            method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)
        ) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if (!$this->attemptLogin($request)) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;

        if ($request->remember_me) {
            $token->expires_at = Carbon::now()->addWeeks(1);
        }

        $token->save();

        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ]);
    }


}
