<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoxTransition extends Model
{
    use HasFactory;
    protected $fillable = ['branch_id', 'currency_id', 'amount', 'amount_after_fees', 'fees', 'type', 'note'];
    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }
    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

}
