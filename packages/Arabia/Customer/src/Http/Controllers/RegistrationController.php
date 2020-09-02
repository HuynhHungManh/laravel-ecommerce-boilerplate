<?php

namespace Arabia\Customer\Http\Controllers;

use Arabia\Customer\Repositories\CustomerRepository;
use Arabia\Customer\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class RegistrationController extends Controller
{
    /**
     * CustomerRepository object
     *
     * @var \Arabia\Customer\Repositories\CustomerRepository
     */
    protected $customerRepository;

    /**
     * Create a new Repository instance.
     *
     * @param  \Arabia\Customer\Repositories\CustomerRepository $customer
     *
     * @return void
     */
    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    /**
     * Method to store user's sign up form data to DB.
     *
     * @return \Illuminate\Http\Response
     */
    public function register()
    {
        $data = request()->input();

        $validator = Validator::make($data, [
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'email|required|unique:customers,email',
            'password'   => 'confirmed|min:6|required',
        ]);

        if ($validator->fails()) {
            return validationResponse($validator->messages()->toArray());
        }

        $data = array_merge($data, [
                'password'    => bcrypt($data['password']),
                'is_verified' => 1,
            ]);

        $customer = $this->customerRepository->create($data);

        return response()->json([
            'message' => 'Your account has been created successfully.',
        ]);
    }
}
