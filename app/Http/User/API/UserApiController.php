<?php

namespace App\Http\User\API;

use App\Http\Controller;
use Illuminate\Http\Request;

/**
 * @group User management
 *
 * APIs for managing user
 * @authenticated
 */
class UserApiController extends Controller
{
    /**
     * Retrive User Data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     *
     * 
     * @response {
     * "id": "0c6d672a-b0c7-4eec-9918-074b70d480b1",
     * "name": "Testing",
     * "email": "testing@gmail.com",
     * "email_verified_at": null,
     * "created_at": "2021-03-11T07:30:38.000000Z",
     * "updated_at": "2021-03-11T07:30:38.000000Z"
     * }
     */
    public function getUserData(Request $request)
    {
        return $request->user();
    }
}
