<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Colocation extends Model
{
    protected $fillable=['name','status','owner_id'];


      public function memberships()
    {
        return $this->hasMany(Membership::class);
    }


    public function activeUsers()
    {
        return $this->hasMany(Membership::class)->whereNull('date_left');
    }
    public function Owner(){
        return $this->hasOne(User::class)->where('role','owner');

    }
    public function categories(){
        return $this->hasMany(Categorie::class);
    }
    public function invitations(){
        return $this->hasMany(invitation::class);
    }
    public function  payements(){
        return $this->hasMany(Payement::class);
    }
    
}
