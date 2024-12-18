<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WasteDetails extends Model
{
    use HasFactory;

    protected $table ='waste_details';

    protected $fillable=['wasteTypeId','wasteDetailName'];

    public function dropInWasteDetail(){
        return $this->belongsTo(DropInWasteDetail::class,'wasteDetailId','wasteDetailId');
    }

    public function wasteType(){
        return $this->belongsTo(WasteType::class);
    }
}
