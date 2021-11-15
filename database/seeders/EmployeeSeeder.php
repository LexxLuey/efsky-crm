<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::create([
            'name' => 'John Doe',
            'email' => 'doejohn@gmail.com',
            'phone' => '1234567890',
            'department' => 'hr',
            'dob' => '2010-01-03',
        ]);
    }
}
