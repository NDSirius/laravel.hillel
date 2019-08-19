<?php

use Illuminate\Database\Seeder;
use App\Role;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $roles = ['Admin', 'Customer'];
       foreach ($roles as $role){
           Role::create(['name' => $role]);
       }
    }
}
