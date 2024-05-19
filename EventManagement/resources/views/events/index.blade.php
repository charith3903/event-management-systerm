<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Events') }}
            </h2>
            <div>
                <a href="{{ route('events.create') }}" class="dark:text-white hover:text-slate-200">New Event</a>
            </div>
        </div>
    </x-slot>
s
</x-app-layout>
