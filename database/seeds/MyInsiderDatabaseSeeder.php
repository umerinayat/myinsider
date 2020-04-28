<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

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
            'is_active' => '1',
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);


    }
}
