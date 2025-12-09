<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Resto Joss Gandos</title>
    
    <link rel="icon" href="{{ asset('img/logojossgandos.png') }}">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/gsap.min.js"></script>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    
    <style>
      .fade-in {
        opacity: 0;
        transform: translateY(20px);
        transition: opacity 0.8s ease-out, transform 0.8s ease-out;
      }
      .fade-in.show {
        opacity: 1;
        transform: translateY(0);
      }
    </style>
  </head>

  <body class="relative z-20 bg-cover bg-fixed bg-center" style="background-image: url('{{ asset('public/img/backgroundbatik.png') }}');">

      @if(request()->is('/'))
        <x-header></x-header>
      @endif

      <div id="floatingOrder"
          class="fixed right-4 top-1/2 z-50 flex flex-col items-center space-y-2 transform -translate-y-1/2 sm:top-1/2 sm:-translate-y-1/2 opacity-0 translate-x-10 transition-all duration-700">
          
          <p class="text-red-700 font-bold text-sm animate-pulse">ORDER NOW</p>

          <a href="https://gofood.co.id/surabaya/restaurant/bebek-joss-gandos-jemursari-8571aff2-33b6-4f54-9fd9-a132a900eb17" 
              target="_blank" 
              class="bg-white p-2 rounded-lg shadow-md hover:scale-110 hover:shadow-lg transition">
              <img src="{{ asset('public/img/gofood.jpg') }}" alt="GoFood" class="w-14 h-14 object-contain">
          </a>

          <a href="https://shopee.co.id/universal-link/now-food/shop/21737525?deep_and_deferred=1&shareChannel=copy_link" 
              target="_blank" 
              class="bg-white p-2 rounded-lg shadow-md hover:scale-110 hover:shadow-lg transition block md:hidden">
              <img src="{{ asset('public/img/shopeefood.png') }}" alt="ShopeeFood" class="w-14 h-14 object-contain">
          </a>

          <a href="https://r.grab.com/g/6-20251119_121557_7BFCA7D892634AB597F132E1189364C5_MEXMPS-IDGFSTI00002n8d" 
              target="_blank" 
              class="bg-white p-2 rounded-lg shadow-md hover:scale-110 hover:shadow-lg transition">
              <img src="{{ asset('public/img/grabfood.png') }}" alt="GrabFood" class="w-14 h-14 object-contain">
          </a>

          <div class="relative">
              <button onclick="toggleFloatingWa()" 
                      class="bg-white p-2 rounded-lg shadow-md hover:scale-110 hover:shadow-lg transition focus:outline-none block">
                  <img src="{{ asset('public/img/whatsapp.png') }}" alt="WhatsApp" class="w-14 h-14 object-contain">
              </button>

              <div id="floating-wa-menu" class="hidden absolute right-full top-0 mr-3 w-48 bg-white rounded-md shadow-xl border border-gray-200 overflow-hidden z-[60]">
                  <div class="py-1">
                      <p class="px-4 py-2 text-xs font-semibold text-gray-500 uppercase bg-gray-50 text-center border-b border-gray-100">
                          Pilih Kontak
                      </p>
                      
                      <a href="javascript:void(0)" 
                          data-nomor="6289699071599"
                          data-pesan="Halo Admin! Saya berencana ingin reservasi tempat. Mohon info selengkapnya."
                          onclick="kirimWa(this)"
                          class="px-4 py-3 text-sm text-gray-700 hover:bg-green-50 hover:text-green-600 transition flex items-center gap-2 cursor-pointer">
                          <span>Admin 1</span>
                          <span class="text-xs text-gray-400">(089699071599)</span>
                      </a>

                      <a href="javascript:void(0)" 
                          data-nomor="62895326824595"
                          data-pesan="Halo Admin! Saya berencana ingin reservasi tempat. Mohon info selengkapnya."
                          onclick="kirimWa(this)"
                          class="px-4 py-3 text-sm text-gray-700 hover:bg-green-50 hover:text-green-600 transition border-t border-gray-100 flex items-center gap-2 cursor-pointer">
                          <span>Admin 2</span>
                          <span class="text-xs text-gray-400">(0895326824595)</span>
                      </a>
                  </div>
              </div>
          </div>
      </div>

      <script>
          // Fungsi Toggle Menu
          function toggleFloatingWa() {
              const menu = document.getElementById('floating-wa-menu');
              menu.classList.toggle('hidden');
          }

          // Fungsi Kirim WA (Otomatis mengubah spasi menjadi kode URL)
          function kirimWa(element) {
              const nomor = element.getAttribute('data-nomor');
              const pesan = element.getAttribute('data-pesan');
              
              // Encode pesan agar aman untuk URL (spasi jadi %20, dll)
              const pesanEncoded = encodeURIComponent(pesan);
              
              const url = `https://api.whatsapp.com/send?phone=${nomor}&text=${pesanEncoded}`;
              window.open(url, '_blank');
          }

          // Menutup menu jika klik di luar
          window.addEventListener('click', function(e) {
              const btn = document.querySelector('button[onclick="toggleFloatingWa()"]');
              const menu = document.getElementById('floating-wa-menu');
              
              if (btn && menu && !btn.contains(e.target) && !menu.contains(e.target)) {
                  menu.classList.add('hidden');
              }
          });
      </script>

      <script>
        document.addEventListener("DOMContentLoaded", () => {
          const floating = document.getElementById("floatingOrder");
          setTimeout(() => {
            floating.classList.remove("opacity-0", "translate-x-10");
          }, 300);
        });
      </script>

      <div class="min-h-full">
        <x-navbar></x-navbar>

        <main class="fade-in">
          <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            {{ $slot }}
          </div>
        </main>
      </div>

      <script>
        document.addEventListener("DOMContentLoaded", function () {
          const elements = document.querySelectorAll(".fade-in");
          const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
              if (entry.isIntersecting) {
                entry.target.classList.add("show");
              }
            });
          }, { threshold: 0.1 });
          elements.forEach(el => observer.observe(el));
        });
      </script>
    
  </body>

  <footer class="bg-gradient-to-r from-gray-100 via-gray-200 to-gray-300 shadow-lg text-black relative overflow-hidden animate-fadeInUp border-t border-white/60">
    
    <div class="absolute inset-0 opacity-[0.03] bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 relative z-10">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-8 md:gap-12 lg:gap-16">
        
        <div class="animate-slideUp delay-100">
            <h3 class="text-xl font-bold bg-gradient-to-l from-red-900 to-orange-600 bg-clip-text text-transparent mb-4">
                Resto Joss Gandos
            </h3>
            <p class="mb-6 leading-relaxed text-sm text-gray-800 font-medium">
                Apapun acaranya, Joss Gandos tempatnya.
            </p>
            
            <div class="flex space-x-3">
                <a href="https://www.facebook.com/RestoJossGandos" class="w-10 h-10 rounded-full bg-white shadow-md flex items-center justify-center text-gray-600 hover:bg-blue-600 hover:text-white transition-all duration-300 transform hover:scale-110">
                    <i class="uil uil-facebook-f text-lg"></i>
                </a>
                <a href="https://www.instagram.com/restojossgandos/" class="w-10 h-10 rounded-full bg-white shadow-md flex items-center justify-center text-gray-600 hover:bg-pink-600 hover:text-white transition-all duration-300 transform hover:scale-110">
                    <i class="uil uil-instagram text-lg"></i>
                </a>
                <a href="https://www.tiktok.com/@restojossgandos" class="w-10 h-10 rounded-full bg-white shadow-md flex items-center justify-center text-gray-600 hover:bg-black hover:text-white transition-all duration-300 transform hover:scale-110">
                    <span class="[&>svg]:h-4 [&>svg]:w-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 448 512"><path d="M448 209.9a210.1 210.1 0 0 1 -122.8-39.3V349.4A162.6 162.6 0 1 1 185 188.3V278.2a74.6 74.6 0 1 0 52.2 71.2V0l88 0a121.2 121.2 0 0 0 1.9 22.2h0A122.2 122.2 0 0 0 381 102.4a121.4 121.4 0 0 0 67 20.1z" /></svg>
                    </span>
                </a>
            </div>
        </div>

        <div class="animate-slideUp delay-100">
          <h4 class="font-bold mb-5 text-gray-900 border-b-2 border-red-500 inline-block pb-1">Menu Cepat</h4>
          <ul class="space-y-3 text-sm font-medium text-gray-700">
            <li><a href="/" class="hover:text-red-600 hover:pl-2 transition-all duration-300 flex items-center gap-2"><i class="uil uil-angle-right font-normal"></i> Home</a></li>
            <li><a href="about" class="hover:text-red-600 hover:pl-2 transition-all duration-300 flex items-center gap-2"><i class="uil uil-angle-right font-normal"></i> Tentang Kami</a></li>
            <li><a href="menu" class="hover:text-red-600 hover:pl-2 transition-all duration-300 flex items-center gap-2"><i class="uil uil-angle-right font-normal"></i> Menu</a></li>
            <li><a href="gallery" class="hover:text-red-600 hover:pl-2 transition-all duration-300 flex items-center gap-2"><i class="uil uil-angle-right font-normal"></i> Galeri</a></li>
            <li><a href="reservation" class="hover:text-red-600 hover:pl-2 transition-all duration-300 flex items-center gap-2"><i class="uil uil-angle-right font-normal"></i> Reservasi</a></li>
          </ul>
        </div>

        <div class="animate-slideUp delay-100">
          <h4 class="font-bold mb-5 text-gray-900 border-b-2 border-red-500 inline-block pb-1">Kontak</h4>
          <ul class="space-y-4 text-sm font-medium text-gray-700">
            <li class="flex items-start gap-3">
                <i class="uil uil-location-point text-lg text-red-600"></i>
                <span class="mt-1">Jl. Raya Jemursari No.15, Surabaya</span>
            </li>
            <li class="flex items-center gap-3">
                <i class="uil uil-phone text-lg text-red-600"></i>
                <span>+62 896-9907-1599</span>
            </li>
            <li class="flex items-center gap-3">
                <i class="uil uil-envelope text-lg text-red-600"></i>
                <span>bebekjossgandossby@gmail.com</span>
            </li>
          </ul>
        </div>

        <div class="animate-slideUp delay-100">
          <h4 class="font-bold mb-5 text-gray-900 border-b-2 border-red-500 inline-block pb-1">Jam Buka Outlet</h4>
            <div class="bg-gradient-to-br from-white/90 to-white/60 backdrop-blur-lg p-5 rounded-2xl shadow-xl border border-white/80 relative">

                <div class="flex items-start gap-3 mb-3">
                    <i class="uil uil-clock text-2xl text-gray-700 mt-1"></i>
                    
                    <div class="w-full">
                        <p class="text-gray-500 text-[10px] uppercase tracking-widest font-bold">Senin - Minggu</p>
                        <p class="text-lg font-extrabold text-gray-900 leading-tight">10.00 - 22.00</p>
                        
                        <div class="mt-2 pt-2 border-t border-gray-200/60 flex items-center gap-1.5">
                            <i class="uil uil-info-circle text-red-500 text-sm"></i>
                            <p class="text-xs font-bold text-red-500">
                                Close Order: 21.15
                            </p>
                        </div>
                    </div>
                </div>
                
                <div id="storeStatus" class="mt-2 flex items-center gap-2 text-xs font-bold px-3 py-1.5 rounded-full w-fit transition-colors duration-300">
                    <span id="statusDot" class="relative flex h-2.5 w-2.5">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2.5 w-2.5"></span>
                    </span>
                    <span id="statusText">Checking...</span>
                </div>
            </div>
        </div>

      </div>

      <div class="border-t border-gray-300 mt-12 pt-8 text-center">
        <p class="text-sm text-gray-600 font-medium hover:text-red-600 transition-colors cursor-default">
            &copy; 2025 Resto Joss Gandos. Hak Cipta Dilindungi.
        </p>
      </div>
    </div>
  </footer>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
        const statusBox = document.getElementById('storeStatus');
        const statusText = document.getElementById('statusText');
        const statusDot = document.getElementById('statusDot');
        const dotInner = statusDot.querySelector('span:last-child');
        const dotPing = statusDot.querySelector('span:first-child');

        function updateStatus() {
            // Mengambil waktu saat ini dalam zona waktu Asia/Jakarta (WIB)
            const now = new Date(new Date().toLocaleString("en-US", {timeZone: "Asia/Jakarta"}));
            const hours = now.getHours();
            
            // Jam Buka: 10.00 - 22.00
            const isOpen = hours >= 10 && hours < 22;

            if (isOpen) {
                // Style Buka (Hijau)
                statusBox.className = "mt-2 flex items-center gap-2 text-xs font-bold px-3 py-1.5 rounded-full w-fit bg-green-100 text-green-700 border border-green-200";
                statusText.innerText = "Sedang Buka";
                dotInner.className = "relative inline-flex rounded-full h-2.5 w-2.5 bg-green-500";
                dotPing.className = "animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75";
            } else {
                // Style Tutup (Merah/Abu)
                statusBox.className = "mt-2 flex items-center gap-2 text-xs font-bold px-3 py-1.5 rounded-full w-fit bg-red-50 text-red-600 border border-red-100";
                statusText.innerText = "Sedang Tutup";
                dotInner.className = "relative inline-flex rounded-full h-2.5 w-2.5 bg-red-500";
                dotPing.className = "hidden"; // Matikan animasi ping kalau tutup
            }
        }

        updateStatus();
        // Update setiap 1 menit
        setInterval(updateStatus, 60000);
    });
  </script>

  <style>
  @keyframes fadeInUp {
    0% { opacity: 0; transform: translateY(30px); }
    100% { opacity: 1; transform: translateY(0); }
  }
  @keyframes slideUp {
    0% { opacity: 0; transform: translateY(50px); }
    100% { opacity: 1; transform: translateY(0); }
  }
  .animate-fadeInUp { animation: fadeInUp 1s ease-out; }
  .animate-slideUp { animation: slideUp 1s ease-out forwards; }
  .delay-100 { animation-delay: .1s; }
  </style>

</html>