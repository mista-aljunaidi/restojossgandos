<x-layout>
<main class="pt-16 min-h-screen">
  <!-- MENU PAGE -->
  <div id="menu-page" class="page-content">
    <section>
      <div class="mx-auto max-w-6xl px-4 py-8 font-sans">
        <div class="text-center mb-6">
          <h1 class="text-4xl font-bold text-gray-600 mb-4 text-shadow-strong">Menu Kami</h1>
        </div>
        <style>
              .text-shadow-strong {
              text-shadow: 2px 2px 6px rgba(0,0,0,0.25);
              }
        </style>

        <!-- Container Gambar + Detail -->
        <div class="relative w-full max-w-4xl mx-auto overflow-hidden rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300">
          <!-- Wrapper Slide -->
          <div id="carousel" class="flex transition-transform duration-500" class="fade-section opacity-0 translate-y-10 transition-all duration-1000">
            
            @forelse ($carouselMenus as $menu)
              <div class="relative min-w-full group">
                <!-- Gambar -->
                <img src="{{ asset($menu->image_path) }}" 
                     alt="{{ $menu->title }}" 
                     class="w-full h-[600px] object-cover">
                <!-- Judul -->
                <h3 class="absolute top-4 left-1/2 transform -translate-x-1/2 text-center text-white font-extrabold text-3xl leading-tight 
                opacity-0 translate-y-full transition-all duration-300 group-hover:opacity-100 group-hover:translate-y-0 text-shadow-strong">
                  {{ $menu->title }}
                </h3>

                <!-- Deskripsi -->
                <div class="absolute bottom-0 left-0 w-full p-4 opacity-0 translate-y-full transition-all duration-300 group-hover:opacity-100 group-hover:translate-y-0">
                  <p class="text-white font-semibold text-center text-l text-shadow-strong">
                    {{ $menu->description ?? 'Deskripsi belum tersedia.' }}
                  </p>
                </div>
              </div>
            @empty
            @endforelse

          </div>

          <!-- Tombol Navigasi -->
          <button onclick="prevSlide()" class="absolute top-1/2 left-4 -translate-y-1/2 bg-white p-2 rounded-full shadow hover:bg-gray-200">
            &#10094;
          </button>
          <button onclick="nextSlide()" class="absolute top-1/2 right-4 -translate-y-1/2 bg-white p-2 rounded-full shadow hover:bg-gray-200">
            &#10095;
          </button>
        </div>

        <script>
          const carousel = document.getElementById('carousel');
          const totalSlides = carousel.children.length;
          let index = 0;

          function updateSlide() {
            carousel.style.transform = `translateX(-${index * 100}%)`;
          }

          function nextSlide() {
            index = (index + 1) % totalSlides;
            updateSlide();
          }

          function prevSlide() {
            index = (index - 1 + totalSlides) % totalSlides;
            updateSlide();
          }
        </script>

        <!-- Section Menu Spesial -->
        <section class="pt-12 pb-16 fade-section opacity-0 translate-y-10 transition-all duration-1000">
          <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-2xl font-bold text-gray-700 inline-block border-b-4 border-red-700 pb-2 mb-6 text-shadow-strong">Menu Spesial Kami</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
              @forelse($specialMenus as $menu)
                <div class="bg-gray-100 rounded-2xl shadow-md hover:shadow-xl transition p-6">
                  <img src="{{ asset($menu->image_path) }}" 
                       alt="{{ $menu->title }}" 
                       class="rounded-lg shadow-lg w-full object-cover transform transition-transform duration-500 hover:rotate-y-12 hover:-rotate-x-6 hover:scale-105 aspect-[4/3]">
                  <h3 class="text-xl font-semibold mb-2">{{ $menu->title }}</h3>
                  <p class="text-gray-800 text-sm">{{ $menu->description ?? 'Deskripsi belum tersedia.' }}</p>
                </div>
              @empty
              @endforelse
            </div>
          </div>
        </section>

        <script>
          // Fade In Animation
          document.addEventListener("DOMContentLoaded", () => {
            const sections = document.querySelectorAll(".fade-section");

            const observer = new IntersectionObserver((entries, obs) => {
              entries.forEach(entry => {
                if (entry.isIntersecting) {
                  entry.target.classList.remove("opacity-0", "translate-y-10");
                  entry.target.classList.add("opacity-100", "translate-y-0");
                  obs.unobserve(entry.target); // hanya animasi sekali
                }
              });
            }, { threshold: 0.2 });

            sections.forEach(section => {
              observer.observe(section);
            });
          });
        </script>

      </div>
    </section>
  </div>
</main>
</x-layout>