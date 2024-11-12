<div class="container mx-auto py-12 px-4">
    <h1 class="text-3xl font-bold text-center mb-6 text-white">Редактировать список дел</h1>

    @if ($status)
        <div class="bg-blue-500 text-white text-center p-4 rounded mb-4">
            <p>{{ $status }}</p>
        </div>
    @endif

    <form wire:submit.prevent="updateList" class="bg-gray-800 shadow-md rounded border border-gray-600 px-8 pt-6 pb-8 mb-4">

        <div class="mb-6">
            <label for="created_at" class="block text-gray-400 font-bold mb-2">Дата создания:</label>
            <input type="date" id="created_at" wire:model="created_at"
                   class="shadow appearance-none border rounded w-full py-2 px-3 {{ $errors->has('created_at') ? 'border-red-500' : 'border-gray-600' }} leading-tight focus:outline-none bg-gray-700 hover:bg-gray-600 transition duration-150 ease-in-out focus:ring focus:ring-blue-500 focus:border-blue-500" 
                   required>
            @if ($errors->has('created_at'))
                <p class="text-red-500 text-xs mt-1">{{ $errors->first('created_at') }}</p>
            @endif
        </div>

        <div class="mb-6">
            <label for="is_public" class="block text-gray-400 font-bold mb-2">Публичный список:</label>
            <input type="checkbox" id="is_public" wire:model="is_public"
                   class="w-5 h-5 text-blue-500 border-gray-600 focus:ring focus:ring-blue-500 rounded">
        </div>

        <div class="mb-6">
            <button type="submit" class="bg-white text-blue-500 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline hover:bg-gray-200 transition mb-4 w-full">
                Обновить список
            </button>
        </div>
    </form>
</div>
