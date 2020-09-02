<?php

namespace Arabia\Shop;

use Arabia\Shop\Repositories\CartRepository;

class Cart
{

    /**
     * CartRepository instance
     *
     * @var \Webkul\Checkout\Repositories\CartRepository
     */
    protected $cartRepository;

    /**
     * Create a new class instance.
     *
     * @param  \Webkul\Checkout\Repositories\CartRepository             $cartRepository
     * @return void
     */
    public function __construct(CartRepository $cartRepository)
    {
        $this->cartRepository = $cartRepository;
    }

    /**
     * Create new cart instance.
     *
     * @param  array  $data
     * @return \Webkul\Checkout\Contracts\Cart|null
     */
    public function create($data)
    {
        $cart = $this->cartRepository->create($cartData);

        return $cart;
    }
}
