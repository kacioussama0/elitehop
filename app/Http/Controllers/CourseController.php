<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::all()->sortByDesc('created_at');
        return view('dashboard.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all()->toArray();

        $usersKey = array_map(function ($user) {
            return $user['id'];
        },$users);

        $userValue = array_map(function ($user) {
            return $user['first_name'] . ' ' . $user['last_name'];
        },$users);

        $users = array_combine($userValue,$usersKey);


        return view('dashboard.courses.create',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:courses,slug',
            'short_text' =>'nullable',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' =>'nullable',
            'requirements'=>'nullable',
            'objectives' => 'nullable',
            'status' => 'required|in:open,closed,hidden,soon',
            'basic_price'=>'required|numeric|min:0',
            'price'=>'required|numeric|min:0',
        ]);

        $validatedData['image'] = $request->file('image')->store('uploads/courses', 'public');

        $created = Course::create($validatedData);

        if($created){
            return redirect()->route('courses.index')->with('success', 'تم إنشاء الدورة بنجاح');
        }

        abort(500);
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        return view('dashboard.courses.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:courses,slug,' . $course->id,
            'short_text' =>'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' =>'nullable',
            'requirements'=>'nullable',
            'objectives' => 'nullable',
            'status' => 'required|in:open,closed,hidden,soon',
            'basic_price'=>'required|numeric|min:0',
            'price'=>'required|numeric|min:0',
        ]);


        if($request->hasFile('image')){
            $validatedData['image'] = $request->file('image')->store('uploads/courses', 'public');
        }

        $updated = $course->update($validatedData);

        if($updated){
            return redirect()->route('courses.index')->with('success', 'تم تعديل الدورة بنجاح');
        }

        abort(500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        if($course->delete()){
            return redirect()->route('courses.index')->with('success', 'تم حذف الدورة بنجاح');
        }

        abort(500);

    }
}
