<nav class="fixed top-0 left-0 w-full z-50 bg-gradient-to-r from-gray-50 via-gray-100 to-gray-200 shadow-lg">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

    <div class="flex h-16 items-center justify-between">
      <!-- Logo + Nama -->
      <div class="flex items-center space-x-3">
        <img src="/img/logo-joss-gandos.png" alt="Resto Joss Gandos" class="h-12 w-auto">
        <span class="text-xl font-bold bg-gradient-to-l from-red-900 to-orange-600 bg-clip-text text-transparent">
          Resto Joss Gandos
        </span>
      </div>

      <!-- Menu Navigasi (Desktop) -->
      <div class="hidden md:flex items-center space-x-3">
        <x-nav-link href="/">Home</x-nav-link>
        <x-nav-link href="/about">About</x-nav-link>
        <x-nav-link href="/menu">Menu</x-nav-link>
        <x-nav-link href="/gallery">Gallery</x-nav-link>
        <x-nav-link href="/location">Location</x-nav-link>
        <!-- Search Desktop -->
        <div class="relative group ml-4">
          <svg class="w-5 h-5 absolute left-3 top-2 text-gray-400 pointer-events-none transition-all duration-300 group-hover:text-red-500"
            fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
            stroke-linecap="round" stroke-linejoin="round">
            <circle cx="11" cy="11" r="8"></circle>
            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
          </svg>
          <input type="text" placeholder="Search..."
            class="w-0 group-hover:w-40 focus:w-40 transition-all duration-300 pl-10 pr-3 py-1.5 rounded-full border border-gray-300 focus:ring-2 focus:ring-red-400 focus:outline-none text-sm opacity-0 group-hover:opacity-100 focus:opacity-100">
        </div>
      </div>

      <!-- Tombol Mobile -->
      <div class="md:hidden flex items-center space-x-3">
        <button id="mobile-search-btn" class="text-gray-500 hover:text-red-400 focus:outline-none">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
            viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="11" cy="11" r="8"></circle>
            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
          </svg>
        </button>
        <button id="mobile-menu-btn" class="text-gray-500 hover:text-red-400 focus:outline-none">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
            viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
            <path d="M4 6h16M4 12h16M4 18h16"></path>
          </svg>
        </button>
      </div>
    </div>

    <!-- Search Mobile-->
    <div id="mobile-search" class="hidden md:hidden mb-2 rounded-lg shadow p-1">
      <div class="relative">
        <input type="text" placeholder="Search..."
          class="w-full pl-10 pr-3 py-2 rounded-lg focus:ring-2 focus:ring-red-400 focus:outline-none text-sm">
        <svg class="w-5 h-5 absolute left-3 top-2.5 text-gray-400"
          fill="none" stroke="currentColor" stroke-width="2"
          viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
          <circle cx="11" cy="11" r="8"></circle>
          <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
        </svg>
      </div>
    </div>

    <!-- Menu Navigasi Mobile -->
    <div id="mobile-menu" class="hidden md:hidden mt-2 space-y-2 rounded-lg shadow p-4">
      <x-nav-link href="/" class="block">Home</x-nav-link>
      <x-nav-link href="/about" class="block">About</x-nav-link>
      <x-nav-link href="/menu" class="block">Menu</x-nav-link>
      <x-nav-link href="/gallery" class="block">Gallery</x-nav-link>
      <x-nav-link href="/location" class="block">Location</x-nav-link>
    </div>
  </div>

  <!-- Script -->
  <script>
    document.getElementById('mobile-menu-btn').addEventListener('click', function () {
      document.getElementById('mobile-menu').classList.toggle('hidden');
    });

    document.getElementById('mobile-search-btn').addEventListener('click', function () {
      document.getElementById('mobile-search').classList.toggle('hidden');
    });
  </script>
</nav>
