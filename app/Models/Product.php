<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    /**
     * Get all of the transaction_details for the Product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transaction_details(): HasMany
    {
        return $this->hasMany(TransactionDetail::class);
    }
}
