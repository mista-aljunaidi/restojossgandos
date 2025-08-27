<x-layout>
    <main class="pt-16 min-h-screen">
    <!-- LOKASI PAGE -->
<section class="py-8">
  <div class="max-w-5xl mx-auto px-4">
    <h2 class="text-4xl font-bold text-center text-gray-600 mb-8">Lokasi Outlet</h2>

    <!-- Slider -->
    <div class="relative w-full h-100 overflow-hidden mb-12">
      <button onclick="prevImage()" 
              class="absolute left-2 top-1/2 -translate-y-1/2 bg-black bg-opacity-50 text-white p-2 rounded-full hover:bg-opacity-75">
        &#10094;
      </button>

      <img id="sliderImage" 
           src="img/download.jpeg" 
           alt="Outlet Location" 
           class="w-full object-cover flex-shrink-0 transition-opacity duration-700 ease-in-out opacity-100">

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
        <h4 class="text-xl font-medium cursor-pointer flex items-center gap-2" onclick="toggleDetail(this)">
          <span class="icon w-5 h-5">
            <!-- Arrow Right (default) -->
            <svg xmlns="http://www.w3.org/2000/svg" class="arrow-right" viewBox="0 0 24 24">
              <path fill="#333337" d="M17.92,11.62a1,1,0,0,0-.21-.33l-5-5a1,1,0,0,0-1.42,1.42L14.59,11H7a1,1,0,0,0,0,2h7.59l-3.3,3.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0l5-5a1,1,0,0,0,.21-.33A1,1,0,0,0,17.92,11.62Z"></path>
            </svg>
            <!-- Arrow Down (hidden initially) -->
            <svg xmlns="http://www.w3.org/2000/svg" class="arrow-down hidden" viewBox="0 0 24 24">
              <path fill="#333337" d="M17.71,11.29a1,1,0,0,0-1.42,0L13,14.59V7a1,1,0,0,0-2,0v7.59l-3.29-3.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,.33.21.94.94,0,0,0,.76,0,1,1,0,0,0,.33-.21l5-5A1,1,0,0,0,17.71,11.29Z"></path>
            </svg>
          </span>
          Resto Joss Gandos - Jemursari
        </h4>
        <div class="mt-2 hidden">
          <p class="text-gray-900">Jl. Raya Jemursari No.15, Jemur Wonosari, Kec. Wonocolo, Surabaya, Jawa Timur 60237</p>
          <p class="text-gray-900">Senin - Minggu, 10.00 WIB – 22.00 WIB</p>
          <p class="text-gray-900">Phone: +62 319-984-2999</p>
          <div class="flex space-x-4 mt-4">
            <a href="https://www.facebook.com/RestoJossGandos" target="_blank" class="hover:text-red-400 transition">
                <span class="[&>svg]:h-6 [&>svg]:w-6">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 320 512">
                        <path d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z"/>
                    </svg>
                </span>
            </a>
            <a href="https://www.instagram.com/restojossgandos/" target="_blank" class="hover:text-red-400 transition inline-flex items-center gap-1">
              <span class="[&>svg]:h-6 [&>svg]:w-6">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 448 512">
                  <path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/>
                </svg>
              </span>
            </a>
            <a href="https://www.tiktok.com/@restojossgandos" target="_blank" class="hover:text-red-400 transition">
              <span class="[&>svg]:h-6 [&>svg]:w-6">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 448 512">
                      <path d="M448 209.9a210.1 210.1 0 0 1 -122.8-39.3V349.4A162.6 162.6 0 1 1 185 188.3V278.2a74.6 74.6 0 1 0 52.2 71.2V0l88 0a121.2 121.2 0 0 0 1.9 22.2h0A122.2 122.2 0 0 0 381 102.4a121.4 121.4 0 0 0 67 20.1z"/>
                  </svg>
              </span>
            </a>
          </div>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
            <div class="transition-shadow duration-300 hover:shadow-xl rounded-xl overflow-hidden">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.254930294519!2d112.734773874761!3d-7.325237292682985!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fb597129038d%3A0x1ed010a8c48ea678!2sResto%20Joss%20Gandos!5e0!3m2!1sid!2sid!4v1755244684155!5m2!1sid!2sid"
              width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </div>
        </div>
      </div>

      <!-- Outlet 2 -->
      <div>
        <h4 class="text-xl font-medium cursor-pointer flex items-center gap-2" onclick="toggleDetail(this)">
          <span class="icon w-5 h-5">
            <svg xmlns="http://www.w3.org/2000/svg" class="arrow-right" viewBox="0 0 24 24">
              <path fill="#333337" d="M17.92,11.62a1,1,0,0,0-.21-.33l-5-5a1,1,0,0,0-1.42,1.42L14.59,11H7a1,1,0,0,0,0,2h7.59l-3.3,3.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0l5-5a1,1,0,0,0,.21-.33A1,1,0,0,0,17.92,11.62Z"></path>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" class="arrow-down hidden" viewBox="0 0 24 24">
              <path fill="#333337" d="M17.71,11.29a1,1,0,0,0-1.42,0L13,14.59V7a1,1,0,0,0-2,0v7.59l-3.29-3.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,.33.21.94.94,0,0,0,.76,0,1,1,0,0,0,.33-.21l5-5A1,1,0,0,0,17.71,11.29Z"></path>
            </svg>
          </span>
          Resto Joss Gandos - Ketintang
        </h4>
        <div class="mt-2 hidden">
          <p class="text-gray-900">Jl. Jetis Seraten, Ketintang, Kec. Gayungan, Surabaya, Jawa Timur 60231</p>
          <p class="text-gray-900">Senin - Minggu, 10.00 WIB – 22.00 WIB</p>
          <p class="text-gray-900">Phone: +62 319-984-2888</p>
          <div class="flex space-x-4 mt-4">
            <a href="https://www.facebook.com/profile.php?id=61564928110856" target="_blank" class="hover:text-red-400 transition">
                <span class="[&>svg]:h-6 [&>svg]:w-6">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 320 512">
                        <path d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z"/>
                    </svg>
                </span>
            </a>
            <a href="https://www.instagram.com/restojossgandos_ketintang/" target="_blank" class="hover:text-red-400 transition inline-flex items-center gap-1">
              <span class="[&>svg]:h-6 [&>svg]:w-6">
                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 448 512">
                  <path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/>
                </svg>
              </span>
            </a>
            <a href="https://www.tiktok.com/@rstojossgandos.ketintang?_t=ZS-8zDabrwjQaP&_r=1" target="_blank" class="hover:text-red-400 transition">
              <span class="[&>svg]:h-6 [&>svg]:w-6">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 448 512">
                      <path d="M448 209.9a210.1 210.1 0 0 1 -122.8-39.3V349.4A162.6 162.6 0 1 1 185 188.3V278.2a74.6 74.6 0 1 0 52.2 71.2V0l88 0a121.2 121.2 0 0 0 1.9 22.2h0A122.2 122.2 0 0 0 381 102.4a121.4 121.4 0 0 0 67 20.1z"/>
                  </svg>
              </span>
            </a>
          </div>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
            <div class="transition-shadow duration-300 hover:shadow-xl rounded-xl overflow-hidden">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.2758272411224!2d112.72429227476103!3d-7.322883292685306!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fbbc457099a7%3A0x532f9878c0a059e8!2sResto%20Joss%20Gandos%20Ketintang!5e0!3m2!1sid!2sid!4v1755244511303!5m2!1sid!2sid" 
              width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script>
      function toggleDetail(el) {
        const detail = el.nextElementSibling;
        detail.classList.toggle("hidden");

        const arrowRight = el.querySelector(".arrow-right");
        const arrowDown = el.querySelector(".arrow-down");

        if (detail.classList.contains("hidden")) {
          arrowRight.classList.remove("hidden");
          arrowDown.classList.add("hidden");
        } else {
          arrowRight.classList.add("hidden");
          arrowDown.classList.remove("hidden");
        }
      }
    </script>
    
</section>
</x-layout>