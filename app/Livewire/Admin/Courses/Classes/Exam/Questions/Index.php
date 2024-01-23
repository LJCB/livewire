<?php

namespace App\Livewire\Admin\Courses\Classes\Exam\Questions;

use App\Models\Question;
use Livewire\Component;

class Index extends Component
{
    public $examId;
    public $examName;

    public function mount($examId){
        $this->examId = $examId;
    }

    public function render()
    {
        return view('livewire.admin.courses.classes.exam.questions.index', [
            'questions' => Question::query()->where('exam_id', $this->examId)->get(),
            'examName' => $this->examName
        ]);
    }
}
