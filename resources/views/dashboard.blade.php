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

<body class="bg-[url('{{ asset('img/backgroundbatik.png') }}')] bg-cover bg-fixed bg-center">

  <x-navbar></x-navbar>

    <!-- Wrapper Dashboard -->
  <div class="max-w-6xl mx-auto p-6 pt-24 fade-section opacity-0 translate-y-10 transition-all duration-1000">
    <!-- Header Dashboard -->
    <div class="flex items-center justify-between mb-8">
      <h1 class="text-3xl font-bold text-black tracking-wide">Dashboard</h1>
      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit"
          class="flex items-center justify-center bg-gradient-to-r from-red-500 to-red-700 text-white p-3 rounded-xl shadow-lg hover:opacity-90 transition transform hover:scale-105">
          <img src="{{ asset('img/exit.png') }}" 
              alt="Logout" 
              class="w-8 h-8 invert" />
        </button>
      </form>
    </div>

    <!-- Flash Success -->
    @if(session('success'))
      <div id="success-alert"
        class="mb-4 p-4 bg-green-50 border-l-4 border-green-500 text-green-700 rounded-lg shadow transition-all duration-500 ease-in-out">
        {{ session('success') }}
      </div>
    @endif

    <!-- Validasi Error -->
    @if ($errors->any())
      <div class="mb-4 p-4 bg-red-50 border-l-4 border-red-500 text-red-700 rounded-lg shadow">
        <ul class="list-disc list-inside text-sm space-y-1">
          @foreach ($errors->all() as $error)
            <li>⚠️ {{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <!-- Tombol Tambah -->
    <button onclick="openChooseModal()"
      class="bg-gradient-to-r from-green-500 to-green-700 text-white px-6 py-2 rounded-lg shadow hover:opacity-90 transition">
      + Tambah Data
    </button>

    <!-- Dashboard Menu -->
    <div id="dashboard-menu" class="bg-white shadow-xl rounded-2xl overflow-hidden mt-8 border border-gray-100">
      <table class="min-w-full text-sm text-gray-700">
        <thead class="bg-gradient-to-r from-gray-50 to-gray-100 border-b border-gray-200">
          <tr>
            <th class="px-6 py-3 text-left font-semibold uppercase tracking-wider">Judul</th>
            <th class="px-6 py-3 text-left font-semibold uppercase tracking-wider">Deskripsi</th>
            <th class="px-6 py-3 text-left font-semibold uppercase tracking-wider">Foto</th>
            <th class="px-6 py-3 text-left font-semibold uppercase tracking-wider">Tipe</th>
            <th class="px-6 py-3 text-center font-semibold uppercase tracking-wider">Aksi</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          @foreach($menus as $menu)
            <tr class="hover:bg-gray-50 transition">
              <td class="px-6 py-4 font-medium">{{ $menu->title }}</td>
              <td class="px-6 py-4 text-gray-600">{{ $menu->description }}</td>
              <td class="px-6 py-4">
                <img src="{{ asset($menu->image_path) }}" class="h-14 w-14 rounded-xl object-cover shadow">
              </td>
              <td class="px-6 py-4">
                <span class="px-3 py-1 rounded-full text-xs font-semibold 
                  {{ $menu->type === 'carousel' ? 'bg-purple-100 text-purple-700' : 'bg-orange-100 text-orange-500' }}">
                  {{ ucfirst($menu->type) }}
                </span>
              </td>
              <td class="px-6 py-4 flex gap-2 justify-center">
                <button class="bg-blue-600 text-white px-4 py-1.5 rounded-lg shadow hover:bg-blue-700 transition"
                        data-id="{{ $menu->id }}"
                        data-title="{{ $menu->title }}"
                        data-description="{{ $menu->description }}"
                        data-type="{{ $menu->type }}"
                        onclick="openUpdateMenuFromBtn(this)">
                  Edit
                </button>
                <button class="bg-red-600 text-white px-4 py-1.5 rounded-lg shadow hover:bg-red-700 transition"
                        data-id="{{ $menu->id }}"
                        onclick="openDeleteMenuFromBtn(this)">
                  Hapus
                </button>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <!-- Dashboard Gallery -->
    <div id="dashboard-gallery" class="bg-white shadow-xl rounded-2xl overflow-hidden mt-8 border border-gray-100 hidden">
      <table class="min-w-full text-sm text-gray-700">
        <thead class="bg-gradient-to-r from-gray-50 to-gray-100 border-b border-gray-200">
          <tr>
            <th class="px-6 py-3 text-left font-semibold uppercase tracking-wider">Judul</th>
            <th class="px-6 py-3 text-left font-semibold uppercase tracking-wider">Foto</th>
            <th class="px-6 py-3 text-left font-semibold uppercase tracking-wider">Kategori</th>
            <th class="px-6 py-3 text-center font-semibold uppercase tracking-wider">Aksi</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          @foreach($photos as $photo)
            <tr class="hover:bg-gray-50 transition">
              <td class="px-6 py-4 font-medium">{{ $photo->title }}</td>
              <td class="px-6 py-4">
                <img src="{{ asset($photo->image_path) }}" class="h-14 w-14 rounded-xl object-cover shadow">
              </td>
              <td class="px-6 py-4">
                <span class="px-3 py-1 rounded-full text-xs font-semibold 
                  {{ $photo->category === 'food' ? 'bg-red-100 text-red-700' :
                    ($photo->category === 'customer' ? 'bg-blue-100 text-blue-700' :
                    ($photo->category === 'event' ? 'bg-green-100 text-green-700' :
                    'bg-yellow-100 text-yellow-700')) }}">
                  {{ ucfirst($photo->category) }}
                </span>
              </td>
              <td class="px-6 py-4 flex gap-2 justify-center">
                <button class="bg-blue-600 text-white px-4 py-1.5 rounded-lg shadow hover:bg-blue-700 transition"
                        data-id="{{ $photo->id }}"
                        data-title="{{ $photo->title }}"
                        data-category="{{ $photo->category }}"
                        onclick="openUpdatePhotoFromBtn(this)">
                  Edit
                </button>
                <button class="bg-red-600 text-white px-4 py-1.5 rounded-lg shadow hover:bg-red-700 transition"
                        data-id="{{ $photo->id }}"
                        onclick="openDeletePhotoFromBtn(this)">
                  Hapus
                </button>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <!-- Pagination -->
    <div class="flex justify-center items-center space-x-2 mt-6">
      <button id="btn-menu" class="pagination-btn active-page">1</button>
      <button id="btn-gallery" class="pagination-btn">2</button>
    </div>

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

  <!-- ================== MODAL ================== -->
  <!-- Modal Pilih Tambah -->
  <div id="modalChoose" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50" onclick="if(event.target === this) closeChooseModal()">
    <div class="bg-white p-6 rounded-xl shadow-lg w-full max-w-sm text-center relative">
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

  <!-- Tambah Photo -->
  <div id="modalTambah" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50" onclick="if(event.target === this) closeTambahModal()">
    <div class="bg-white p-6 rounded-xl shadow-lg w-full max-w-md relative">
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
          <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Upload</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Update Photo -->
  <div id="modalUpdatePhoto" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50" onclick="if(event.target === this) closeUpdatePhoto()">
    <div class="bg-white p-6 rounded-xl shadow-lg w-full max-w-md relative">
      <button type="button" onclick="closeUpdatePhoto()" class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">
        <i class="uil uil-times text-2xl"></i>
      </button>
      <h2 class="text-xl font-bold mb-4">Update Foto</h2>
      <form id="formUpdatePhoto" method="POST" enctype="multipart/form-data" data-action="{{ route('gallery.update', ':id') }}">
        @csrf
        @method('PUT')
        <input type="text" id="updatePhotoTitle" name="title" placeholder="Judul Foto" class="border p-2 rounded mb-3 w-full" required>
        <select id="updatePhotoCategory" name="category" class="border p-2 rounded mb-3 w-full" required>
          <option value="food">Food</option>
          <option value="customer">Customer</option>
          <option value="event">Event</option>
          <option value="ambience">Ambience</option>
        </select>
        <input type="file" name="image" class="border p-2 rounded mb-3 w-full">
        <div class="flex justify-end">
          <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Update</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Delete Photo -->
  <div id="modalDeletePhoto" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50" onclick="if(event.target === this) closeDeletePhoto()">
    <div class="bg-white p-6 rounded-xl shadow-lg w-full max-w-sm text-center relative">
      <button type="button" onclick="closeDeletePhoto()" class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">
        <i class="uil uil-times text-2xl"></i>
      </button>
      <h2 class="text-xl font-bold mb-4">Hapus Foto</h2>
      <p class="mb-4 text-gray-700">Apakah Anda yakin ingin menghapus foto ini?</p>
      <form id="formDeletePhoto" method="POST" data-action="{{ route('gallery.destroy', ':id') }}">
        @csrf
        @method('DELETE')
        <div class="flex justify-center gap-3">
          <button type="button" onclick="closeDeletePhoto()" class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500">Batal</button>
          <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">Hapus</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Modal Tambah Menu -->
  <div id="modalTambahMenu" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50" onclick="if(event.target === this) closeTambahMenu()">
    <div class="bg-white p-6 rounded-xl shadow-lg w-full max-w-md relative">
      <button type="button" onclick="closeTambahMenu()" class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">
        <i class="uil uil-times text-2xl"></i>
      </button>
      <h2 class="text-xl font-bold mb-4">Tambah Menu Baru</h2>
      <form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="title" placeholder="Nama Menu" class="border p-2 rounded mb-3 w-full" required>
        <textarea name="description" placeholder="Deskripsi Menu" class="border p-2 rounded mb-3 w-full" required></textarea>
        <select name="type" class="border p-2 rounded mb-3 w-full" required>
          <option value="carousel">Carousel</option>
          <option value="special">Menu Spesial</option>
        </select>
        <input type="file" name="image" class="border p-2 rounded mb-3 w-full" required>
        <div class="flex justify-end">
          <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Upload</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Modal Update Menu -->
  <div id="modalUpdateMenu" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50" onclick="if(event.target === this) closeUpdateMenu()">
    <div class="bg-white p-6 rounded-xl shadow-lg w-full max-w-md relative">
      <button type="button" onclick="closeUpdateMenu()" class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">
        <i class="uil uil-times text-2xl"></i>
      </button>
      <h2 class="text-xl font-bold mb-4">Update Menu</h2>
      <form id="formUpdateMenu" method="POST" enctype="multipart/form-data" data-action="{{ route('menu.update', ':id') }}">
        @csrf
        @method('PUT')
        <input type="text" id="updateTitle" name="title" placeholder="Nama Menu" class="border p-2 rounded mb-3 w-full" required>
        <textarea id="updateDescription" name="description" placeholder="Deskripsi Menu" class="border p-2 rounded mb-3 w-full" required></textarea>
        <select id="updateType" name="type" class="border p-2 rounded mb-3 w-full" required>
          <option value="carousel">Carousel</option>
          <option value="special">Menu Spesial</option>
        </select>
        <input type="file" name="image" class="border p-2 rounded mb-3 w-full">
        <div class="flex justify-end">
          <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Update</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Modal Delete Menu -->
  <div id="modalDeleteMenu" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50" onclick="if(event.target === this) closeDeleteMenu()">
    <div class="bg-white p-6 rounded-xl shadow-lg w-full max-w-sm text-center relative">
      <button type="button" onclick="closeDeleteMenu()" class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">
        <i class="uil uil-times text-2xl"></i>
      </button>
      <h2 class="text-xl font-bold mb-4">Hapus Menu</h2>
      <p class="mb-4 text-gray-700">Apakah Anda yakin ingin menghapus menu ini?</p>
      <form id="formDeleteMenu" method="POST" data-action="{{ route('menu.destroy', ':id') }}">
        @csrf
        @method('DELETE')
        <div class="flex justify-center gap-3">
          <button type="button" onclick="closeDeleteMenu()" class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500">Batal</button>
          <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">Hapus</button>
        </div>
      </form>
    </div>
  </div> 
  
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
    // Helper Modal (robust)
    // ================================
    function showModal(id) {
      const modal = document.getElementById(id);
      if (!modal) return;
      modal.classList.remove('hidden');
      modal.classList.add('flex');
      // disable page scroll when modal open
      document.body.style.overflow = 'hidden';
    }

    function hideModal(id) {
      const modal = document.getElementById(id);
      if (!modal) return;
      modal.classList.remove('flex');
      modal.classList.add('hidden');
      // restore page scroll
      document.body.style.overflow = '';
    }

    // ================================
    // Gallery (Photo) CRUD: using data-action placeholders
    // ================================
    function openUpdatePhotoFromBtn(btn) {
      const id = btn.dataset.id;
      const title = btn.dataset.title || '';
      const category = btn.dataset.category || '';
      const form = document.getElementById('formUpdatePhoto');
      const actionTemplate = form.getAttribute('data-action');
      if (actionTemplate) form.action = actionTemplate.replace(':id', id);
      document.getElementById('updatePhotoTitle').value = title;
      document.getElementById('updatePhotoCategory').value = category;
      showModal('modalUpdatePhoto');
    }

    function closeUpdatePhoto() {
      const form = document.getElementById('formUpdatePhoto');
      // clear form action to be safe (optional)
      // form.action = '';
      hideModal('modalUpdatePhoto');
    }

    function openDeletePhotoFromBtn(btn) {
      const id = btn.dataset.id;
      const form = document.getElementById('formDeletePhoto');
      const actionTemplate = form.getAttribute('data-action');
      if (actionTemplate) form.action = actionTemplate.replace(':id', id);
      showModal('modalDeletePhoto');
    }

    function closeDeletePhoto() {
      // clear action if you want
      // document.getElementById('formDeletePhoto').action = '';
      hideModal('modalDeletePhoto');
    }

    // ================================
    // Menu CRUD: use data-action placeholders
    // ================================
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
    // Modal pilih tambah / tambah menu
    // ================================
    function openChooseModal() { showModal('modalChoose'); }
    function closeChooseModal() { hideModal('modalChoose'); }

    function openTambahGallery() {
      closeChooseModal();
      showModal('modalTambah');
    }
    function closeTambahModal() { hideModal('modalTambah'); }

    function openTambahMenu() {
      closeChooseModal();
      showModal('modalTambahMenu');
    }
    function closeTambahMenu() { hideModal('modalTambahMenu'); }
  </script>
</body>
</html>
