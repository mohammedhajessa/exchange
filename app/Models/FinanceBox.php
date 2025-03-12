<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinanceBox extends Model
{
    use HasFactory;

    protected $fillable = ['branch_id', 'currency_id', 'balance'];

    public function branch (){
        return $this->belongsTo(Branch::class,'branch_id');
    }

    public function currency (){
        return $this->belongsTo(Currency::class,'currency_id');
    }

    public static function rules() {
        return [
            'branch_id' => 'required|exists:branches,id',
            'currency_id' => 'required|exists:currencies,id',
            // 'box_transition_id' => 'required|exists:box_transitions,id',
            'balance' => 'required|string',

        ];
    }
}
