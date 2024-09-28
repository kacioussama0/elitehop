<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($slug)
    {
        $course = Course::where('slug', $slug)->firstOrFail();
        $sections = $course->sections;
        return view('dashboard.sections.index', compact('sections', 'course'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,$slug)
    {
        $course = Course::where('slug', $slug)->firstOrFail();
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable|max:1000',
        ]);

        $created = $course->sections()->create($validatedData);

        if($created){
            return redirect()->route('sections.index', $course->slug)->with('success', 'تم إنشاء القسم بنجاح');
        }

        abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($slug,Section $section)
    {
        $course = Course::where('slug', $slug)->firstOrFail();

        return view('dashboard.sections.edit', compact('section', 'course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($slug, Section $section,Request $request)
    {
        $course = Course::where('slug', $slug)->firstOrFail();

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable|max:1000',
        ]);

        $updated = $section->update($validatedData);

        if($updated){
            return redirect()->route('sections.index', $course->slug)->with('success', 'تم تعديل القسم بنجاح');
        }

        abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug,Section $section)
    {
        $course = Course::where('slug', $slug)->firstOrFail();

        if($section->delete()) {
            return redirect()->route('sections.index', $course->slug)->with('success', 'تم حذف القسم بنجاح');
        }
        abort(500);
    }
}
