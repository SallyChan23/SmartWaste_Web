<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DropInWasteType extends Model
{
    use HasFactory;

    protected $table='drop_in_waste_type';

    protected $fillable=['wasteTypeId','dropInId'];

    public function wasteType(){
        return $this->hasOne(WasteType::class, 'wasteTypeId', 'wasteTypeId');
    }

    public function dropIns(){
        return $this->belongsTo(DropIn::class, 'dropInId', 'dropInId');
    }
}
