<?php

namespace App\Livewire\Admin\Courses\Classes;

use App\Models\CourseClass;
use App\Models\Course;
use Livewire\Component;

class Index extends Component
{
    public $courseId;
    public $course;
    public $search;

    public function mount($courseId)
    {
        $this->courseId = $courseId;
        $this->course = Course::find($this->courseId);
    }

    public function render()
    {

        $classes = CourseClass::query()
        ->when($this->search, function ($query) {
            $query->where('title', 'like', '%' . $this->search . '%');
        })
        ->where('course_id', $this->courseId)->get();

        return view('livewire.admin.courses.classes.index', [
            'classes' => $classes,
            'course' => $this->course
        ]);
    }

    public function destroy($classId)
    {
        $class = CourseClass::find($classId);
        $courseId = $class->course_id;
        $class->delete();

        $this->redirect('/courses/classes/'.$courseId);
    }
}
