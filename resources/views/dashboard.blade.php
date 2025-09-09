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
    
    <!-- Header Dashboard -->
    <div class="flex items-center justify-between mb-6">
      <h1 class="text-3xl font-bold text-gray-700">Dashboard</h1>
      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 flex items-center gap-2">
          <i class="uil uil-signout-alt"></i> Logout
        </button>
      </form>
    </div>

    <!-- Flash Success -->
    @if(session('success'))
      <div id="success-alert" class="mb-4 p-3 bg-green-100 text-green-700 rounded transition-all duration-500 ease-in-out">
        {{ session('success') }}
      </div>
    @endif

    <!-- Validasi Error -->
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
      + Tambah Data
    </button>

    <!-- Tabel Data -->
    <div class="bg-white shadow-md rounded-xl overflow-hidden mt-6">
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
          <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Judul</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Deskripsi</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Foto</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Kategori</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          @if(isset($photos))
            @forelse($photos as $photo)
              <tr>
                <td class="px-6 py-4 text-sm text-gray-700">{{ $photo->id }}</td>
                <td class="px-6 py-4 text-sm text-gray-700">{{ $photo->title }}</td>
                <td class="px-6 py-4 text-sm text-gray-700">-</td>
                <td class="px-6 py-4">
                  <img src="{{ asset($photo->image_path) }}" class="h-12 w-12 rounded-lg object-cover">
                </td>
                <td class="px-6 py-4 text-sm text-gray-700">{{ $photo->category }}</td>
                <td class="px-6 py-4 flex gap-2">
                  <button onclick="openUpdatePhoto({{ $photo->id }}, '{{ $photo->title }}', '{{ $photo->category }}')" 
                          class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700">Edit</button>
                  <button onclick="openDeletePhoto({{ $photo->id }})" 
                          class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Hapus</button>
                </td>
              </tr>
            @empty
              <tr><td colspan="6" class="text-center py-4">Belum ada foto.</td></tr>
            @endforelse
          @elseif(isset($menus))
            @forelse($menus as $menu)
              <tr>
                <td class="px-6 py-4 text-sm text-gray-700">{{ $menu->id }}</td>
                <td class="px-6 py-4 text-sm text-gray-700">{{ $menu->title }}</td>
                <td class="px-6 py-4 text-sm text-gray-700">{{ $menu->description }}</td>
                <td class="px-6 py-4">
                  <img src="{{ asset($menu->image_path) }}" class="h-12 w-12 rounded-lg object-cover">
                </td>
                <td class="px-6 py-4 text-sm text-gray-700">{{ $menu->type }}</td>
                <td class="px-6 py-4 flex gap-2">
                  <button onclick="openUpdateMenu({{ $menu->id }}, '{{ $menu->title }}', '{{ $menu->description }}', '{{ $menu->type }}')" 
                          class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700">Edit</button>
                  <button onclick="openDeleteMenu({{ $menu->id }})" 
                          class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">Hapus</button>
                </td>
              </tr>
            @empty
              <tr><td colspan="6" class="text-center py-4">Belum ada menu.</td></tr>
            @endforelse
          @endif
        </tbody>
      </table>
    </div>
  </div>

  <!-- ================== MODAL ================== -->

  <!-- Modal Pilih Tambah -->
  <div id="modalChoose" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">
    <div class="bg-white p-6 rounded-xl shadow-lg w-full max-w-sm text-center relative">
      <button type="button" onclick="closeChooseModal()" class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">
        <i class="uil uil-times text-2xl"></i>
      </button>
      <h2 class="text-xl font-bold mb-4">Tambah Foto</h2>
      <div class="flex flex-col gap-3">
        <button onclick="openTambahGallery()" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Gallery</button>
        <button onclick="openTambahMenu()" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Menu</button>
      </div>
    </div>
  </div>

  <!-- Tambah Photo -->
  <div id="modalTambah" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">
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
          <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Upload</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Update Photo -->
  <div id="modalUpdatePhoto" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">
    <div class="bg-white p-6 rounded-xl shadow-lg w-full max-w-md relative">
      <button type="button" onclick="closeUpdatePhoto()" class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">
        <i class="uil uil-times text-2xl"></i>
      </button>
      <h2 class="text-xl font-bold mb-4">Update Foto</h2>
      <form id="formUpdatePhoto" method="POST" enctype="multipart/form-data">
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
  <div id="modalDeletePhoto" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">
    <div class="bg-white p-6 rounded-xl shadow-lg w-full max-w-sm text-center relative">
      <button type="button" onclick="closeDeletePhoto()" class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">
        <i class="uil uil-times text-2xl"></i>
      </button>
      <h2 class="text-xl font-bold mb-4">Hapus Foto</h2>
      <p class="mb-4 text-gray-700">Apakah Anda yakin ingin menghapus foto ini?</p>
      <form id="formDeletePhoto" method="POST">
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
  <div id="modalTambahMenu" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">
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
          <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Simpan</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Modal Update Menu -->
  <div id="modalUpdateMenu" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">
    <div class="bg-white p-6 rounded-xl shadow-lg w-full max-w-md relative">
      <button type="button" onclick="closeUpdateMenu()" class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">
        <i class="uil uil-times text-2xl"></i>
      </button>
      <h2 class="text-xl font-bold mb-4">Update Menu</h2>
      <form id="formUpdateMenu" method="POST" enctype="multipart/form-data">
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
  <div id="modalDeleteMenu" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">
    <div class="bg-white p-6 rounded-xl shadow-lg w-full max-w-sm text-center relative">
      <button type="button" onclick="closeDeleteMenu()" class="absolute top-3 right-3 text-gray-500 hover:text-gray-700">
        <i class="uil uil-times text-2xl"></i>
      </button>
      <h2 class="text-xl font-bold mb-4">Hapus Menu</h2>
      <p class="mb-4 text-gray-700">Apakah Anda yakin ingin menghapus menu ini?</p>
      <form id="formDeleteMenu" method="POST">
        @csrf
        @method('DELETE')
        <div class="flex justify-center gap-3">
          <button type="button" onclick="closeDeleteMenu()" class="bg-gray-400 text-white px-4 py-2 rounded hover:bg-gray-500">Batal</button>
          <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">Hapus</button>
        </div>
      </form>
    </div>
  </div> 

  <!-- Script -->
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
    // Helper Modal
    // ================================
    function showModal(id) {
      document.getElementById(id).classList.replace('hidden', 'flex');
    }

    function hideModal(id) {
      document.getElementById(id).classList.replace('flex', 'hidden');
    }

    // ================================
    // Photo CRUD
    // ================================
    function openUpdatePhoto(id, title, category) {
      const form = document.getElementById('formUpdatePhoto');
      form.action = `/gallery/${id}`;
      document.getElementById('updatePhotoTitle').value = title;
      document.getElementById('updatePhotoCategory').value = category;
      showModal('modalUpdatePhoto');
    }

    function closeUpdatePhoto() {
      hideModal('modalUpdatePhoto');
    }

    function openDeletePhoto(id) {
      const form = document.getElementById('formDeletePhoto');
      form.action = `/gallery/${id}`;
      showModal('modalDeletePhoto');
    }

    function closeDeletePhoto() {
      hideModal('modalDeletePhoto');
    }

    // ================================
    // Menu CRUD
    // ================================
    function openUpdateMenu(id, title, description, type) {
      const form = document.getElementById('formUpdateMenu');
      form.action = `/menu/${id}`;
      document.getElementById('updateTitle').value = title;
      document.getElementById('updateDescription').value = description;
      document.getElementById('updateType').value = type;
      showModal('modalUpdateMenu');
    }

    function closeUpdateMenu() {
      hideModal('modalUpdateMenu');
    }

    function openDeleteMenu(id) {
      const form = document.getElementById('formDeleteMenu');
      form.action = `/menu/${id}`;
      showModal('modalDeleteMenu');
    }

    function closeDeleteMenu() {
      hideModal('modalDeleteMenu');
    }

    // ================================
    // Modal pilih tambah
    // ================================
    function openChooseModal() {
      showModal('modalChoose');
    }

    function closeChooseModal() {
      hideModal('modalChoose');
    }

    function openTambahGallery() {
      closeChooseModal();
      showModal('modalTambah');
    }

    function closeTambahModal() {
      hideModal('modalTambah');
    }

    function openTambahMenu() {
      closeChooseModal();
      showModal('modalTambahMenu');
    }

    function closeTambahMenu() {
      hideModal('modalTambahMenu');
    }
  </script>
</body>
</html>
