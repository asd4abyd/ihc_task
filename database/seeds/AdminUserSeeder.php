<?php

use App\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (User::where('is_admin', 1)->exists()) {
            return;
        }

        User::create([
            'name' => 'admin',
            'email' => 'admin@new-task.com',
            'password' => bcrypt('12345678'),
            'is_admin' => 1
        ]);

    }
}
