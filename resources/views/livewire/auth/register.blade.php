<div class="container mx-auto py-12 px-4">
    <h1 class="text-3xl font-bold text-center mb-6 text-white">Регистрация</h1>

    @if ($errors->any())
        <div class="bg-red-500 text-white text-center p-4 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form wire:submit.prevent="register" enctype="multipart/form-data" class="bg-gray-800 shadow-md rounded border border-gray-600 px-8 pt-6 pb-8 mb-4">
        
        <div class="mb-6 text-center">
            <label for="photo" class="block text-gray-400 font-bold mb-2">Загрузить фото:</label>
            
            <input type="file" id="photo" wire:model="photo" 
                   class="mt-1 block w-full text-gray-400 leading-tight focus:outline-none bg-gray-700 border-gray-600 hover:bg-gray-600 transition duration-150 ease-in-out mb-4" 
                   accept="image/*" onchange="previewImage(event)">
            
            <img id="preview" 
                 src="{{ $photo ? $photo->temporaryUrl() : asset('storage/avatars/defaultPhoto.jpg') }}" 
                 alt="User Avatar"
                 width="128"  
                 height="128" 
                 class="rounded-full border-4 border-blue-500 object-cover mx-auto mb-4" />
            
            @if ($errors->has('photo'))
                <p class="text-red-500 text-xs mt-1">{{ $errors->first('photo') }}</p>
            @endif
        </div>
        
        <div class="mb-4">
            <label for="name" class="block text-gray-400 font-bold mb-2">Имя:</label>
            <input type="text" id="name" wire:model="name" 
                   class="shadow appearance-none border rounded w-full py-2 px-3 {{ $errors->has('name') ? 'border-red-500' : 'border-gray-600' }} leading-tight focus:outline-none bg-gray-700 hover:bg-gray-600 transition duration-150 ease-in-out focus:ring focus:ring-blue-500 focus:border-blue-500" 
                   required>
            @if ($errors->has('name'))
                <p class="text-red-500 text-xs mt-1">{{ $errors->first('name') }}</p>
            @endif
        </div>

        <div class="mb-4">
            <label for="surname" class="block text-gray-400 font-bold mb-2">Фамилия:</label>
            <input type="text" id="surname" wire:model="surname" 
                   class="shadow appearance-none border rounded w-full py-2 px-3 {{ $errors->has('surname') ? 'border-red-500' : 'border-gray-600' }} leading-tight focus:outline-none bg-gray-700 hover:bg-gray-600 transition duration-150 ease-in-out focus:ring focus:ring-blue-500 focus:border-blue-500" 
                   required>
            @if ($errors->has('surname'))
                <p class="text-red-500 text-xs mt-1">{{ $errors->first('surname') }}</p>
            @endif
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-400 font-bold mb-2">Email:</label>
            <input type="email" id="email" wire:model="email" 
                   class="shadow appearance-none border rounded w-full py-2 px-3 {{ $errors->has('email') ? 'border-red-500' : 'border-gray-600' }} leading-tight focus:outline-none bg-gray-700 hover:bg-gray-600 transition duration-150 ease-in-out focus:ring focus:ring-blue-500 focus:border-blue-500" 
                   required>
            @if ($errors->has('email'))
                <p class="text-red-500 text-xs mt-1">{{ $errors->first('email') }}</p>
            @endif
        </div>

        <div class="mb-4">
            <label for="login" class="block text-gray-400 font-bold mb-2">Логин:</label>
            <input type="text" id="login" wire:model="login" 
                   class="shadow appearance-none border rounded w-full py-2 px-3 {{ $errors->has('login') ? 'border-red-500' : 'border-gray-600' }} leading-tight focus:outline-none bg-gray-700 hover:bg-gray-600 transition duration-150 ease-in-out focus:ring focus:ring-blue-500 focus:border-blue-500" 
                   required>
            @if ($errors->has('login'))
                <p class="text-red-500 text-xs mt-1">{{ $errors->first('login') }}</p>
            @endif
        </div>        
        
        <div class="mb-4">
            <label for="password" class="block text-gray-400 font-bold mb-2">Пароль:</label>
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
        
        <div class="mb-4 mt-6">

            <button type="submit" class="bg-white text-blue-500 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline hover:bg-gray-200 transition mb-4 w-full">
                Зарегистрироваться
            </button> 

            <div class="text-center mt-4">
                <a class="inline-block align-baseline font-bold text-sm text-blue-400 hover:text-blue-600" href="{{ route('login') }}">
                    Уже есть аккаунт?
                </a>
            </div>
        </div>
       
    </form> 
</div>
