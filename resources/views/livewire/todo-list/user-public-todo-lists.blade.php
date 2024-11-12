<div class="container mx-auto py-12 px-4">
    <h1 class="text-4xl font-extrabold text-center mb-6 text-blue-500">
        Публичные списки дел пользователя {{ $user->name }}
    </h1>

    @if ($publicTodoLists->isEmpty())
        <div class="text-center text-gray-500">
            <p>У пользователя нет публичных списков дел.</p>
        </div>
    @else
        <ul class="space-y-4">
            @foreach ($publicTodoLists as $todoList)
                <li class="bg-gray-800 text-white p-4 rounded shadow-lg cursor-pointer">
                    <h3 class="text-xl font-semibold">{{ $todoList->days_of_week }}</h3>
                    <p>Дата создания: {{ \Carbon\Carbon::parse($todoList->created_at)->format('d.m.Y') }}</p>

                    <button 
                        class="mt-2 text-blue-300 hover:text-blue-500 toggle-tasks-btn" 
                        data-todolist-id="{{ $todoList->id }}"
                        onclick="window.toggleTasksVisibility({{ $todoList->id }})">
                        Показать задачи
                    </button>

                    <button 
                        class="mt-2 text-green-300 hover:text-green-500 copy-link-btn" 
                        data-todolist-id="{{ $todoList->id }}"
                        data-url="{{ route('user.public.todo.lists', ['user_id' => $user->id, 'todo_list_id' => $todoList->id]) }}"
                        onclick="window.copyToClipboard(this.getAttribute('data-url'))">
                        Копировать ссылку
                    </button>

                    <div id="tasks-list-{{ $todoList->id }}" class="tasks-list mt-4 hidden">
                        <livewire:task.todo-list-tasks-public :todoListId="$todoList->id" />
                    </div>
                </li>
            @endforeach
        </ul>
    @endif

    <button id="copyAllLinksBtn"
     class="fixed bottom-6 right-6 p-3 bg-blue-500 text-white rounded-full shadow-lg hover:bg-blue-600 focus:outline-none"
     data-url="{{ route('user.public.todo.lists', ['user_id' => $user->id]) }}"
     onclick="window.copyAllLinks(this.getAttribute('data-url'))">
     <i class="fa fa-copy"></i>
    </button>
</div>
