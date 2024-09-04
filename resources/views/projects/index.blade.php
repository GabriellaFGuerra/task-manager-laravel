<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Projects') }}
        </h2>
    </x-slot>
    <div class="container p-4 mt-4">
        @if (session('success'))
            <div class="relative px-4 py-3 mb-5 text-green-700 bg-green-100 rounded border border-green-400"
                role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif
        <a href="{{ route('projects.create') }}"
            class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">New Project</a>


        <div class="grid grid-cols-3 gap-4">
            @foreach ($projects as $project)
                <div class="p-4 mt-4 mb-4 bg-white rounded-lg shadow">
                    <h3 class="mb-2 text-lg font-bold">
                        <a href="{{ route('project.show', $project->id) }}"
                            class="text-black rounded hover:text-blue-700">{{ $project->name }}</a>
                    </h3>
                    <p class="text-gray-600">{{ $project->description }}</p>
                </div>
            @endforeach
        </div>
    </div>

</x-app-layout>
