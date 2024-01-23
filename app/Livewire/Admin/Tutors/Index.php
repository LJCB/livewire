<?php

namespace App\Livewire\Admin\Tutors;

use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.admin.tutors.index', [
            'tutors' => User::role('tutor')->get()
        ]);
    }
}
