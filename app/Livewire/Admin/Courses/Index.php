<?php

namespace App\Livewire\Admin\Courses;

use App\Models\Course;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Index extends Component
{
    public $search;
    public $course;

    public function render()
    {
        $courses = Course::query()
            ->when($this->search, function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%');
            })
            ->get();

        return view('livewire.admin.courses.index', [
            'courses' => $courses
        ]);
    }

    public function edit($course)
    {
        $this->course = $course;
        return redirect()->route('CourseForm', ['course' => $this->course]);
    }

    public function destroy($courseId)
    {
        $course = Course::find($courseId);
        $course->delete();

        $this->redirect('/courses');
    }
}
