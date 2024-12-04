<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Daftar Mahasiswa') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-900">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 dark:bg-gray-700 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="mb-4 text-2xl font-bold text-white border-blue-500 inline-block pb-1">
                        Buat Data Mahasiswa
                    </h2><br>

                    @if (session('success'))
                        <div class="mb-4 text-green-500">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('mahasiswa.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label for="npm" class="block text-sm font-medium text-white">NPM</label>
                            <input type="text" name="npm" id="npm" 
                                 class="mt-1 block w-full bg-gray-700 text-gray-200 border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" 
                                    placeholder="Masukkan NPM" pattern="\d*" required>

                            @error('npm')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="nama" class="block text-sm font-medium text-white">Nama</label>
                            <input type="text" name="nama" id="nama" class="mt-1 block w-full bg-gray-700 text-gray-200 border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Masukkan Nama" required>
                            @error('nama')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="prodi" class="block text-sm font-medium text-white">Program Studi</label>
                            <input type="text" name="prodi" id="prodi" class="mt-1 block w-full bg-gray-700 text-gray-200 border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" placeholder="Masukkan Program Studi" required>
                            @error('prodi')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-between">
                            <button 
                                type="submit" 
                                class="bg-gradient-to-r from-blue-500 to-blue-700 text-white font-bold text-sm px-6 py-2 rounded-lg shadow-md hover:from-blue-600 hover:to-blue-800 hover:shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2 transform transition duration-300 ease-in-out hover:scale-105">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 inline-block mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                </svg>
                                Simpan Data
                            </button>

                            <a href="{{ route('dashboard') }}" 
                            class="bg-red-500 text-white px-3 py-1.5 rounded-md shadow-md hover:bg-red-600 focus:outline-none transform transition duration-200 hover:scale-105">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 inline-block mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                                </svg>
                                Kembali
                            </a>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
