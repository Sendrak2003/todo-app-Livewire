<div class="container mx-auto py-12 px-4">
    @if ($errorMessage)
        <div class="text-red-500 text-center font-semibold mb-6">
            {{ $errorMessage }}
        </div>
    @else
        <div class="max-w-4xl mx-auto bg-gray-800 p-8 rounded-lg shadow-md">
            <div class="flex items-center mb-6">
                <div class="w-32 h-32">
                    <img src="{{ $user->avatar_url ?? 'default-avatar.jpg' }}" alt="Avatar"
                         width="128" height="128" 
                         class="rounded-full border-4 border-blue-500 object-cover mx-auto mb-6">
                </div>
                <div>
                    <h2 class="text-3xl font-semibold text-white mb-2">{{ $user->name }} {{ $user->surname }}</h2>
                    <p class="text-lg text-gray-400 mb-4">{{ $user->email }}</p>
                    <p class="text-sm text-gray-500">Статус: <span class="font-semibold text-white">{{ $user->status }}</span></p>
                </div>
            </div>

            <div class="bg-gray-700 p-6 rounded-lg shadow-md mt-6">
                <h3 class="text-lg font-semibold text-white mb-4">Информация о профиле</h3>
                <div class="grid grid-cols-2 gap-6">
                    <div class="bg-gray-800 p-4 rounded-lg text-center">
                        <p class="text-xl font-semibold text-white">Задачи</p>
                        <p class="text-2xl font-bold text-blue-500">{{ $taskCount }}</p>
                    </div>

                    <div class="bg-gray-800 p-4 rounded-lg text-center">
                        <p class="text-xl font-semibold text-white">Списки</p>
                        <p class="text-2xl font-bold text-blue-500">{{ $todoListCount }}</p>
                    </div>
                </div>
            </div>

            @if ($user->status === 'Публичный')
                <div class="mt-6 text-center">
                    <a href="{{ route('user.public.todo.lists', ['user_id' => $user->id]) }}" class="text-blue-500 hover:underline">
                        Просмотреть публичные списки
                    </a>
                </div>

                <div class="mt-4 text-center">
                    <button 
                        class="mt-2 text-green-300 hover:text-green-500 copy-link-btn"
                        onclick="window.copyToClipboard('{{ route('public.profile', ['userId' => $user->id]) }}')">
                        Копировать ссылку на профиль
                    </button>                
                </div>
            @endif
        </div>
    @endif
</div>