<?php

namespace Arabia\Customer\Http\Controllers;

use Illuminate\Support\Facades\Event;
use Cookie;
use Illuminate\Support\Facades\Auth;
use Arabia\Customer\Resources\Customer as CustomerResource;
use Illuminate\Support\Facades\Validator;

class SessionController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'logout']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $validator = Validator::make(request()->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return validationResponse($validator->messages()->toArray());
        }

        $jwtToken = null;

        if (! $jwtToken = auth()->attempt(request()->only('email', 'password'))) {
            return response()->json([
                'errors' => [
                    [
                        'detail' => 'Invalid Email or Password'
                    ]
                ]
            ], 401);
        }

        $customer = auth()->user();

        return response()->json([
            'token' => $jwtToken,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'message' => 'Logged in successfully.',
            'data' => new CustomerResource($customer),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        auth()->logout();

        return response()->json([
            'message' => 'Logged out successfully.',
        ]);
    }
}
