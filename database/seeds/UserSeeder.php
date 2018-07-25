<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fields = [
            'name' => 'Kaizoku',
            'email' => 'kaizoku@raarujeed.com',
            'password' => bcrypt('secret'),
        ];
        $user = User::createManager($fields);

        // $user->name = "Kaizoku";
        // $user->email = "kaizoku@raarujeed.com";
        // $user->userable_id = 1;
        // $user->userable_type = 'App\\Manager';
        // $user->password = bcrypt('secret');
        // $user->save();
    }
}
