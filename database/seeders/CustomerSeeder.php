<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Customer;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $now = Carbon::now()->toDateTimeString();
        $data = [
            ['name' => 'John Doe', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Doe John', 'created_at' => $now, 'updated_at' => $now]
        ];

        Customer::insert($data);
    }
}
