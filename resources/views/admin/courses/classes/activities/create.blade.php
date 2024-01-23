<x-app-layout>
    <div class="pt-16">
        @livewire('admin.courses.classes.activities.activityForm', ['classId' => $classId, 'activityId'=> 0])
    </div>
</x-app-layout>