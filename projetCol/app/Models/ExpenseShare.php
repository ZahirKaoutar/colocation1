<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExpenseShare extends Model
{
    public function expense()
    {
        return $this->belongsTo(Expense::class);
    }

    // member li 3lih part
    public function membership()
    {
        return $this->belongsTo(Membership::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
