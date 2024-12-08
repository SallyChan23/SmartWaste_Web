<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DropInWasteDetail extends Model
{
    use HasFactory;

    protected $table ='drop_in_waste_detail';

    protected $fillable=['wasteDetailId','dropInId'];

    public function wasteDetail(){
        return $this->hasOne(WasteDetails::class);
    }

    public function dropIn(){
        return $this->belongsTo(DropIn::class);
    }
}
