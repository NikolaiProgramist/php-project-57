<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <div class="flex justify-start">
                <div class="flex items-center">
                    {{ __('Просмотр задачи: ') . $task->name }}
                </div>
                <div class="w-20 ml-2">
                    <a href="{{ route('tasks.edit', $task) }}"
                       class="w-[70%] inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">
                        <svg class="w-[80%] mx-auto fill-indigo-800"
                             xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                            <!--!Font Awesome Free v7.0.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                            <path d="M352.9 21.2L308 66.1 445.9 204 490.8 159.1C504.4 145.6 512 127.2 512 108s-7.6-37.6-21.2-51.1L455.1 21.2C441.6 7.6 423.2 0 404 0s-37.6 7.6-51.1 21.2zM274.1 100L58.9 315.1c-10.7 10.7-18.5 24.1-22.6 38.7L.9 481.6c-2.3 8.3 0 17.3 6.2 23.4s15.1 8.5 23.4 6.2l127.8-35.5c14.6-4.1 27.9-11.8 38.7-22.6L412 237.9 274.1 100z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="flex justify-start">
                    <div>
                        <h3 class="text-lg font-semibold text-indigo-800 dark:text-white">Имя: {{ $task->name }}</h3>
                    </div>
                </div>
                <div class="flex justify-start">
                    <div>
                        <h3 class="text-lg font-semibold text-indigo-800 dark:text-white">
                            Статус:
                        </h3>
                    </div>
                    <div>
                        <p class="text-sm mt-1.5 ml-1 text-gray-600 font-bold dark:text-gray-300">{{ $task->status->name }}</p>
                    </div>
                </div>
                <div class="flex justify-start">
                    <div>
                        <h3 class="text-lg font-semibold text-indigo-800 dark:text-white">
                            Описание:
                        </h3>
                    </div>
                    <div>
                        <p class="text-sm mt-1.5 ml-1 text-gray-600 font-bold dark:text-gray-300">{{ $task->description }}</p>
                    </div>
                </div>
                <div class="flex justify-start">
                    <div>
                        <h3 class="text-lg font-semibold text-indigo-800 dark:text-white">
                            Метки:{{-- Place for the labels --}}
                        </h3>
                    </div>
                    <div>
                        @foreach($task->labels as $label)
                            <span class="text-sm mt-1.5 ml-1 text-gray-600 font-bold dark:text-gray-300">{{ $label->name }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
