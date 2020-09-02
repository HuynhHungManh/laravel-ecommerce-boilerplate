<?php

namespace Arabia\Shop\Repositories;

use Arabia\Shop\Models\Cart;
use Arabia\Core\Eloquent\Repository;
use Arabia\Shop\Contracts\CartContract;

class CartRepository extends Repository implements CartContract
{
    /**
     * Specify Model class name
     *
     * @return Mixed
     */

    function model()
    {
        return Cart::class;
    }

    // /**
    //  * @param  array  $data
    //  * @return \Webkul\Checkout\Contracts\Cart
    //  */
    // public function create(array $data)
    // {
    //     $cart = $this->model->create($data);
    //
    //     return $cart;
    // }

    /**
     * @param  array  $data
     * @param  int  $id
     * @param  string  $attribute
     * @return \Webkul\Checkout\Contracts\Cart
     */
    public function update(array $data, $id, $attribute = "id")
    {
        $cart = $this->find($id);

        $cart->update($data);

        return $cart;
    }

    /**
     * Method to detach associations. Use this only with guest cart only.
     *
     * @param  int  $cartId
     * @return bool
     */
    public function deleteParent($cartId) {
        $cart = $this->model->find($cartId);

        return $this->model->destroy($cartId);
    }
}
