<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Colocation extends Model
{
    // owner direct
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    // members via pivot
    public function members()
    {
        return $this->belongsToMany(User::class, 'memberships')
            ->withPivot('role','joined_at','left_at')
            ->withTimestamps();
    }

    // categories dyal had colocation
    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    // expenses dyal had colocation
    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }
}
