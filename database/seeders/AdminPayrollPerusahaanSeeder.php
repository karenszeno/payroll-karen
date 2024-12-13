<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminPayrollPerusahaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin_payroll_perusahaan')->insert([
            [
                'username' => 'Leon25',
                'password' => Hash::make('leonn634'),
            ],
            [
                'username' => 'Noel25',
                'password' => Hash::make('noell634'),
            ],
            [
                'username' => 'fufuffafa25',
                'password' => Hash::make('fufuf4f4ff'),
            ],
        ]);
    }
}
