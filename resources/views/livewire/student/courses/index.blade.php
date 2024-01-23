<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 bg-white shadow-md dark:bg-gray-800 sm:rounded-lg p-4 mb-4">
            <div>
                <h5 class="mr-3 font-semibold dark:text-white">Mis cursos</h5>
                <p class="text-gray-500 dark:text-gray-400">Consulta el progreso de tus cursos</p>
            </div>
        </div>

        <div class="flex items-center justify-between pb-4">
            <label for="search" class="sr-only">Buscar</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>

                <input type="text" wire:model.live="search"
                    class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Buscar curso" />
            </div>
        </div>
        @foreach ($studentCourses as $studentCourse )
            <ul role="list" class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3">
                <li class="col-span-1 flex flex-col divide-y divide-gray-200 rounded-lg bg-white text-center shadow">
                    <div class="flex flex-1 flex-col p-8">
                        <img class="mx-auto h-32 w-32 flex-shrink-0 rounded-full"
                            src="{{ asset('storage/course/cover/' . $studentCourse->id . '.png') }}"
                            alt="">
                        <h3 class="mt-6 text-md font-medium text-gray-900">{{$studentCourse->title}}</h3>
                        <dl class="mt-1 flex flex-grow flex-col justify-between">
                            <dd class="text-sm text-gray-500">{{$studentCourse->description}}</dd>
                            <dd class="mt-3">
                                <div class="w-full bg-gray-200 rounded-full">
                                    <div class="bg-red-500  text-xs font-medium text-blue-100 text-center p-0.5 leading-none rounded-full"
                                        style="width: 70%">{{$studentCourse->pivot->progress}}%</div>
                                </div>
                            </dd>
                        </dl>

                    </div>
                    <div>
                        <div class="-mt-px flex divide-x divide-gray-200">
                            <div class="-ml-px flex w-0 flex-1">
                                <a href="tel:+1-202-555-0170" 
                                    class=" hover:bg-gray-100 relative inline-flex w-0 flex-1 items-center justify-center gap-x-3 rounded-br-lg border border-transparent py-4 text-sm font-semibold text-gray-900">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                                    </svg>
                                    Continuar aprendiendo
                                </a>
                            </div>
                        </div>
                    </div>
                </li>

            </ul>
        @endforeach
    </div>
</div>