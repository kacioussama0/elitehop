<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function home()
    {

        $features = [
            [
                'title' => 'معلمين أكفاء',
                'description' => 'توفير معلمين أكفاء ومتخصصين.'
            ],
            [
                'title' => 'خطة مناسبة',
                'description' => 'توفير خطة مناسبة لحفظ القرآن حسب كل تلميذ.'
            ],
            [
                'title' => 'اجتماعات دورية',
                'description' => 'إجتماعات للأولياء التي تصب في مصلحة التلميذ.'
            ],
            [
                'title' => 'دورات تكوينية',
                'description' => 'دورات للأولياء في مجال التربية على أيدي تربويين متخصصين.'
            ],
            [
                'title' => 'تقييمات دورية',
                'description' => 'لمواكبة مستجدات التلميذ التعليمية.'
            ],
            [
                'title' => 'نشاطات ترفيهية',
                'description' => 'تقديم نشاطات ترفيهية للتلميذ لتعلم ممتع'
            ]
        ];

        return view('index',compact('features'));
    }


    public function courses()
    {
        $courses = Course::where('status','!=','hidden')->orderBy('created_at','DESC')->orderBy('status')->get();
        return view('courses',compact('courses'));
    }


    public function course($slug)
    {

        $course = Course::where('status','!=','hidden')->where('slug',$slug)->firstOrFail();
        $firstLesson = '';

        if(count($course->sections)){
            if(count($course->sections->first()->lessons)) {
                $firstLesson = $course->sections->first()->lessons->first()->slug;
            }
        }


        return view('course',compact('course','firstLesson'));

    }

    public  function lessons($courseSlug,$lessonSlug)
    {
        $course = Course::where('slug',$courseSlug)->first();
        $currentLesson = Lesson::where('slug',$lessonSlug)->first();
        return view('lessons',compact('course','currentLesson'));
    }
}
