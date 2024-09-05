   <x-app-layout>
       <div class="container p-4 mx-auto">
           <x-slot name="header">
               <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                   {{ __('Edit Task') }}
               </h2>
           </x-slot>

           <div class="p-4 mx-auto max-w-lg text-white rounded-lg shadow-md">
               <form action="{{ route('task.update', $task->id) }}" method="POST">
                   @csrf
                   @method('PATCH')

                   <div class="mb-4">
                       <x-input-label for="title" class="block mb-2 font-bold">Title:</x-input-label>
                       <x-text-input type="text" id="title" name="title" class="block mt-1 w-full"
                           value="{{ old('title', $task->title) }}" />
                   </div>

                   <div class="mb-4">
                       <x-input-label for="description" class="block mb-2 font-bold">Description:</x-input-label>
                       <textarea id="description" name="description"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600">{{ old('description', $task->description) }}</textarea>
                   </div>

                   <div class="mb-4">
                       <x-input-label for="due_date" class="block mb-2 font-bold">Due Date:</x-input-label>
                       <x-text-input type="date" id="due_date" name="due_date" class="block mt-1 w-full"
                           value="{{ old('due_date', $task->due_date) }}" />
                   </div>

                   <div class="mb-4">
                       <x-input-label for="status" class="block mb-2 font-bold">Status:</x-input-label>
                       <select id="status" name="status"
                           class="block mt-1 w-full rounded-md border-gray-300 shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600">
                           <option value="todo" {{ old('status', $task->status) == 'todo' ? 'selected' : '' }}>To-Do
                           </option>
                           <option value="in_progress"
                               {{ old('status', $task->status) == 'in_progress' ? 'selected' : '' }}>In Progress
                           </option>
                           <option value="done"
                               {{ old('status', $task->status) == 'done' ? 'selected' : '' }}>
                               Done</option>
                       </select>
                   </div>

                   <div class="mb-4">
                    <x-input-label for="priority" class="block mb-2 font-bold">Priority:</x-input-label>
                    <select id="priority" name="priority"
                        class="block mt-1 w-full rounded-md border-gray-300 shadow-sm dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600">
                        <option value="low" {{ old('priority', $task->priority) == 'low' ? 'selected' : '' }}>Low
                        </option>
                        <option value="medium"
                            {{ old('priority', $task->priority) == 'medium' ? 'selected' : '' }}>Medium
                        </option>
                        <option value="high"
                            {{ old('priority', $task->priority) == 'high' ? 'selected' : '' }}>
                            High</option>
                    </select>
                </div>

                   <button type="submit"
                       class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">Update Task</button>
               </form>
           </div>
       </div>
   </x-app-layout>
