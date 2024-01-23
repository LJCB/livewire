<?php

namespace App\Livewire\Admin\Courses\Classes\Activities;

use App\Models\Activity;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class ActivityForm extends Component
{
    use WithFileUploads;

    public $classId;
    public $activityId;
    public $activity;

    public $description;
    public $activityFile;
    

    public function mount($classId, $activityId)
    {
        $this->classId = $classId;
        $this->activityId = $activityId;
        if ($activityId != 0) {
            $activity = Activity::find($activityId);
            $this->description = $activity->description;
            
            $this->activity = $activity;
        }
    }
    
    public function render()
    {
        return view('livewire.admin.courses.classes.activities.activity-form', [
            'activity' => $this->activity
        ]);
    }

    public function store(){
        $rules = ([
            'description' => 'required',
            'activityFile' => 'required|mimes:pdf',
        ]);

        $customMessages = [
            'description.required' => 'El campo descripción es obligatorio.',
            'activityFile.required' => 'El archivo de la actividad debe ser PDF'
        ];


        $activity = Activity::create([
            'course_class_id' => $this->classId,
            'description' => $this->description,
            'file' => 'path',
        ]);
        $this->activity = $activity;

        $filePath = $this->activityFile->storeAs('public/course/classes/', $activity->course_class_id . '/' . $activity->id . '.pdf');
        $activity->file = $filePath;

        session()->flash('message', 'Actividad registrada correctamente');

        return redirect()->back();

    }

    public function update(){
        $rules = ([
            'description' => 'required',
            'activityFile' => 'required|mimes:pdf',
        ]);

        $customMessages = [
            'description.required' => 'El campo descripción es obligatorio.',
            'activityFile.required' => 'El archivo de la actividad debe ser PDF'
        ];

        $activity = Activity::find($this->activityId);
        $activity->description = $this->description;

        if (!is_null($this->activityFile)) {
            if (Storage::exists($activity->file)) {
                Storage::delete($activity->file);
            }
            $filePath = $this->activityFile->storeAs('public/course/classes/', $activity->course_class_id . '/' . $activity->id . '.pdf');
            $activity->file = $filePath;
        }

       $activity->save();

        session()->flash('message', 'Actividad actualizada correctamente');

    }
}
