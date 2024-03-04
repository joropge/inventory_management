<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Item;

class Loan extends Model
{
    use HasFactory;


    protected $fillable = [
        'item_id',
        'user_id',
        'checkout_date',
        'due_date',
        'returned_date',
    ];

    //Cada Loan estará asignado a un usuario, pero un usuario puede tener varios loans.

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }


}
