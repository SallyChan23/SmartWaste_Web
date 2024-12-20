<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WasteType extends Model
{
    use HasFactory;

    protected $table ='waste_type';
    protected $primaryKey = 'wasteTypeId';

    protected $fillable=['wasteTypeName'];

    public function dropInWasteType(){
        return $this->belongsTo(DropInWasteType::class,'wasteTypeId', 'wasteTypeId');
    }

    public function wasteDetails(){
        return $this->hasMany(WasteDetails::class);
    }
}
