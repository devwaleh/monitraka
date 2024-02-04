<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    #rel btw cat and expenses
    public function expenses ()
    {
        return $this->hasMany(Expenses::class);
    }
}
