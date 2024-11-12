<div class="container mx-auto py-12 px-4">
    <h1 class="text-3xl font-bold text-center mb-6 text-white">Забыли пароль?</h1>

    @if ($status)
        <div class="alert alert-info">{{ $status }}</div>
    @endif

    <form wire:submit.prevent="sendResetLink" class="bg-gray-800 shadow-md rounded border border-gray-600 px-8 pt-6 pb-8 mb-4">
        <div class="mb-4">
            <label for="email" class="block text-gray-400 font-bold mb-2">Введите ваш Email:</label>
            <input type="email" id="email" wire:model="email" 
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-400 leading-tight focus:outline-none bg-gray-700 border-gray-600 hover:bg-gray-600 transition duration-150 ease-in-out focus:ring focus:ring-blue-500 focus:border-blue-500" 
                   required>
            
            @error('email')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="flex justify-center mt-6 mb-4">
            <button type="submit" class="bg-white text-blue-500 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline hover:bg-gray-200 transition">
                Отправить ссылку для сброса пароля
            </button>
        </div>
    </form>

    <div class="text-center mt-4">
        <a class="inline-block text-sm text-blue-400 hover:text-blue-600" href="{{ route('login') }}">
            Вернуться на страницу входа
        </a> 
    </div> 
</div>
