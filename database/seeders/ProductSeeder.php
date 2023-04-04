<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $now = Carbon::now()->toDateTimeString();
        $data = [
            ['name' => 'Pasta gigi', 'price' => 10000, 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Mie instan', 'price' => 4000, 'created_at' => $now, 'updated_at' => $now]
        ];

        Product::insert($data);
    }
}
