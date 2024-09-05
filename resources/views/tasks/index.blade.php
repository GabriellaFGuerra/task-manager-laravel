<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Tasks') }}
        </h2>
    </x-slot>
    <div class="container p-4 mt-4">
        <div class="grid grid-cols-3 gap-4">
            @foreach ($tasks as $task)
                <div class="p-4 mt-4 mb-4 bg-white rounded-lg shadow">
                    <h3 class="mb-2 text-lg font-bold">
                        <a href="{{ route('task.show', $task->id) }}"
                            class="text-black rounded hover:text-blue-700">{{ $task->title }}</a>
                    </h3>
                    <p>Projeto: {{ $task->project->name }} </p>
                    <p class="text-gray-600">
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
                    </p>
                    <p class="text-gray-600">{{ $task->priority }}</p>
                    <p class="text-gray-600">{{ $task->description }}</p>
                    <p class="text-gray-600">{{ \Carbon\Carbon::parse($task->due_date)->format('d/m/Y') }}</p>
                </div>
            @endforeach
        </div>
    </div>

</x-app-layout>
