<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exchange extends Model
{
    use HasFactory;

    protected $fillable = ['branch_id', 'from_currency', 'to_currency', 'amount_from', 'amount_to', 'fees'];
    public function branch (){
        return $this->belongsTo(Branch::class);
    }
    public function fromCurrency (){
        return $this->belongsTo(Currency::class,'from_currency');
    }
    public function toCurrency (){
        return $this->belongsTo(Currency::class,'to_currency');
    }
    public function currency (){
        return $this->belongsTo(Currency::class,'from_currency');
    }
}
