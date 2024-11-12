<div class="container mx-auto py-12 px-4">
    <h3 class="text-xl font-semibold">Создать новую задачу для списка (Создано: {{ $creationDate }})</h3>

    <form wire:submit.prevent="save" class="bg-gray-800 shadow-md rounded border border-gray-600 px-8 pt-6 pb-8 mt-4 mb-4">

        <div class="mb-6">
            <label for="name" class="block text-gray-400 font-bold mb-2">Название задачи</label>
            <input type="text" id="name" wire:model="name"
                   class="shadow appearance-none border rounded w-full py-2 px-3 {{ $errors->has('name') ? 'border-red-500' : 'border-gray-600' }} leading-tight focus:outline-none bg-gray-700 hover:bg-gray-600 transition duration-150 ease-in-out focus:ring focus:ring-blue-500 focus:border-blue-500" required>
            @if ($errors->has('name'))
                <p class="text-red-500 text-xs mt-1">{{ $errors->first('name') }}</p>
            @endif
        </div>

        <div class="mb-6">
            <label for="description" class="block text-gray-400 font-bold mb-2">Описание</label>
            <textarea id="description" wire:model="description"
                      maxlength="255"
                      class="shadow appearance-none border rounded w-full py-2 px-3 {{ $errors->has('description') ? 'border-red-500' : 'border-gray-600' }} leading-tight focus:outline-none bg-gray-700 hover:bg-gray-600 transition duration-150 ease-in-out focus:ring focus:ring-blue-500 focus:border-blue-500"
                      oninput="window.updateCharCount('description', 'char-count', 255)"></textarea>
            <div class="text-gray-500 text-xs mt-1">
                Введено символов: <span id="char-count">0</span>
            </div>
            @if ($errors->has('description'))
                <p class="text-red-500 text-xs mt-1">{{ $errors->first('description') }}</p>
            @endif
        </div>

        <div class="mb-6">
            <label for="status" class="block text-gray-400 font-bold mb-2">Статус</label>
            <select id="status" wire:model="status" 
                    class="shadow appearance-none border rounded w-full py-2 px-3 {{ $errors->has('status') ? 'border-red-500' : 'border-gray-600' }} leading-tight focus:outline-none bg-gray-700 hover:bg-gray-600 transition duration-150 ease-in-out focus:ring focus:ring-blue-500 focus:border-blue-500">
                <option value="Публичный">Публичный</option>
                <option value="Приватный">Приватный</option>
                <option value="Завершённый">Завершённый</option>
                <option value="Отменённый">Отменённый</option>
            </select>
            @if ($errors->has('status'))
                <p class="text-red-500 text-xs mt-1">{{ $errors->first('status') }}</p>
            @endif
        </div>

        <button type="submit" class="bg-white text-blue-500 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline hover:bg-gray-200 transition w-full">
            Создать задачу
        </button>

    </form>
</div>
