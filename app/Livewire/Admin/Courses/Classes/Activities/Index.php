<?php

namespace App\Livewire\Admin\Courses\Classes\Activities;

use App\Models\Activity;
use App\Models\CourseClass;
use Livewire\Component;

class Index extends Component
{
    public $classId;
    public $class;

    public function mount($classId)
    {
        $this->classId = $classId;
        $this->class = CourseClass::find($classId);
    }
    

    public function render()
    {
        return view('livewire.admin.courses.classes.activities.index', [
            'class' => $this->class,
            'activities' => $this->class->activities
        ]);
    }

    public function destroy($activityId)
    {
        $activity = Activity::find($activityId);
        $classId = $activity->course_class_id;
        $activity->delete();

        $this->redirect('/courses/classes/activities/'.$classId);
    }
}
