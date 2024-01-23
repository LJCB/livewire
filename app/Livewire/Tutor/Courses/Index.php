<?php

namespace App\Livewire\Tutor\Courses;

use Livewire\Component;

class Index extends Component
{
    public $tutor;
    public $tutorCourses;

    public function mount()
    {
        $this->tutor = auth()->user();
        $this->tutorCourses = $this->tutor->courses;
    }

    public function render()
    {
        return view('livewire.tutor.courses.index');
    }
}
