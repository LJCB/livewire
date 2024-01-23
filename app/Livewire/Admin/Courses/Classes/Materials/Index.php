<?php

namespace App\Livewire\Admin\Courses\Classes\Materials;

use App\Models\CourseClass;
use Livewire\Component;

class Index extends Component
{
    public $classId;
    public $courseClass; 

    public function mount($classId)
    {
        $this->classId = $classId;
        $this->courseClass = CourseClass::find($classId);
    }

    public function render()
    {
        return view('livewire.admin.courses.classes.materials.index',[
            'materials' => $this->courseClass->materials,
            'class' => $this->courseClass
        ]);
    }
}
