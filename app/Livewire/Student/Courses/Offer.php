<?php

namespace App\Livewire\Student\Courses;

use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Offer extends Component
{
    public $courses;    

    public function mount()
    {
        $user_id = auth()->user()->id;

        $this->courses = Course::whereDoesntHave('users', function ($query) use ($user_id) {
            $query->where('user_id', $user_id);
        })->get();
    }

    public function render()
    {
        return view('livewire.student.courses.offer');
    }
}
