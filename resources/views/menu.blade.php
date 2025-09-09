<x-layout>
<main class="pt-16 min-h-screen">
  <!-- MENU PAGE -->
  <div id="menu-page" class="page-content">
  <section class="py-4">
      <div class="mx-auto max-w-6xl px-4 py-8 font-sans">
        <div class="text-center mb-12">
          <h1 class="text-4xl font-bold text-gray-600 mb-4">Menu Kami</h1>
        </div>

      <!-- Container Gambar + Detail -->
      <div class="relative w-full max-w-4xl mx-auto overflow-hidden rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300">
      <!-- Wrapper Slide -->
      <div id="carousel" class="flex transition-transform duration-500" class="fade-section opacity-0 translate-y-10 transition-all duration-1000">
        
        @forelse ($carouselMenus as $menu)
          <div class="relative min-w-full group">
            <img src="{{ asset($menu->image_path) }}" 
                alt="{{ $menu->title }}" 
                class="w-full h-[600px] object-cover">

            <div class="absolute bottom-0 left-0 w-full bg-gray-100 bg-opacity-95 p-4 h-1/5 flex flex-col justify-center 
                        opacity-0 translate-y-full transition-all duration-300 group-hover:opacity-100 group-hover:translate-y-0">
              <h3 class="text-xl font-bold text-center">{{ $menu->title }}</h3>
              <p class="text-gray-800 text-sm text-center">
                {{ $menu->description ?? 'Deskripsi belum tersedia.' }}
              </p>
            </div>
          </div>
        @empty
        
        @endforelse
        
      <!-- Slide 1 -->
        <div class="relative min-w-full group">
          <img src="img/bebekgoreng.jpg"
              alt="Bebek Goreng" 
              class="w-full h-[600px] object-cover">
          <div class="absolute bottom-0 left-0 w-full bg-gray-100 bg-opacity-95 p-4 h-1/5 flex flex-col justify-center 
                      opacity-0 translate-y-full transition-all duration-300 group-hover:opacity-100 group-hover:translate-y-0">
            <h3 class="text-xl font-bold text-center">Bebek Goreng Joss Gandos</h3>
            <p class="text-gray-800 text-sm text-center">
              Bebek goreng gurih dan renyah dengan bumbu khas yang meresap. 
              Disajikan dengan sambal pedas dan lalapan segar. 
              Rasanya joss, nikmatnya gandos.
            </p>
          </div>
        </div>

      <!-- Slide 2 -->
        <div class="relative min-w-full group">
          <img src="img/gulaikepalasalmon.jpg" 
              alt="Ikan Bakar" 
              class="w-full h-[600px] object-cover">
          <div class="absolute bottom-0 left-0 w-full bg-gray-100 bg-opacity-95 p-4 h-1/5 flex flex-col justify-center 
                    opacity-0 translate-y-full transition-all duration-300 group-hover:opacity-100 group-hover:translate-y-0">
            <h3 class="text-xl font-bold text-center">Gulai Kepala Salmon</h3>
            <p class="text-gray-800 text-sm text-center">Kepala salmon dimasak dengan kuah gulai yang gurih dan kaya rempah. 
              Dagingnya lembut, kuahnya nikmat, bikin nambah nasi.</p>
          </div>
        </div>

      <!-- Slide 3 -->
        <div class="relative min-w-full group">
          <img src="img/ayammozarella.jpg" 
              alt="Sop Iga" 
              class="w-full h-[600px] object-cover">
          <div class="absolute bottom-0 left-0 w-full bg-gray-100 bg-opacity-95 p-4 h-1/5 flex flex-col justify-center 
                    opacity-0 translate-y-full transition-all duration-300 group-hover:opacity-100 group-hover:translate-y-0">
            <h3 class="text-xl font-bold text-center">Ayam Mozarella</h3>
            <p class="text-gray-800 text-sm text-center">Ayam crispy disiram lelehan keju mozarella yang lumer dan gurih. 
              Perpaduan renyah dan creamy yang bikin nagih.</p>
          </div>
        </div>

      <!-- Slide 4 -->
        <div class="relative min-w-full group">
          <img src="img/esbugar.jpg" 
              alt="Sop Iga" 
              class="w-full h-[600px] object-cover">
          <div class="absolute bottom-0 left-0 w-full bg-gray-100 bg-opacity-95 p-4 h-1/5 flex flex-col justify-center 
                    opacity-0 translate-y-full transition-all duration-300 group-hover:opacity-100 group-hover:translate-y-0">
            <h3 class="text-xl font-bold text-center">Es Bugar</h3>
            <p class="text-gray-800 text-sm text-center">Espresso kuat dipadukan susu creamy dan manisnya gula aren. 
              Segar, bertenaga, dan bikin semangat.</p>
          </div>
        </div>

      <!-- Slide 5 -->
        <div class="relative min-w-full group">
          <img src="img/escamer.jpg" 
              alt="Sop Iga" 
              class="w-full h-[600px] object-cover">
          <div class="absolute bottom-0 left-0 w-full bg-gray-100 bg-opacity-95 p-4 h-1/5 flex flex-col justify-center 
                    opacity-0 translate-y-full transition-all duration-300 group-hover:opacity-100 group-hover:translate-y-0">
            <h3 class="text-xl font-bold text-center">Es Camer</h3>
            <p class="text-gray-800 text-sm text-center">Kombinasi espresso, susu, dan sirup karamel dalam sajian dingin. 
              Manis, creamy, dan elegan.</p>
          </div>
        </div>

      <!-- Slide 6 -->
        <div class="relative min-w-full group">
          <img src="img/hotchoco.jpg" 
              alt="Sop Iga" 
              class="w-full h-[600px] object-cover">
          <div class="absolute bottom-0 left-0 w-full bg-gray-100 bg-opacity-95 p-4 h-1/5 flex flex-col justify-center 
                    opacity-0 translate-y-full transition-all duration-300 group-hover:opacity-100 group-hover:translate-y-0">
            <h3 class="text-xl font-bold text-center">Hot Chocolate</h3>
            <p class="text-gray-800 text-sm text-center">Cokelat panas yang lembut dan manis, cocok untuk momen santai. 
              Hangatkan harimu.</p>
          </div>
        </div>
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
        <h2 class="text-3xl font-bold text-gray-600 mb-8">Menu Spesial Kami</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

          <div class="bg-gray-100 rounded-2xl shadow-md hover:shadow-xl transition p-6">
            <img src="img/bebekgoreng.jpg" alt="Sate Ayam Joss" class="rounded-lg shadow-lg w-full object-cover transform transition-transform duration-500 hover:rotate-y-12 hover:-rotate-x-6 hover:scale-105 aspect-[4/3]">
            <h3 class="text-xl font-semibold mb-2">Sate Ayam Joss</h3>
            <p class="text-gray-800 text-sm">Sate ayam empuk dengan bumbu kacang gurih manis. Aroma bakaran yang khas bikin nambah.</p>
          </div>

          <div class="bg-gray-100 rounded-2xl shadow-md hover:shadow-xl transition p-6">
            <img src="img/gulaikepalasalmon.jpg" alt="Udang Telur Asin" class="rounded-lg shadow-lg w-full object-cover transform transition-transform duration-500 hover:rotate-y-12 hover:-rotate-x-6 hover:scale-105 aspect-[4/3]">
            <h3 class="text-xl font-semibold mb-2">Udang Telur Asin</h3>
            <p class="text-gray-800 text-sm">Udang goreng crispy dibalut saus telur asin yang gurih dan creamy. Favorit semua kalangan.</p>
          </div>

          <div class="bg-gray-100 rounded-2xl shadow-md hover:shadow-xl transition p-6">
            <img src="img/ayammozarella.jpg" alt="Cumi Tumis Hitam" class="rounded-lg shadow-lg w-full object-cover transform transition-transform duration-500 hover:rotate-y-12 hover:-rotate-x-6 hover:scale-105 aspect-[4/3]">
            <h3 class="text-xl font-semibold mb-2">Cumi Tumis Hitam</h3>
            <p class="text-gray-800 text-sm">Cumi segar dimasak dengan tinta hitam alami, rasa gurih khas laut yang unik dan menggoda.</p>
          </div>

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
</main>
</x-layout>