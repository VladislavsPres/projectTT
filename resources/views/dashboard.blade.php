@extends('layouts.app')

@section('content')
<div class="px-4 sm:px-6 lg:px-8 py-8 bg-gray-100 min-h-screen">
    <h1 class="text-3xl font-bold text-gray-900 mb-6">{{ __('Dashboard') }}</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="p-5 bg-white rounded-lg shadow flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500">{{ __('Users') }}</p>
                <p class="text-2xl font-semibold text-gray-800">{{ $usersCount }}</p>
            </div>
            <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" stroke-width="2"
                 viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                 <path stroke-linecap="round" stroke-linejoin="round"
                       d="M17 20h5v-2a3 3 0 00-3-3h-4m-4 0a3 3 0 00-3 3v2h5m4-10V6a4 4 0 00-8 0v4m4 4h.01"/>
            </svg>
        </div>
        <div class="p-5 bg-white rounded-lg shadow flex items-center justify-between">
            <div>
                <p class="text-sm text-gray-500">{{ __('Photos') }}</p>
                <p class="text-2xl font-semibold text-gray-800">{{ $photosCount }}</p>
            </div>
            <svg class="w-8 h-8 text-pink-500" fill="none" stroke="currentColor" stroke-width="2"
                 viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                 <path stroke-linecap="round" stroke-linejoin="round"
                       d="M3 7v4a2 2 0 002 2h3l3 4v-4h3a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2z"/>
            </svg>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-semibold mb-4">{{ __('Quick Actions') }}</h2>
            <div class="space-y-3">
                <a href="{{ route('user.create') }}"
                   class="block px-4 py-2 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg transition">
                    ➕ {{ __('Add New User') }}
                </a>
                <a href="{{ route('photos.index') }}"
                   class="block px-4 py-2 text-sm font-medium text-white bg-green-600 hover:bg-green-700 rounded-lg transition">
                    🖼 {{ __('View Photos') }}
                </a>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-semibold mb-4">{{ __('Recent Activity') }}</h2>
            <ul class="divide-y divide-gray-200">
                <li class="py-2">{{ __('🧑‍💻 Vlad registered a new user') }}</li>
                <li class="py-2">{{ __('🖼 Photo gallery updated') }}</li>
                <li class="py-2">{{ __('🔐 Role permissions changed') }}</li>
            </ul>
        </div>
    </div>
</div>
@endsection
