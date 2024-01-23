<?php

namespace App\Livewire\Admin\Courses\Classes\Exam;

use App\Models\CourseClass;
use App\Models\Exam;
use Livewire\Component;

class ExamForm extends Component
{

    public $exam;
    public $classId;
    public $name;
    public $instructions;

    public function mount($classId)
    {
        $this->classId = $classId;
        $class = CourseClass::find($classId);
        $this->exam = $class->exam;

        if ($this->exam) {
            $this->name = $this->exam->name;
            $this->instructions = $this->exam->instructions;
        }
    }

    public function render()
    {
        return view('livewire.admin.courses.classes.exam.exam-form', [
            'exam' => $this->exam,
            'classId' => $this->classId
        ]);
    }

    public function store()
    {
        Exam::create([
            'course_class_id' => $this->classId,
            'name' => $this->name,
            'instructions' => $this->instructions
        ]);

        session()->flash('message', 'Examen registrado correctamente');
    }

    public function update()
    {
        $exam = Exam::find($this->exam->id);
        $exam->name = $this->name;
        $exam->instructions = $this->instructions;
        $exam->save();

        session()->flash('message', 'Examen actualizado correctamente');

        return redirect()->route('admin.course.classes.exam.show', $exam->course_class_id);
    }
}
