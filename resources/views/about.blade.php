<x-layout>

    <main class="pt-16 min-h-screen">
    <!-- About Page -->
        <div id="about-page" class="page-content">
            <section class="py-6 md:py-10 fade-section opacity-0 translate-y-10 transition-all duration-1000">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-6 md:mb-8">
                    <h1 class="text-4xl font-bold text-gray-600 mb-4 text-shadow-strong">Tentang Kami</h1>
                    <p class="text-gray-900 max-w-3xl mx-auto">
                    Perjalanan kami dalam menghadirkan cita rasa terbaik untuk Anda
                    </p>
                </div>
                <style>
                    .text-shadow-strong {
                    text-shadow: 2px 2px 6px rgba(0,0,0,0.25);
                    }
                </style>

                <div class="grid md:grid-cols-2 gap-6 md:gap-10 items-start">
                <!-- Sejarah Kami -->
                <div class="bg-gray-100 p-6 md:p-8 rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300">
                    <h2 class="text-2xl font-bold text-dark mb-3">Sejarah Kami</h2>
                    <p class="text-gray-900 mb-4">
                    Resto Joss Gandos didirikan pada tahun 2015 dengan visi menghadirkan pengalaman kuliner yang tak terlupakan. 
                    Dimulai dari sebuah warung kecil, kini kami telah berkembang menjadi restoran yang dikenal luas di kota.
                    </p>
                    <p class="text-gray-900">
                    Dengan komitmen pada kualitas dan inovasi, kami terus mengembangkan resep-resep autentik yang 
                    memadukan cita rasa tradisional dengan sentuhan modern.
                    </p>
                </div>

                <!-- Visi & Misi -->
                <div class="bg-gray-100 p-6 md:p-8 rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300">
                    <h3 class="text-2xl font-bold text-dark mb-3">Visi & Misi</h3>
                    <div class="mb-4 md:mb-5">
                    <h4 class="font-semibold text-dark mb-2">Visi</h4>
                    <p class="text-gray-900">
                        Menjadi restoran pilihan utama yang menghadirkan pengalaman kuliner berkualitas tinggi dengan suasana yang nyaman dan ramah.
                    </p>
                    </div>
                    <div>
                    <h4 class="font-semibold text-dark mb-2">Misi</h4>
                    <ul class="text-gray-900 space-y-1.5 md:space-y-2">
                        <li>• Menyajikan makanan berkualitas dengan bahan-bahan segar</li>
                        <li>• Memberikan pelayanan terbaik kepada setiap pelanggan</li>
                        <li>• Menciptakan suasana yang nyaman untuk berkumpul</li>
                        <li>• Terus berinovasi dalam menu dan pelayanan</li>
                    </ul>
                    </div>
                </div>
                </div>
            </div>
            </section>

            <!-- Founder Section -->
            <section class="py-6 md:py-10 fade-section opacity-0 translate-y-10 transition-all duration-1000">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="grid md:grid-cols-2 gap-6 md:gap-10 items-center">
                    
                    <!-- Bagian Gambar dengan Bingkai -->
                    <div class="relative flex items-center justify-center">
                    <!-- Bingkai dengan gradasi merah ke kuning -->
                    <div class="bg-gradient-to-br from-red-500 via-red-400 to-yellow-300 rounded-3xl p-4">
                        <img src="img/about/founder.jpg" alt="Founder Resto Joss Gandos" 
                            class="w-full h-full object-cover rounded-2xl shadow-2xl">
                    </div>
                    <!-- Decorative elements -->
                    <div class="absolute -top-14 -right-0.5 w-32 h-32 bg-red-500 rounded-full opacity-20"></div>
                    <div class="absolute -bottom-8 -left-4 w-32 h-32 bg-yellow-400 rounded-full opacity-20"></div>
                    </div>

                    <!-- Bagian Teks dengan Background Putih -->
                    <div class="bg-gray-100 p-6 rounded-lg shadow-md text-center hover:shadow-xl transition-shadow duration-300">
                        <h2 class="text-3xl font-bold text-gray-900 mb-4">
                        Pendiri Resto Joss Gandos
                        </h2>
                        <p class="text-gray-900 mb-4">
                        Didirikan oleh <span class="font-semibold">Pak Sis</span> pada tahun 2015, 
                        Resto Joss Gandos lahir dari kecintaan mendalam terhadap kuliner Nusantara. 
                        Dengan dedikasi penuh, beliau merintis usaha ini dari warung kecil hingga menjadi 
                        restoran yang dikenal luas karena cita rasa autentik dan pelayanan terbaik.
                        </p>
                        <p class="text-gray-900">
                        Filosofi beliau sederhana: <em>"Masakan yang baik lahir dari hati yang tulus"</em>. 
                        Nilai inilah yang menjadi fondasi setiap hidangan yang kami sajikan untuk Anda.
                        </p>
                    </div>
                    </div>
                </div>
            </section>

            <!-- Team Section -->
            <section class="py-6 md:py-10 bg-secondary fade-section opacity-0 translate-y-10 transition-all duration-1000">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center mb-6 md:mb-8">
                    <h2 class="text-3xl font-bold text-gray-600 mb-4 text-shadow-strong">Tim Kami</h2>
                        <p class="text-gray-900">Berkenalan dengan orang-orang dibalik kesuksesan Resto Joss Gandos</p>
                    </div>
                    <style>
                        .text-shadow-strong {
                        text-shadow: 2px 2px 6px rgba(0,0,0,0.25);
                        }
                    </style>
                    
                    <div class="grid md:grid-cols-3 gap-6 lg:gap-8">
                        <div class="text-center bg-gray-100 p-6 rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300">
                        <div class="w-32 h-32 mx-auto mb-4 flex items-center justify-center perspective">
                            <img src="img/about/mista.jpg" alt="Founder Resto Joss Gandos"
                            class="rounded-full shadow-lg w-full h-full object-cover transform transition-transform duration-500 hover:rotate-y-12 hover:-rotate-x-6 hover:scale-105">
                        </div>
                            <h3 class="text-xl font-semibold text-dark">Chef Budi</h3>
                            <p class="text-gray-900">Head Chef</p>
                        </div>
                        
                        <div class="text-center bg-gray-100 p-6 rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300">
                        <div class="w-32 h-32 mx-auto mb-4 flex items-center justify-center perspective">
                            <img src="img/about/sari.jpg" alt="Founder Resto Joss Gandos"
                            class="rounded-full shadow-lg w-full h-full object-cover transform transition-transform duration-500 hover:rotate-y-12 hover:-rotate-x-6 hover:scale-105">
                        </div>
                            <h3 class="text-xl font-semibold text-dark">Sari</h3>
                            <p class="text-gray-900">Restaurant Manager</p>
                        </div>
                        
                        <div class="text-center bg-gray-100 p-6 rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300">
                        <div class="w-32 h-32 mx-auto mb-4 flex items-center justify-center perspective">
                            <img src="img/about/jojolion.jpg" alt="Founder Resto Joss Gandos"
                            class="rounded-full shadow-lg w-full h-full object-cover transform transition-transform duration-500 hover:rotate-y-12 hover:-rotate-x-6 hover:scale-105">
                        </div>
                            <h3 class="text-xl font-semibold text-dark">Andi</h3>
                            <p class="text-gray-900">Service Manager</p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>

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

</x-layout>