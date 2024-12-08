<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Model
{
    use HasFactory;

    protected $table ='user';

    protected $fillable = ['username','email','password','phoneNumber','profilePicture','points','role'];

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
