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
        // Database Tables Seeds Data
        for ($i = 1; $i < 50; $i++) 
        {
            // Users
            DB::table('users')->insert([
                'email' => Str::random(10).'@gmail.com',
                'password' => bcrypt('secret'),
                'user_type' => 'client',
                'is_active' => '1'
            ]);

            // Contacts
            DB::table('contacts')->insert([
                'telephone_number' => '05841 36 46145',
                'mobile_number' => '+49 69 1234 5678',
                'country_code' => '+49',
                'fax_number' => '+44 161 999 8888',
            ]);

            // Addresses
            DB::table('addresses')->insert([
                'Street_address' => 'Lietzenburger Straße 36',
                'city' => 'Küsten',
                'state' => 'Niedersachsen',
                'zip_code' => '29482',
                'country' => 'Germany',
            ]);

            // Companies
            DB::table('companies')->insert([
                'company_name' => 'Lietzenburger Straße 36',
                'contact_id' => $i,
                'address_id' => $i,
            ]);

            // Clients
            DB::table('clients')->insert([
                'title' => 'Mr',
                'first_name' => Str::random(10),
                'last_name' => Str::random(10),
                'user_id' => $i,
                'company_id' => $i,
                'contact_id' => $i,
                'address_id' => $i
            ]);

            // insiders
            DB::table('insiders')->insert([
                'title' => 'Mr',
                'first_name' => Str::random(10),
                'last_name' => Str::random(10),
                'email' => Str::random(10).'@gmail.com',
                'date_of_birth' => date('Y-m-d'),
                'national_id_number' => Str::random(10),
                'language' => 'english',
                'notes' => Str::random(30),
                'client_id' => $i,
                'company_id' => $i,
                'contact_id' => $i,
                'address_id' => $i
            ]);
        }

        
      
    }
}
