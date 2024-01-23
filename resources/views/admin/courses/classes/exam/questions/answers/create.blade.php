<x-app-layout>
    <div class="pt-16">
        @livewire('admin.courses.classes.exam.questions.answers.FormAnswer', ['questionId' => $questionId, 'answerId' => 0])
    </div>
</x-app-layout>