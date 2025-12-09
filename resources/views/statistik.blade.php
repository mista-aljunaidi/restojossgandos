<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Statistik - Resto Joss Gandos</title>
  <link rel="icon" type="image/png" href="{{ asset('public/img/logojossgandos.png') }}">
  
  @vite(['resources/css/app.css','resources/js/app.js'])
  <script src="https://cdn.tailwindcss.com"></script>
  
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <style>
    body { font-family: 'Inter', sans-serif; }
    
    /* Smooth Scroll */
    html { scroll-behavior: smooth; }

    /* Custom Scrollbar */
    .custom-scrollbar::-webkit-scrollbar { height: 8px; width: 8px; }
    .custom-scrollbar::-webkit-scrollbar-track { background: #f1f5f9; }
    .custom-scrollbar::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 4px; }
    .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: #94a3b8; }

    /* Animation */
    .fade-enter { opacity: 0; transform: translateY(10px); }
    .fade-enter-active { opacity: 1; transform: translateY(0); transition: opacity 0.4s ease-out, transform 0.4s ease-out; }
  </style>
</head>

<body class="bg-slate-50 text-slate-800 antialiased overflow-hidden">

  <div class="flex h-screen overflow-hidden">

    <aside id="sidebar" 
      class="fixed inset-y-0 left-0 z-40 w-64 bg-slate-900 text-white transform -translate-x-full transition-transform duration-300 ease-in-out md:relative md:translate-x-0 flex flex-col justify-between shadow-2xl">
      
      <div>
        <div class="flex items-center gap-3 px-6 py-8 border-b border-slate-700/50">
          <div class="relative group">
            <div class="absolute -inset-1 bg-gradient-to-r from-red-600 to-orange-600 rounded-full blur opacity-25 group-hover:opacity-75 transition duration-200"></div>
            <img src="{{ asset('public/img/logojossgandos.png') }}" alt="Logo" class="relative w-10 h-10 object-contain">
          </div>
          <div>
            <h1 class="font-bold text-lg tracking-wide leading-none">Resto Joss Gandos</h1>
            <span class="text-xs text-slate-400 font-medium tracking-wider uppercase">Dashboard Admin</span>
          </div>
        </div>

        <nav class="mt-8 px-4 space-y-2">
          <a href="{{ route('dashboard') }}" 
             class="flex items-center gap-3 px-4 py-3.5 text-sm font-medium rounded-xl text-slate-400 hover:text-white hover:bg-slate-800 transition-all group">
             <i class="uil uil-apps text-xl group-hover:text-indigo-400 transition-colors"></i>
             <span>Overview</span>
          </a>

          <a href="{{ route('statistik') }}" 
             class="flex items-center gap-3 px-4 py-3.5 text-sm font-medium rounded-xl bg-indigo-600 text-white shadow-lg shadow-indigo-500/30 transition-all hover:bg-indigo-700">
             <i class="uil uil-chart-line text-xl"></i>
             <span>Statistik</span>
          </a>
        </nav>
      </div>

      <div class="p-4 border-t border-slate-700/50">
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button type="submit" 
            class="flex items-center justify-center gap-2 w-full px-4 py-3 text-sm font-medium text-red-400 bg-slate-800/50 hover:bg-red-500/10 hover:text-red-500 rounded-xl transition-all border border-transparent hover:border-red-500/20">
            <i class="uil uil-sign-out-alt text-lg"></i>
            <span>Logout</span>
          </button>
        </form>
      </div>
    </aside>

    <div id="overlay" class="fixed inset-0 bg-slate-900/50 z-30 hidden md:hidden backdrop-blur-sm transition-opacity" onclick="toggleSidebar()"></div>

    <main class="flex-1 flex flex-col h-screen overflow-hidden bg-slate-50 relative">
      
      <header class="flex-shrink-0 bg-white border-b border-slate-200 shadow-sm z-20 px-6 py-4 flex items-center justify-between gap-4">
        <div class="flex items-center gap-4 flex-1">
          <button onclick="toggleSidebar()" class="md:hidden p-2 text-slate-500 hover:bg-slate-100 rounded-lg">
            <i class="uil uil-bars text-2xl"></i>
          </button>

          <h1 class="text-xl font-bold text-slate-800 tracking-tight">Analisa & Statistik</h1>
        </div>
        
        <div class="hidden sm:flex items-center gap-2 px-3 py-1.5 bg-slate-100 rounded-lg border border-slate-200 text-xs font-medium text-slate-600">
            <i class="uil uil-calendar-alt"></i>
            <span>{{ date('d M Y') }}</span>
        </div>
      </header>

      <div class="flex-1 overflow-y-auto p-6 scroll-smooth fade-section" id="mainScrollContent">
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            
            
            <div class="bg-white p-6 rounded-2xl shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] border border-slate-100 flex items-center justify-between hover:border-indigo-100 transition-colors">
                <div>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Total Pengunjung</p>
                    <h2 class="text-3xl font-bold text-slate-800">{{ $totalVisitors ?? '0' }}</h2>
                    <span class="text-xs text-green-600 font-medium flex items-center gap-1 mt-2">
                        <i class="uil uil-arrow-growth"></i> Data Realtime
                    </span>
                </div>
                <div class="w-14 h-14 rounded-2xl bg-green-50 text-green-600 flex items-center justify-center text-2xl shadow-sm">
                    <i class="uil uil-users-alt"></i>
                </div>
            </div>

            
            <div class="bg-white p-6 rounded-2xl shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] border border-slate-100 flex items-center justify-between hover:border-indigo-100 transition-colors">
                <div>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Durasi Rata-rata</p>
                    <h2 class="text-3xl font-bold text-slate-800">{{ $avgDuration ?? '0m 0s' }}</h2>
                    <span class="text-xs text-blue-600 font-medium flex items-center gap-1 mt-2">
                        <i class="uil uil-clock"></i> Per Sesi
                    </span>
                </div>
                <div class="w-14 h-14 rounded-2xl bg-blue-50 text-blue-600 flex items-center justify-center text-2xl shadow-sm">
                    <i class="uil uil-hourglass"></i>
                </div>
            </div>

            
            <div class="bg-white p-6 rounded-2xl shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] border border-slate-100 flex items-center justify-between hover:border-indigo-100 transition-colors">
                <div>
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Kunjungan Ulang</p>
                    <h2 class="text-3xl font-bold text-slate-800">{{ $repeatRate ?? '0' }}%</h2>
                    <span class="text-xs text-purple-600 font-medium flex items-center gap-1 mt-2">
                        <i class="uil uil-analysis"></i> Retensi User
                    </span>
                </div>
                <div class="w-14 h-14 rounded-2xl bg-purple-50 text-purple-600 flex items-center justify-center text-2xl shadow-sm">
                    <i class="uil uil-sync"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h2 class="text-lg font-bold text-slate-800">Grafik Pengunjung Bulanan</h2>
                    <p class="text-sm text-slate-500">Tren kunjungan website dalam tahun ini</p>
                </div>
                <div class="p-2 bg-indigo-50 text-indigo-600 rounded-lg">
                    <i class="uil uil-chart-growth"></i>
                </div>
            </div>
            
            <div class="relative w-full h-[400px]">
                <canvas id="visitorsChart"></canvas>
            </div>
        </div>

        <div class="h-10"></div> </div>
    </main>
  </div>

  <script>
    // 1. Sidebar Toggle Logic
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');
        
        const isClosed = sidebar.classList.contains('-translate-x-full');
        if (isClosed) {
            sidebar.classList.remove('-translate-x-full');
            overlay.classList.remove('hidden');
        } else {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        }
    }

    // 2. Animation on Load
    document.addEventListener("DOMContentLoaded", () => {
        const sections = document.querySelectorAll(".fade-section");
        const observer = new IntersectionObserver((entries, obs) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("fade-enter-active");
                    entry.target.classList.remove("fade-enter");
                    obs.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });
        
        sections.forEach(s => {
            s.classList.add("fade-enter");
            observer.observe(s);
        });
    });
  </script>

  @if(isset($monthlyLabels) && isset($monthlyData))
  <script>
      document.addEventListener("DOMContentLoaded", () => {
          
          const monthlyLabels = @json($monthlyLabels);
          const monthlyData = @json($monthlyData);
          
          const canvasElement = document.getElementById('visitorsChart');

          if (canvasElement) {
              const ctx1 = canvasElement.getContext('2d');
              
              // Gradient Fill for Modern Look
              let gradient = ctx1.createLinearGradient(0, 0, 0, 400);
              gradient.addColorStop(0, 'rgba(99, 102, 241, 0.5)'); // Indigo
              gradient.addColorStop(1, 'rgba(99, 102, 241, 0.0)');

              new Chart(ctx1, {
                  type: 'line',
                  data: {
                      labels: monthlyLabels, 
                      datasets: [{
                          label: 'Jumlah Pengunjung',
                          data: monthlyData, 
                          borderColor: '#4F46E5', // Indigo-600
                          backgroundColor: gradient,
                          borderWidth: 3,
                          tension: 0.4, // Sedikit lebih smooth curve
                          fill: true,
                          pointRadius: 4,
                          pointBackgroundColor: '#ffffff',
                          pointBorderColor: '#4F46E5',
                          pointBorderWidth: 2,
                          pointHoverRadius: 6
                      }]
                  },
                  options: {
                      responsive: true,
                      maintainAspectRatio: false, 
                      plugins: { 
                          legend: { display: false },
                          tooltip: {
                              backgroundColor: '#1E293B',
                              padding: 12,
                              titleFont: { size: 13 },
                              bodyFont: { size: 13 },
                              displayColors: false,
                              cornerRadius: 8
                          }
                      },
                      scales: {
                          x: { 
                              grid: { display: false, drawBorder: false },
                              ticks: { color: '#64748B' } // Slate-500
                          },
                          y: { 
                              beginAtZero: true,
                              border: { display: false },
                              grid: { 
                                  color: '#F1F5F9', // Slate-100
                                  borderDash: [5, 5] 
                              },
                              ticks: {
                                  stepSize: 50,
                                  color: '#64748B'
                              }
                          }
                      }
                  }
              });
          }
      });
  </script>
  @else
  <script>
      console.error("Data statistik (monthlyLabels/monthlyData) tidak terdefinisi. Controller mungkin mengalami error.");
  </script>
  @endif
    
</body>
</html>