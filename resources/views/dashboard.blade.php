<x-app-layout>
    <x-slot name="header">
 
    <div class="container mx-auto p-6 bg-white ">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold ">📊 Dashboard Admin - Sekolah</h1>
            <a href="{{ route('home') }}" 
               class="text-white bg-blue-600 hover:bg-blue-700 rounded px-4 py-2 transition duration-150">
                Home
            </a>
        </div>
    </x-slot>

        {{-- Pesan sukses --}}
        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

         @if(session('cancelled'))
            <div class="mb-4 p-4 bg-red-100 text-red-800 rounded-lg">
                {{ session('cancelled') }}
            </div>
        @endif

        <div class="overflow-x-auto bg-white shadow-md rounded-lg">
            <table class="min-w-full border border-collapse border-gray-300">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="py-2 px-4 border-b text-left border border-collapse border-gray-300">Nama</th>
                        <th class="py-2 px-4 border-b text-left border border-collapse border-gray-300">Jenjang</th>
                        <th class="py-2 px-4 border-b text-left border border-collapse border-gray-300">Kabupaten</th>
                        <th class="py-2 px-4 border-b text-left border border-collapse border-gray-300">Email</th>
                        <th class="py-2 px-4 border-b text-left border border-collapse border-gray-300">NPSN</th>
                        <th class="py-2 px-4 border-b text-left border border-collapse border-gray-300">Lihat</th>
                        <th class="py-2 px-4 border-b text-left border border-collapse border-gray-300">Download</th>
                        <th class="py-2 px-4 border-b text-center border border-collapse border-gray-300">Status</th>
                        <th colspan="2" class="py-2 px-4 border-b text-center border border-collapse border-gray-300">Aksi</th>
                        <th colspan="1" class="py-2 px-4 border-b text-center border border-collapse border-gray-300">Rating Sekolah</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($schools as $school)
                        <tr class="hover:bg-gray-50">
                            <td class="py-2 px-4 border-b">{{ $school->nama }}</td>
                            <td class="py-2 px-4 border-b">{{ $school->jenjang }}</td>
                            <td class="py-2 px-4 border-b">{{ $school->kabupaten }}</td>
                            <td class="py-2 px-4 border-b">{{ $school->email }}</td>
                            <td class="py-2 px-4 border-b">{{ $school->npsn }}</td>
                            <td class="py-2 px-4 border-b">
                                <a href="{{ route('file.preview', $school->id) }}" target="_blank"
                                   class="bg-transparent hover:bg-grey-100 text-white px-4 py-1 rounded">👁️</a>
                            </td>
                            <td class="py-2 px-4 border-b">
                                <a href="{{ route('file.download', $school->id) }}"
                                   class="bg-transparnt hover:bg-grey-100 text-white px-4 py-1 rounded">⬇️</a>
                            </td>
                            <td class="py-2 px-4 border-b text-center">
                                @if($school->is_verified)
                                    <span class="bg-green-200 text-green-700 px-2 py-1 rounded text-sm">Terverifikasi</span>
                                @else
                                    <span class="bg-yellow-200 text-yellow-700 px-2 py-1 rounded text-sm">Belum</span>
                                @endif
                            </td>
                            <td class="py-2 px-4 border-b text-center">
                                @if(!$school->is_verified)
                                    <form action="{{ route('schools.verify', $school->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-1 rounded">
                                            Verifikasi
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('schools.unverify', $school->id) }}" method="POST">
                                        @csrf
                                        <button class="bg-red-600 hover:bg-red-700 text-white px-4 py-1 rounded">Batalkan</button>
                                    </form>
                                @endif
                            </td>

                            {{-- MODIFICATION START HERE --}}
                            <td class="py-2 px-4 border-b">
                                @if ($school->is_verified)
                                    <a href="{{ route('evaluasi.start', $school->id) }}"
                                       class="text-blue-600 hover:underline">
                                        Evaluasi Sekolah
                                    </a>
                                @else
                                    <span class="text-gray-400 cursor-not-allowed">
                                        Evaluasi Sekolah
                                    </span>
                                @endif
                            </td>
                            {{-- MODIFICATION END HERE --}}

                            {{-- 🧮 Rating Sekolah berdasarkan skor --}}
                            <td class="py-2 px-4 border-b text-center">
                                @php
                                    $score = $school->skor ?? 0;
                                    if ($score == 0) {
                                        $rating = '-';
                                        $color = 'bg-black-100 text-black-800';
                                    } elseif ($score <= 30) {
                                        $rating = '🥉 Bronze';
                                        $color = 'bg-amber-100 text-amber-800';
                                    } elseif ($score <= 50) {
                                        $rating = '🥈 Silver';
                                        $color = 'bg-gray-200 text-gray-700';
                                    } elseif ($score <= 75) {
                                        $rating = '🥇 Gold';
                                        $color = 'bg-yellow-100 text-yellow-800';
                                    } elseif ($score <= 85) {
                                        $rating = '💎 Platinum';
                                        $color = 'bg-blue-100 text-blue-800';
                                    } elseif ($score <= 100) {
                                        $rating = '💠 Diamond';
                                        $color = 'bg-purple-100 text-purple-800';
                                    } else {
                                        $rating = 'Belum Dinilai';
                                        $color = 'bg-gray-100 text-gray-500';
                                    }
                                @endphp
                                <span class="px-3 py-1 rounded {{ $color }} font-semibold text-sm">
                                    {{ $rating }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="11" class="py-4 text-center text-gray-500">
                                Belum ada data sekolah.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>


    </div>
</x-app-layout>
