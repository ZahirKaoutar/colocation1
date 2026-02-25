<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public function share()
    {
        return $this->belongsTo(ExpenseShare::class, 'expense_share_id');
    }

    // li khallas
    public function payer()
    {
        return $this->belongsTo(User::class, 'payer_id');
    }

    // li t9bel
    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }
}
