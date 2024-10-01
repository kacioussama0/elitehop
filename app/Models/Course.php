<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = ['id'];

    public function getArabicStatusAttribute($value){
        switch ($this->attributes['status']) {
            case 'open':
                return 'مفتوح';
            case 'closed':
                return 'مغلق';
            case 'soon':
                return 'قريبا';
            case 'hidden':
                return 'مخفي';
        }
    }


    public function sections() {
        return $this->hasMany(Section::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }



}
