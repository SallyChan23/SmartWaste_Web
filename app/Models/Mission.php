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

    protected $fillable =['title','totalPoints','description','missionPicture'];

    public function missionTransaction(){
        return $this->belongsTo(MissionTransaction::class);
    }
}
