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








     // pivot historique dyal colocations
    public function memberships()
    {
        return $this->hasMany(Membership::class);
    }

    // colocations via pivot
    public function colocations()
    {
        return $this->belongsToMany(Colocation::class, 'memberships')
            ->withPivot('role','joined_at','left_at')
            ->withTimestamps();
    }

    // expenses li khallas
    public function paidExpenses()
    {
        return $this->hasMany(Expense::class, 'payer_id');
    }

    // payments li howa khallas
    public function paymentsMade()
    {
        return $this->hasMany(Payment::class, 'payer_id');
    }

    // payments li howa t9bel
    public function paymentsReceived()
    {
        return $this->hasMany(Payment::class, 'receiver_id');
    }
    public function invitations(){
        return $this->hasMany(Invitation::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'reputation','
        banned_at',
        'role'
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
