<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Transaction extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'account_id',
        'amount',
        'transaction_type',
        'note',
    ];

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
    public function transactionable()
    {
        return $this->morphTo();
    }
}
