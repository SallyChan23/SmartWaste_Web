<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    use HasFactory;

    protected $table ='mission';
    protected $primaryKey = 'missionId'; 
    public $incrementing = true; 
    protected $keyType = 'int';

    protected $fillable =['title','totalPoints','description','target','missionPicture'];

    public function missionTransaction(){
        return $this->hasMany(MissionTransaction::class,'missionId', 'missionId');
    }
}
