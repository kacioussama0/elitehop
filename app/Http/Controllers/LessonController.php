<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Section;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Course $course,Section $section)
    {

        $lessons = $section->lessons;

        return view('dashboard.lessons.index',compact('section','course','lessons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Course $course,Section $section)
    {

        return view('dashboard.lessons.create',compact('section','course'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Course $course,Section $section,Request $request)
    {


        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|max:255|unique:lessons',
            'short_text'=>'nullable|max:255',
            'description' => 'nullable',
            'video_link' => 'required|url|max:255',
        ]);

        $created = $section->lessons()->create($validatedData);

        if($created){

            $lessons = $section->lessons;

            session()->flash('success','تم إضافة الدرس بنجاح');


            return view('dashboard.lessons.index',compact('section','course','lessons'));
        }

        abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(Lesson $lesson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course$course,Section $section,Lesson $lesson)
    {
        return view('dashboard.lessons.edit',compact('section','course','lesson'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Course $course,Section $section, Lesson $lesson,Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|max:255|unique:lessons,slug,' . $lesson->id,
            'short_text'=>'nullable|max:255',
            'description' => 'nullable',
            'video_link' => 'required|url|max:255',
        ]);

        $updated = $lesson->update($validatedData);

        if($updated){

            $lessons = $section->lessons;

            session()->flash('success','تم تعديل الدرس بنجاح');

            return view('dashboard.lessons.index',compact('section','course','lessons'));
        }

        abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course,Section $section,Lesson $lesson)
    {
        if($lesson->delete()){
            return redirect()->back()->with('success','تم حذف الدرس بنجاح');
        }

        abort(500);
    }
}
