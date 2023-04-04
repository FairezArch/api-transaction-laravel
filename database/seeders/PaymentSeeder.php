<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $now = Carbon::now()->toDateTimeString();
        $data = [
            ['name' => 'debit', 'is_active' => 1,  'created_at' => $now, 'updated_at' => $now],
            ['name' => 'cash', 'is_active' => 1, 'created_at' => $now, 'updated_at' => $now]
        ];

        PaymentMethod::insert($data);
    }
}
