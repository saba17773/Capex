<?php

use Illuminate\Database\Seeder;
use App\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user =[
            [
                'name' => 'Admin',
                'email' => 'admin@deestone.com',
                'is_admin' => '1',
                'password' => bcrypt('1234')
            ],
            [
                'name' => 'User',
                'email' => 'ananya_p@deestone.com',
                'is_admin' => '0',
                'password' => bcrypt('1234')
            ]
        ];
        foreach($user as $key => $value){
            User::create($value);
        }
    }
}
