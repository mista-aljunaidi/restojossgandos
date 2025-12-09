<x-layout>
  
  <style>
      main::-webkit-scrollbar {
          display: none;
      }
      main {
          -ms-overflow-style: none;
          scrollbar-width: none;
      }
  </style>

  <main class="pt-20 min-h-screen bg-batik bg-fixed bg-cover bg-center bg-no-repeat relative w-full overflow-x-hidden">
    
    <div class="absolute inset-0 w-full h-full bg-stone-100/60 pointer-events-none z-0"></div>

    <section id="features" class="relative z-10 w-full pb-12 pt-0 md:pt-4 fade-section opacity-0 translate-y-10 transition-all duration-1000">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 lg:gap-20 items-center mb-16">
                
                <div class="order-1 lg:order-1 text-center lg:text-left">
                    <span class="uppercase tracking-widest text-red-600 font-bold text-sm mb-3 block">Selamat Datang</span>
                    <h2 class="text-5xl md:text-6xl font-serif font-bold mb-6 text-gray-800 leading-tight">
                        Resto <span class="text-transparent bg-clip-text bg-gradient-to-r from-red-700 to-orange-500">Joss Gandos</span>
                    </h2>
                    <div class="h-1.5 w-24 bg-gradient-to-r from-red-500 to-yellow-400 mb-8 rounded-full mx-auto lg:mx-0"></div>
                    
                    <p class="text-lg md:text-xl text-black mb-8 leading-relaxed font-light">
                        Tempat di mana rasa, suasana, dan kehangatan berpadu menjadi satu. Setiap kunjungan adalah perjalanan rasa yang membuat Anda ingin kembali lagi.
                    </p>
                    
                    <a href="/menu"
                    class="group inline-flex items-center gap-3 bg-red-600 text-white px-10 py-4 rounded-full font-bold text-lg shadow-[0_10px_20px_rgba(220,38,38,0.4)] hover:bg-red-700 hover:shadow-[0_15px_30px_rgba(220,38,38,0.6)] transform hover:-translate-y-1 transition-all duration-300">
                        <span>Lihat Menu Kami</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                </div>
                
                <div class="order-2 lg:order-2">
                    <div class="relative group perspective-1000">
                        <div class="absolute inset-0 bg-gradient-to-tr from-red-600 via-orange-400 to-yellow-300 rounded-[2.5rem] rotate-3 opacity-60 group-hover:rotate-6 transition-transform duration-500 blur-sm"></div>
                        
                        <div class="relative bg-white p-2 rounded-[2.5rem] shadow-2xl transform transition-transform duration-500 group-hover:scale-[1.02]">
                            <div class="rounded-[2rem] overflow-hidden aspect-[4/3] relative">
                                <img src="public/img/home/selamatdatang.jpg" 
                                    alt="Selamat Datang" 
                                    class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-[10s]">
                                
                                <div class="absolute inset-0 bg-black/10"></div>
                            </div>
                        </div>
                        
                        <div class="absolute -top-6 -right-6 w-24 h-24 bg-yellow-400 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob"></div>
                        <div class="absolute -bottom-8 -left-8 w-32 h-32 bg-red-500 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="testimonials" class="relative z-10 py-12 fade-section opacity-0 translate-y-10 transition-all duration-1000">
       <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">

            <h2 class="text-4xl md:text-5xl font-serif font-bold text-gray-800 mb-4">
                Ulasan <span class="text-red-700">Pelanggan</span>
            </h2>
            <p class="text-gray-600 mb-12 max-w-2xl mx-auto">Apa kata mereka yang telah merasakan kehangatan dan cita rasa Joss Gandos?</p>

            <div class="swiper testimonialSwiper pb-12">
                <div class="swiper-wrapper">
                    <div class="swiper-slide h-auto">
                        <div class="bg-white/90 backdrop-blur-sm rounded-3xl shadow-lg p-8 text-left hover:shadow-2xl transition-all duration-300 border border-stone-100 h-full flex flex-col">
                            <div class="flex text-yellow-400 mb-4 text-lg">★★★★★</div>
                            <p class="text-gray-600 mb-6 italic flex-grow leading-relaxed">
                                "Menu makanannya oke, rasanya endul, ruangannya ber-AC, bisa karaokean juga sama teman-teman. Joss Gandos dech... Mantul"
                            </p>
                            <div class="flex items-center mt-auto pt-4 border-t border-gray-100">
                                <img src="https://api.dicebear.com/9.x/adventurer/svg?seed=nice" alt="Metha" class="w-12 h-12 rounded-full mr-4 border-2 border-red-100">
                                <div>
                                    <h4 class="font-bold text-gray-900 font-serif">Metha Prosper</h4>
                                    <p class="text-xs text-red-600 font-semibold uppercase tracking-wider">Cab. Jemursari</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide h-auto">
                        <div class="bg-white/90 backdrop-blur-sm rounded-3xl shadow-lg p-8 text-left hover:shadow-2xl transition-all duration-300 border border-stone-100 h-full flex flex-col">
                            <div class="flex text-yellow-400 mb-4 text-lg">★★★★★</div>
                            <p class="text-gray-600 mb-6 italic flex-grow leading-relaxed">
                                "Family resto bagus di Surabaya. Makanannya enak terutama kepala salmon dan ayam kremesnya 👌. Ngerayain ulang tahun disini seru banget!"
                            </p>
                            <div class="flex items-center mt-auto pt-4 border-t border-gray-100">
                                <img src="https://api.dicebear.com/9.x/adventurer/svg?seed=good" alt="Thoriq" class="w-12 h-12 rounded-full mr-4 border-2 border-red-100">
                                <div>
                                    <h4 class="font-bold text-gray-900 font-serif">Achmad Thoriq</h4>
                                    <p class="text-xs text-red-600 font-semibold uppercase tracking-wider">Cab. Ketintang</p>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="swiper-slide h-auto">
                        <div class="bg-white/90 backdrop-blur-sm rounded-3xl shadow-lg p-8 text-left hover:shadow-2xl transition-all duration-300 border border-stone-100 h-full flex flex-col">
                            <div class="flex text-yellow-400 mb-4 text-lg">★★★★★</div>
                            <p class="text-gray-600 mb-6 italic flex-grow leading-relaxed">
                                "Layanan plus plusnya emang mantab banget.. dibantu fotbar, video tiktok juga.. dilayani dengan ramah dan memperhatikan kebutuhan konsumen."
                            </p>
                            <div class="flex items-center mt-auto pt-4 border-t border-gray-100">
                                <img src="https://api.dicebear.com/9.x/adventurer/svg?seed=building" alt="Uinsa" class="w-12 h-12 rounded-full mr-4 border-2 border-red-100">
                                <div>
                                    <h4 class="font-bold text-gray-900 font-serif">Perpus Uinsa</h4>
                                    <p class="text-xs text-red-600 font-semibold uppercase tracking-wider">Cab. Ketintang</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide h-auto">
                        <div class="bg-white/90 backdrop-blur-sm rounded-3xl shadow-lg p-8 text-left hover:shadow-2xl transition-all duration-300 border border-stone-100 h-full flex flex-col">
                            <div class="flex text-yellow-400 mb-4 text-lg">★★★★★</div>
                            <p class="text-gray-600 mb-6 italic flex-grow leading-relaxed">
                                "Tempat nya cocok buat bukber, servisnya oke poll staff nya ramah, makanannya enakk tempatnya bersih ada fasilitas mushollanya juga."
                            </p>
                            <div class="flex items-center mt-auto pt-4 border-t border-gray-100">
                                <img src="https://api.dicebear.com/9.x/adventurer/svg?seed=beautiful" alt="Karenina" class="w-12 h-12 rounded-full mr-4 border-2 border-red-100">
                                <div>
                                    <h4 class="font-bold text-gray-900 font-serif">Karenina Anisya</h4>
                                    <p class="text-xs text-red-600 font-semibold uppercase tracking-wider">Cab. Jemursari</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide h-auto">
                        <div class="bg-white/90 backdrop-blur-sm rounded-3xl shadow-lg p-8 text-left hover:shadow-2xl transition-all duration-300 border border-stone-100 h-full flex flex-col">
                            <div class="flex text-yellow-400 mb-4 text-lg">★★★★★</div>
                            <p class="text-gray-600 mb-6 italic flex-grow leading-relaxed">
                                "Pelayanan baik, responsif, dan banyak ruangan yang bisa digunakan untuk meeting dan acara private. Makanan oke dan porsinya cukup."
                            </p>
                            <div class="flex items-center mt-auto pt-4 border-t border-gray-100">
                                <img src="https://api.dicebear.com/9.x/adventurer/svg?seed=random" alt="Filidyo" class="w-12 h-12 rounded-full mr-4 border-2 border-red-100">
                                <div>
                                    <h4 class="font-bold text-gray-900 font-serif">Filidyo Bramanta</h4>
                                    <p class="text-xs text-red-600 font-semibold uppercase tracking-wider">Cab. Jemursari</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide h-auto">
                        <div class="bg-white/90 backdrop-blur-sm rounded-3xl shadow-lg p-8 text-left hover:shadow-2xl transition-all duration-300 border border-stone-100 h-full flex flex-col">
                            <div class="flex text-yellow-400 mb-4 text-lg">★★★★★</div>
                            <p class="text-gray-600 mb-6 italic flex-grow leading-relaxed">
                                "Layanan satset dan super ramah. Mushola luass, bisa shalat jamaah. Ruangan vip tersedia karaoke, mantab buat seru-seruan."
                            </p>
                            <div class="flex items-center mt-auto pt-4 border-t border-gray-100">
                                <img src="https://api.dicebear.com/9.x/adventurer/svg?seed=hello" alt="Tri" class="w-12 h-12 rounded-full mr-4 border-2 border-red-100">
                                <div>
                                    <h4 class="font-bold text-gray-900 font-serif">M. Junianto Tri</h4>
                                    <p class="text-xs text-red-600 font-semibold uppercase tracking-wider">Cab. Ketintang</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="swiper-pagination mt-8"></div>
            </div>

            <div class="mt-4">
                <a href="https://www.google.com/search?sca_esv=4187ba88c2f9f7bf&rlz=1C1VDKB_enID1074ID1074&sxsrf=AE3TifMnpF_djMmZK-QL_o3FYBDL9AIzzg:1764599739296&si=AMgyJEtREmoPL4P1I5IDCfuA8gybfVI2d5Uj7QMwYCZHKDZ-EwGdZNjg8M0eKZV9T9KR-tmIMXpuW8GXdQ7gOO2u7lywK6Pg0oiYyc3yvF9MHnxkpUC1raacRcyyTDf9QS4bRIL7ztCddfL5-gyXc4NryMITQKM0xw%3D%3D&q=Resto+Joss+Gandos+Ulasan&sa=X&ved=2ahUKEwjqsoalzpyRAxWmwzgGHeA6DXoQ0bkNegQILBAE&cshid=1764599756353020&biw=1536&bih=730&dpr=1.13" 
                   target="_blank" 
                   rel="noopener noreferrer" 
                   class="inline-flex items-center justify-center gap-2 px-8 py-3 text-base font-semibold text-white transition-all duration-300 bg-red-700 rounded-full hover:bg-red-800 hover:shadow-lg hover:-translate-y-1 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                    
                    <svg class="w-5 h-5 bg-white rounded-full p-0.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M23.52 12.3c0-.85-.08-1.68-.22-2.48H12v4.7h6.46c-.28 1.48-1.12 2.74-2.38 3.58v2.98h3.86c2.26-2.08 3.56-5.14 3.56-8.78z" fill="#4285F4"/>
                        <path d="M12 24c3.24 0 5.96-1.07 7.94-2.9l-3.86-2.98c-1.07.72-2.44 1.14-4.08 1.14-3.13 0-5.78-2.12-6.73-4.96H1.27v3.12C3.23 21.32 7.33 24 12 24z" fill="#34A853"/>
                        <path d="M5.27 14.3c-.24-.71-.38-1.47-.38-2.26s.14-1.55.38-2.26V6.66H1.27C.46 8.28 0 10.09 0 12c0 1.91.46 3.72 1.27 5.34l4-3.04z" fill="#FBBC05"/>
                        <path d="M12 4.78c1.76 0 3.34.6 4.58 1.79l3.43-3.44C17.96 1.17 15.24 0 12 0 7.33 0 3.23 2.68 1.27 6.66l4 3.04c.95-2.84 3.6-4.96 6.73-4.96z" fill="#EA4335"/>
                    </svg>
                    
                    <span>Lihat Ulasan Selengkapnya</span>
                </a>
            </div>

        </div>
    </section>

    <section id="cta" class="relative z-10 py-24 fade-section opacity-0 translate-y-10 transition-all duration-1000">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">  
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <div class="max-w-4xl mx-auto">
                    <h2 class="text-3xl md:text-5xl font-serif font-bold text-gray-800 mb-6">
                        <span class="block text-red-600">Siap Merasakan<br>Pengalaman Kuliner Terbaik?</span>
                    </h2>
                    <p class="text-xl text-gray-700 mb-12 max-w-2xl mx-auto">
                        Bergabunglah dengan ribuan pelanggan yang telah merasakan kelezatan hidangan istimewa kami. Pesan dan reservasi sekarang!
                    </p>
                    
                    <div class="flex flex-col sm:flex-row gap-6 justify-center items-center mb-2">
                        
                        <a href="https://lynk.id/jossgandosjemursari?fbclid=PAZXh0bgNhZW0CMTEAAadQ6oTKFFIRWah1S61m679zrmcp1eix-Bj08ymumVluAy3KdT2S4PB0lFcBCw_aem_8hjvEIZZbU59qtZkbiMPaQ" 
                          class="bg-white text-red-600 px-10 py-4 rounded-full font-bold text-lg hover:bg-gray-50 hover-lift shadow-xl transform hover:scale-105 transition-all duration-300 inline-block border-2 border-red-600">
                          Pesan Sekarang
                        </a>

                        <a href="/reservation" 
                          class="bg-red-600 text-white px-10 py-4 rounded-full font-bold text-lg hover:bg-red-700 hover-lift shadow-xl transform hover:scale-105 transition-all duration-300 inline-block border-2 border-white">
                          Reservasi Sekarang
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </section>
  </main>

    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <script>
      var swiper = new Swiper(".testimonialSwiper", {
        loop: true,
        autoplay: {
          delay: 4000,
          disableOnInteraction: false,
        },
        slidesPerView: 1,
        spaceBetween: 30, 
        breakpoints: {
          768: {
            slidesPerView: 2,
            spaceBetween: 40,
          },
          1024: {
            slidesPerView: 3,
            spaceBetween: 40,
          }
        },
        pagination: {
          el: ".swiper-pagination",
          clickable: true,
          dynamicBullets: true, 
        },
      });

      // Fade In Animation
      document.addEventListener("DOMContentLoaded", () => {
        const sections = document.querySelectorAll(".fade-section");

        const observer = new IntersectionObserver((entries, obs) => {
          entries.forEach(entry => {
            if (entry.isIntersecting) {
              entry.target.classList.remove("opacity-0", "translate-y-10");
              entry.target.classList.add("opacity-100", "translate-y-0");
              obs.unobserve(entry.target); 
            }
          });
        }, { threshold: 0.15 });

        sections.forEach(section => {
          observer.observe(section);
        });
      });
    </script>

</x-layout>