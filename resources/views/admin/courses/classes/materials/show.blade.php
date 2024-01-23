<x-app-layout>
    <div class="pt-16">
        @livewire('admin.courses.classes.materials.MaterialForm ', ['classId' => 0,'materialId' => $materialId,])
    </div>
</x-app-layout>