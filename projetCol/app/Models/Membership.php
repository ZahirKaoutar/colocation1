<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
  protected  $fillable=['user_id','colocation_id','role','left_at','joined_at'];
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
