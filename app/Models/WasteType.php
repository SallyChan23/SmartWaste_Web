<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WasteType extends Model
{
    use HasFactory;

    protected $table ='waste_type';

    protected $fillable=['wasteTypeName'];

    public function dropInWasteType(){
        return $this->belongsTo(DropInWasteType::class);
    }

    public function wasteDetails(){
        return $this->hasMany(WasteDetails::class);
    }
}
