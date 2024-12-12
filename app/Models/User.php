<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    protected $table ='user';
    protected $primaryKey = 'userId'; // Define the primary key column name
    public $incrementing = true; // Specify the primary key is auto-incrementing
    protected $keyType = 'int';

    protected $fillable = [
        'username',
        'email',
        'password',
        'phoneNumber',
        'profilePicture',
        'points',
        'role',
    ];
    
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function missionTransactions(){
        return $this->hasMany(MissionTransaction::class);
    }

    public function voucherTransactions(){
        return $this->hasMany(VoucherTransaction::class);
    }

    public function dropIns(){
        return $this->hasMany(DropIn::class);
    }
}
