<x-layout>
    
    <style>
        /* Hide Scrollbar */
        main::-webkit-scrollbar { display: none; }
        main { -ms-overflow-style: none; scrollbar-width: none; }
        .text-shadow-strong { text-shadow: 2px 2px 6px rgba(0,0,0,0.4); }
    </style>

    <main class="pt-20 min-h-screen bg-batik bg-fixed bg-cover bg-center bg-no-repeat relative w-full overflow-x-hidden font-sans">
        
        <div class="absolute inset-0 w-full h-full bg-stone-100/60 pointer-events-none z-0"></div>

        <section class="relative z-10 py-12 text-center fade-section opacity-0 translate-y-10 transition-all duration-1000">
            <div class="max-w-4xl mx-auto px-4">
                <span class="uppercase tracking-widest text-red-600 font-bold text-sm mb-2 block animate-pulse">Cita Rasa Autentik</span>
                <h1 class="text-5xl md:text-6xl font-serif font-bold text-gray-800 mb-4 drop-shadow-sm">
                    Menu <span class="text-red-700">Kami</span>
                </h1>
                <div class="h-1.5 w-24 bg-gradient-to-r from-red-500 to-yellow-400 mx-auto rounded-full mb-6"></div>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto font-light">
                    Jelajahi ragam hidangan spesial yang kami racik dengan bumbu pilihan dan penuh cinta.
                </p>
            </div>
        </section>

        <section class="relative z-10 pb-16 fade-section opacity-0 translate-y-10 transition-all duration-1000 delay-100">
            <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <div class="relative w-full overflow-hidden rounded-[2.5rem] shadow-2xl bg-white group">
                    
                    <div id="carousel" class="flex transition-transform duration-700 ease-in-out">
                        @forelse ($carouselMenus as $menu)
                            <div class="relative min-w-full">
                                <div class="relative h-[400px] md:h-[550px]">
                                    <img src="{{ asset($menu->image_path) }}" alt="{{ $menu->title }}" class="w-full h-full object-cover">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                                </div>

                                <div class="absolute bottom-0 left-0 w-full p-8 md:p-12 text-center md:text-left">
                                    <h3 class="text-white font-serif font-bold text-3xl md:text-5xl mb-2 drop-shadow-lg">
                                        {{ $menu->title }}
                                    </h3>
                                    <p class="text-gray-200 text-sm md:text-lg font-light max-w-2xl">
                                        {{ $menu->description ?? 'Nikmati kelezatan tiada tara.' }}
                                    </p>
                                </div>
                            </div>
                        @empty
                            <div class="relative min-w-full h-[400px] bg-gray-200 flex items-center justify-center">
                                <p class="text-gray-500">Menu belum tersedia.</p>
                            </div>
                        @endforelse
                    </div>

                    <button onclick="prevSlide()" class="absolute top-1/2 left-4 -translate-y-1/2 bg-white/20 backdrop-blur-md hover:bg-white text-white hover:text-red-600 p-3 rounded-full shadow-lg transition-all border border-white/30">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" /></svg>
                    </button>
                    <button onclick="nextSlide()" class="absolute top-1/2 right-4 -translate-y-1/2 bg-white/20 backdrop-blur-md hover:bg-white text-white hover:text-red-600 p-3 rounded-full shadow-lg transition-all border border-white/30">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" /></svg>
                    </button>

                </div>
            </div>
        </section>

        <section class="relative z-10 pb-20 fade-section opacity-0 translate-y-10 transition-all duration-1000">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <div class="text-center mb-10">
                    <h2 class="text-3xl font-serif font-bold text-gray-800 mb-2">Menu Spesial</h2>
                    <div class="h-1 w-16 bg-red-600 mx-auto rounded-full"></div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @forelse($specialMenus as $menu)
                        <div class="group bg-white rounded-[2rem] shadow-lg hover:shadow-2xl transition-all duration-300 p-4 border border-gray-100">
                            <div class="overflow-hidden rounded-[1.5rem] mb-4 h-60">
                                <img src="{{ asset($menu->image_path) }}" alt="{{ $menu->title }}" 
                                     class="w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-110">
                            </div>
                            <div class="text-center px-2 pb-4">
                                <h3 class="text-xl font-bold text-gray-800 mb-2 font-serif">{{ $menu->title }}</h3>
                                <p class="text-gray-600 text-sm line-clamp-2">{{ $menu->description ?? 'Deskripsi menu spesial.' }}</p>
                            </div>
                        </div>
                    @empty
                        <p class="col-span-3 text-center text-gray-500">Menu spesial belum ditambahkan.</p>
                    @endforelse
                </div>
            </div>
        </section>

        <section class="relative z-10 py-16 bg-stone-100/60 pointer-events-none fade-section opacity-0 translate-y-10 transition-all duration-1000">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <div class="text-center mb-12">
                    <span class="text-red-600 font-bold tracking-widest uppercase text-xs">Best Deals</span>
                    <h2 class="text-4xl font-serif font-bold text-gray-800 mt-1">Pilihan Paket Menu</h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
                    
                    <div class="relative rounded-[2.5rem] overflow-hidden shadow-xl group hover:shadow-2xl transition-all duration-300">
                        <img src="img/menu/package1.png" alt="Paket Ceria" class="w-full h-auto object-cover">
                    </div>

                    <div class="relative rounded-[2.5rem] overflow-hidden shadow-xl group hover:shadow-2xl transition-all duration-300">
                        <img src="img/menu/package2.png" alt="Paket Joss Rombongan" class="w-full h-auto object-cover">
                    </div>

                </div>

                <div class="max-w-4xl mx-auto mb-12">
                    <div class="relative rounded-[2.5rem] overflow-hidden shadow-2xl group hover:shadow-red-200 transition-all duration-300">
                        <img src="img/menu/package3.png" alt="Paket Joss Spesial" class="w-full h-auto object-cover">
                    </div>
                </div>

                <div class="max-w-4xl mx-auto mb-20">
                    <div class="relative rounded-[2.5rem] overflow-hidden shadow-2xl group hover:shadow-orange-200 transition-all duration-300">
                        <img src="img/menu/boxpackage.png" alt="Paket Box" class="w-full h-auto object-cover">
                    </div>
                </div>

                <div class="pt-8 border-t border-gray-200">
                    <div class="text-center mb-10">
                        <h2 class="text-4xl font-serif font-bold text-gray-800 mb-2">Wedding Package</h2>
                        <p class="text-gray-500">Wujudkan pernikahan impian dengan hidangan istimewa</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="relative rounded-[2rem] overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 group">
                            <img src="img/menu/weddingpack1.png" alt="Wedding Package 1" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                        </div>

                        <div class="relative rounded-[2rem] overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 group">
                            <img src="img/menu/weddingpack2.png" alt="Wedding Package 2" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                        </div>

                        <div class="relative rounded-[2rem] overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 group">
                            <img src="img/menu/weddingpack3.png" alt="Wedding Package 3" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </main>

    <script>
        // --- CAROUSEL LOGIC ---
        const carousel = document.getElementById('carousel');
        const totalSlides = carousel.children.length;
        let index = 0;

        function updateSlide() {
            const translateX = -(index * 100);
            carousel.style.transform = `translateX(${translateX}%)`;
        }

        function nextSlide() {
            index = (index + 1) % totalSlides;
            updateSlide();
        }

        function prevSlide() {
            index = (index - 1 + totalSlides) % totalSlides;
            updateSlide();
        }

        // --- FADE ANIMATION ---
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
            sections.forEach(section => observer.observe(section));
        });
    </script>

</x-layout>