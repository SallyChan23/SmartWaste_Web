<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DropIn extends Model
{
    use HasFactory;

    protected $table ='drop_in';

    protected $fillable =['userId','locationId','wastePicture','date','quantity','weight','status'];

    public function user(){
        return $this->belongsTo(User::class);

    }

    public function location(){
        return $this->belongsTo(Location::class);
    }

    public function dropInValidation(){
        return $this->hasOne(DropInValidation::class);
    }

    public function dropInWasteTypes(){
        return $this->hasMany(DropInWasteType::class);
    }

    public function dropInWasteDetails(){
        return $this->hasMany(DropInWasteDetail::class);
    }
}
