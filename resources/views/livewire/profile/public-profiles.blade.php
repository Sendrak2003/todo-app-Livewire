<div class="w-full py-12 px-4">
    <h3 class="text-4xl font-extrabold text-center mb-6 text-blue-500">Публичные профили</h3>

    <div class="grid grid-cols-1 gap-6">
        @foreach ($users as $user)
            <div class="bg-gray-800 p-6 rounded-lg shadow-md w-full">
                <x-list-item :item="$user">
                    <x-slot:avatar>
                        <a href="{{ route('public.profile', ['userId' => $user->id]) }}" class="relative group">
                            <x-avatar :image="$user->avatar_url" class="!w-14 !rounded-lg" />
                            <span class="absolute hidden group-hover:block text-sm bg-black text-white rounded py-1 px-2 bottom-0 left-1/2 transform -translate-x-1/2 mt-2 opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                                Перейти в профиль
                            </span>
                        </a>                        
                    </x-slot:avatar>
                    
                    <x-slot:value>
                        {{ $user->name }} {{ $user->surname }}
                    </x-slot:value>

                    <x-slot:sub-value>
                        {{ $user->email }}
                    </x-slot:sub-value>
                </x-list-item>
            </div>
        @endforeach
    </div>
</div>
