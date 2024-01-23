<?php

namespace App\Livewire\Public\Courses;

use App\Models\Course;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.public.courses.index', [
            'courses' => Course::all()
        ]);
    }
}
