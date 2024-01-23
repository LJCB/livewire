<?php

namespace App\Livewire\Admin\Courses\Classes\Exam\Questions;

use App\Models\Question;
use Livewire\Component;

class QuestionForm extends Component
{       
    public $examId;
    public $question;

    public function mount($examId)
    {
        $this->examId = $examId;
    }

    public function render()
    {
        return view('livewire.admin.courses.classes.exam.questions.question-form');
    }

    public function store()
    {
        $question = Question::create([
            'exam_id' => $this->examId,
            'question' => $this->question
        ]);

        session()->flash('message', 'Pregunta registrada correctamente');

        return redirect()->route('admin.course.classes.exam.show', $question->exam->course_class_id);
    }
}
