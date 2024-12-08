<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoucherTransaction extends Model
{
    use HasFactory;
    protected $table ='voucher_transaction';

    protected $fillable =['voucherId','userId','totalPoints'];

    public function voucher(){
        return $this->hasOne(Voucher::class);
    }
}
