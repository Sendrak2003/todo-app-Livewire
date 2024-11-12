<div class="container mx-auto py-12 px-4">
    <h1 class="text-3xl font-bold text-center mb-6">Ваш профиль</h1>

    <div class="flex justify-center mb-6">
        <img src="{{ auth()->user()->avatar_url }}" alt="Avatar"
            class="rounded-full border-4 border-blue-500 object-cover w-32 h-32 mb-4">
    </div>

    <div class="mb-4">
        <label class="block text-gray-400 font-bold mb-2">Имя:</label>
        <p class="text-gray-300">{{ auth()->user()->name }}</p>
    </div>

    <div class="mb-4">
        <label class="block text-gray-400 font-bold mb-2">Фамилия:</label>
        <p class="text-gray-300">{{ auth()->user()->surname }}</p>
    </div>

    <div class="mb-4">
        <label class="block text-gray-400 font-bold mb-2">Электронная почта:</label>
        <p class="text-gray-300">{{ auth()->user()->email }}</p>
    </div>

    <div class="mb-4">
        <label class="block text-gray-400 font-bold mb-2">Дата регистрации:</label>
        <p class="text-gray-300">{{ auth()->user()->created_at->format('d.m.Y') }}</p>
    </div>

    <div class="mb-4">
        <label class="block text-gray-400 font-bold mb-2">Статус профиля:</label>
        <p class="text-gray-300">{{ auth()->user()->status }}</p>
    </div>

    @if(auth()->user()->status === 'Публичный')
        <div class="mt-6 text-center">
            <button 
                class="mt-2 text-green-300 hover:text-green-500 copy-link-btn"
                onclick="window.copyToClipboard('{{ route('public.profile', ['userId' => auth()->user()->id]) }}')">
                Копировать ссылку на профиль
            </button>
        </div>
    @endif

    <a href="{{ route('profile.update') }}" class="fixed bottom-8 right-8 bg-blue-500 text-white p-4 rounded-full shadow-lg hover:bg-blue-700 transition duration-300">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
            <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
        </svg>
    </a>
</div>
