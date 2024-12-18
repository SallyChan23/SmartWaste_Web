<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $table ='location';
    protected $primaryKey = 'locationId';

    protected $fillable =['locationName','locationDescription','locationPicture', 'urllocation'];

    public function dropIn(){
        return $this->hasOne(DropIn::class);
    }

}
