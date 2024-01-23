<?php

namespace App\Livewire\Admin\Courses\Classes;

use App\Models\CourseClass;
use Livewire\Component;

class ClassForm extends Component
{
    public $courseId;
    public $classId;
    public $class;
    public $title;
    public $description;
    public $videoUrl;

    public function mount($courseId, $classId)
    {
        $this->courseId = $courseId;
        $this->classId = $classId;
        $this->class = CourseClass::find($this->classId);

        if ($classId != 0) {
            $this->initPropertiesToEdit($this->class);
        }
    }

    public function render()
    {
        return view('livewire.admin.courses.classes.class-form', [
            'courseId' => $this->courseId,
            'class' => $this->class
        ]);
    }

    public function store()
    {
        $rules = ([
            'title' => 'required',
            'description' => 'required',
            'videoUrl' => 'image|max:1024',
        ]);

        $customMessages = [
            'title.required' => 'El campo titulo es obligatorio.',
            'description.required' => 'El campo descripción es obligatorio.',
            'videoUrl.required' => 'El campo descripción es obligatorio.',
        ];

        CourseClass::create([
            'course_id' => $this->courseId,
            'title' => $this->title,
            'description' => $this->description,
            'video_url' => $this->videoUrl
        ]);


        session()->flash('message', 'Clase registrada correctamente');
    }

    public function update()
    {
        $rules = ([
            'title' => 'required',
            'description' => 'required',
            'videoUrl' => 'image|max:1024',
        ]);

        $customMessages = [
            'title.required' => 'El campo titulo es obligatorio.',
            'description.required' => 'El campo descripción es obligatorio.',
            'videoUrl.required' => 'El campo descripción es obligatorio.',
        ];

        $courseClass = CourseClass::find($this->classId);
        $courseClass->title = $this->title;
        $courseClass->description = $this->description;
        $courseClass->video_url = $this->videoUrl;
        $courseClass->save();

        session()->flash('message', 'Clase actualizada correctamente');
    }

    public function destroy(){
        
    }

    public function initPropertiesToEdit($class)
    {
        $this->title = $class->title;
        $this->description = $class->description;
        $this->videoUrl = $class->video_url;
    }
}
