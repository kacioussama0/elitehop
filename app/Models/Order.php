<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function getArabicStatusAttribute($value){
        switch ($this->attributes['status']) {
            case 'open':
                return 'مفتوح';
            case 'pending':
                return 'قيد الانتظار';
            case 'processing':
                return 'قيد المعالجة';
            case 'canceled':
                return 'ملغي';
            case 'completed':
                return 'مكتمل';
        }
    }


}
