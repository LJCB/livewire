<x-app-layout>
    <div class="pt-16">
        @livewire('admin.courses.classes.exam.questions.answers.FormAnswer', ['questionId' => 0, 'answerId' => $answerId])
    </div>
</x-app-layout>