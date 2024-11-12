<div class="container mx-auto py-12 px-4">
    <h1 class="text-3xl font-bold text-center mb-6 text-white">Вход</h1>

    <form wire:submit.prevent="login" class="bg-gray-800 shadow-md rounded border border-gray-600 px-8 pt-6 pb-8 mb-4">
        @csrf

        <!-- Вывод ошибки, если есть -->
        @if ($errors->has('general'))
            <div class="mb-4 text-red-500">
                <p>{{ $errors->first('general') }}</p>
            </div>
        @endif

        <div class="mb-4">
            <label for="emailOrUsername" class="block text-gray-400 font-bold mb-2">Логин или Email:</label>
            <input type="text" id="emailOrUsername" wire:model="emailOrUsername" 
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-400 leading-tight focus:outline-none bg-gray-700 border-gray-600 hover:bg-gray-600 transition duration-150 ease-in-out focus:ring focus:ring-blue-500 focus:border-blue-500" 
                   required>
            @error('emailOrUsername') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>

        <div class="mb-6">
            <label for="password" class="block text-gray-400 font-bold mb-2">Новый пароль:</label>
            <div class="relative flex items-center">
                <input type="password" id="password" wire:model="password" 
                       class="shadow appearance-none border rounded w-full py-2 px-3 {{ $errors->has('password') ? 'border-red-500' : 'border-gray-600' }} leading-tight focus:outline-none bg-gray-700 hover:bg-gray-600 transition duration-150 ease-in-out focus:ring focus:ring-blue-500 focus:border-blue-500" 
                       required>

                <button type="button" class="absolute right-0 top-1/2 transform -translate-y-1/2 text-gray-400 p-2" onclick="togglePasswordVisibility('password')">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                </button>
            </div>
            @error('password') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
        </div>
        
        <div class="mb-6">
            <a class="inline-block font-bold text-sm text-blue-400 hover:text-blue-600 mb-4" href="{{ route('password.request') }}">
                Забыли пароль?
            </a> 
            <button type="submit" class="bg-white text-blue-500 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline hover:bg-gray-200 transition w-full">
                Войти
            </button>
        </div> 

        <h2 class="text-center my-4 text-gray-300">Или</h2>

        <div class="text-center">
            <a class="inline-block text-sm text-blue-400 hover:text-blue-600" href="{{ route('register') }}">
                Зарегистрироваться
            </a> 
        </div> 
    </form>
</div>
