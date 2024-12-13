<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminPayrollSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payroll_admin')->insert([
            [
                'username' => 'Anton',
                'password' => Hash::make('antonn634'),
            ],
            [
                'username' => 'Rizki',
                'password' => Hash::make('rizki123'),
            ],
            [
                'username' => 'Langit',
                'password' => Hash::make('langit634'),
            ],
        ]);
    }
}
