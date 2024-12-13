<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin')->insert([
            [
                'username' => 'admin1',
                'password' => Hash::make('12345678'),
                
            ],
            [
                'username' => 'admin2',
                'password' => Hash::make('12345679'),
                
            ],
            [
                'username' => 'admin3',
                'password' => Hash::make('12345680'),    
            ],
        ]);
    }
}
