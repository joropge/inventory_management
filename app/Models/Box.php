<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Item;

class Box extends Model
{
    use HasFactory;

    protected $fillable = [
        'label',
        'location',
    ];
    //Cada box puede tener varios artículos, pero cada artículo solo puede estar en una caja.
    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
