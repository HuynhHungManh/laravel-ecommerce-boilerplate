<?php

namespace Arabia\Shop\Http\Controllers;

use Arabia\Shop\Repositories\CartRepository;
use Illuminate\Http\Request;
use Arabia\Shop\Http\Controllers\Controller;
use Arabia\Product\Repositories\ProductRepository;
use Arabia\Shop\Repositories\OrderRepository;

class CartController extends Controller
{
    public function __construct(CartRepository $cartRepository, ProductRepository $productRepository)
    {
        $this->middleware('auth:api');

        $this->cartRepository = $cartRepository;

        $this->productRepository = $productRepository;
    }

    public function getCart()
    {
        // $items = Cart::getContent();
    }

    public function addToCart()
    {
        $data = request()->only([
            'product_id',
            'quantity',
        ]);

        $customer = auth()->user();

        $product = $this->productRepository->getProductWithAttribute($data['product_id']);

        // Add the product to cart
        $data = $this->cartRepository->create([
            'customer_email' => $customer->email,
            'customer_first_name' => $customer->first_name,
            'customer_last_name' => $customer->last_name,
            'shipping_method' => null,
            'coupon_code' => null,
            'items_qty' => $data['quantity'] ?? 1,
            'exchange_rate' => null,
            'currency_code' => 'USD',
            'grand_total' => $product->price * ($data['quantity'] ?? 1),
            'sub_total' => $product->price * ($data['quantity'] ?? 1),
            'tax_total' => 0,
            'discount' => 0,
            'checkout_method' => null,
            'customer_id' => $customer->id,
            'product_id' => $data['product_id'],
        ]);

        return $this->reply()->content($data);
    }

    // public function removeItem($id)
    // {
    //     Cart::remove($id);
    //
    //     if (Cart::isEmpty()) {
    //         return redirect('/');
    //     }
    //     return redirect()->back()->with('message', 'Item removed from cart successfully.');
    // }
    //
    // public function clearCart()
    // {
    //     Cart::clear();
    //
    //     return redirect('/');
    // }
}
