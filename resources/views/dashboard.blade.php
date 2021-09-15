<?php
    use Illuminate\Support\Facades\Auth;
?>

<x-app-layout>

<div class="pt-4 pb-1 border-t border-gray-200">
            <div >
            <a class="btn btn-primary" href="{{ route('chooseDifficulty') }}">
            {{ __('Start') }}
        </a>
        <a class="btn btn-primary" href="{{ route('userCategories', Auth::user()->id) }}">
            {{ __('Własne kategorie') }}
        </a>
        <a class="btn btn-primary" href="{{ route('userStatistics', Auth::user()->id) }}">
            {{ __('Statystyki') }}
        </a>
        <a class="btn btn-primary" href="{{ route('settings') }}">
            {{ __('Ustawienia') }}
        </a>
        @if(Auth::user()->isAdmin())
        <a class="btn btn-primary" href="{{ route('controlPanel') }}">
            {{ __('Panel administratora') }}
        </a>
        @endif
            </div>

            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
