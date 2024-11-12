<div class="mt-8 bg-gray-800 text-white p-6 rounded shadow-lg">
    <h2 class="text-2xl font-bold mb-4">Задачи для списка: {{ $todoListId }}</h2>

    @if ($tasks->isEmpty())
        <p class="text-gray-400">У этого списка нет задач.</p>
    @else
        <ul class="space-y-2">
            @foreach ($tasks as $task)
                <li class="bg-gray-700 p-3 rounded">
                    <p><strong>{{ $task->title }}</strong></p>
                    <p>{{ $task->description }}</p>
                    <p class="text-sm text-gray-400">Статус: {{ $task->status }}</p>
                </li>
            @endforeach
        </ul>
    @endif
</div>
