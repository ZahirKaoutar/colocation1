<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    protected $fillable=['colocation_id','token','status','email'];
    public function colocation(){
        return $this->belongsTo(colocation::class);

    }
}
