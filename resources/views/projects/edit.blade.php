<x-app-layout>
    <div class="container p-4 mx-auto">
        <x-slot name="header">
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                {{ __('Edit project') }}
            </h2>
        </x-slot>

        <div class="p-4 mx-auto max-w-lg text-white rounded-lg shadow-md">
            <form action="{{ route('project.update', $project->id) }}" method="POST">
                @csrf
                @method('PATCH')

                <div class="mb-4">
                    <x-input-label for="name" class="block mb-2 font-bold">Name:</x-input-label>
                    <x-text-input type="text" id="name" name="name" class="block mt-1 w-full"
                        value="{{ old('name', $project->name) }}" />
                </div>

                <div class="mb-4">
                    <x-input-label for="description" class="block mb-2 font-bold">Description:</x-input-label>
                    <textarea id="description" name="description"
                        class="block mt-1 w-full rounded-md border-gray-300 shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600">{{ old('description', $project->description) }}</textarea>
                </div>

                <button type="submit"
                    class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">Update Project</button>
            </form>
        </div>
    </div>
</x-app-layout>
