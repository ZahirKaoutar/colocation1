<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function colocation()
    {
        return $this->belongsTo(Colocation::class);
    }

    // shares dyal had member
    public function expenseShares()
    {
        return $this->hasMany(ExpenseShare::class);
    }
}
