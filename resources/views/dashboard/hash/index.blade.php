<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Hashes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="my-4">
                        <x-nav-link :href="route('dashboard.hashes.create')">New</x-nav-link>
                    </div>
                    <ul>
                        @foreach($hashes as $hash)
                        <li class="flex flex-col md:flex-row border rounded">
                            <div class="grid grid-cols-2 md:flex md:w-1/3">
                                <img class="w-full md:w-auto md:h-40" src="{{ asset("storage/$hash->file") }}" alt="{{ $hash->hash }}">
                                @isset($hash->voucher) 
                                <a class="ml-2" target="_blank" href="{{ asset("storage/$hash->voucher") }}">
                                    <img class="w-full md:w-auto md:h-40" src="{{ asset("storage/$hash->voucher") }}" alt="{{ $hash->hash }}">
                                </a>
                                @else
                                <div class="flex w-full items-center justify-center"> 
                                    <span class="text-center">Sin comprobante</span>
                                </div>
                                @endisset
                            </div>
                            <div class="flex flex-col p-4 justify-between gap-4 md:h-40 md:w-2/3">
                                <span class="w-full text-center md:text-start">{{ $hash->hash }}</span>
                                <div class="flex w-full justify-center md:justify-end">
                                    @if($hash->not_assigned) 
                                    <x-nav-link :href="route('dashboard.hashes.edit', [ 'hash' => $hash ])">Edit</x-nav-link>
                                    @endif
                                    @if($hash->voucher && $hash->not_used) 
                                    <x-nav-link :href="route('dashboard.hashes.approvate', [ 'hash' => $hash->hash ])">{{ $hash->approved_at }} Aprobar</x-nav-link>
                                    @endif
                                    @if($hash->assigned) 
                                    <x-nav-link :href="route('dashboard.hashes.reverse', [ 'hash' => $hash->hash ])">Reversar</x-nav-link>
                                    @endif
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
