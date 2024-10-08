<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('New Task') }}
        </h2>
    </x-slot>

    @if (session('error'))
        <div class="relative px-4 py-3 mb-5 text-red-700 bg-red-100 rounded border border-red-400" role="alert">
            <strong class="font-bold">Error!</strong>
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif

    <div class="p-4 mx-auto max-w-lg rounded-lg shadow-md">
        <h2 class="mb-6 text-2xl font-semibold text-white">Create New Subtask</h2>
        <form method="POST" action="{{ route('subtask.store', $task) }}">
            @csrf
            <!-- Name -->
            <div class="mb-4">
                <x-input-label for="name" class="block mb-2 font-medium text-gray-700">Name</x-input-label>
                <x-text-input type="text" id="name" name="name" class="block mt-1 w-full" required />
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>

            <!-- Description -->
            <div class="mb-4">
                <x-input-label for="description"
                    class="block mb-2 font-medium text-gray-700">Description</x-input-label>
                <textarea id="description" name="description" rows="4" required
                    class="block mt-1 w-full rounded-md border-gray-300 shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"></textarea>
            </div>

            <!-- Status -->
            <div class="mb-4">
                <x-input-label for="status" class="block mb-2 font-medium text-gray-700">Status</x-input-label>
                <select id="status" name="status" required
                    class="block mt-1 w-full rounded-md border-gray-300 shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600">
                    <option value="todo">To Do</option>
                    <option value="in_progress">In Progress</option>
                    <option value="done">Done</option>
                </select>
            </div>

            <!-- Submit Button -->
            <div class="text-right">
                <input type="submit"
                    class="px-4 py-2 font-medium text-white bg-blue-600 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-600"
                    value="Create Subtask">
            </div>
        </form>
    </div>
</x-app-layout>
