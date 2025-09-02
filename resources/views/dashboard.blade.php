<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>    
    <link rel="icon" type="image/png" href="{{ asset('img/logo-joss-gandos.png') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
</head>

    <body class="relative z-20 bg-[url('{{ asset('img/backgroundbatik.png') }}')] bg-cover bg-fixed bg-center">

        <!-- Navbar -->
        <x-navbar></x-navbar>

        <!-- Container utama -->
        <div class="max-w-6xl mx-auto p-6 pt-24"> 
            <!-- pakai pt-24 biar ada jarak dari navbar -->
            
            <h1 class="text-3xl font-bold text-gray-700 mb-6">Dashboard - Kelola Foto</h1>

            <!-- Success Message -->
            @if(session('success'))
                <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Button Tambah -->
            <a href="" 
                class="mb-6 inline-block bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition">
                + Tambah Foto
            </a>

            <!-- Tabel Foto -->
            <div class="bg-white shadow-md rounded-xl overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Judul</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Foto</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Jenis</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        
                    </tbody>
                </table>
            </div>
        </div>

    </body>

</html>
