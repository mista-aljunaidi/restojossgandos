<x-layout>
<main class="pt-16 min-h-screen">
  <!-- About Page -->
  <div id="about-page" class="page-content">
  <section class="py-1">
      <div class="mx-auto max-w-6xl px-4 py-8 font-sans">
        <div class="text-center mb-12">
          <h1 class="text-4xl font-bold text-gray-600 mb-4">Menu Kami</h1>
        </div>

      <!-- Container Gambar + Detail -->
      <div class="relative w-full max-w-4xl mx-auto overflow-hidden rounded-2xl shadow-lg hover:shadow-xl transition-shadow duration-300">
      <!-- Wrapper Slide -->
      <div id="carousel" class="flex transition-transform duration-500">
      <!-- Slide 1 -->
    <div class="relative min-w-full group">
      <img src="img/bebekgoreng.jpg"
           alt="Bebek Goreng" 
           class="w-full h-[600px] object-cover">
      <div class="absolute bottom-0 left-0 w-full bg-white bg-opacity-95 p-4 h-1/5 flex flex-col justify-center 
                  opacity-0 translate-y-full transition-all duration-300 group-hover:opacity-100 group-hover:translate-y-0">
        <h3 class="text-xl font-bold text-center">Bebek Goreng Joss Gandos</h3>
        <p class="text-gray-600 text-sm text-center">
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
        <div class="absolute bottom-0 left-0 w-full bg-white bg-opacity-95 p-4 h-1/5 flex flex-col justify-center 
                  opacity-0 translate-y-full transition-all duration-300 group-hover:opacity-100 group-hover:translate-y-0">
          <h3 class="text-xl font-bold text-center">Gulai Kepala Salmon</h3>
          <p class="text-gray-600 text-sm text-center">Kepala salmon dimasak dengan kuah gulai yang gurih dan kaya rempah. 
            Dagingnya lembut, kuahnya nikmat, bikin nambah nasi.</p>
        </div>
      </div>

      <!-- Slide 3 -->
      <div class="relative min-w-full group">
        <img src="img/ayammozarella.jpg" 
             alt="Sop Iga" 
             class="w-full h-[600px] object-cover">
        <div class="absolute bottom-0 left-0 w-full bg-white bg-opacity-95 p-4 h-1/5 flex flex-col justify-center 
                  opacity-0 translate-y-full transition-all duration-300 group-hover:opacity-100 group-hover:translate-y-0">
          <h3 class="text-xl font-bold text-center">Ayam Mozarella</h3>
          <p class="text-gray-600 text-sm text-center">Ayam crispy disiram lelehan keju mozarella yang lumer dan gurih. 
            Perpaduan renyah dan creamy yang bikin nagih.</p>
        </div>
      </div>

      <!-- Slide 4 -->
      <div class="relative min-w-full group">
        <img src="img/esbugar.jpg" 
             alt="Sop Iga" 
             class="w-full h-[600px] object-cover">
        <div class="absolute bottom-0 left-0 w-full bg-white bg-opacity-95 p-4 h-1/5 flex flex-col justify-center 
                  opacity-0 translate-y-full transition-all duration-300 group-hover:opacity-100 group-hover:translate-y-0">
          <h3 class="text-xl font-bold text-center">Es Bugar</h3>
          <p class="text-gray-600 text-sm text-center">Espresso kuat dipadukan susu creamy dan manisnya gula aren. 
            Segar, bertenaga, dan bikin semangat.</p>
        </div>
      </div>

      <!-- Slide 5 -->
      <div class="relative min-w-full group">
        <img src="img/escamer.jpg" 
             alt="Sop Iga" 
             class="w-full h-[600px] object-cover">
        <div class="absolute bottom-0 left-0 w-full bg-white bg-opacity-95 p-4 h-1/5 flex flex-col justify-center 
                  opacity-0 translate-y-full transition-all duration-300 group-hover:opacity-100 group-hover:translate-y-0">
          <h3 class="text-xl font-bold text-center">Es Camer</h3>
          <p class="text-gray-600 text-sm text-center">Kombinasi espresso, susu, dan sirup karamel dalam sajian dingin. 
            Manis, creamy, dan elegan.</p>
        </div>
      </div>

      <!-- Slide 6 -->
      <div class="relative min-w-full group">
        <img src="img/hotchoco.jpg" 
             alt="Sop Iga" 
             class="w-full h-[600px] object-cover">
        <div class="absolute bottom-0 left-0 w-full bg-white bg-opacity-95 p-4 h-1/5 flex flex-col justify-center 
                  opacity-0 translate-y-full transition-all duration-300 group-hover:opacity-100 group-hover:translate-y-0">
          <h3 class="text-xl font-bold text-center">Hot Chocolate</h3>
          <p class="text-gray-600 text-sm text-center">Cokelat panas yang lembut dan manis, cocok untuk momen santai. 
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
    <section class="py-20">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-3xl font-bold text-gray-600 mb-12">Menu Spesial Kami</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
          <!-- Item 1 -->
          <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition p-6">
            <img src="img/bebekgoreng.jpg" alt="Sate Ayam Joss" class="rounded-lg shadow-lg w-full h-56 max-w-md object-cover transform transition-transform duration-500 
            hover:rotate-y-12 hover:-rotate-x-6 hover:scale-105">
            <h3 class="text-xl font-semibold mb-2">Sate Ayam Joss</h3>
            <p class="text-gray-600 text-sm">Sate ayam empuk dengan bumbu kacang gurih manis. Aroma bakaran yang khas bikin nambah.</p>
          </div>

          <!-- Item 2 -->
          <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition p-6">
            <img src="img/gulaikepalasalmon.jpg" alt="Udang Telur Asin" class="rounded-lg shadow-lg w-full h-56 max-w-md object-cover transform transition-transform duration-500 
            hover:rotate-y-12 hover:-rotate-x-6 hover:scale-105">
            <h3 class="text-xl font-semibold mb-2">Udang Telur Asin</h3>
            <p class="text-gray-600 text-sm">Udang goreng crispy dibalut saus telur asin yang gurih dan creamy. Favorit semua kalangan.</p>
          </div>

          <!-- Item 3 -->
          <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition p-6">
            <img src="img/ayammozarella.jpg" alt="Cumi Tumis Hitam" class="rounded-lg shadow-lg w-full h-56 max-w-md object-cover transform transition-transform duration-500 
            hover:rotate-y-12 hover:-rotate-x-6 hover:scale-105">
            <h3 class="text-xl font-semibold mb-2">Cumi Tumis Hitam</h3>
            <p class="text-gray-600 text-sm">Cumi segar dimasak dengan tinta hitam alami, rasa gurih khas laut yang unik dan menggoda.</p>
          </div>
        </div>
      </div>
    </section>

  </div>
  </section>
</main>
</x-layout>