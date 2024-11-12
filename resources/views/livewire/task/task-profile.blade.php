<div class="container mx-auto py-12 px-4">
    <h3 class="text-xl font-semibold">Задача: {{ $task->name }}</h3>

    <div class="bg-gray-800 shadow-md rounded border border-gray-600 px-8 pt-6 pb-8 mt-4 mb-4">
        <div class="mb-6">
            <strong class="block text-gray-400 font-bold">Название задачи:</strong>
            <p class="text-gray-300">{{ $task->name }}</p>
        </div>

        <div class="mb-6">
            <strong class="block text-gray-400 font-bold">Описание:</strong>
            <p class="text-gray-300">{{ $task->description ?? 'Не указано' }}</p>
        </div>

        <div class="mb-6">
            <strong class="block text-gray-400 font-bold">Статус:</strong>
            <p class="text-gray-300">{{ $task->status }}</p>
        </div>

        <div class="mt-4">
            <a href="{{ route('task.edit', ['task' => $task->id]) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
                Редактировать задачу
            </a>
        </div>
    </div>
</div>
