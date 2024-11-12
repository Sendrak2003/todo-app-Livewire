<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, viewport-fit=cover">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ isset($title) ? $title.' - '.config('app.name') : config('app.name') }}</title>

    <link href="{{ asset('font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <x-nav sticky full-width class="border-b border-white"> 
        <x-slot:brand>

            @auth
                <label for="main-drawer" class="lg:hidden mr-3">
                    <x-icon name="o-bars-3" class="cursor-pointer" />
                </label>
            @endauth

            {{ config('app.name') }}
        </x-slot:brand>
    </x-nav>

    <x-main with-nav full-width>
        @auth
            <x-slot:sidebar drawer="main-drawer" class="bg-base-200">
                <x-list-item :item="auth()->user()">
                    <x-slot:avatar>
                        <a href="{{ route('profile') }}" class="relative group">
                            <x-avatar :image="auth()->user()->avatar_url" class="!w-14 !rounded-lg" />
                            <span class="absolute hidden group-hover:block text-sm bg-black text-white rounded py-1 px-2 bottom-0 left-1/2 transform -translate-x-1/2 mt-2 opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                                Перейти в профиль
                            </span>
                        </a>
                    </x-slot:avatar>
                    
                    <x-slot:value>
                        {{ auth()->user()->name }}
                    </x-slot:value>

                    <x-slot:sub-value>
                        {{ auth()->user()->email }}
                    </x-slot:sub-value>

                    <x-slot:actions>
                        @livewire('auth.logout')
                    </x-slot:actions>
                </x-list-item>                
                
                <x-menu-separator />
                <x-menu-item title="Публичные профили" :link="route('public.profiles')" />
                <x-menu-item title="Менеджер списков дел" :link="route('todo.list.manager')" />
            </x-slot:sidebar>
        @endauth

        <x-slot:content>
            @yield('content')
        </x-slot:content>
    </x-main>

    <x-toast />
</body>
</html>
