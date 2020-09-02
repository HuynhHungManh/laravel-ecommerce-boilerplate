<?php

namespace Arabia\Customer\Http\Controllers;

use Hash;
use Illuminate\Support\Facades\Auth;
use Arabia\Customer\Http\Controllers\Controller;
use Arabia\Customer\Resources\Customer as CustomerResource;

class CustomerController extends Controller
{
    /**
     * CustomerRepository object
     *
     * @var \Arabia\Customer\Repositories\CustomerRepository
     */
    protected $customerRepository;

    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => []]);
    }

    /**
     * Get details for current logged in customer
     *
     * @return \Illuminate\Http\Response
     */
    public function get()
    {
        $customer = auth()->user();

        return response()->json([
            'data' => new CustomerResource($customer),
        ]);
    }
}
