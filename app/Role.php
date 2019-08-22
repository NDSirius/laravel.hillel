<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Role extends Model
{
    protected $fillable = ['id', 'name'];

    public function users()
    {
        return $this->hasMany(App\User::class);
    }
}
