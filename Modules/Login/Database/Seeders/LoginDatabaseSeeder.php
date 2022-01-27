<?php

namespace Modules\Login\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class LoginDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
         User::insert([
         'name' => 'Admin',
         'password' =>Hash::make(123456789),
         'email'  =>'admin@gmail.com',
         'remember_token' =>'true'
             ]);
    }
}
