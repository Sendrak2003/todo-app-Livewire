<div class="container mx-auto py-12 px-4">
    <h1 class="text-3xl font-bold text-center mb-6 text-white">Сброс пароля</h1>

    @if ($status)
        <div class="bg-blue-500 text-white text-center p-4 rounded mb-4">
            <p>{{ $status }}</p>
        </div>
    @endif

    <form wire:submit.prevent="resetPassword" enctype="multipart/form-data" class="bg-gray-800 shadow-md rounded border border-gray-600 px-8 pt-6 pb-8 mb-4">
        
        <div class="mb-6">
            <label for="email" class="block text-gray-400 font-bold mb-2">Электронная почта:</label>
            <input type="email" id="email" wire:model="email" 
                   class="shadow appearance-none border rounded w-full py-2 px-3 {{ $errors->has('email') ? 'border-red-500' : 'border-gray-600' }} leading-tight focus:outline-none bg-gray-700 hover:bg-gray-600 transition duration-150 ease-in-out focus:ring focus:ring-blue-500 focus:border-blue-500" 
                   required>
            @if ($errors->has('email'))
                <p class="text-red-500 text-xs mt-1">{{ $errors->first('email') }}</p>
            @endif
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
            @if ($errors->has('password'))
                <p class="text-red-500 text-xs mt-1">{{ $errors->first('password') }}</p>
            @endif
        </div>

        <div class="mb-6">
            <label for="password_confirmation" class="block text-gray-400 font-bold mb-2">Подтверждение пароля:</label>
            <div class="relative flex items-center">
                <input type="password" id="password_confirmation" wire:model="password_confirmation" 
                       class="shadow appearance-none border rounded w-full py-2 px-3 {{ $errors->has('password_confirmation') ? 'border-red-500' : 'border-gray-600' }} leading-tight focus:outline-none bg-gray-700 hover:bg-gray-600 transition duration-150 ease-in-out focus:ring focus:ring-blue-500 focus:border-blue-500" 
                       required>

                <button type="button" class="absolute right-0 top-1/2 transform -translate-y-1/2 text-gray-400 p-2" onclick="togglePasswordVisibility('password_confirmation')">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                </button>
            </div>
            @if ($errors->has('password_confirmation'))
                <p class="text-red-500 text-xs mt-1">{{ $errors->first('password_confirmation') }}</p>
            @endif
        </div>

        <div class="mb-6">
            <button type="submit" class="bg-white text-blue-500 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline hover:bg-gray-200 transition mb-4 w-full">
                Сбросить пароль
            </button>
        </div>
        
        <div class="text-center mt-4">
            <a class="inline-block align-baseline font-bold text-sm text-blue-400 hover:text-blue-600" href="{{ route('login') }}">
                Уже есть аккаунт?
            </a>
        </div>
    </form>
</div>
