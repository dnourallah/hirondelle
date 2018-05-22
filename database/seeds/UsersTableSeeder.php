<?php

use App\Models\Auth\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 1)->create([
            'username'        => 'Admin',
            'email'           => 'admin@admin.com',
        ]);
        User::find(1)->assignRole(config('auth.access.users.roles.admin'));

        factory(User::class, 1)->create([
            'username'        => 'User',
            'email'           => 'user@user.com',
        ]);
        User::find(2)->assignRole(config('auth.access.users.roles.user'));



/*
        factory(User::class, 1)->create();

        DB::table('users')->insert([
            'username' => str_random(10),
            'first_name' => str_random(10),
            'last_name' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
        ]);

        User::create([
            'username' => str_random(10),
            'first_name' => str_random(10),
            'last_name' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
        ]);
*/
    }
}
