<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'exchange_rate',
    ];

    public function finance_box()
    {
        return $this->hasMany(FinanceBox::class,'currency_id');
    }

    public function box_transitions()
    {
        return $this->hasMany(BoxTransition::class, 'currency_id', 'id');
    }
    public function exchange (){
        return $this->hasMany(Exchange::class,'from_currency');
    }
}
