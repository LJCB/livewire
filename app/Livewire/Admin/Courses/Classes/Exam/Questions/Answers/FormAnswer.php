<?php

namespace App\Livewire\Admin\Courses\Classes\Exam\Questions\Answers;

use App\Models\Answer;
use Livewire\Component;

class FormAnswer extends Component
{
    public $questionId;
    public $answerId;
    public $answer;
    public $answerObj;
    public $isCorrect;

    public function mount($questionId, $answerId)
    {
        $this->questionId = $questionId;

        if ($answerId != 0){
            $this->answerObj = Answer::find($answerId);
            $this->answer = $this->answerObj->answer;
            $this->isCorrect = $this->answerObj->is_correct;
        }
    }

    public function render()
    {
        return view('livewire.admin.courses.classes.exam.questions.answers.form-answer', [
            'answer' => $this->answer
        ]);
    }

    public function store()
    {
        Answer::create([
            'question_id' => $this->questionId,
            'answer' => $this->answer,
            'is_correct' => $this->isCorrect ? $this->isCorrect : false
        ]);

        session()->flash('message', 'Respuesta registrada correctamente');
        return redirect()->route('admin.course.classes.exam.questions.answers.index', $this->questionId);

    }

    public function update()
    {
        $answer = Answer::find($this->answerId);
        $answer->answer = $this->answer;
        $answer->is_correct = $this->isCorrect;
        $answer->save();

        session()->flash('message', 'Respuesta actualizada correctamente');
        return redirect()->route('admin.course.classes.exam.questions.answers.index', $answer->question_id);

    }
}
