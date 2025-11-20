<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Resto Joss Gandos</title>
    <link rel="icon" type="image/jpeg" href="img/logojossgandos.png">
    
    <!-- Tailwind & Library -->
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

  <body class="relative z-20 bg-[url('img/backgroundbatik.png')] bg-cover bg-fixed bg-center">

      @if(request()->is('/'))
        <x-header></x-header>
      @endif

      <!-- Floating Order Buttons -->
      <div id="floatingOrder"
        class="fixed right-4 top-1/2 z-50 flex flex-col items-center space-y-2 transform -translate-y-1/2 sm:top-1/2 sm:-translate-y-1/2 opacity-0 translate-x-10 transition-all duration-700">
        
        <!-- Title -->
        <p class="text-red-700 font-bold text-sm animate-pulse">ORDER NOW</p>

        <!-- GoFood -->
        <a href="https://gofood.co.id/surabaya/restaurant/bebek-joss-gandos-jemursari-8571aff2-33b6-4f54-9fd9-a132a900eb17" 
          target="_blank" 
          class="bg-white p-2 rounded-lg shadow-md hover:scale-110 hover:shadow-lg transition">
          <img src="img/gofood.jpg" alt="GoFood" class="w-14 h-14 object-contain">
        </a>

        <!-- ShopeeFood -->
        <a href="https://shopee.co.id/universal-link/now-food/shop/21737525?deep_and_deferred=1&shareChannel=copy_link" 
          target="_blank" 
          class="bg-white p-2 rounded-lg shadow-md hover:scale-110 hover:shadow-lg transition block md:hidden">
          <img src="img/shopeefood.png" alt="ShopeeFood" class="w-14 h-14 object-contain">
        </a>

        <!-- GrabFood -->
        <a href="https://food.grab.com/id/id/restaurant/bebek-joss-gandos-jl-raya-jemursari-delivery/IDGFSTI00002n8d?" 
          target="_blank" 
          class="bg-white p-2 rounded-lg shadow-md hover:scale-110 hover:shadow-lg transition">
          <img src="img/grabfood.png" alt="GrabFood" class="w-14 h-14 object-contain">
        </a>

        <!-- WhatsApp -->
        <a href="https://api.whatsapp.com/send/?phone=62895326824595&text&type=phone_number&app_absent=0" 
          target="_blank" 
          class="bg-white p-2 rounded-lg shadow-md hover:scale-110 hover:shadow-lg transition">
          <img src="img/whatsapp.png" alt="WhatsApp" class="w-14 h-14 object-contain">
        </a>
      </div>

      <script>
        document.addEventListener("DOMContentLoaded", () => {
          const floating = document.getElementById("floatingOrder");

          // Efek fade-in saat load
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

      <!-- Script Animasi Fade In-->
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

  <!-- Footer -->
  <footer class="bg-gradient-to-r from-gray-100 via-gray-200 to-gray-300 shadow-lg text-black relative overflow-hidden animate-fadeInUp">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 animate-fadeInUp">
      <div class="grid grid-cols-1 md:grid-cols-4 gap-8 md:gap-16 lg:gap-32">
        
        <!-- Company Info -->
        <div class="animate-slideUp delay-100">
    <h3 class="text-xl font-bold bg-gradient-to-l from-red-900 to-orange-600 bg-clip-text text-transparent mb-4">
        Resto Joss Gandos
    </h3>
    <p class="mb-4 leading-relaxed">Apapun acaranya, Joss Gandos tempatnya.</p>
    
    <div class="flex space-x-4 text-lg">
        <a href="https://www.facebook.com/RestoJossGandos" class="hover:text-blue-600 transition">
            <span class="[&>svg]:h-5 [&>svg]:w-5">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 320 512">
                    <path d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z"/>
                </svg>
            </span>
        </a>

        <a href="https://www.instagram.com/restojossgandos/" class="hover:text-pink-700 transition">
            <span class="[&>svg]:h-5 [&>svg]:w-5">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 448 512">
                    <path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/>
                </svg>
            </span>
        </a>

        <a href="https://www.tiktok.com/@restojossgandos" class="hover:text-gray-700 transition">
            <span class="[&>svg]:h-5 [&>svg]:w-5">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 448 512">
                    <path d="M448 209.9a210.1 210.1 0 0 1 -122.8-39.3V349.4A162.6 162.6 0 1 1 185 188.3V278.2a74.6 74.6 0 1 0 52.2 71.2V0l88 0a121.2 121.2 0 0 0 1.9 22.2h0A122.2 122.2 0 0 0 381 102.4a121.4 121.4 0 0 0 67 20.1z" />
                </svg>
            </span>
        </a>
    </div>
</div>

        <!-- Quick Links -->
        <div class="animate-slideUp delay-100">
          <h4 class="font-bold mb-4">Menu Cepat</h4>
          <ul class="space-y-2">
            <li><a href="/" class="hover:text-red-400 transition">Home</a></li>
            <li><a href="about" class="hover:text-red-400 transition">Tentang Kami</a></li>
            <li><a href="menu" class="hover:text-red-400 transition">Menu</a></li>
            <li><a href="gallery" class="hover:text-red-400 transition">Galeri</a></li>
            <li><a href="reservation" class="hover:text-red-400 transition">Reservasi</a></li>
          </ul>
        </div>

        <!-- Contact -->
        <div class="animate-slideUp delay-100">
          <h4 class="font-bold mb-4">Kontak</h4>
          <ul class="space-y-2">
            <li class="flex items-center gap-2"><i class="uil uil-location-point text-xl"></i>Jl. Raya Jemursari No.15, Surabaya</li>
            <li class="flex items-center gap-2"><i class="uil uil-phone text-xl"></i>+62 319-984-2999</li>
            <li class="flex items-center gap-2"><i class="uil uil-envelope text-xl"></i>info@restojossgandos.com</li>
          </ul>
        </div>

        <!-- Opening Hours -->
        <div class="animate-slideUp delay-100">
          <h4 class="font-bold mb-4">Jam Buka</h4>
          <p>Senin - Minggu<br><span>10.00 WIB - 22.00 WIB</span></p>
        </div>
      </div>

      <!-- Copyright -->
      <div class="border-t border-gray-900/20 mt-8 pt-6 text-center text-sm text-black animate-fadeIn delay-100">
        &copy; 2025 Resto Joss Gandos. Hak Cipta Dilindungi.
      </div>
    </div>
  </footer>

  <!-- Tailwind Custom Animations -->
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