<x-layout>
    <main class="pt-16 min-h-screen">
    <!-- LOKASI PAGE -->
<section class="py-8">
  <div class="max-w-5xl mx-auto px-4">
    <h2 class="text-4xl font-bold text-center text-gray-600 mb-8">Lokasi Outlet</h2>

    <!-- Slider -->
    <div class="relative w-full h-screen overflow-hidden mb-12">
      <button onclick="prevImage()" 
              class="absolute left-2 top-1/2 -translate-y-1/2 bg-black bg-opacity-50 text-white p-2 rounded-full hover:bg-opacity-75">
        &#10094;
      </button>

      <img id="sliderImage" 
           src="img/download.jpeg" 
           alt="Outlet Location" 
           class="w-full h-full object-cover transition-opacity duration-700 ease-in-out opacity-100">

      <button onclick="nextImage()" 
              class="absolute right-2 top-1/2 -translate-y-1/2 bg-black bg-opacity-50 text-white p-2 rounded-full hover:bg-opacity-75">
        &#10095;
      </button>
    </div>

    <script>
      const images = [
        "img/download.jpeg",
        "img/download.jpeg",
        "img/download.jpeg"
      ];

      let index = 0;
      const imgElement = document.getElementById("sliderImage");

      function showImage(newIndex) {
        imgElement.classList.remove("opacity-100");
        imgElement.classList.add("opacity-0");

        setTimeout(() => {
          imgElement.src = images[newIndex];
          imgElement.classList.remove("opacity-0");
          imgElement.classList.add("opacity-100");
        }, 400);
      }

      function nextImage() {
        index = (index + 1) % images.length;
        showImage(index);
      }

      function prevImage() {
        index = (index - 1 + images.length) % images.length;
        showImage(index);
      }

      setInterval(nextImage, 5000);
    </script>

<div class="space-y-8">
  <!-- Outlet 1 -->
  <div>
    <h4 class="text-xl font-medium cursor-pointer" onclick="toggleDetail(this)">
      > Resto Joss Gandos - Jemursari
    </h4>
    <div class="mt-2 hidden">
      <p class="text-gray-800">
        Jl. Raya Jemursari No.15, Jemur Wonosari, Kec. Wonocolo, Surabaya, Jawa Timur 60237
      </p>
      <p class="text-gray-800">Senin - Minggu, 10.00 – 22.00 WIB</p>
      <p class="text-gray-800">Phone: +62 319-984-2999</p>

      <!-- Map sejajar -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
        <div class="transition-shadow duration-300 hover:shadow-xl rounded-xl overflow-hidden">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.254930294519!2d112.734773874761!3d-7.325237292682985!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fb597129038d%3A0x1ed010a8c48ea678!2sResto%20Joss%20Gandos!5e0!3m2!1sid!2sid!4v1755244684155!5m2!1sid!2sid"
          width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
      </div>
    </div>
  </div>

  <!-- Outlet 2 -->
  <div>
    <h4 class="text-xl font-medium cursor-pointer" onclick="toggleDetail(this)">
      > Resto Joss Gandos - Ketintang
    </h4>
    <div class="mt-2 hidden">
      <p class="text-gray-800">
        Jl. Jetis Seraten, Ketintang, Kec. Gayungan, Surabaya, Jawa Timur 60231
      </p>
      <p class="text-gray-800">Senin - Minggu, 10.00 – 22.00 WIB</p>
      <p class="text-gray-800">Phone: +62 319-984-2888</p>

      <!-- Map sejajar -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
        <div class="transition-shadow duration-300 hover:shadow-xl rounded-xl overflow-hidden">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.2758272411224!2d112.72429227476103!3d-7.322883292685306!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fbbc457099a7%3A0x532f9878c0a059e8!2sResto%20Joss%20Gandos%20Ketintang!5e0!3m2!1sid!2sid!4v1755244511303!5m2!1sid!2sid"
          width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
      </div>
    </div>
  </div>
</div>

<script>
  function toggleDetail(el) {
    const detail = el.nextElementSibling;
    detail.classList.toggle("hidden");
  }
</script>

</section>
</x-layout>