<?php

namespace App\Http\Controllers;

use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class WishListController extends Controller
{
    /**
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addToWishList(Product $product)
    {
        Auth()->user()->addToWish($product);
            Cart::instance('wishlist')->add(
                $product->id,
                $product->title,
                1,
                $product->getPrice()
            );
        return redirect()->back()->with("status", "The product \"{$product->title}\" was added to wish list!");
    }

    /**
     * @param Request $request
     * @param Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteFromWishList(Request $request, Product $product){
        Auth()->user()->removeFromWish($product);
        if(!empty($request->rowId)) {
            Cart::instance('wishlist')->remove($request->rowId);
        }else{
            $content = Cart::instance('wishlist')->content();
            foreach ($content as $cartItem){
                if($cartItem->id === $product->id) {
                    Cart::instance('wishlist')->remove($cartItem->rowId);
                }

            }
        }
        return redirect()->back()->with("status", "The product \"{$product->title}\" was deletedfrom your wish list!");
    }
}
