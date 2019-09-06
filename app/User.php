<?php

namespace App;

use App\Http\Controllers\UserController;
use App\Pivots\WishList;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use League\Flysystem\Config;


class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
        'birthday',
        'surname',
        'role_id'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'birthday' => 'date:Y-m-d'
    ];

    public function role()
    {
        return $this->hasOne(App\Role::class);
    }

    public function order()
    {
        return $this->hasMany(App\Order::class);
    }

    public function wishes()
    {
        return $this->belongsToMany(Product::class,
            'wishlist',
            'user_id',
            'product_id');
    }

    public function isAdmin()
    {
        $adminRole = Role::where(
            'name',
            '=',
            Config::get('constants.db.roles.admin')
        )->first();
        return $this->role_id === $adminRole->id;
    }

    public function addToWish(Product $product)
    {
        $this->wishes()->attach($product);
    }

    public function removeFromWish(Product $product)
    {
        $this->wishes()->detach($product);

    }

    public function instanceCartName()
    {
        $userName = [
            $this->id,
            $this->name,
            $this->surname
        ];

        return implode('_', $userName);
    }

}
