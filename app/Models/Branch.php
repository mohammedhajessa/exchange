<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'country',
        'city',
        'town',
        'address',
        'phone',
        'start_time',
        'end_time',
        'note',
        'status',
        'logo',
    ];

    public static function rules(){
        return [
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'town' => 'nullable|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'note' => 'nullable|string|max:500',
            'start_time' => 'nullable|string|max:255',
            'end_time' => 'nullable|string|max:255',
            'status' => 'required|in:active,inactive',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email' => 'required|email|unique:branches,email',
            'password' => 'required|string|min:8',
            'role' => 'required|in:admin,user',
        ];
    }

    public function finance_box()
    {
        return $this->hasOne(FinanceBox::class , 'branch_id');
    }

    public function exchanges() {
        return $this->hasMany(Exchange::class,'branch_id');

    }
    public function transfers() {
        return $this->hasMany(Transfer::class,'branch_id');

    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function box_transitions()
    {
        return $this->hasMany(BoxTransition::class);
    }
}
