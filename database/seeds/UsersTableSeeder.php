<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $authorRole = Role::where('name', 'author')->first();
        $userRole = Role::where('name', 'user')->first();

        $admin = User::create([
            'name' => 'faschi',
            'email' => 'faschi@admin.com',
            'password' => Hash::make('password'),
        ]);

        $author = User::create([
            'name' => 'john',
            'email' => 'jonh@user.com',
            'password' => Hash::make('password'),
        ]);

        $user = User::create([
            'name' => 'user1',
            'email' => 'user1@user.com',
            'password' => Hash::make('password'),
        ]);

        $admin->roles()->attach($adminRole);
        $author->roles()->attach($authorRole);
        $user->roles()->attach($userRole);
    }
}
