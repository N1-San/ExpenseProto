<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Transaction extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id', 'amount', 'transaction_type', 'note',
        'source_account_id', 'destination_account_id', 'external_account_name', 'related_module'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sourceAccount()
    {
        return $this->belongsTo(Account::class, 'source_account_id');
    }

    public function destinationAccount()
    {
        return $this->belongsTo(Account::class, 'destination_account_id');
    }
}
