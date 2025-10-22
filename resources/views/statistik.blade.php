<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Statistik - Dashboard</title>
  <link rel="icon" type="image/png" href="{{ asset('img/logojossgandos.png') }}">
  @vite(['resources/css/app.css','resources/js/app.js'])
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

  <body class="bg-gray-50 text-gray-900 overflow-x-hidden overflow-y-auto flex">

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

          <!-- Statistik -->
          <a href="{{ route('statistik') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-xl bg-gradient-to-r from-gray-700/60 to-gray-700/30 hover:from-gray-600/80 hover:to-gray-600/60
                  text-white font-medium transition duration-300 backdrop-blur-sm border border-gray-600/30 hover:border-gray-400/50 shadow-md">
            <i class="uil uil-chart-line text-indigo-300 text-lg"></i>
            <span>Statistik</span>
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

    <!-- Konten Utama -->
    <main class="flex-1 md:ml-[60px] ml-0 pl-6 pr-4 py-8 transition-all duration-300 bg-gray-50 min-h-screen">
      <div class="max-w-6xl">
        <h1 class="text-3xl font-bold mb-8 flex items-center gap-2 text-gray-900">
          <i class="uil uil-chart-line text-indigo-600 text-3xl"></i>
          Statistik Website
        </h1>

        <!-- Statistik Ringkas -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 mb-8">
          <div class="bg-white shadow-md rounded-2xl p-5 flex items-center justify-between hover:shadow-lg transition">
            <div>
              <h2 class="text-gray-600 text-sm font-medium">Total Pengunjung</h2>
              <p class="text-2xl font-semibold text-gray-900 mt-1">12.458</p>
            </div>
            <div class="bg-green-100 p-3 rounded-xl">
              <i class="uil uil-users-alt text-green-600 text-xl"></i>
            </div>
          </div>

          <div class="bg-white shadow-md rounded-2xl p-5 flex items-center justify-between hover:shadow-lg transition">
            <div>
              <h2 class="text-gray-600 text-sm font-medium">Durasi Rata-rata</h2>
              <p class="text-2xl font-semibold text-gray-900 mt-1">3m 42s</p>
            </div>
            <div class="bg-blue-100 p-3 rounded-xl">
              <i class="uil uil-clock text-blue-600 text-xl"></i>
            </div>
          </div>

          <div class="bg-white shadow-md rounded-2xl p-5 flex items-center justify-between hover:shadow-lg transition">
            <div>
              <h2 class="text-gray-600 text-sm font-medium">Tingkat Kunjungan Ulang</h2>
              <p class="text-2xl font-semibold text-gray-900 mt-1">27%</p>
            </div>
            <div class="bg-purple-100 p-3 rounded-xl">
              <i class="uil uil-sync text-purple-600 text-xl"></i>
            </div>
          </div>
        </div>

        <!-- Diagram Statistik -->
        <div class="bg-white shadow-md rounded-2xl p-6">
          <h2 class="text-lg font-semibold mb-4 flex items-center gap-2 text-gray-900">
            <i class="uil uil-chart-growth text-indigo-600"></i> Grafik Pengunjung Bulanan
          </h2>
          <canvas id="visitorsChart" height="100"></canvas>
        </div>
      </div>
    </main>

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

    <!-- Script Chart.js -->
    <script>
      const ctx1 = document.getElementById('visitorsChart').getContext('2d');
      new Chart(ctx1, {
        type: 'line',
        data: {
          labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt'],
          datasets: [{
            label: 'Jumlah Pengunjung',
            data: [1200, 1500, 1800, 2100, 1900, 2500, 2700, 3000, 2900, 3200],
            borderColor: '#6366F1',
            backgroundColor: 'rgba(99,102,241,0.2)',
            borderWidth: 2,
            tension: 0.3,
            fill: true,
            pointRadius: 4,
            pointBackgroundColor: '#4F46E5'
          }]
        },
        options: {
          responsive: true,
          plugins: { legend: { display: false } },
          scales: {
            x: { grid: { display: false } },
            y: { beginAtZero: true }
          }
        }
      });
    </script>
</html>
