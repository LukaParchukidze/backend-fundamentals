<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws \Exception
     */
    public function run()
    {
        Employee::query()->insert([
            'name' => Str::random(10),
            'surname' => Str::random(10),
            'position' => Str::random(20),
            'phone' => Str::random(12),
            'is_hired' => (bool)random_int(0, 1),
        ]);
    }
}
