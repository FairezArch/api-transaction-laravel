<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaymentMethod extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    /**
     * Get all of the transaction_payment_methods for the PaymentMethod
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transaction_payment_methods(): HasMany
    {
        return $this->hasMany(TransactionPaymentMethod::class);
    }
}
