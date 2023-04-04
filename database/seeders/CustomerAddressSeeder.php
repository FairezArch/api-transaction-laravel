<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\CustomerAddress;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CustomerAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $now = Carbon::now()->toDateTimeString();
        $data = [
            ['address' => 'Jl. Pakua No.1', 'customer_id' => 1, 'created_at' => $now, 'updated_at' => $now],
            ['address' => 'Permata Sari', 'customer_id' => 2, 'created_at' => $now, 'updated_at' => $now]
        ];

        CustomerAddress::insert($data);
    }
}
