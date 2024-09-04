<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Create a Project') }}
        </h2>
    </x-slot>

    <div class="flex justify-center items-center p-4 mt-4">
        <form method="POST" action="{{ route('project.store') }}" class="w-full max-w-md">
            @csrf
            <div class="mb-4">
                <x-input-label for="name" :value="__('Project Name')" />
                <x-text-input id="name" name="name" type="text" class="block mt-1 w-full" required autofocus
                    autocomplete="name" />
                <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>
            <div class="mb-4">
                <x-input-label for="description" :value="__('Project Description')" />
                <textarea id="description" name="description"
                    class="block mt-1 w-full rounded-md border-gray-300 shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"
                    required autofocus autocomplete="description" /></textarea>
                <x-input-error class="mt-2" :messages="$errors->get('description')" />
            </div>
            <div class="flex justify-between items-center">
                <x-primary-button class="ms-4">
                    {{ __('Create Project') }}
                </x-primary-button>
            </div>
        </form>
    </div>

</x-app-layout>
