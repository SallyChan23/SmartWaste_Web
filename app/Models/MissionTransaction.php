<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MissionTransaction extends Model
{
    use HasFactory;

    protected $table = 'mission_transaction';
    protected $fillable =['missionId','userId','status','startDate','endDate'];

    public function mission(){
        return $this->hasOne(Mission::class);
    }
}
