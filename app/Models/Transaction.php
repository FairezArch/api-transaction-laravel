<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the customer that owns the Transaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class)->withDefault();
    }

    /**
     * Get all of the transaction_details for the Transaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transaction_details(): HasMany
    {
        return $this->hasMany(TransactionDetail::class);
    }

    /**
     * Get all of the transaction_payment_method for the Transaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transaction_payment_method(): HasMany
    {
        return $this->hasMany(TransactionPaymentMethod::class);
    }
}
