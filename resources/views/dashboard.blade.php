<x-app-layout>
    <x-slot name="header">
        @yield('title')

    </x-slot>

    @if(session()->has('message'))
    <div class="bg-teal-400 " x-data="{ open: true }">
        <div class="px-3 py-3 mx-auto max-w-7xl sm:px-6 lg:px-8" x-show="open">
            <div class="flex flex-wrap items-center justify-between">
                <div class="flex items-center flex-1 w-0">
                    <span class="flex p-2 bg-teal-700 rounded-lg">
                        <!-- Heroicon name: speakerphone -->
                        <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                        </svg>
                    </span>
                    <p class="mx-3 font-medium text-white truncate">
                        {{-- it work --}}
                        {{ session()->get('message') }}
                    </p>
                </div>
                <div class="flex-shrink-0 order-2 sm:order-3 sm:ml-3">
                    <button @click="open = false" type="button"
                        class="flex p-2 -mr-1 rounded-md hover:bg-teal-500 focus:outline-none focus:ring-2 focus:ring-white sm:-mr-2">
                        <span class="sr-only">Dismiss</span>
                        <!-- Heroicon name: x -->
                        <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
    @endif
    @if ($errors->any())

    <div class="bg-orange-400 " x-data="{ open: true }">
        <div class="px-3 py-3 mx-auto max-w-7xl sm:px-6 lg:px-8" x-show="open">
            <div class="flex flex-wrap items-center justify-between">
                <div class="flex items-center flex-1 w-0">
                    <span class="flex p-2 bg-orange-700 rounded-lg">
                        <!-- Heroicon name: speakerphone -->
                        <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                        </svg>
                    </span>
                    <p class="ml-3 font-medium text-white truncate">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li class="text-white">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </p>
                </div>
                <div class="flex-shrink-0 order-2 sm:order-3 sm:ml-3">
                    <button @click="open = false" type="button"
                        class="flex p-2 -mr-1 rounded-md hover:bg-orange-500 focus:outline-none focus:ring-2 focus:ring-white sm:-mr-2">
                        <span class="sr-only">Dismiss</span>
                        <!-- Heroicon name: x -->
                        <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>

    @endif

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">

            <div class="p-5 mx-2 overflow-hidden bg-white shadow-xl sm:rounded-lg">

                @yield('content')

            </div>
        </div>
    </div>
</x-app-layout>
