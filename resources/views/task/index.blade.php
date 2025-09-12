{{-- Это всё заготовка --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tasks') }}
        </h2>
    </x-slot>

    <div class="mx-auto mt-16 bg-white dark:bg-gray-800 rounded-xl shadow-2xl w-[70%] overflow-hidden transition-all duration-300 hover:shadow-3xl animate-fade-in">
        <div class="p-6">
            @if(!empty($tasks))
                @foreach($tasks as $task)
                    <div class="flex justify-between items-center space-x-4 mb-2 p-3 bg-indigo-50 dark:bg-gray-700 rounded-lg transition-all duration-300 hover:bg-indigo-100 dark:hover:bg-gray-600">
                        <div>
                            <h3 class="text-lg font-semibold text-indigo-800 dark:text-white">Create logo</h3>
                            <p class="text-sm text-gray-600 font-bold dark:text-gray-300">{{ $task->name }}</p>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-indigo-800 dark:text-white">Author</h3>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-indigo-800 dark:text-white">Worker</h3>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-indigo-800 dark:text-white">Data create</h3>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        <div class="p-6">
            {{ $tasks->links() }}
        </div>
    </div>
</x-app-layout>
