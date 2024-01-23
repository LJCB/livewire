<?php

namespace App\Livewire\Student\Courses;

use Livewire\Component;

class Index extends Component
{

    public $studentCourses;

    public function mount()
    {
        $this->studentCourses = auth()->user()->courses;
    }


    public function render()
    {
        return view('livewire.student.courses.index');
    }
}
