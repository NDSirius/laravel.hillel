<?php

namespace App\Listeners;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserEventSubscriber

{
    /**
     * Handle user login events.
     */
    public function handleUserLogin($event)
    {
        Cart::instance('cart')
            ->restore($event->user->instanceCartName());
        Cart::instance('wishlist')
            ->restore($event->user->instanceCartName());
    }


    /**
     * Handle user logout events.
     */
    public function handleUserLogout($event) {
        if(Cart::instance('cart')->count()>0) {
            Cart::instance('cart')
                ->store($event->user->instanceCartName());
        }
            if(Cart::instance('wishlist')->count() > 0){
                Cart::instance('wishlist')
                    ->restore($event->user->instanceCartName());
            }
        }


    /**
     * Register the listeners for the subscriber.
     *
     * @param  \Illuminate\Events\Dispatcher  $events
     */
    public function subscribe($events)
    {
        $events->listen(
            'Illuminate\Auth\Events\Login',
            'App\Listeners\UserEventSubscriber@handleUserLogin'
        );

        $events->listen(
            'Illuminate\Auth\Events\Logout',
            'App\Listeners\UserEventSubscriber@handleUserLogout'
        );
    }
}