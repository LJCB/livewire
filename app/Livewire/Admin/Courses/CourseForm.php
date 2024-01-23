<?php

namespace App\Livewire\Admin\Courses;

use App\Models\Course;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class CourseForm extends Component
{
    use WithFileUploads;

    public $courseId;
    public $course;
    public $title;
    public $description;
    public $courseImage;

    public function mount($courseId)
    {
        $this->courseId = $courseId;

        if ($courseId != 0) {
            $this->course = Course::find($this->courseId);
            $this->title = $this->course->title;
            $this->description = $this->course->description;
        }
    }

    public function render()
    {   
        return view('livewire.admin.courses.course-form', [
            'course' => $this->course
        ]);
    }

    public function store(){
        $rules = ([
            'title' => 'required',
            'description' => 'required',
            'courseImage' => 'image|max:1024',
        ]);

        $customMessages = [
            'title.required' => 'El campo titulo es obligatorio.',
            'description.required' => 'El campo descripción es obligatorio.',
        ];

        $course = Course::create([
            'title' => $this->title,
            'description' => $this->description,
            'image' => '',
        ]);

        $imagePath = $this->courseImage->storeAs('public/course/cover', $course->id. '.png');
        $course->image = $imagePath;

        session()->flash('message', 'Curso registrado correctamente');

    }

    public function update(){
        $rules = ([
            'title' => 'required',
            'description' => 'required',
            'courseImage' => 'image|max:1024',
        ]);

        $customMessages = [
            'title.required' => 'El campo titulo es obligatorio.',
            'description.required' => 'El campo descripción es obligatorio.',
        ];

        $course = Course::find($this->courseId);
        $course->title = $this->title;
        $course->description = $this->description;

        if (!is_null($this->courseImage)) {
            if (Storage::exists($course->image)) {
                Storage::delete($course->image);
            }
            $imagePath = $this->courseImage->storeAs('public/course/cover', $course->id. '.png');
            $course->image = $imagePath;
        }
        
        $course->save();

        session()->flash('message', 'Curso actualizado correctamente');

    }
}
