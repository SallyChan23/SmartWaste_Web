<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoucherTransaction extends Model
{
    use HasFactory;
    // protected $table ='voucher_transaction';

    // protected $primaryKey = 'voucherTransactionId'; 
    // public $incrementing = true; 
    // protected $keyType = 'int';

    // protected $fillable =['voucherId','userId','totalPoints'];

    // public function voucher(){
    //     return $this->belongsTo(Voucher::class,'voucherId','voucherId');
    // }

    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'userId', 'userId');
    // }

    protected $table = 'voucher_transaction';
    protected $primaryKey = 'voucherTransactionId';

    protected $fillable = [
        'voucherTransactionId',
        'voucherId',
        'userId',
        'totalPoints',
    ];

    // Define the relationship to Voucher
    // public function voucher()
    // {
    //     return $this->belongsTo(Voucher::class, 'voucherId');
    // }

    public function voucher()
    {
        return $this->belongsTo(Voucher::class, 'voucherId');
    }
}
