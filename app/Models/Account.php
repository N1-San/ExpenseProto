<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Account extends Model
{

    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'user_id', 'name', 'balance', 'account_type_id', 'is_active'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function accountType()
    {
        return $this->belongsTo(AccountType::class);
    }
    
    // protected $fillable = [
    //     'user_id', 'account_name', 'balance', 'account_type', 'is_active'
    // ];

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

    // public function transactions()
    // {
    //     return $this->hasMany(Transaction::class, 'source_account_id');
    // }

    // public function transactionsTo()
    // {
    //     return $this->hasMany(Transaction::class, 'destination_account_id');
    // }
}
