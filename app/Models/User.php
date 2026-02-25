<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'reputation'

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    public function memberships(){
         return $this->hasMany(Membership::class);
    }
    public function membershipactive(){
        return $this->hasOne(Membership::class)->whereNull('date_left');
    }
    public function colocation(){
        return $this->hasOneThrough(
        Colocation::class,
        Membership::class,
        'user_id',
        'id',
        'id',
        'colocation_id'
    )->whereNull('memberships.date_left');

    }


    public function colocationowner(){
        return $this->belongsTo(Colocation::class);
    }
    public function payementsent(){
        return $this->hasMany(Payement::class);
    }
    public function payementreceive(){
        return $this->hasMany(Payement::class);
    }
   public function expense(){
        return $this->hasMany(Exepense::class);
    }
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
