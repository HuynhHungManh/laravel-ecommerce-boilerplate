<?php

namespace Arabia\Customer\Repositories;

use Arabia\Core\Eloquent\Repository;
use Arabia\Customer\Models\Customer;

class CustomerRepository extends Repository
{
    /**
     * Specify Model class name
     *
     * @return mixed
     */

    function model()
    {
        return Customer::class;
    }
}
