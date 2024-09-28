<?php

namespace App\Livewire;

use App\Models\Section;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateSection extends Component
{

    public $course;

    #[Validate('required|max:128')]
    public $name = "";
    public $description = "";


    public function saveSection(){

        $this->validate();

        Section::create(
            [
                'name' => $this->name,
                'description' => $this->description,
                'course_id' => $this->course->id,
            ]
        );

        return $this->redirect('/dashboard/courses');

    }

    public function render()
    {
        return view('livewire.create-section');
    }

}
