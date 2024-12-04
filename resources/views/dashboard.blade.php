<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Daftar Mahasiswa') }}
        </h2>
    </x-slot>

    <div class="py-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="mb-4 text-2xl font-bold text-white border-blue-500 inline-block pb-1">
                        Data Mahasiswa
                    </h2><br>

                    @if (session('success'))
                        <div class="mb-4 text-green-500">
                            {{ session('success') }}
                        </div>
                    @endif

                    <a href="{{ route('mahasiswa.mahasiswa') }}" 
                            class="inline-block bg-gradient-to-r from-green-400 via-green-500 to-green-600 text-white font-semibold text-sm px-4 py-2 rounded-lg shadow-lg hover:shadow-xl
                            hover:from-green-500 hover:via-green-600 hover:to-green-700 transition-all duration-300 transform hover:-translate-y-1 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-offset-2">
                        Tambah Data Mahasiswa
                    </a>


                    <div x-data="{ open: false }" class="relative inline-block text-left">
                        <!-- Tombol Export -->
                        <div>
                            <button 
                                type="button" 
                                @click="open = !open" 
                                class="bg-gradient-to-r from-green-600 via-green-500 to-green-700 text-white font-semibold text-sm px-4 py-2 rounded-lg shadow-lg inline-flex items-center hover:from-green-500 hover:via-green-600 hover:to-green-700 transition-all duration-300 transform hover:-translate-y-1 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2">
                                <span>Export</span>
                                <svg class="ml-2 -mr-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7l7 7 7-7"></path>
                                </svg>
                            </button>
                        </div>
                        
                        <!-- Dropdown menu -->
                        <div 
                            x-show="open" 
                            @click.outside="open = false" 
                            x-transition:enter="transition ease-out duration-200" 
                            x-transition:enter-start="opacity-0 scale-95" 
                            x-transition:enter-end="opacity-100 scale-100" 
                            x-transition:leave="transition ease-in duration-75" 
                            x-transition:leave-start="opacity-100 scale-100" 
                            x-transition:leave-end="opacity-0 scale-95" 
                            class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-xl bg-white ring-1 ring-black ring-opacity-5">
                            <div class="py-1">
                                <a href="{{ route('mahasiswa-export-excel') }}" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100 hover:text-blue-500 transition-colors">
                                    Export Excel
                                </a>
                                <a href="{{ route('mahasiswa-export-pdf') }}" class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100 hover:text-blue-500 transition-colors">
                                    Export PDF
                                </a>
                            </div>
                        </div>
                    </div>

                  <!-- Tombol Urut Berdasarkan -->
                    <div x-data="{ open: false }" class="relative inline-block text-left">
                        <div>
                            <button 
                                type="button" 
                                @click="open = !open" 
                                class="bg-gradient-to-r from-blue-600 via-blue-600 to-blue-500 text-white font-semibold text-sm px-4 py-2 rounded-lg shadow-lg inline-flex items-center hover:from-blue-500 hover:via-blue-600 hover:to-blue-700 transition-all duration-300 transform hover:-translate-y-1 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-offset-2">
                                <span>Urut Berdasarkan</span>
                                <svg class="ml-2 -mr-1 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7l7 7 7-7"></path>
                                </svg>
                            </button>
                        </div>
                        
                        <!-- Dropdown menu -->
                        <div 
                            x-show="open" 
                            @click.outside="open = false" 
                            x-transition:enter="transition ease-out duration-200" 
                            x-transition:enter-start="opacity-0 scale-95" 
                            x-transition:enter-end="opacity-100 scale-100" 
                            x-transition:leave="transition ease-in duration-75" 
                            x-transition:leave-start="opacity-100 scale-100" 
                            x-transition:leave-end="opacity-0 scale-95" 
                            class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-xl bg-white ring-1 ring-black ring-opacity-5">
                            <div class="py-1">
                                 <!-- Urut Nama -->
                                 <a href="{{ route('dashboard', ['sort' => 'nama', 'order' => $sortColumn === 'nama' && $sortOrder === 'asc' ? 'desc' : 'asc']) }}" 
                                    class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100 hover:text-green-500 transition-colors">
                                     Urut Nama : {{ $sortColumn === 'nama' && $sortOrder === 'asc' ? 'Z-A' : 'A-Z' }}
                                 </a>
                                  <!-- Urut NPM -->
                                <a href="{{ route('dashboard', ['sort' => 'npm', 'order' => $sortColumn === 'npm' && $sortOrder === 'asc' ? 'desc' : 'asc']) }}" 
                                    class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100 hover:text-green-500 transition-colors">
                                     Urut NPM : {{ $sortColumn === 'npm' && $sortOrder === 'asc' ? 'Z-A' : 'A-Z' }}
                                 </a>
                                <!-- Urut Nomor -->
                                <a href="{{ route('dashboard', ['sort' => 'id', 'order' => $sortColumn === 'id' && $sortOrder === 'asc' ? 'desc' : 'asc']) }}" 
                                   class="text-gray-700 block px-4 py-2 text-sm hover:bg-gray-100 hover:text-green-500 transition-colors">
                                    Urut Nomor : {{ $sortColumn === 'id' && $sortOrder === 'asc' ? 'Z-A' : 'A-Z' }}
                                </a>
                            </div>
                        </div>
                    </div>                    
                    
                    <br><br>

                    <table class="table-auto w-full border-collapse border border-gray-300 text-sm text-center">
                        <thead>
                            <tr>
                                <th class="border px-4 py-2">No</th>
                                <th class="border px-4 py-2">NPM</th>
                                <th class="border px-4 py-2">Nama</th>
                                <th class="border px-4 py-2">Prodi</th>
                                <th class="border px-4 py-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($mahasiswa as $key => $item)
                                <tr>
                                    <td class="border px-4 py-2">{{ $key + 1 }}</td>
                                    <td class="border px-4 py-2">{{ $item->npm }}</td>
                                    <td class="border px-4 py-2">{{ $item->nama }}</td>
                                    <td class="border px-4 py-2">{{ $item->prodi }}</td>
                                    <td class="border px-4 py-2">
                                       
                                            <!-- Tombol Hapus -->
                                            <form action="{{ route('mahasiswa.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?');" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-500 text-white px-2 py-1.5 rounded-md shadow-md hover:bg-red-700 focus:outline-none transform transition duration-200 hover:scale-105">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" aria-hidden="true">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                                                    </svg>
                                                    Hapus
                                                </button>
                                            </form>
                                        
                                            <!-- Tombol Edit -->
                                            <a href="{{ route('mahasiswa.edit', $item->id) }}" class="bg-blue-500 text-white px-3 py-1.5 rounded-md shadow-md hover:bg-blue-700 focus:outline-none transform transition duration-200 hover:scale-105">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" aria-hidden="true">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 3l4 4-10 10H3v-4L17 3z"></path>
                                                </svg>
                                                Edit
                                            </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center border px-4 py-2">Tidak ada data.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
