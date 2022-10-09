<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentAmount extends Model
{
    use HasFactory;
    protected $table = "payment_amounts";
    protected $primaryKey = "paymentAmount_id";
    protected $guarded=['paymentAmount_id'];
}
