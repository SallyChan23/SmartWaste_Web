<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoucherTransaction extends Model
{
    use HasFactory;

    protected $table = 'voucher_transaction';
    protected $primaryKey = 'voucherTransactionId';

    protected $fillable = [
        'voucherTransactionId',
        'voucherId',
        'userId',
        'totalPoints',
    ];


    public function voucher()
    {
        return $this->belongsTo(Voucher::class, 'voucherId');
    }
}
