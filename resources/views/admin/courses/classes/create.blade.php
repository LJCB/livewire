<x-app-layout>
    <div class="pt-16">
        @livewire('admin.courses.classes.classForm', ['classId' => 0, 'courseId' => $courseId])
    </div>
</x-app-layout>