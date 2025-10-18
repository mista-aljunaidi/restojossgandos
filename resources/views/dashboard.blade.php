<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="icon" type="image/png" href="{{ asset('img/logojossgandos.png') }}">
  @vite(['resources/css/app.css','resources/js/app.js'])
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
</head>

<body class="bg-white text-gray-900 overflow-x-hidden overflow-y-auto">

  <!-- Wrapper utama: sidebar + konten -->
  <div class="flex min-h-screen">

    <!-- Sidebar -->
    <aside id="sidebar"
      class="bg-gradient-to-b from-gray-900/95 to-gray-800/90 backdrop-blur-lg text-white shadow-[0_0_25px_rgba(255,255,255,0.05)]
            flex flex-col justify-between z-50 transition-all duration-300
            fixed left-0 top-0 h-screen w-60 -translate-x-full md:translate-x-0 md:relative md:h-auto border-r border-gray-700/50">
      <div>
        <!-- Logo -->
        <div class="flex items-start gap-3 px-6 py-5 mt-16 md:mt-4 pb-2 border-b border-gray-700/50">
          <img src="{{ asset('img/logojossgandos.png') }}" alt="Logo"
            class="w-10 h-10 object-contain flex-shrink-0 drop-shadow-[0_0_6px_rgba(255,255,255,0.2)]">
          <span class="text-lg font-semibold tracking-wide text-white leading-tight">
            Resto <br> Joss Gandos
          </span>
        </div>

        <!-- Dashboard -->
        <nav class="mt-6 flex flex-col space-y-2 px-3">
          <a href="{{ route('dashboard') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-xl bg-gradient-to-r from-gray-700/60 to-gray-700/30 hover:from-gray-600/80 hover:to-gray-600/60
                  text-white font-medium transition duration-300 backdrop-blur-sm border border-gray-600/30 hover:border-gray-400/50 shadow-md">
            <img src="{{ asset('img/dashboard.png') }}" alt="Dashboard" class="w-6 h-6 invert">
            <span>Dashboard</span>
          </a>
        </nav>
      </div>

      <!-- Logout -->
      <form action="{{ route('logout') }}" method="POST" class="px-4 py-5 border-t border-gray-700/50">
        @csrf
        <button type="submit"
          class="flex items-center justify-center gap-3 w-full bg-gradient-to-r from-gray-700/60 to-gray-700/30
                hover:from-red-600 hover:to-red-700 text-white py-3 rounded-xl shadow-lg transition duration-300 border border-gray-600/40">
          <img src="{{ asset('img/exit.png') }}" alt="Logout" class="w-6 h-6 invert">
          <span class="font-medium">Logout</span>
        </button>
      </form>
    </aside>

    <!-- Overlay mobile -->
    <div id="overlay"
      class="fixed inset-0 bg-black/40 backdrop-blur-sm hidden z-40 md:hidden transition-opacity duration-300"
      onclick="toggleSidebar()"></div>

    <!-- Konten utama -->
    <div class="flex-1 flex flex-col transition-all duration-300">

      <!-- Header (Dashboard + Input Text  + Button Tambah Data) -->
      <header class="flex items-center justify-between gap-3 w-full bg-white/60 backdrop-blur-md rounded-2xl shadow-md px-4 sm:px-6 py-3 sm:py-4 mb-6 border border-gray-200/60 sticky top-0 z-40">

        <!-- Kiri: Tombol toggle + Judul -->
        <div class="flex items-center gap-3 flex-shrink-0">
          <!-- Tombol Toggle Sidebar (mobile only) -->
          <button onclick="toggleSidebar()" class="md:hidden flex items-center justify-center p-2 rounded-lg hover:bg-gray-200 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
          </button>

          <h1 class="text-lg sm:text-xl md:text-2xl font-bold text-gray-800 tracking-tight whitespace-nowrap">
            Dashboard
          </h1>
        </div>

        <!-- Tengah: Search bar -->
        <div class="relative flex-1 max-w-md mx-2">
          <svg class="w-5 h-5 absolute left-3 top-2.5 text-gray-500" fill="none" stroke="currentColor" stroke-width="2"
            viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="11" cy="11" r="8"></circle>
            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
          </svg>
          <input type="text" id="searchInput"
            placeholder="Cari menu, kategori, deskripsi..."
            class="pl-10 pr-4 py-2 w-full rounded-xl border border-gray-300 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent bg-white/80 transition-all duration-300">
        </div>

        <!-- Kanan: Tombol tambah data -->
        <div class="flex-shrink-0">
          <button onclick="openChooseModal()"
            class="flex items-center gap-2 bg-green-600 hover:bg-green-700 text-white px-4 sm:px-5 py-2 rounded-xl shadow-lg transition-all duration-300 whitespace-nowrap">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            <span>Tambah Data</span>
          </button>
        </div>

      </header>

      <!-- Flash Success -->
      @if(session('success'))
        <div id="success-alert"
          class="mx-4 md:mx-auto mt-4 mb-2 p-4 bg-green-50 border-l-4 border-green-500 text-green-700 rounded-lg shadow transition-all duration-500 ease-in-out">
          {{ session('success') }}
        </div>
      @endif

      <!-- Validasi Error -->
      @if ($errors->any())
        <div class="mx-4 md:mx-auto mb-4 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 rounded-lg shadow">
          <ul class="list-disc list-inside text-sm space-y-1">
            @foreach ($errors->all() as $error)
              <li>⚠️ {{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <!-- Statistik -->
      <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-6 mt-4">
        <!-- Foto Galeri -->
        <div class="bg-white/70 backdrop-blur-md border border-gray-200/70 shadow-md hover:shadow-lg transition-all duration-300 rounded-2xl p-5 flex items-center gap-4">
          <div class="bg-pink-500/10 text-pink-600 p-3 rounded-xl">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M4 16l4-4 4 4m0 0l4-4 4 4M4 8h16" />
            </svg>
          </div>
          <div>
            <h3 class="text-gray-700 font-semibold">Foto Galeri</h3>
            <p class="text-2xl font-bold text-gray-900"></p>
          </div>
        </div>

        <!-- Menu Tersedia -->
        <div class="bg-white/70 backdrop-blur-md border border-gray-200/70 shadow-md hover:shadow-lg transition-all duration-300 rounded-2xl p-5 flex items-center gap-4">
          <div class="bg-red-500/10 text-red-600 p-3 rounded-xl">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M5 3h14a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2zm3 10h8m-8-4h8" />
            </svg>
          </div>
          <div>
            <h3 class="text-gray-700 font-semibold">Menu Tersedia</h3>
            <p class="text-2xl font-bold text-gray-900"></p>
          </div>
        </div>

        <!-- Testimoni Pelanggan -->
        <div class="bg-white/70 backdrop-blur-md border border-gray-200/70 shadow-md hover:shadow-lg transition-all duration-300 rounded-2xl p-5 flex items-center gap-4">
          <div class="bg-green-500/10 text-green-600 p-3 rounded-xl">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M7 8h10M7 12h6m-6 4h10M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
          </div>
          <div>
            <h3 class="text-gray-700 font-semibold">Testimoni</h3>
            <p class="text-2xl font-bold text-gray-900">12</p>
          </div>
        </div>

        <!-- Event / Promo Aktif -->
        <div class="bg-white/70 backdrop-blur-md border border-gray-200/70 shadow-md hover:shadow-lg transition-all duration-300 rounded-2xl p-5 flex items-center gap-4">
          <div class="bg-yellow-500/10 text-yellow-600 p-3 rounded-xl">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 12l2 2 4-4m6-2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V8a2 2 0 012-2h7l2 2h7z" />
            </svg>
          </div>
          <div>
            <h3 class="text-gray-700 font-semibold">Event / Promo Aktif</h3>
            <p class="text-2xl font-bold text-gray-900">3</p>
          </div>
        </div>
      </section>

      <!-- Dashboard Menu -->
      <div id="dashboard-menu"
        class="bg-gray-100 shadow-xl rounded-2xl overflow-hidden mt-8 border border-gray-300 max-w-6xl mx-4 md:mx-auto p-2 md:p-4">
        <div class="overflow-x-auto">
          <table class="min-w-full text-sm text-gray-700">
            <thead class="bg-gray-300 border-b border-gray-200">
              <tr>
                <th class="px-4 py-2 text-left font-semibold uppercase tracking-wider">Judul</th>
                <th class="px-4 py-2 text-left font-semibold uppercase tracking-wider">Deskripsi</th>
                <th class="px-4 py-2 text-left font-semibold uppercase tracking-wider">Foto</th>
                <th class="px-4 py-2 text-left font-semibold uppercase tracking-wider">Tipe</th>
                <th class="px-4 py-2 text-center font-semibold uppercase tracking-wider">Aksi</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
              @foreach($menus as $menu)
                <tr class="transition-all duration-200 hover:-translate-y-1 hover:shadow-md hover:bg-gray-50 rounded-lg">
                  <td class="px-4 py-2 font-medium">{{ $menu->title }}</td>
                  <td class="px-4 py-2 text-gray-600">{{ Str::limit($menu->description, 90) }}</td>
                  <td class="px-4 py-2">
                    <img src="{{ asset($menu->image_path) }}" class="h-12 w-12 rounded-lg object-cover shadow">
                  </td>
                  <td class="px-4 py-2">
                    <span
                      class="px-2.5 py-0.5 rounded-full text-xs font-semibold {{ $menu->type === 'carousel' ? 'bg-purple-100 text-purple-700' : 'bg-orange-100 text-orange-500' }}">
                      {{ ucfirst($menu->type) }}
                    </span>
                  </td>
                  <td class="px-4 py-2 flex gap-1.5 justify-center">
                    <button class="bg-blue-600 text-white px-3 py-1 rounded-md shadow hover:bg-blue-700 transition"
                      data-id="{{ $menu->id }}" onclick="openUpdateMenuFromBtn(this)">Edit</button>
                    <button class="bg-red-600 text-white px-3 py-1 rounded-md shadow hover:bg-red-700 transition"
                      data-id="{{ $menu->id }}" onclick="openDeleteMenuFromBtn(this)">Hapus</button>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>

      <!-- Dashboard Gallery -->
      <div id="dashboard-gallery"
        class="bg-gray-100 shadow-xl rounded-2xl overflow-hidden mt-8 border border-gray-300 max-w-6xl mx-4 md:mx-auto p-2 md:p-4 hidden">
        <div class="overflow-x-auto">
          <table class="w-full table-fixed text-sm text-gray-700">
            <thead class="bg-gray-300 border-b border-gray-200">
              <tr>
                <th class="px-4 py-2 text-left font-semibold uppercase tracking-wider w-[40%]">Judul</th>
                <th class="px-4 py-2 text-center font-semibold uppercase tracking-wider w-[20%]">Foto</th>
                <th class="px-4 py-2 text-left font-semibold uppercase tracking-wider w-[20%]">Kategori</th>
                <th class="px-4 py-2 text-center font-semibold uppercase tracking-wider w-[20%]">Aksi</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
              @foreach($photos as $photo)
                <tr class="transition-all duration-200 hover:-translate-y-1 hover:shadow-md hover:bg-gray-50 rounded-lg">
                  <td class="px-4 py-2 font-medium truncate">{{ $photo->title }}</td>
                  <td class="px-4 py-2">
                    <img src="{{ asset($photo->image_path) }}" class="h-12 w-12 rounded-lg object-cover shadow mx-auto">
                  </td>
                  <td class="px-4 py-2">
                    <span
                      class="px-2.5 py-0.5 rounded-full text-xs font-semibold
                      {{ $photo->category === 'food' ? 'bg-red-100 text-red-700' :
                      ($photo->category === 'customer' ? 'bg-blue-100 text-blue-700' :
                      ($photo->category === 'event' ? 'bg-green-100 text-green-700' :
                      'bg-yellow-100 text-yellow-700')) }}">
                      {{ ucfirst($photo->category) }}
                    </span>
                  </td>
                  <td class="px-4 py-2 flex gap-1.5 justify-center">
                    <button class="bg-blue-600 text-white px-3 py-1 rounded-md shadow hover:bg-blue-700 transition"
                      data-id="{{ $photo->id }}" onclick="openUpdatePhotoFromBtn(this)">Edit</button>
                    <button class="bg-red-600 text-white px-3 py-1 rounded-md shadow hover:bg-red-700 transition"
                      data-id="{{ $photo->id }}" onclick="openDeletePhotoFromBtn(this)">Hapus</button>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>

      <!-- Pagination -->
      <div class="flex justify-center items-center space-x-2 mt-6 mb-10">
        <button id="btn-menu" class="pagination-btn active-page">1</button>
        <button id="btn-gallery" class="pagination-btn">2</button>
      </div>
    </div>
  </div>

  <!-- ================== MODAL ================== -->
  <!-- Modal Pilih Tambah -->
  <div id="modalChoose"
    class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50"
    onclick="if(event.target === this) closeChooseModal()">
    <div class="bg-white p-6 rounded-xl shadow-lg w-full max-w-sm text-center relative transition-all duration-300">
      <button type="button" onclick="closeChooseModal()" class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">
        <i class="uil uil-times text-2xl"></i>
      </button>
      <h2 class="text-xl font-bold mb-4">Tambah Foto</h2>
      <div class="flex flex-col gap-3">
        <button onclick="openTambahGallery()"
          class="bg-gradient-to-r from-purple-500 to-purple-700 text-white px-4 py-2 rounded-lg shadow hover:opacity-90 transition">Gallery</button>
        <button onclick="openTambahMenu()"
          class="bg-gradient-to-r from-yellow-400 to-yellow-600 text-white px-4 py-2 rounded-lg shadow hover:opacity-90 transition">Menu</button>
      </div>
    </div>
  </div>

  <!-- Modal Tambah Gallery -->
  <div id="modalTambahPhoto"
    class="fixed inset-0 bg-black/50 hidden items-start justify-center z-50 overflow-y-auto transition-opacity duration-300 ease-out"
    onclick="if(event.target === this) closeTambahModal()">
    <div
      class="bg-white p-6 rounded-xl shadow-lg w-full max-w-md relative mt-20 transform scale-95 opacity-0 transition-all duration-300 ease-out">
      <button type="button" onclick="closeTambahModal()" class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">
        <i class="uil uil-times text-2xl"></i>
      </button>
      <h2 class="text-xl font-bold mb-4">Tambah Foto Baru</h2>
      <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="title" placeholder="Judul Foto" class="border p-2 rounded mb-3 w-full" required>
        <select name="category" class="border p-2 rounded mb-3 w-full" required>
          <option value="food">Food</option>
          <option value="customer">Customer</option>
          <option value="event">Event</option>
          <option value="ambience">Ambience</option>
        </select>
        <input type="file" name="image" class="border p-2 rounded mb-3 w-full" required>
        <div class="flex justify-end">
          <button type="submit"
            class="bg-gradient-to-r from-green-500 to-green-700 text-white px-4 py-2 rounded-lg shadow hover:opacity-90 transition">Upload</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Update Photo -->
  <div id="modalUpdatePhoto"
    class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50 transition-opacity duration-300 ease-out"
    onclick="if(event.target === this) closeUpdatePhoto()">

    <div
      class="bg-white p-6 rounded-xl shadow-lg w-full max-w-md relative transform -translate-y-[60%] scale-95 opacity-0 transition-all duration-300 ease-out">
      
      <button type="button" onclick="closeUpdatePhoto()" class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">
        <i class="uil uil-times text-2xl"></i>
      </button>

      <h2 class="text-xl font-bold mb-4">Update Foto</h2>
      <form id="formUpdatePhoto" method="POST" enctype="multipart/form-data"
        data-action="{{ route('gallery.update', ':id') }}">
        @csrf
        @method('PUT')

        <input type="text" id="updatePhotoTitle" name="title" placeholder="Judul Foto"
          class="border p-2 rounded mb-3 w-full focus:ring-2 focus:ring-blue-400 outline-none transition" required>

        <select id="updatePhotoCategory" name="category"
          class="border p-2 rounded mb-3 w-full focus:ring-2 focus:ring-blue-400 outline-none transition" required>
          <option value="food">Food</option>
          <option value="customer">Customer</option>
          <option value="event">Event</option>
          <option value="ambience">Ambience</option>
        </select>

        <input type="file" name="image"
          class="border p-2 rounded mb-3 w-full focus:ring-2 focus:ring-blue-400 outline-none transition">

        <div class="flex justify-end">
          <button type="submit"
            class="bg-gradient-to-r from-blue-500 to-blue-700 text-white px-4 py-2 rounded-lg shadow hover:opacity-90 transition">
            Update
          </button>
        </div>
      </form>
    </div>
  </div>

  <!-- Delete Photo -->
  <div id="modalDeletePhoto"
    class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50 transition-opacity duration-300 ease-out"
    onclick="if(event.target === this) closeDeletePhoto()">

    <div
      class="bg-white p-6 rounded-xl shadow-lg w-full max-w-sm text-center relative transform -translate-y-[60%] scale-95 opacity-0 transition-all duration-300 ease-out">

      <button type="button" onclick="closeDeletePhoto()" class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">
        <i class="uil uil-times text-2xl"></i>
      </button>

      <h2 class="text-xl font-bold mb-4">Hapus Foto</h2>
      <p class="mb-4 text-gray-700">Apakah Anda yakin ingin menghapus foto ini?</p>

      <form id="formDeletePhoto" method="POST" data-action="{{ route('gallery.destroy', ':id') }}">
        @csrf
        @method('DELETE')
        <div class="flex justify-center gap-3">
          <button type="button" onclick="closeDeletePhoto()"
            class="bg-gray-400 text-white px-4 py-2 rounded-lg shadow hover:bg-gray-500 transition">
            Batal
          </button>
          <button type="submit"
            class="bg-gradient-to-r from-red-500 to-red-700 text-white px-4 py-2 rounded-lg shadow hover:opacity-90 transition">
            Hapus
          </button>
        </div>
      </form>
    </div>
  </div>

  <!-- Modal Tambah Menu -->
  <div id="modalTambahMenu"
    class="fixed inset-0 bg-black/50 hidden items-start justify-center z-50 overflow-y-auto transition-opacity duration-300 ease-out"
    onclick="if(event.target === this) closeTambahMenu()">
    <div
      class="bg-white p-6 rounded-xl shadow-lg w-full max-w-md relative mt-20 transform scale-95 opacity-0 transition-all duration-300 ease-out">
      <button type="button" onclick="closeTambahMenu()" class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">
        <i class="uil uil-times text-2xl"></i>
      </button>
      <h2 class="text-xl font-bold mb-4">Tambah Menu Baru</h2>
      <form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="title" placeholder="Nama Menu" class="border p-2 rounded mb-3 w-full" required>
        <textarea name="description" placeholder="Deskripsi Menu"
          class="border p-2 rounded mb-3 w-full" required></textarea>
        <select name="type" class="border p-2 rounded mb-3 w-full" required>
          <option value="carousel">Carousel</option>
          <option value="special">Menu Spesial</option>
        </select>
        <input type="file" name="image" class="border p-2 rounded mb-3 w-full" required>
        <div class="flex justify-end">
          <button type="submit"
            class="bg-gradient-to-r from-green-500 to-green-700 text-white px-4 py-2 rounded-lg shadow hover:opacity-90 transition">Upload</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Modal Update Menu -->
  <div id="modalUpdateMenu"
    class="fixed inset-0 bg-black/50 hidden items-start justify-center z-50 overflow-y-auto transition-opacity duration-300 ease-out"
    onclick="if(event.target === this) closeUpdateMenu()">
    <div
      class="bg-white p-6 rounded-xl shadow-lg w-full max-w-md relative mt-20 transform scale-95 opacity-0 transition-all duration-300 ease-out">
      <button type="button" onclick="closeUpdateMenu()" class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">
        <i class="uil uil-times text-2xl"></i>
      </button>
      <h2 class="text-xl font-bold mb-4">Update Menu</h2>
      <form id="formUpdateMenu" method="POST" enctype="multipart/form-data"
        data-action="{{ route('menu.update', ':id') }}">
        @csrf
        @method('PUT')
        <input type="text" id="updateTitle" name="title" placeholder="Nama Menu"
          class="border p-2 rounded mb-3 w-full focus:ring-2 focus:ring-blue-400 outline-none transition" required>
        <textarea id="updateDescription" name="description" placeholder="Deskripsi Menu"
          class="border p-2 rounded mb-3 w-full focus:ring-2 focus:ring-blue-400 outline-none transition" required></textarea>
        <select id="updateType" name="type"
          class="border p-2 rounded mb-3 w-full focus:ring-2 focus:ring-blue-400 outline-none transition" required>
          <option value="carousel">Carousel</option>
          <option value="special">Menu Spesial</option>
        </select>
        <input type="file" name="image"
          class="border p-2 rounded mb-3 w-full focus:ring-2 focus:ring-blue-400 outline-none transition">
        <div class="flex justify-end">
          <button type="submit"
            class="bg-gradient-to-r from-blue-500 to-blue-700 text-white px-4 py-2 rounded-lg shadow hover:opacity-90 transition">Update</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Modal Delete Menu -->
  <div id="modalDeleteMenu"
    class="fixed inset-0 bg-black/50 hidden items-start justify-center z-50 overflow-y-auto transition-opacity duration-300 ease-out"
    onclick="if(event.target === this) closeDeleteMenu()">
    <div
      class="bg-white p-6 rounded-xl shadow-lg w-full max-w-sm text-center relative mt-20 transform scale-95 opacity-0 transition-all duration-300 ease-out">
      <button type="button" onclick="closeDeleteMenu()" class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">
        <i class="uil uil-times text-2xl"></i>
      </button>
      <h2 class="text-xl font-bold mb-4">Hapus Menu</h2>
      <p class="mb-4 text-gray-700">Apakah Anda yakin ingin menghapus menu ini?</p>
      <form id="formDeleteMenu" method="POST" data-action="{{ route('menu.destroy', ':id') }}">
        @csrf
        @method('DELETE')
        <div class="flex justify-center gap-3">
          <button type="button" onclick="closeDeleteMenu()"
            class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500 transition">Batal</button>
          <button type="submit"
            class="bg-gradient-to-r from-red-500 to-red-700 text-white px-4 py-2 rounded hover:opacity-90 transition">Hapus</button>
        </div>
      </form>
    </div>
  </div>

</body>

  <!-- Script Toggle Sidebar -->
  <script>
    function toggleSidebar() {
      const sidebar = document.getElementById('sidebar');
      const overlay = document.getElementById('overlay');
      sidebar.classList.toggle('-translate-x-full');
      overlay.classList.toggle('hidden');
    }
  </script>

  <!-- Script Toggle -->
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const btnMenu = document.getElementById('btn-menu');
      const btnGallery = document.getElementById('btn-gallery');
      const dashboardMenu = document.getElementById('dashboard-menu');
      const dashboardGallery = document.getElementById('dashboard-gallery');

      // Pastikan tampilan awal: Menu aktif
      dashboardMenu.classList.remove('hidden');
      dashboardGallery.classList.add('hidden');
      btnMenu.classList.add('active-page');
      btnGallery.classList.remove('active-page');

      // Tombol Menu (1)
      btnMenu.addEventListener('click', () => {
        dashboardMenu.classList.remove('hidden');
        dashboardGallery.classList.add('hidden');
        btnMenu.classList.add('active-page');
        btnGallery.classList.remove('active-page');
      });

      // Tombol Gallery (2)
      btnGallery.addEventListener('click', () => {
        dashboardGallery.classList.remove('hidden');
        dashboardMenu.classList.add('hidden');
        btnGallery.classList.add('active-page');
        btnMenu.classList.remove('active-page');
      });
    });
  </script>

  <!-- Styling Pagination -->
  <style>
    .pagination-btn {
      width: 38px;
      height: 38px;
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: #f3f4f6;
      color: #374151;
      font-weight: 600;
      border-radius: 8px;
      transition: all 0.3s ease;
      box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    }

    .pagination-btn:hover {
      background-color: #e5e7eb;
      transform: translateY(-1px);
    }

    .active-page {
      background: linear-gradient(to right, #2563eb, #3b82f6);
      color: white !important;
      transform: scale(1.05);
      box-shadow: 0 2px 6px rgba(59, 130, 246, 0.4);
    }
  </style>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const searchInput = document.getElementById('searchInput');
      const dashboardMenu = document.getElementById('dashboard-menu');
      const dashboardGallery = document.getElementById('dashboard-gallery');
      const btnMenu = document.getElementById('btn-menu');
      const btnGallery = document.getElementById('btn-gallery');

      let highlightedRows = [];
      let activeIndex = -1; // posisi baris aktif

      // CSS tambahan untuk gradasi
      const style = document.createElement('style');
      style.innerHTML = `
        .highlighted-row {
          background: linear-gradient(to right, #fff9c4, #fff59d); /* gradasi kuning lembut */
          transition: background 0.3s ease;
        }
        .active-highlight {
          background: linear-gradient(to right, #ffd180, #ffcc80); /* oranye lembut */
          transform: scale(1.01);
          box-shadow: 0 0 6px rgba(255, 171, 64, 0.5);
        }
      `;
      document.head.appendChild(style);

      function clearHighlights() {
        highlightedRows.forEach(row => {
          row.classList.remove('highlighted-row', 'active-highlight');
        });
        highlightedRows = [];
        activeIndex = -1;
      }

      function showTable(target) {
        if (target === 'menu') {
          dashboardMenu.classList.remove('hidden');
          dashboardGallery.classList.add('hidden');
          btnMenu.classList.add('active-page');
          btnGallery.classList.remove('active-page');
        } else {
          dashboardGallery.classList.remove('hidden');
          dashboardMenu.classList.add('hidden');
          btnGallery.classList.add('active-page');
          btnMenu.classList.remove('active-page');
        }
      }

      function detectTable(keyword) {
        keyword = keyword.toLowerCase();
        const menuRows = Array.from(dashboardMenu.querySelectorAll('tbody tr'));
        const galleryRows = Array.from(dashboardGallery.querySelectorAll('tbody tr'));

        const foundMenu = menuRows.some(row => row.textContent.toLowerCase().includes(keyword));
        const foundGallery = galleryRows.some(row => row.textContent.toLowerCase().includes(keyword));

        if (foundGallery && !foundMenu) showTable('gallery');
        else showTable('menu');
      }

      function highlightRows(keyword) {
        clearHighlights();
        if (!keyword) return;

        keyword = keyword.toLowerCase();
        const visibleTable = !dashboardMenu.classList.contains('hidden') ? dashboardMenu : dashboardGallery;
        const rows = visibleTable.querySelectorAll('tbody tr');
        highlightedRows = [];

        rows.forEach(row => {
          if (row.textContent.toLowerCase().includes(keyword)) {
            row.classList.add('highlighted-row');
            highlightedRows.push(row);
          }
        });

        if (highlightedRows.length > 0) {
          activeIndex = 0;
          highlightedRows[0].classList.add('active-highlight');
          highlightedRows[0].scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
      }

      function moveHighlight(direction) {
        if (highlightedRows.length === 0) return;

        highlightedRows[activeIndex].classList.remove('active-highlight');

        if (direction === 'down') {
          activeIndex = (activeIndex + 1) % highlightedRows.length;
        } else if (direction === 'up') {
          activeIndex = (activeIndex - 1 + highlightedRows.length) % highlightedRows.length;
        }

        highlightedRows[activeIndex].classList.add('active-highlight');
        highlightedRows[activeIndex].scrollIntoView({ behavior: 'smooth', block: 'center' });
      }

      // Saat mengetik → tampilkan tabel tujuan
      searchInput.addEventListener('input', function() {
        const keyword = this.value.trim();
        if (!keyword) {
          clearHighlights();
          return;
        }
        detectTable(keyword);
      });

      // Saat tekan Enter → highlight hasil
      searchInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
          e.preventDefault();
          const keyword = this.value.trim();
          highlightRows(keyword);
        }
      });

      // Navigasi pakai panah
      document.addEventListener('keydown', function(e) {
        if (e.key === 'ArrowDown') {
          e.preventDefault();
          moveHighlight('down');
        } else if (e.key === 'ArrowUp') {
          e.preventDefault();
          moveHighlight('up');
        }
      });
    });
  </script>

  <script>
  // ================================
  // Auto hide success alert
  // ================================
  setTimeout(() => {
    const alertBox = document.getElementById('success-alert');
    if (alertBox) {
      alertBox.style.opacity = '0';
      alertBox.style.transform = 'translateY(-20px)';
      setTimeout(() => alertBox.remove(), 500);
    }
  }, 2000);

  // ================================
  // Fade in effect
  // ================================
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

  // ================================
  // Global Modal System
  // ================================
  function showModal(id) {
    const modal = document.getElementById(id);
    if (!modal) return;
    const content = modal.querySelector('div.bg-white, div.bg-gray-50, div.bg-slate-50');

    // Posisi modal mengikuti scroll
    const scrollY = window.scrollY || document.documentElement.scrollTop;
    if (content) content.style.marginTop = `${scrollY + 100}px`;

    modal.classList.remove('hidden');
    requestAnimationFrame(() => {
      modal.classList.add('flex');
      modal.classList.remove('opacity-0');
      if (content) {
        content.classList.remove('opacity-0', 'scale-95');
        content.classList.add('opacity-100', 'scale-100');
      }
    });

    document.body.style.overflow = 'hidden'; // Disable scroll
  }

  function hideModal(id) {
    const modal = document.getElementById(id);
    if (!modal) return;
    const content = modal.querySelector('div.bg-white, div.bg-gray-50, div.bg-slate-50');

    if (content) {
      content.classList.add('opacity-0', 'scale-95');
      content.classList.remove('opacity-100', 'scale-100');
    }
    modal.classList.add('opacity-0');
    setTimeout(() => {
      modal.classList.remove('flex');
      modal.classList.add('hidden');
      modal.classList.remove('opacity-0');
      document.body.style.overflow = ''; // Enable scroll again
    }, 250);
  }

  // ================================
  // GALLERY CRUD
  // ================================
  function openTambahGallery() {
    closeChooseModal();
    const modal = document.getElementById('modalTambahPhoto');
    modal.classList.remove('hidden');
    setTimeout(() => {
      modal.querySelector('div').classList.remove('opacity-0', 'scale-95');
      modal.querySelector('div').classList.add('opacity-100', 'scale-100');
    }, 10);
  }
  function closeTambahModal() {
    const modal = document.getElementById('modalTambahPhoto');
    const box = modal.querySelector('div');
    box.classList.add('opacity-0', 'scale-95');
    box.classList.remove('opacity-100', 'scale-100');
    setTimeout(() => modal.classList.add('hidden'), 300);
  }

  function openUpdatePhotoFromBtn(btn) {
    const id = btn.dataset.id;
    const title = btn.dataset.title || '';
    const category = btn.dataset.category || '';
    const form = document.getElementById('formUpdatePhoto');
    const actionTemplate = form.getAttribute('data-action');
    if (actionTemplate) form.action = actionTemplate.replace(':id', id);
    document.getElementById('updatePhotoTitle').value = title;
    document.getElementById('updatePhotoCategory').value = category;

    // Gunakan efek modal baru
    showModal('modalUpdatePhoto');
  }

  function closeUpdatePhoto() {
    hideModal('modalUpdatePhoto');
  }

  function openDeletePhotoFromBtn(btn) {
    const id = btn.dataset.id;
    const form = document.getElementById('formDeletePhoto');
    const actionTemplate = form.getAttribute('data-action');
    if (actionTemplate) form.action = actionTemplate.replace(':id', id);

    // Gunakan efek modal baru
    showModal('modalDeletePhoto');
  }

  function closeDeletePhoto() {
    hideModal('modalDeletePhoto');
  }

  // ================================
  // MENU CRUD
  // ================================
  function openTambahMenu() {
    closeChooseModal();
    const modal = document.getElementById('modalTambahMenu');
    modal.classList.remove('hidden');
    setTimeout(() => {
      modal.querySelector('div').classList.remove('opacity-0', 'scale-95');
      modal.querySelector('div').classList.add('opacity-100', 'scale-100');
    }, 10);
  }
  function closeTambahMenu() {
    const modal = document.getElementById('modalTambahMenu');
    const box = modal.querySelector('div');
    box.classList.add('opacity-0', 'scale-95');
    box.classList.remove('opacity-100', 'scale-100');
    setTimeout(() => modal.classList.add('hidden'), 300);
  }

  function openUpdateMenuFromBtn(btn) {
    const id = btn.dataset.id;
    const title = btn.dataset.title || '';
    const description = btn.dataset.description || '';
    const type = btn.dataset.type || '';
    const form = document.getElementById('formUpdateMenu');
    const actionTemplate = form.getAttribute('data-action');
    if (actionTemplate) form.action = actionTemplate.replace(':id', id);
    document.getElementById('updateTitle').value = title;
    document.getElementById('updateDescription').value = description;
    document.getElementById('updateType').value = type;

    showModal('modalUpdateMenu');
  }

  function closeUpdateMenu() {
    hideModal('modalUpdateMenu');
  }

  function openDeleteMenuFromBtn(btn) {
    const id = btn.dataset.id;
    const form = document.getElementById('formDeleteMenu');
    const actionTemplate = form.getAttribute('data-action');
    if (actionTemplate) form.action = actionTemplate.replace(':id', id);
    showModal('modalDeleteMenu');
  }

  function closeDeleteMenu() {
    hideModal('modalDeleteMenu');
  }

  // ================================
  // Modal pilih tambah / tambah menu / gallery
  // ================================
  function openChooseModal() { showModal('modalChoose'); }
  function closeChooseModal() { hideModal('modalChoose'); }

  function openTambahGallery() {
    closeChooseModal();
    showModal('modalTambahPhoto');
  }
  function closeTambahModal() { hideModal('modalTambahPhoto'); }

  function openTambahMenu() {
    closeChooseModal();
    showModal('modalTambahMenu');
  }
  function closeTambahMenu() { hideModal('modalTambahMenu'); }
</script>

</html>