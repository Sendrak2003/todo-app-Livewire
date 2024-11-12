<div class="container mx-auto py-12 px-4">
    <h1 class="text-3xl font-bold text-center mb-6 text-white">Обновить профиль</h1>

    <form wire:submit.prevent="updateProfile" enctype="multipart/form-data" class="bg-gray-800 shadow-md rounded border border-gray-600 px-8 pt-6 pb-8 mb-4">
        
        <div class="mb-6 text-center">
            <label for="photo" class="block text-gray-400 font-bold mb-2">Загрузить фото:</label>
            <input type="file" id="photo" wire:model="photo" 
                   class="mt-1 block w-full text-gray-400 leading-tight focus:outline-none bg-gray-700 border-gray-600 hover:bg-gray-600 transition duration-150 ease-in-out mb-4" 
                   accept="image/*" onchange="previewImage(event)">
            
            <img id="preview" 
                 src="{{auth()->user()->avatar_url}}" 
                 alt="User Avatar"
                 width="128"  
                 height="128" 
                 class="rounded-full border-4 border-blue-500 object-cover mx-auto mb-4" />
        </div>

        <div class="mb-4">
            <label for="name" class="block text-gray-400 font-bold mb-2">Имя:</label>
            <input type="text" id="name" wire:model="name" 
                   class="shadow appearance-none border rounded w-full py-2 px-3 {{ $errors->has('name') ? 'border-red-500' : 'border-gray-600' }} leading-tight focus:outline-none bg-gray-700 hover:bg-gray-600 transition duration-150 ease-in-out focus:ring focus:ring-blue-500 focus:border-blue-500"
                   value="{{ auth()->user()->name }}" required>
            @if ($errors->has('name'))
                <p class="text-red-500 text-xs mt-1">{{ $errors->first('name') }}</p>
            @endif
        </div>

        <div class="mb-4">
            <label for="surname" class="block text-gray-400 font-bold mb-2">Фамилия:</label>
            <input type="text" id="surname" wire:model="surname" 
                   class="shadow appearance-none border rounded w-full py-2 px-3 {{ $errors->has('surname') ? 'border-red-500' : 'border-gray-600' }} leading-tight focus:outline-none bg-gray-700 hover:bg-gray-600 transition duration-150 ease-in-out focus:ring focus:ring-blue-500 focus:border-blue-500"
                   value="{{ auth()->user()->surname }}" required>
            @if ($errors->has('surname'))
                <p class="text-red-500 text-xs mt-1">{{ $errors->first('surname') }}</p>
            @endif
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-400 font-bold mb-2">Email:</label>
            <input type="email" id="email" wire:model="email" 
                   class="shadow appearance-none border rounded w-full py-2 px-3 {{ $errors->has('email') ? 'border-red-500' : 'border-gray-600' }} leading-tight focus:outline-none bg-gray-700 hover:bg-gray-600 transition duration-150 ease-in-out focus:ring focus:ring-blue-500 focus:border-blue-500"
                   value="{{ auth()->user()->email }}" required>
            @if ($errors->has('email'))
                <p class="text-red-500 text-xs mt-1">{{ $errors->first('email') }}</p>
            @endif
        </div>

        <div class="mb-4">
            <label for="login" class="block text-gray-400 font-bold mb-2">Логин:</label>
            <input type="text" id="login" wire:model="login" 
                   class="shadow appearance-none border rounded w-full py-2 px-3 {{ $errors->has('login') ? 'border-red-500' : 'border-gray-600' }} leading-tight focus:outline-none bg-gray-700 hover:bg-gray-600 transition duration-150 ease-in-out focus:ring focus:ring-blue-500 focus:border-blue-500"
                   value="{{ auth()->user()->login }}" required>
            @if ($errors->has('login'))
                <p class="text-red-500 text-xs mt-1">{{ $errors->first('login') }}</p>
            @endif
        </div>

        <div class="mb-4">
            <label for="status" class="block text-gray-400 font-bold mb-2">Статус профиля:</label>
            <select id="status" wire:model="status" 
                    class="shadow appearance-none border rounded w-full py-2 px-3 {{ $errors->has('status') ? 'border-red-500' : 'border-gray-600' }} leading-tight focus:outline-none bg-gray-700 hover:bg-gray-600 transition duration-150 ease-in-out focus:ring focus:ring-blue-500 focus:border-blue-500">
                <option value="Публичный" {{ auth()->user()->status == 'публичный' ? 'selected' : '' }}>Публичный</option>
                <option value="Приватный" {{ auth()->user()->status == 'приватный' ? 'selected' : '' }}>Приватный</option>
            </select>
            @if ($errors->has('status'))
                <p class="text-red-500 text-xs mt-1">{{ $errors->first('status') }}</p>
            @endif
        </div>

        <button type="submit" class="bg-white text-blue-500 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline hover:bg-gray-200 transition mb-4 w-full">
            Обновить профиль
        </button>

    </form>
</div>
