<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Hello from Hexlet!') }}
        </h1>

        <p class="text-sm mt-2 text-gray-600 dark:text-gray-300">
            {{ __('This is a simple task manager built with Laravel. You can create tasks, statuses, and labels here. It also supports soft deletion') }}
        </p>

        <div class="mt-6 flex justify-between">
            <div class="inline-flex items-center w-1/5 h-40 bg-indigo-100 rounded-xl shadow-2xl overflow-hidden transition-all duration-300 hover:shadow-3xl animate-fade-in">
                <div class="m-auto">
                    <div>
                        <h2 class="text-center font-semibold text-6xl text-indigo-800 dark:text-gray-200 leading-tight">
                            {{ $usersCount }}
                        </h2>
                    </div>
                    <div class="flex justify-center">
                        <div class="flex justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#3730a3" class="bi bi-people-fill" viewBox="0 0 16 16">
                                <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5"/>
                            </svg>
                        </div>
                        <h3 class="ml-2 mt-0.5 text-center text-lg font-semibold text-indigo-800 dark:text-white">
                            {{ __('Count of users') }}
                        </h3>
                    </div>
                </div>
            </div>

            <div class="inline-flex items-center w-1/5 h-40 bg-green-100 rounded-xl shadow-2xl overflow-hidden transition-all duration-300 hover:shadow-3xl animate-fade-in">
                <div class="m-auto">
                    <div>
                        <h2 class="text-center font-semibold text-6xl text-green-800 dark:text-gray-200 leading-tight">
                            {{ $tasksCount }}
                        </h2>
                    </div>
                    <div class="flex justify-center">
                        <div class="flex justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#166534" class="bi bi-file-earmark-text-fill" viewBox="0 0 16 16">
                                <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M4.5 9a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m.5 2.5a.5.5 0 0 1 0-1h4a.5.5 0 0 1 0 1z"/>
                            </svg>
                        </div>
                        <h3 class="ml-2 mt-0.5 text-center text-lg font-semibold text-green-800 dark:text-white">
                            {{ __('Count of tasks') }}
                        </h3>
                    </div>
                </div>
            </div>

            <div class="inline-flex items-center w-1/5 h-40 bg-red-100 rounded-xl shadow-2xl overflow-hidden transition-all duration-300 hover:shadow-3xl animate-fade-in">
                <div class="m-auto">
                    <div>
                        <h2 class="text-center font-semibold text-6xl text-red-800 dark:text-gray-200 leading-tight">
                            {{ $deletedTasksCount }}
                        </h2>
                    </div>
                    <div class="flex justify-center">
                        <div class="flex justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#991b1b" class="bi bi-file-earmark-x-fill" viewBox="0 0 16 16">
                                <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0M9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1M6.854 7.146 8 8.293l1.146-1.147a.5.5 0 1 1 .708.708L8.707 9l1.147 1.146a.5.5 0 0 1-.708.708L8 9.707l-1.146 1.147a.5.5 0 0 1-.708-.708L7.293 9 6.146 7.854a.5.5 0 1 1 .708-.708"/>
                            </svg>
                        </div>
                        <h3 class="ml-2 mt-0.5 text-center text-lg font-semibold text-red-800 dark:text-white">
                            {{ __('Count of deleted tasks') }}
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>
