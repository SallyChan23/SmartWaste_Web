<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MissionTransaction extends Model
{
    use HasFactory;

    protected $table = 'mission_transaction';
    protected $primaryKey = 'missionTransactionId'; 
    public $incrementing = true; 
    protected $keyType = 'int';
    protected $fillable =['missionId','userId','status','currentPoints','startDate','endDate'];

    public function mission(){
        return $this->belongsTo(Mission::class,'missionId', 'missionId');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'userId', 'userId');
    }
}
