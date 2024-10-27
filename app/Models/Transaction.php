<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    /** @use HasFactory<\Database\Factories\TransactionFactory> */
    use HasFactory;
    protected $fillable = ['product_id', 'type', 'quantity', 'amount'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
