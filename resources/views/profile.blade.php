@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl">
        <div class="md:flex">
            <div class="md:shrink-0 flex items-center justify-center p-6">
                <img class="h-24 w-24 rounded-full object-cover" src="https://ui-avatars.com/api/?name=User+Profile" alt="Profile Photo">
            </div>
            <div class="p-8">
                <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">Profile</div>
                <h1 class="block mt-1 text-lg leading-tight font-medium text-black">{{ Auth::user()->name ?? 'Nama User' }}</h1>
                <p class="mt-2 text-gray-500">Email: {{ Auth::user()->email ?? 'user@email.com' }}</p>
                <p class="mt-2 text-gray-500">Bergabung sejak: {{ Auth::user()->created_at ? Auth::user()->created_at->format('d M Y') : '-' }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
