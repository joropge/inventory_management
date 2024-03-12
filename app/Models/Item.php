<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Loan;
use App\Models\Box;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'picture',
        'price',
        'box_id',
    ];

    //Cada Loan tendrá un único item asignado, a la vez que cada item solo podrá ser prestado una única vez en un momento determinado. Esto no quiere decir que no tenga varios loans asociados desde una perspectiva histórica.

    public function box()
    {
        return $this->belongsTo(Box::class);
    }

    public function loan()
    {
        return $this->hasMany(Loan::class);
    }
}
