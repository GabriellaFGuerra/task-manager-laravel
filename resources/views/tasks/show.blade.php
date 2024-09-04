<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Tasks') }}
        </h2>
    </x-slot>
    <div class="container p-4 mt-4 text-white">
        @if (session('success'))
            <div class="relative px-4 py-3 mb-5 text-green-700 bg-green-100 rounded border border-green-400"
                role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        <div class="flex justify-between items-center mb-4 text-white">
            <h1 class="text-5xl font-bold">{{ $task->title }}</h1>
            <a href="{{ route('task.edit', $task->id) }}"
                class="px-4 py-2 text-white bg-blue-500 rounded justify-endfont-bold hover:bg-blue-700">
                Edit Task
            </a>
        </div>
        <div class="overflow-x-auto justify-center content-center mb-4 shadow-md sm:rounded-lg">
            <div class="container p-6 mx-auto text-white">
                <div class="shadow-lg p-8rounded-lg">
                    <!-- Main Task Section -->
                    <div class="mb-8">
                        <p class="mb-2 text-gray-300">Status: <span
                                class="font-medium">{{ ucfirst($task->status) }}</span></p>
                        <p class="mb-2 text-gray-300">Priority: <span
                                class="font-medium">{{ ucfirst($task->priority) }}</span></p>
                        <p class="mb-4 text-gray-300">Due Date: <span
                                class="font-medium">{{ \Carbon\Carbon::parse($task->due_date)->format('d/m/Y') }}</span>
                        </p>
                        <p class="leading-relaxed text-gray-300">{{ $task->description }}</p>
                    </div>

                    <!-- Subtasks Section -->
                    <div class="pt-6 mt-6 border-t">
                        <h2 class="mb-4 text-2xl font-semibold">Subtasks</h2>
                        <p class="text-gray-300">No subtasks available for this task.</p>
                        {{--
                            <ul class="space-y-4">
                                @foreach ($task->subtasks as $subtask)
                                    <li class="flex justify-between items-center p-4 bg-gray-50 rounded-lg shadow-md">
                                        <div class="flex items-center">
                                            <input type="checkbox" {{ $subtask->completed ? 'checked' : '' }}
                                                class="mr-3 w-5 h-5 text-indigo-600 rounded focus:ring-indigo-500">
                                            <span
                                                class="{{ $subtask->completed ? 'line-through text-gray-500' : 'text-gray-700' }} text-lg font-medium">{{ $subtask->title }}</span>
                                        </div>
                                        <div class="flex space-x-3">
                                            <a href="{{ route('subtasks.edit', $subtask->id) }}"
                                                class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                            <form action="{{ route('subtasks.destroy', $subtask->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-red-600 hover:text-red-900">Delete</button>
                                            </form>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @endif --}}
                    </div>

                    <!-- Add Subtask Button -->
                    <div class="mt-8 text-right">
                        <a href=""
                            class="inline-block px-6 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">
                            Add Subtask
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
