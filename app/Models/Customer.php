<?php

namespace App\Models;

use App\Models\Transaction;
use App\Models\CustomerAddress;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    /**
     * Get all of the customer_address for the Customer
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function customer_address(): HasMany
    {
        return $this->hasMany(CustomerAddress::class);
    }

    /**
     * Get all of the transaction for the Customer
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transaction(): HasMany
    {
        return $this->hasMany(Transaction::class);
    }
}
