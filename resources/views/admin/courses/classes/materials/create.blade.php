<x-app-layout>
    <div class="pt-16">
        @livewire('admin.courses.classes.materials.MaterialForm', ['classId' => $classId, 'materialId'=> 0])
    </div>
</x-app-layout>