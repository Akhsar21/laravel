<?php

use App\Models\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::truncate();
        // DB::table('role_user')->truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $authorRole = Role::where('name', 'author')->first();
        $userRole = Role::where('name', 'user')->first();

        $admin = factory(User::class)->create([
            'name' => 'Admin user',
            'email' => 'admin@mail.com',
            'avatar' => 'uploads/default.png',
            'password' => Hash::make('password'),
        ]);

        $author = factory(User::class)->create([
            'name' => 'Author user',
            'email' => 'author@mail.com',
            'avatar' => 'uploads/default.png',
            'password' => Hash::make('password'),
        ]);

        $user = factory(User::class)->create([
            'name' => 'Generic user',
            'email' => 'user@mail.com',
            'avatar' => 'uploads/default.png',
            'password' => Hash::make('password'),
        ]);

        $admin->roles()->attach($adminRole);
        $author->roles()->attach($authorRole);
        $user->roles()->attach($userRole);
    }
}
