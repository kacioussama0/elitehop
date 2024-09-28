<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function getLessonTypeAttribute($value)
    {
        $type = '';

        if(!empty($this->attributes['video_link'])) {
            $type .= 'فيديو مسجل';
        }
        if(!empty($this->attributes['description'])) {
            $type .= ' درس مكتوب ';
        }

        return implode('|',explode(' ', $type));

    }
    public function section()
    {
        return $this->belongsTo(Section::class);
    }
}
