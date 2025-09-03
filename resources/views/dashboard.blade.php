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
    <div class="max-w-6xl mx-auto p-6 pt-24 fade-section opacity-0 translate-y-10 transition-all duration-1000">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-3xl font-bold text-gray-700">Dashboard - Kelola Foto</h1>

            <!-- Logout Button -->
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" 
                    class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition flex items-center gap-2">
                    <i class="uil uil-signout-alt"></i> Logout
                </button>
            </form>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div id="success-alert" 
                class="mb-4 p-3 bg-green-100 text-green-700 rounded transition-all duration-500 ease-in-out">
                {{ session('success') }}
            </div>
        @endif
        
        <!-- Button Tambah -->
        <input type="file" id="uploadFoto" accept="image/*" class="hidden">
        <a href="javascript:void(0)" 
        onclick="document.getElementById('uploadFoto').click();" 
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
                    {{-- Contoh row dummy, nanti bisa diganti dengan @foreach dari database --}}
                    <tr>
                        <td class="px-6 py-4 text-sm text-gray-700">1</td>
                        <td class="px-6 py-4 text-sm text-gray-700">Makanan Spesial</td>
                        <td class="px-6 py-4 text-sm">
                            <img src="{{ asset('img/bebekgoreng.jpg') }}" class="h-12 w-12 rounded-lg object-cover">
                        </td>
                        <td class="px-6 py-4 text-sm text-gray-700">Menu</td>
                        <td class="px-6 py-4 text-sm">
                            <button class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700">Edit</button>
                            <button class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Hapus</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        // Bisa tambahkan preview / upload ke server di sini
        document.getElementById('uploadFoto').addEventListener('change', function(e) {
        const file = e.target.files[0];
            if (file) {
                alert("Foto dipilih: " + file.name);
            }
        });
    </script>

    <script>
    // Auto-hide success message with fade + slide up
    setTimeout(() => {
        const alertBox = document.getElementById('success-alert');
        if (alertBox) {
            alertBox.style.opacity = '0';      // fade out
            alertBox.style.transform = 'translateY(-20px)'; // slide up
            setTimeout(() => alertBox.remove(), 500); // hapus setelah animasi selesai
        }
    }, 1500);
    </script>
    
    <script>
      // Fade In Animation
      document.addEventListener("DOMContentLoaded", () => {
        const sections = document.querySelectorAll(".fade-section");

        const observer = new IntersectionObserver((entries, obs) => {
          entries.forEach(entry => {
            if (entry.isIntersecting) {
              entry.target.classList.remove("opacity-0", "translate-y-10");
              entry.target.classList.add("opacity-100", "translate-y-0");
              obs.unobserve(entry.target); // hanya animasi sekali
            }
          });
        }, { threshold: 0.2 });

        sections.forEach(section => {
          observer.observe(section);
        });
      });
    </script>

</body>

</html>
