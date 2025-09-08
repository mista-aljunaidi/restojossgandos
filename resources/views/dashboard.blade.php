<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - Kelola Foto</title>
  <link rel="icon" type="image/png" href="{{ asset('img/logo-joss-gandos.png') }}">
  @vite(['resources/css/app.css','resources/js/app.js'])
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
</head>

<body class="bg-[url('{{ asset('img/backgroundbatik.png') }}')] bg-cover bg-fixed bg-center">

  <!-- Navbar -->
  <x-navbar></x-navbar>

  <div class="max-w-6xl mx-auto p-6 pt-24 fade-section opacity-0 translate-y-10 transition-all duration-1000">
    <div class="flex items-center justify-between mb-6">
      <h1 class="text-3xl font-bold text-gray-700">Dashboard</h1>

      <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 flex items-center gap-2">
              <i class="uil uil-signout-alt"></i> Logout
          </button>
      </form>
    </div>

    <!-- Flash success -->
    @if(session('success'))
    <div id="success-alert"
      class="mb-4 p-3 bg-green-100 text-green-700 rounded transition-all duration-500 ease-in-out">
      {{ session('success') }}
    </div>
    @endif

    <!-- Validasi error -->
    @if ($errors->any())
    <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
      <ul class="list-disc list-inside text-sm">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif

    <!-- Button Tambah -->
    <button onclick="openChooseModal()" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700">
      + Tambah Foto
    </button>

    <!-- Tabel Foto -->
    <div class="bg-white shadow-md rounded-xl overflow-hidden mt-6">
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
          <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Judul</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Foto</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kategori</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          @forelse($photos as $photo)
          <tr>
            <td class="px-6 py-4 text-sm text-gray-700">{{ $photo->id }}</td>
            <td class="px-6 py-4 text-sm text-gray-700">{{ $photo->title }}</td>
            <td class="px-6 py-4">
              <img src="{{ asset($photo->image_path) }}" class="h-12 w-12 rounded-lg object-cover">
            </td>
            <td class="px-6 py-4 text-sm text-gray-700">{{ $photo->category }}</td>
            <td class="px-6 py-4 flex gap-2">
              <button onclick="openEditModal({ 
                  id: '{{ $photo->id }}', 
                  title: @js($photo->title), 
                  category: @js($photo->category), 
                  image: '{{ asset($photo->image_path) }}' 
              })"
                class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700">
                Edit
              </button>
              <form action="{{ route('gallery.destroy',$photo->id) }}" method="POST"
                onsubmit="return confirm('Yakin hapus foto ini?')">
                @csrf @method('DELETE')
                <button type="submit"
                  class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Hapus</button>
              </form>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="5" class="px-6 py-6 text-center text-gray-500">Belum ada data.</td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

  <!-- Modal Pilih -->
  <div id="modalChoose" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">
    <div class="bg-white p-6 rounded-xl shadow-lg w-full max-w-sm text-center relative">
      <button type="button" onclick="closeChooseModal()" 
        class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">
        <i class="uil uil-times text-2xl"></i>
      </button>
      <h2 class="text-xl font-bold mb-4">Tambah Foto Baru</h2>
      <div class="flex flex-col gap-3">
        <button onclick="openTambahGallery()" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Gallery</button>
        <button onclick="openTambahMenu()" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Menu</button>
      </div>
    </div>
  </div>

  <!-- Modal Tambah Gallery -->
  <div id="modalTambah" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">
    <div class="bg-white p-6 rounded-xl shadow-lg w-full max-w-md relative">
      <button type="button" onclick="closeTambahModal()" 
        class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">
        <i class="uil uil-times text-2xl"></i>
      </button>
      <h2 class="text-xl font-bold mb-4">Tambah Foto Baru</h2>
      <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="title" placeholder="Judul Foto" class="border p-2 rounded mb-3 w-full">
        <select name="category" class="border p-2 rounded mb-3 w-full" required>
            <option value="food">Food</option>
            <option value="customer">Customer</option>
            <option value="event">Event</option>
            <option value="ambience">Ambience</option>
        </select>
        <input type="file" name="image" class="border p-2 rounded mb-3 w-full" required>
        <div class="flex justify-end">
          <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
            Upload
          </button>
        </div>
      </form>
    </div>
  </div>

  <!-- Modal Tambah Menu -->
  <div id="modalTambahMenu" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">
    <div class="bg-white p-6 rounded-xl shadow-lg w-full max-w-md relative">
      <button type="button" onclick="closeTambahMenu()" 
        class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">
        <i class="uil uil-times text-2xl"></i>
      </button>
      <h2 class="text-xl font-bold mb-4">Tambah Menu Baru</h2>
      <form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="title" placeholder="Nama Menu" class="border p-2 rounded mb-3 w-full">
        <textarea name="description" placeholder="Deskripsi Menu" class="border p-2 rounded mb-3 w-full"></textarea>
        <select name="type" class="border p-2 rounded mb-3 w-full" required>
          <option value="carousel">Carousel</option>
          <option value="special">Menu Spesial</option>
        </select>
        <input type="file" name="image" class="border p-2 rounded mb-3 w-full" required>
        <div class="flex justify-end">
          <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
            Simpan
          </button>
        </div>
      </form>
    </div>
  </div>

  <!-- Scripts -->
  <script>
    // auto hide success
    setTimeout(() => {
      const alertBox = document.getElementById('success-alert');
      if (alertBox) {
        alertBox.style.opacity = '0';
        alertBox.style.transform = 'translateY(-20px)';
        setTimeout(() => alertBox.remove(), 500);
      }
    }, 2000);

    // fade in
    document.addEventListener("DOMContentLoaded", () => {
      const sections = document.querySelectorAll(".fade-section");
      const observer = new IntersectionObserver((entries, obs) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.remove("opacity-0", "translate-y-10");
            entry.target.classList.add("opacity-100", "translate-y-0");
            obs.unobserve(entry.target);
          }
        });
      }, { threshold: 0.2 });
      sections.forEach(section => observer.observe(section));
    });

    // Modal functions
    function openChooseModal() {
      document.getElementById('modalChoose').classList.remove('hidden');
      document.getElementById('modalChoose').classList.add('flex');
    }
    function closeChooseModal() {
      document.getElementById('modalChoose').classList.add('hidden');
      document.getElementById('modalChoose').classList.remove('flex');
    }
    function openTambahGallery() {
      closeChooseModal();
      openTambahModal();
    }
    function openTambahMenu() {
      closeChooseModal();
      document.getElementById('modalTambahMenu').classList.remove('hidden');
      document.getElementById('modalTambahMenu').classList.add('flex');
    }
    function openTambahModal() {
      document.getElementById('modalTambah').classList.remove('hidden');
      document.getElementById('modalTambah').classList.add('flex');
    }
    function closeTambahModal() {
      document.getElementById('modalTambah').classList.add('hidden');
      document.getElementById('modalTambah').classList.remove('flex');
    }
    function closeTambahMenu() {
      document.getElementById('modalTambahMenu').classList.add('hidden');
      document.getElementById('modalTambahMenu').classList.remove('flex');
    }
  </script>

</body>
</html>
