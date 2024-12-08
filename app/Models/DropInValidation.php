<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DropInValidation extends Model
{
    use HasFactory;

    protected $table ='drop_in_validation';

    protected $fillable =['dropInId','quantity','weight','pointsGenerated','status','validationDate'];

    public function dropIn(){
        return $this->belongsTo(DropIn::class);
    }

}
