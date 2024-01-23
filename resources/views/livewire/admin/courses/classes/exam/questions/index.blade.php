<div class=" mx-auto sm:px-6 lg:px-8">
   
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
       
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2  dark:border-gray-800 sm:rounded-lg px-4 py-2 mb-2">
            <div>
                <h5 class="mr-3 font-semibold dark:text-white">Preguntas</h5>
                <p class="text-gray-500 dark:text-gray-400">Listado de preguntas registradas</p>
            </div>
            <a href="{{ route('admin.course.classes.exam.questions.create', $examId) }}"
                class="flex items-center justify-end px-3 py-2 text-sm font-medium underline  text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800">
                Agregar pregunta
            </a>
        </div>
        <hr class="h-1 mx-auto my-4 bg-gray-100 border-0 rounded md:my-10 dark:bg-gray-700">
        <div class="flex items-center justify-between py-4">
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
                    placeholder="Buscar clase" />

            </div>
        </div>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Pregunta
                    </th>
                    <th scope="col" class="px-6 py-3" align="center">
                        Respuestas
                    </th>
                   
                    <th scope="col" class="px-6 py-3" align="center">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($questions as $question)
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $question->question}}
                    </th>
                    <td class="px-6 py-4" align="center">
                        <a href="{{ route('admin.course.classes.exam.questions.answers.index', $question->id) }}">
                            <span
                                class="bg-green-100 text-green-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">{{ count($question->answers) }}</span>
                        </a>
                    </td>
                    
                    <td class="px-6 py-4" align="center">
                        <a href=""
                            class="px-2 py-2 mr-2  text-sm font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                            </svg>
                        </a>
                    </td>

                </tr>

                @endforeach

            </tbody>
        </table>

    </div>
</div>
