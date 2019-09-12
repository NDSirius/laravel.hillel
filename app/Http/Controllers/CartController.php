<?php

namespace App\Http\Controllers;

use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('cart/index');
    }

    /**
     * @param Request $request
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addToCart(Request $request, Product $product)
    {

        Cart::instance('cart')->add(
            $product->id,
            $product->title,
            $request->product_count,
            $product->getPrice()
        );
        return redirect()->back();
    }

    /**
     * @param Request $request
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateProductCount(Request $request, Product $product)
    {
        if($product->in_stock < $request->product_count)
        {
            return redirect()
                ->back()
                ->with("status", "The product {$product->title} has only {$product->in_stock} items");
        }
        Cart::instance('cart')->update(
            $request->rowId,
            $request->product_count
        );

        return redirect()->back();
    }

    /**
     * @param $rowId
     * @return \Illuminate\Http\RedirectResponse
     */
    public function remove($rowId)
    {
        Cart::instance('cart')->remove($rowId);
        return redirect()
            ->back();
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy()
    {
        Cart::instance('cart')->destroy();
        return redirect()->back();
    }

}
