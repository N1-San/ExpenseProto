<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Savings extends Model
{

    use SoftDeletes;
    protected $fillable = [
        'name',
        'amount',
    ] ;
    public function transactions()
    {
        return $this->morphMany(Transaction::class, 'transactionable');
    }
}
