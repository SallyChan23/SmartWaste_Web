<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DropIn extends Model
{
    use HasFactory;

    protected $table ='drop_in';

    protected $primaryKey = 'dropInId';
    protected $fillable =['userId','locationId',
                            'wastePicture','date','quantity',
                            'weight','status'];

    public function user(){
        return $this->belongsTo(User::class, 'userId', 'userId');

    }

    public function dropIns()
    {
        return $this->hasMany(DropIn::class, 'userId', 'userId');
    }


    public function location(){
        return $this->belongsTo(Location::class, 'locationId', 'locationId');
    }
    public function validations()
    {
        return $this->hasOne(DropInValidation::class, 'dropInId');
    }


    public function wasteType(){
        //return $this->hasMany(DropInWasteType::class, 'dropInId', 'dropInId');
        return $this->belongsTo(WasteType::class, 'wasteTypeId', 'wasteTypeId');
    }

    public function getWasteTypeAttribute()
    {
        return is_null($this->quantity) ? 'Organic Waste' : 'Non-Organic Waste';
    }

    public function wasteDetails(){
        return $this->hasMany(DropInWasteDetail::class, 'dropInId', 'dropInId');
    }
}
