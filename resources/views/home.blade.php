<x-layout>
  
  <main class="pt-20">
    <!-- Features Section -->
    <section id="features" class="relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Main Feature - Text Left, Image Right -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-16 items-center mb-20">
                <!-- Text Content -->
                <div class="order-1 lg:order-1">
                    <h2 class="text-4xl md:text-5xl font-bold mb-6">
                        <span class="bg-gradient-to-l from-red-900 to-orange-600 bg-clip-text text-transparent">Resto Joss Gandos</span>
                    </h2>
                    <p class="text-xl text-gray-900 mb-8 leading-relaxed">
                        Selamat datang di Resto Joss Gandos, 
                        tempat di mana rasa, suasana, dan kehangatan berpadu menjadi satu. Setiap kunjungan adalah perjalanan rasa yang membuat Anda ingin kembali lagi.
                    </p>
                    <a href="/menu"
                    class="bg-red-600 text-white px-10 py-4 rounded-full font-bold text-lg hover-lift shadow-2xl transform hover:scale-105 transition-all duration-300 inline-block">
                        Lihat Menu Kami
                    </a>
                </div>
                
                <!-- Image Content -->
                <div class="order-2 lg:order-2">
                    <div class="relative mt-12 mb-8">
                        <div class="bg-gradient-to-br from-red-100 to-orange-100 rounded-3xl p-4">
                            <img src="img/utama.png" alt="Resto Joss Gandos" 
                                class="w-full h-full object-cover rounded-2xl shadow-2xl">
                        </div>
                        <!-- Decorative elements -->
                        <div class="absolute -top-4 -right-4 w-24 h-24 bg-red-600 rounded-full opacity-20"></div>
                        <div class="absolute -bottom-6 -left-6 w-32 h-32 bg-orange-400 rounded-full opacity-15"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="relative py-6">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-4xl md:text-5xl font-bold text-yellow-600 mb-12">
          Ulasan Pelanggan
        </h2>

        <!-- Swiper Container -->
        <div class="swiper testimonialSwiper">
          <div class="swiper-wrapper">
            
            <!-- Testimonial 1 -->
            <div class="swiper-slide">
              <div class="bg-white rounded-2xl shadow-lg p-7 text-left hover:shadow-xl transition-shadow duration-300">
                <!-- Stars -->
                <div class="flex text-yellow-400 mb-4">
                  <span>★★★★★</span>
                </div>
                <!-- Review -->
                <p class="text-gray-600 mb-6">
                  Menu makanannya oke, rasanya endul, ruangannya ber-AC, bisa karaokean juga sama teman-teman. Joss Gandos dech... Mantul
                </p>
                <!-- User Info -->
                <div class="flex items-center">
                  <img src="https://api.dicebear.com/9.x/adventurer/svg?seed=nice" alt="Metha" class="w-12 h-12 rounded-full mr-4">
                  <div>
                    <h4 class="font-bold text-black">Metha Prosper</h4>
                    <p class="text-sm text-gray-500">Resto Joss Gandos – Jemursari</p>
                  </div>
                </div>
              </div>
            </div>

            <!-- Testimonial 2 -->
            <div class="swiper-slide">
              <div class="bg-white rounded-2xl shadow-lg p-3 text-left hover:shadow-2xl transition-shadow duration-300">
                <div class="flex text-yellow-400 mb-4">
                  <span>★★★★★</span>
                </div>
                <p class="text-gray-600 mb-6">
                  Family resto bagus di Surabaya. Makanannya enak terutama kepala salmon dan ayam kremesnya 👌.
                  Ngerayain ulang tahun disini selain dikasih tumpeng kecil ala-ala dikasih juga figura foto dan diajak tiktokan bareng crewnya, pelayanannya baik 👍.
                </p>
                <div class="flex items-center">
                  <img src="https://api.dicebear.com/9.x/adventurer/svg?seed=good" alt="Thoriq" class="w-12 h-12 rounded-full mr-4">
                  <div>
                    <h4 class="font-bold text-black">Achmad Thoriq</h4>
                    <p class="text-sm text-gray-500">Resto Joss Gandos – Ketintang</p>
                  </div>
                </div>
              </div>
            </div>

            <!-- Testimonial 3 -->
            <div class="swiper-slide">
              <div class="bg-white rounded-2xl shadow-lg p-4 text-left hover:shadow-xl transition-shadow duration-300">
                <!-- Stars -->
                <div class="flex text-yellow-400 mb-4">
                  <span>★★★★★</span>
                </div>
                <!-- Review -->
                <p class="text-gray-600 mb-6">
                  Layanan plus plusnya emang mantab banget.. dibantu fotbar, video tiktok juga.. bukan hanya soal makan,
                  tapi dilayani dengan ramah dan memperhatikan kebutuhan konsumen dari segala sisi. Thanks
                </p>
                <!-- User Info -->
                <div class="flex items-center">
                  <img src="https://api.dicebear.com/9.x/adventurer/svg?seed=building" alt="Uinsa" class="w-12 h-12 rounded-full mr-4">
                  <div>
                    <h4 class="font-bold text-black">Perpus Uinsa</h4>
                    <p class="text-sm text-gray-500">Resto Joss Gandos – Ketintang</p>
                  </div>
                </div>
              </div>
            </div>

            <!-- Testimonial 4 -->
            <div class="swiper-slide">
              <div class="bg-white rounded-2xl shadow-lg p-5 text-left hover:shadow-xl transition-shadow duration-300">
                <div class="flex text-yellow-400 mb-4">
                  <span>★★★★★</span>
                </div>
                <p class="text-gray-600 mb-6">
                  terimakasih joss gandoss tempat nya cocok buat bukber, servisnya oke poll staff nya ramah,
                  makanannya enakk tempatnya bersih ada fasilitas mushollanya juga yg luasss keren jos gandoss sukses.
                </p>
                <div class="flex items-center">
                  <img src="https://api.dicebear.com/9.x/adventurer/svg?seed=beautiful" alt="Karenina" class="w-12 h-12 rounded-full mr-4">
                  <div>
                    <h4 class="font-bold text-black">Karenina Anisya Pratiwi</h4>
                    <p class="text-sm text-gray-500">Resto Joss Gandos – Jemursari</p>
                  </div>
                </div>
              </div>
            </div>

            <!-- Testimonial 5 -->
            <div class="swiper-slide">
              <div class="bg-white rounded-2xl shadow-lg p-3 text-left hover:shadow-2xl transition-shadow duration-300">
                <!-- Stars -->
                <div class="flex text-yellow-400 mb-4">
                  <span>★★★★★</span>
                </div>
                <!-- Review -->
                <p class="text-gray-600 mb-6">
                  Pelayanan baik dan petugas ramah dalam menyapa pengunjung, responsif,
                  dan banyak ruangan yang bisa digunakan untuk meeting san acara” private, makanan oke dan porsinya cukup. Terimakasih Joss Gandhos
                </p>
                <!-- User Info -->
                <div class="flex items-center">
                  <img src="https://api.dicebear.com/9.x/adventurer/svg?seed=random" alt="Filidyo" class="w-12 h-12 rounded-full mr-4">
                  <div>
                    <h4 class="font-bold text-black">Filidyo Bramanta</h4>
                    <p class="text-sm text-gray-500">Resto Joss Gandos - Jemursari</p>
                  </div>
                </div>
              </div>
            </div>

            <!-- Testimonial 6 -->
            <div class="swiper-slide">
              <div class="bg-white rounded-2xl shadow-lg p-2 text-left hover:shadow-2xl transition-shadow duration-300">
                <!-- Stars -->
                <div class="flex text-yellow-400 mb-4">
                  <span>★★★★★</span>
                </div>
                <!-- Review -->
                <p class="text-gray-600 mb-6">
                  Layanan yang satset dan super ramah dari karyawatinya. Mantaaaab. Makanan enak dan hangat.
                  Mushola luass, bisa shalat jamaah sekitar 40 orang sekaligus. Toilet banyak, gatakut antri.
                  Ruangan vip tersedia fasilitas karaoke, mantab buat seru-seruan bareng temen-temen.
                </p>
                <!-- User Info -->
                <div class="flex items-center">
                  <img src="https://api.dicebear.com/9.x/adventurer/svg?seed=hello" alt="Tri" class="w-12 h-12 rounded-full mr-4">
                  <div>
                    <h4 class="font-bold text-black">M. Junianto Tri Gunawan</h4>
                    <p class="text-sm text-gray-500">Resto Joss Gandos – Ketintang</p>
                  </div>
                </div>
              </div>
            </div>

          </div>

          <!-- Pagination -->
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </section>

    <!-- CTA Section -->
    <section id="cta" class="relative py-24">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">  
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-3xl md:text-5xl font-bold text-white mb-6">
                    <span class="block text-red-600">Siap Merasakan<br>Pengalaman Kuliner Terbaik?</span>
                </h2>
                <p class="text-xl text-black mb-12 max-w-2xl mx-auto">
                    Bergabunglah dengan ribuan pelanggan yang telah merasakan kelezatan hidangan istimewa kami. Pesan sekarang dan dapatkan pengalaman tak terlupakan!
                </p>
                
                <div class="flex flex-col sm:flex-row gap-6 justify-center items-center mb-2">
                    <a href="https://lynk.id/jossgandosjemursari?fbclid=PAZXh0bgNhZW0CMTEAAadQ6oTKFFIRWah1S61m679zrmcp1eix-Bj08ymumVluAy3KdT2S4PB0lFcBCw_aem_8hjvEIZZbU59qtZkbiMPaQ" 
                       class="bg-white text-red-600 px-10 py-4 rounded-full font-bold text-lg hover:bg-gray-100 hover-lift shadow-2xl transform hover:scale-105 transition-all duration-300 inline-block">
                      Pesan Sekarang
                    </a>
                </div>
            </div>
        </div>
      </div>
    </section>

    <!-- SwiperJS CDN -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Swiper Init -->
    <script>
      var swiper = new Swiper(".testimonialSwiper", {
        loop: true,
        autoplay: {
          delay: 4000,
          disableOnInteraction: false,
        },
        slidesPerView: 1,
        spaceBetween: 60,
        breakpoints: {
          768: {
            slidesPerView: 2,
          },
        },
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
        },
      });
    </script>
  </main>

</x-layout>
