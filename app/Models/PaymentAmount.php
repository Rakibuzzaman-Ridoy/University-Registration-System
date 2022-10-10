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

    public function paymentAmount()
    {
        return $this->belongsTo(PaymentCategory::class,'paymentCategory_id','paymentCategory_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class,'department_id','department_id');
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class,'semester_id','semester_id');
    }
}
