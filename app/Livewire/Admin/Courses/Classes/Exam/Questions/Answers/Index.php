<?php

namespace App\Livewire\Admin\Courses\Classes\Exam\Questions\Answers;

use App\Models\Question;
use Livewire\Component;

class Index extends Component
{

    public $questionId;
    public $question;

    public function mount($questionId)
    {
        $this->questionId = $questionId;
        $this->question = Question::find($questionId);
    }

    public function render()
    {
        return view('livewire.admin.courses.classes.exam.questions.answers.index', [
            'answers' => $this->question->answers,
            'question' => $this->question
        ]);
    }
}
