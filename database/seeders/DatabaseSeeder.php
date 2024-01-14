<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $moderator = Role::updateOrCreate([
            'name' => 'moderator'
        ],[
            'name' => 'moderator'
        ]);

        $owner = Role::updateOrCreate(
            [
            'name' => 'owner'
        ],[
            'name' => 'owner'
        ]);


        $user = Role::updateOrCreate([
            'name' => 'user'
        ],[
            'name' => 'user'
        ]);

        User::create([
            'name' => 'moderator',
            'email' => 'moderator@moderator.com',
            'role_id' => $moderator->id,
            'password' => bcrypt('moderator'),
        ]);

        User::create([
            'name' => 'user',
            'email' => 'user@user.com',
            'role_id' => $user->id,
            'password' => bcrypt('user'),
        ]);

        User::create([
            'name' => 'owner',
            'email' => 'owner@owner.com',
            'role_id' => $owner->id,
            'password' => bcrypt('owner'),
        ]);
    }
}
