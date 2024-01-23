<x-app-layout>
    <div class="pt-16">
        @livewire('admin.courses.classes.exam.questions.answers.index', [
            'questionId' => $questionId
        ])
    </div>
</x-app-layout>