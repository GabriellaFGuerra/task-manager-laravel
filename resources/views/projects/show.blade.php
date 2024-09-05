<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Projects') }}
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
            <h1 class="text-5xl font-bold">{{ $project->name }}</h1>
            <a href="{{ route('project.edit', $project->id) }}"
                class="px-4 py-2 text-white bg-blue-500 rounded justify-endfont-bold hover:bg-blue-700">
                Edit Project
            </a>
        </div>
        <div class="overflow-x-auto justify-center content-center mb-4 shadow-md sm:rounded-lg">

            <div class="px-4 py-3 sm:px-6">
                <a href="{{ route('tasks.create', ['projectId' => $project->id]) }}"
                    class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">
                    Add Task
                </a>
            </div>


            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Description
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Due Date
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Priority
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($project->tasks as $task)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $task->title }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $task->description }}
                            </td>
                            <td class="px-6 py-4">
                                {{ \Carbon\Carbon::parse($task->due_date)->format('d/m/Y') }}
                            </td>
                            <td class="px-6 py-4">
                                @switch($task->status)
                                    @case('todo')
                                        To-Do
                                    @break

                                    @case('in_progress')
                                        In Progress
                                    @break

                                    @case('done')
                                        Done
                                    @break
                                @endswitch
                            </td>
                            <td class="px-6 py-4">
                                {{ Str::ucfirst($task->priority) }}
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('task.show', ['task' => $task->id]) }}"
                                    class="font-medium text-blue-600 dark:text-blue-500 hover:underline">View</a> |
                                <a href="{{ route('task.delete', ['task' => $task->id]) }}"
                                    class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</x-app-layout>
