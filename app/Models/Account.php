<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Account extends Model
{

    use SoftDeletes;

    protected $fillable = [
        'user_id', 'account_name', 'balance', 'account_type', 'is_active'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'source_account_id');
    }

    public function transactionsTo()
    {
        return $this->hasMany(Transaction::class, 'destination_account_id');
    }
}
