<?php

use Illuminate\Database\Seeder;

class MyInsiderDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        // Users
        DB::table('users')->insert([
            'email' => 'admin@admin.com',
            'password' => bcrypt('secret'),
            'user_type' => 'admin',
            'is_active' => '1'
        ]);


    }
}
