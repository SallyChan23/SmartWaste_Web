<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;

    protected $table ='voucher';
    protected $primaryKey = 'voucherId'; 
    public $incrementing = true; 
    protected $keyType = 'int';
    protected $fillable =['name','pointsNeeded','price','voucherPicture'];

    public function voucherTransaction(){
        return $this->hasMany(VoucherTransaction::class,'voucherId','Id');
    }

    
}
