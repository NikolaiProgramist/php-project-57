<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Задачи') }}
        </h2>
    </x-slot>

    <div class="flex justify-center">
        <div id="search-bar"
             class="w-auto max-w-[86%] mt-8 p-6 bg-white dark:bg-gray-800 rounded-xl shadow-xl overflow-hidden transition-all duration-300 hover:shadow-3xl animate-fade-in">
            <form method="GET" action="{{ route('tasks.index') }}" class="flex items-center justify-center">
                <select name="filter[status_id]" id="filter[status_id]"
                        class="max-w-[36%] mt-1 mr-4 block border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                    <option value="">Статус</option>
                    @foreach($statuses as $status)
                        @if(request()->input('filter.status_id') === (string) $status->id)
                            <option selected="selected" value="{{ $status->id }}">{{ $status->name }}</option>
                        @else
                            <option value="{{ $status->id }}">{{ $status->name }}</option>
                        @endif
                    @endforeach
                </select>

                <select name="filter[created_by_id]" id="filter[created_by_id]"
                        class="max-w-[36%] mt-1 mr-4 block border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                    <option value="">Автор</option>
                    @foreach($users as $user)
                        @if(request()->input('filter.created_by_id') === (string) $user->id)
                            <option selected="selected" value="{{ $user->id }}">{{ $user->name }}</option>
                        @else
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endif
                    @endforeach
                </select>

                <select name="filter[assigned_to_id]" id="filter[assigned_to_id]"
                        class="max-w-[36%] mt-1 mr-4 block border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                    <option value="">Исполнитель</option>
                    @foreach($users as $user)
                        @if(request()->input('filter.assigned_to_id') === (string) $user->id)
                            <option selected="selected" value="{{ $user->id }}">{{ $user->name }}</option>
                        @else
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endif
                    @endforeach
                </select>

                @if(request()->input('filter.deleted_at') === 'on')
                    <x-checkbox checked name="filter[deleted_at]" id="filter[deleted_at]">Удалённые задачи</x-checkbox>
                @else
                    <x-checkbox name="filter[deleted_at]" id="filter[deleted_at]">Удалённые задачи</x-checkbox>
                @endif

                <x-primary-button>Применить</x-primary-button>
            </form>
        </div>
    </div>

    <div class="flex justify-center">
        <div class="mt-8 bg-white dark:bg-gray-800 rounded-xl shadow-2xl w-[80%] overflow-hidden transition-all duration-300 hover:shadow-3xl animate-fade-in">
            <div class="p-6">
                <div class="flex justify-between">
                    <div class="w-[90%] flex justify-between items-center text-left space-x-4 mb-2 p-3 rounded-lg">
                        <div class="w-[4%]">
                            <h3 class="text-lg font-semibold text-indigo-800 dark:text-white">ID</h3>
                        </div>
                        <div class="w-[8%]">
                            <h3 class="text-lg font-semibold text-indigo-800 dark:text-white">Статус</h3>
                        </div>
                        <div class="w-[36%]">
                            <h3 class="text-lg font-semibold text-indigo-800 dark:text-white">Имя</h3>
                        </div>
                        <div class="w-[16%]">
                            <h3 class="text-lg font-semibold text-indigo-800 dark:text-white">Автор</h3>
                        </div>
                        <div class="w-[16%]">
                            <h3 class="text-lg font-semibold text-indigo-800 dark:text-white">Исполнитель</h3>
                        </div>
                        <div class="w-[16%]">
                            <h3 class="text-lg font-semibold text-indigo-800 dark:text-white">Дата создания</h3>
                        </div>
                    </div>

                    @auth()
                        <div class="w-[8%] h-auto text-center items-center space-x-4 mb-2 p-3">
                            <h3 class="text-lg font-semibold text-indigo-800 dark:text-white">Действия</h3>
                        </div>
                    @endauth
                </div>
                @if(!empty($tasks))
                    @foreach($tasks as $task)
                        <div class="flex justify-between">
                            <div class="w-[90%] flex justify-between items-center text-left space-x-4 mb-2 p-3 {{ $task->deleted_at === null ? "bg-indigo-50 hover:bg-indigo-100 dark:hover:bg-gray-600" : "bg-red-50 hover:bg-red-100 dark:hover:bg-red-600" }} dark:bg-gray-700 rounded-lg transition-all duration-300">
                                <div class="w-[4%]">
                                    <p class="text-sm mt-1.5 text-gray-600 font-bold dark:text-gray-300">{{ $task->id }}</p>
                                </div>
                                <div class="w-[8%]">
                                    <p class="text-sm mt-1.5 text-gray-600 font-bold dark:text-gray-300">{{ $task->status->name }}</p>
                                </div>
                                <div class="w-[36%]">
                                    @if($task->deleted_at === null)
                                        <a href="{{ route('tasks.show', $task) }}">
                                            <h3 class="text-lg font-semibold text-indigo-800 dark:text-white">{{ $task->name }}</h3>
                                        </a>
                                    @else
                                        <h3 class="text-lg font-semibold text-red-800 dark:text-red-800">{{ $task->name }}</h3>
                                    @endif
                                </div>
                                <div class="w-[16%]">
                                    <p class="text-sm mt-1.5 text-gray-600 font-bold dark:text-gray-300">{{ $task->createdBy->name }}</p>
                                </div>
                                <div class="w-[16%]">
                                    <p class="text-sm mt-1.5 text-gray-600 font-bold dark:text-gray-300">{{ $task->assignedTo->name ?? '' }}</p>
                                </div>
                                <div class="w-[16%]">
                                    <p class="text-sm mt-1 text-gray-600 font-bold dark:text-gray-300">{{ Carbon\Carbon::createFromDate($task->created_at)->format('d.m.Y') }}</p>
                                </div>
                            </div>

                            @auth()
                                <div class="flex w-[8%] h-auto items-center mb-2">
                                    <div class="flex justify-between">
                                        @if($task->deleted_at === null)
                                            <a href="{{ route('tasks.edit', $task) }}"
                                               class="w-[48%] inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">
                                                <svg class="w-[50%] mx-auto fill-indigo-800"
                                                     xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                    <!--!Font Awesome Free v7.0.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                                    <path d="M352.9 21.2L308 66.1 445.9 204 490.8 159.1C504.4 145.6 512 127.2 512 108s-7.6-37.6-21.2-51.1L455.1 21.2C441.6 7.6 423.2 0 404 0s-37.6 7.6-51.1 21.2zM274.1 100L58.9 315.1c-10.7 10.7-18.5 24.1-22.6 38.7L.9 481.6c-2.3 8.3 0 17.3 6.2 23.4s15.1 8.5 23.4 6.2l127.8-35.5c14.6-4.1 27.9-11.8 38.7-22.6L412 237.9 274.1 100z"/>
                                                </svg>
                                            </a>

                                            @can('delete', $task)
                                                <a href="{{ route('tasks.destroy', $task) }}"
                                                   data-confirm="{{ __('Вы уверенны?') }}" data-method="delete"
                                                   rel="nofollow"
                                                   class="w-[48%] inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                                    <svg class="w-[50%] mx-auto fill-white"
                                                         xmlns="http://www.w3.org/2000/svg"
                                                         viewBox="0 0 448 512">
                                                        <!--!Font Awesome Free v7.0.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                                        <path d="M136.7 5.9L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-8.7-26.1C306.9-7.2 294.7-16 280.9-16L167.1-16c-13.8 0-26 8.8-30.4 21.9zM416 144L32 144 53.1 467.1C54.7 492.4 75.7 512 101 512L347 512c25.3 0 46.3-19.6 47.9-44.9L416 144z"/>
                                                    </svg>
                                                </a>
                                            @endcan
                                        @else
                                            @can('restore', $task)
                                                <a href="{{ route('tasks.restore', $task) }}"
                                                   data-confirm="{{ __('Вы уверенны?') }}" data-method="patch"
                                                   rel="nofollow"
                                                   class="w-[48%] inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150">
                                                    <svg class="w-[50%] mx-auto fill-indigo-800"
                                                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640">
                                                        <!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                                        <path d="M263.1 48L377 48C390.8 48 403 56.8 407.4 69.9L416 96L512 96C529.7 96 544 110.3 544 128C544 145.7 529.7 160 512 160L128 160C110.3 160 96 145.7 96 128C96 110.3 110.3 96 128 96L224 96L232.7 69.9C237.1 56.8 249.3 48 263.1 48zM128 208L512 208L490.9 531.1C489.3 556.4 468.3 576 443 576L197 576C171.7 576 150.7 556.4 149.1 531.1L128 208zM337 287C327.6 277.6 312.4 277.6 303.1 287L231.1 359C221.7 368.4 221.7 383.6 231.1 392.9C240.5 402.2 255.7 402.3 265 392.9L296 361.9L296 464C296 477.3 306.7 488 320 488C333.3 488 344 477.3 344 464L344 361.9L375 392.9C384.4 402.3 399.6 402.3 408.9 392.9C418.2 383.5 418.3 368.3 408.9 359L336.9 287z"/>
                                                    </svg>
                                                </a>
                                            @endcan

                                            @can('delete', $task)
                                                <a href="{{ route('tasks.destroy', $task) }}"
                                                   data-confirm="{{ __('Вы уверенны?') }}" data-method="delete"
                                                   rel="nofollow"
                                                   class="w-[48%] inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                                    <svg class="w-[50%] mx-auto fill-white"
                                                         xmlns="http://www.w3.org/2000/svg"
                                                         viewBox="0 0 640 640"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                                        <path d="M183.1 137.4C170.6 124.9 150.3 124.9 137.8 137.4C125.3 149.9 125.3 170.2 137.8 182.7L275.2 320L137.9 457.4C125.4 469.9 125.4 490.2 137.9 502.7C150.4 515.2 170.7 515.2 183.2 502.7L320.5 365.3L457.9 502.6C470.4 515.1 490.7 515.1 503.2 502.6C515.7 490.1 515.7 469.8 503.2 457.3L365.8 320L503.1 182.6C515.6 170.1 515.6 149.8 503.1 137.3C490.6 124.8 470.3 124.8 457.8 137.3L320.5 274.7L183.1 137.4z"/>
                                                    </svg>
                                                </a>
                                            @endcan
                                        @endif
                                    </div>
                                </div>
                            @endauth
                        </div>
                    @endforeach
                @endif
            </div>

            <div class="p-6">
                {{ $tasks->links() }}
            </div>
        </div>

        @auth
            <a href="{{ route('tasks.create') }}"
               class="flex w-[5%] items-center mt-8 ml-4 bg-white dark:bg-gray-800 rounded-xl shadow-2xl overflow-hidden transition ease-in-out duration-150 hover:shadow-3xl animate-fade-in tracking-widest hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25">
                <svg class="w-[40%] mx-auto fill-indigo-800" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <!--!Font Awesome Free v7.0.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                    <path d="M256 64c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 160-160 0c-17.7 0-32 14.3-32 32s14.3 32 32 32l160 0 0 160c0 17.7 14.3 32 32 32s32-14.3 32-32l0-160 160 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-160 0 0-160z"/>
                </svg>
            </a>
        @endauth
    </div>
</x-app-layout>
