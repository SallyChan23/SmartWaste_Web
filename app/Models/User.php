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
    protected $primaryKey = 'userId'; 
    public $incrementing = true; 
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
        return $this->hasMany(MissionTransaction::class,'userId', 'userId');
    }

    public function voucherTransactions(){
        return $this->hasMany(VoucherTransaction::class,'userId','userId');
    }

    public function dropIns(){
        return $this->hasMany(DropIn::class. 'userId', 'userId');
    }
}
