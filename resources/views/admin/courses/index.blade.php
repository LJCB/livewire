<x-app-layout>

    <div class="pt-16">
        @section('sidebar')
        @include('components.admin.sidebar')
        @endsection
        @livewire('admin.courses.index')
    </div>
</x-app-layout>