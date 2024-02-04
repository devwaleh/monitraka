<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expenses extends Model
{
    use HasFactory;

    #rel btw expense and user
    public function user ()
    {
        return $this->belongsTo(User::class);
    }

    #rel btw expense and cat
    public function category ()
    {
        return $this->belongsTo(Category::class);
    }
}
