<nav id="navbar" class="fixed top-0 left-0 w-full z-50 bg-gradient-to-r from-gray-100 via-gray-200 to-gray-300 shadow-lg opacity-0 -translate-y-5 transition-all duration-700">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

    <div class="flex h-16 items-center justify-between">
      <!-- Logo + Nama -->
      <a href="/">
      <div class="flex items-center space-x-3">
        <img src="/img/logojossgandos.png" alt="Resto Joss Gandos" class="h-12 w-auto transform transition-transform duration-500">
        <span class="text-xl font-bold bg-gradient-to-l from-red-900 to-orange-600 bg-clip-text text-transparent">
          Resto Joss Gandos
        </span>
      </div>
      </a>

      <!-- Menu Navigasi (Desktop) -->
      <div class="hidden md:flex items-center space-x-3">
        <x-nav-link href="/" 
        class="relative after:absolute after:left-0 after:bottom-0 after:w-0 after:h-[2px] after:bg-red-600 after:transition-all hover:after:w-full">Home</x-nav-link>
        <x-nav-link href="/about" 
        class="relative after:absolute after:left-0 after:bottom-0 after:w-0 after:h-[2px] after:bg-red-600 after:transition-all hover:after:w-full">About</x-nav-link>
        <x-nav-link href="/menu" 
        class="relative after:absolute after:left-0 after:bottom-0 after:w-0 after:h-[2px] after:bg-red-600 after:transition-all hover:after:w-full">Menu</x-nav-link>
        <x-nav-link href="/gallery" 
        class="relative after:absolute after:left-0 after:bottom-0 after:w-0 after:h-[2px] after:bg-red-600 after:transition-all hover:after:w-full">Gallery</x-nav-link>
        <x-nav-link href="/reservation" 
        class="relative after:absolute after:left-0 after:bottom-0 after:w-0 after:h-[2px] after:bg-red-600 after:transition-all hover:after:w-full">Reservation</x-nav-link>

        <!-- Search Desktop -->
        <div class="relative group ml-4">
          <svg class="w-5 h-5 absolute left-3 top-2 text-black pointer-events-none transition-all duration-300 group-hover:text-red-500"
            fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
            stroke-linecap="round" stroke-linejoin="round">
            <circle cx="11" cy="11" r="8"></circle>
            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
          </svg>
          <input type="text" placeholder="Search..."
            class="w-0 group-hover:w-40 focus:w-40 transition-all duration-300 pl-10 pr-3 py-1.5 rounded-full border border-gray-700 focus:ring-2 focus:ring-red-400 focus:outline-none text-sm opacity-0 group-hover:opacity-100 focus:opacity-100">
        </div>
      </div>

      <!-- Tombol Mobile -->
      <div class="md:hidden flex items-center space-x-3">
        <button id="mobile-search-btn" class="text-black hover:text-red-400 focus:outline-none">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
            viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="11" cy="11" r="8"></circle>
            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
          </svg>
        </button>
        <button id="mobile-menu-btn" class="text-black hover:text-red-400 focus:outline-none">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
            viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
            <path d="M4 6h16M4 12h16M4 18h16"></path>
          </svg>
        </button>
      </div>
    </div>

    <!-- Search Mobile-->
    <div id="mobile-search" class="hidden md:hidden mb-2 rounded-lg shadow p-2 transition-all duration-500 ease-out transform scale-95 opacity-0">
      <div class="relative">
        <input type="text" placeholder="Search..."
          class="w-full pl-10 pr-3 py-2 rounded-lg focus:ring-2 focus:ring-red-400 focus:outline-none text-sm">
        <svg class="w-5 h-5 absolute left-3 top-2.5 text-gray-900"
          fill="none" stroke="currentColor" stroke-width="2"
          viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
          <circle cx="11" cy="11" r="8"></circle>
          <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
        </svg>
      </div>
    </div>

    <!-- Menu Navigasi Mobile -->
    <div id="mobile-menu" class="hidden md:hidden mt-2 space-y-2 rounded-lg shadow p-4 transition-all duration-500 ease-out transform scale-95 opacity-0">
      <x-nav-link href="/" class="block">Home</x-nav-link>
      <x-nav-link href="/about" class="block">About</x-nav-link>
      <x-nav-link href="/menu" class="block">Menu</x-nav-link>
      <x-nav-link href="/gallery" class="block">Gallery</x-nav-link>
      <x-nav-link href="/reservation" class="block">Reservation</x-nav-link>
    </div>
  </div>

  <script>
    // Navbar animasi muncul saat load
    window.addEventListener("load", () => {
      document.getElementById("navbar").classList.remove("opacity-0", "-translate-y-5");
    });

    const menu = document.getElementById("mobile-menu");
    const search = document.getElementById("mobile-search");

    document.getElementById("mobile-menu-btn").addEventListener("click", function () {
      menu.classList.toggle("hidden");
      setTimeout(() => {
        menu.classList.toggle("opacity-0");
        menu.classList.toggle("scale-95");
      }, 10);
    });

    document.getElementById("mobile-search-btn").addEventListener("click", function () {
      search.classList.toggle("hidden");
      setTimeout(() => {
        search.classList.toggle("opacity-0");
        search.classList.toggle("scale-95");
      }, 10);
    });

    // Mapping pencarian
    const searchMap = {
      home: "/", beranda: "/",
      about: "/about", tentang: "/about",
      menu: "/menu", makanan: "/menu", minuman: "/menu",
      gallery: "/gallery", galeri: "/gallery",
      reservation: "/reservation", reservasi: "/reservation",
      dashboard: "/login", dasbor: "/login"
    };

    function handleSearch(inputElement) {
      inputElement.addEventListener("keydown", function (e) {
        if (e.key === "Enter") {
          const query = this.value.trim().toLowerCase();
          const targetUrl = searchMap[query];

          if (targetUrl) {
            // simpan state halaman asal
            sessionStorage.setItem("searchFrom", window.location.pathname);

            // arahkan ke halaman tujuan
            window.location.href = targetUrl;
          } else {
            alert("Halaman tidak ditemukan.\nCoba ketik: home/beranda, about/tentang, menu/makanan/minuman, gallery/galeri, reservation/reservasi");
          }
        }
      });
    }

    // Terapkan ke semua input search
    document.querySelectorAll('input[placeholder="Search..."]').forEach(input => handleSearch(input));

    // Saat kembali (undo/back) dari hasil search
    window.addEventListener("pageshow", function () {
      const inputs = document.querySelectorAll('input[placeholder="Search..."]');

      // flush input (kosongkan)
      inputs.forEach(input => input.value = "");

      // hapus jejak state asal biar tidak double
      sessionStorage.removeItem("searchFrom");
    });
</script>
</nav>