<x-layout>
    
    <style>
        /* Hide Scrollbar */
        main::-webkit-scrollbar { display: none; }
        main { -ms-overflow-style: none; scrollbar-width: none; }
        .text-shadow-strong { text-shadow: 2px 2px 8px rgba(0,0,0,0.6); }
        .glass-card { background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); }
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
                <p class="text-lg text-gray-600 max-w-2xl mx-auto font-light italic">
                    "Dari dapur kami ke hati Anda, menyajikan kehangatan dalam setiap suapan."
                </p>
            </div>
        </section>

        <section class="relative z-10 pb-20 fade-section opacity-0 translate-y-10 transition-all duration-1000 delay-100">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="relative w-full overflow-hidden rounded-[3rem] shadow-2xl">
                    <div id="carousel" class="flex transition-transform duration-700 ease-in-out">
                        @forelse ($carouselMenus as $menu)
                            <div class="relative min-w-full">
                                <div class="relative h-[450px] md:h-[600px]">
                                    <img src="{{ asset($menu->image_path) }}" alt="{{ $menu->title }}" class="w-full h-full object-cover">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/30 to-transparent"></div>
                                </div>
                                <div class="absolute bottom-0 left-0 w-full p-8 md:p-16">
                                    <div class="border-l-4 border-red-600 pl-6 transform translate-y-0 transition-all duration-500">
                                        <h3 class="text-white font-serif font-bold text-4xl md:text-6xl mb-3 drop-shadow-lg leading-tight">
                                            {{ $menu->title }}
                                        </h3>
                                        <p class="text-gray-200 text-base md:text-xl font-light max-w-2xl leading-relaxed">
                                            {{ $menu->description ?? 'Nikmati kelezatan tiada tara dengan bumbu rahasia keluarga.' }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="relative min-w-full h-[450px] bg-gray-200 flex items-center justify-center">
                                <p class="text-gray-500 italic">Menu belum tersedia.</p>
                            </div>
                        @endforelse
                    </div>

                    <button onclick="prevSlide()" class="absolute top-1/2 left-6 -translate-y-1/2 bg-black/20 backdrop-blur-md hover:bg-red-600 hover:text-white text-white p-4 rounded-full shadow-lg transition-all border border-white/20 group-hover:scale-110">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" /></svg>
                    </button>
                    <button onclick="nextSlide()" class="absolute top-1/2 right-6 -translate-y-1/2 bg-black/20 backdrop-blur-md hover:bg-red-600 hover:text-white text-white p-4 rounded-full shadow-lg transition-all border border-white/20 group-hover:scale-110">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" /></svg>
                    </button>
                </div>
            </div>
        </section>

        <section class="relative z-10 pb-24 fade-section opacity-0 translate-y-10 transition-all duration-1000">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-center gap-4 mb-12">
                    <div class="h-px w-12 bg-gray-400"></div>
                    <h2 class="text-3xl font-serif font-bold text-gray-800">Menu Rekomendasi</h2>
                    <div class="h-px w-12 bg-gray-400"></div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                    @forelse($specialMenus as $menu)
                        <div class="group glass-card rounded-[2.5rem] shadow-xl hover:shadow-2xl transition-all duration-500 hover:-translate-y-3 border border-white/50 relative overflow-hidden">
                            <div class="overflow-hidden h-72 w-full rounded-t-[2.5rem] relative">
                                <img src="{{ asset($menu->image_path) }}" alt="{{ $menu->title }}" 
                                     class="w-full h-full object-cover transform transition-transform duration-700 group-hover:scale-110">
                                <div class="absolute top-4 right-4 bg-red-600 text-white text-xs font-bold px-3 py-1 rounded-full shadow-md">
                                    FAVORIT
                                </div>
                            </div>
                            <div class="p-8 text-center relative">
                                <h3 class="text-2xl font-serif font-bold text-gray-800 mb-3 group-hover:text-red-700 transition-colors">
                                    {{ $menu->title }}
                                </h3>
                                <div class="w-12 h-1 bg-gray-200 mx-auto rounded-full mb-4 group-hover:bg-red-400 transition-colors"></div>
                                <p class="text-gray-600 text-sm leading-relaxed line-clamp-3">
                                    {{ $menu->description ?? 'Kombinasi rasa yang sempurna untuk momen spesial Anda.' }}
                                </p>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-3 text-center py-10 bg-white/50 rounded-3xl">
                            <p class="text-gray-500">Menu spesial sedang disiapkan.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>

        <section class="relative z-10 py-6 fade-section opacity-0 translate-y-10 transition-all duration-1000">
            <div class="max-w-4xl mx-auto px-4 sm:px-6">
                
                <div class="text-center mb-16">
                    <span class="text-red-600 font-bold tracking-widest uppercase text-xs">Penawaran Terbaik</span>
                    <h2 class="text-4xl md:text-5xl font-serif font-bold text-gray-800 mt-2">Paket & Layanan</h2>
                    <p class="text-gray-500 mt-4">Solusi praktis untuk acara kecil hingga resepsi besar.</p>
                </div>

                <div class="flex flex-col gap-12 items-center">
                    
                    <div class="w-full space-y-16">
                        <div class="relative rounded-[2rem] overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:scale-[1.02]">
                            <img src="img/menu/package1.png" alt="Paket Ceria" class="w-full h-auto object-cover">
                        </div>
                        
                        <div class="relative rounded-[2rem] overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:scale-[1.02]">
                            <img src="img/menu/package2.png" alt="Paket Joss Rombongan" class="w-full h-auto object-cover">
                        </div>

                        <div class="relative rounded-[2rem] overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:scale-[1.02]">
                            <img src="img/menu/package3.png" alt="Paket Joss Spesial" class="w-full h-auto object-cover">
                        </div>
                    </div>

                    <div class="flex items-center gap-4 py-4 w-full justify-center opacity-50">
                        <div class="h-px bg-gray-400 w-1/4"></div>
                        <span class="text-gray-500 font-serif italic text-lg">Juga tersedia</span>
                        <div class="h-px bg-gray-400 w-1/4"></div>
                    </div>

                    <div class="w-full relative rounded-[2rem] overflow-hidden shadow-xl hover:shadow-orange-200/50 hover:shadow-2xl transition-all duration-300 transform hover:scale-[1.02]">
                        <img src="img/menu/boxpackage.png" alt="Paket Box" class="w-full h-auto object-cover">
                    </div>

                    <div class="flex flex-col items-center justify-center pt-12 pb-2 w-full">
                        <h3 class="text-3xl font-serif font-bold text-gray-800">Wedding Package</h3>
                        <div class="h-1 bg-red-600 w-16 rounded-full mt-2"></div>
                    </div>
                    <div class="w-full space-y-16">
                        <div class="relative rounded-[2rem] overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-300">
                            <img src="img/menu/weddingpack1.png" alt="Wedding Package 1" class="w-full h-auto object-cover">
                        </div>

                        <div class="relative rounded-[2rem] overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-300">
                            <img src="img/menu/weddingpack2.png" alt="Wedding Package 2" class="w-full h-auto object-cover">
                        </div>

                        <div class="relative rounded-[2rem] overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-300">
                            <img src="img/menu/weddingpack3.png" alt="Wedding Package 3" class="w-full h-auto object-cover">
                        </div>
                        <div></div>
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
        let slideInterval;

        function updateSlide() {
            const translateX = -(index * 100);
            carousel.style.transform = `translateX(${translateX}%)`;
        }

        function nextSlide() {
            index = (index + 1) % totalSlides;
            updateSlide();
            resetTimer(); 
        }

        function prevSlide() {
            index = (index - 1 + totalSlides) % totalSlides;
            updateSlide();
            resetTimer(); 
        }

        function startTimer() {
            slideInterval = setInterval(nextSlide, 5000); 
        }

        function resetTimer() {
            clearInterval(slideInterval);
            startTimer();
        }

        // --- FADE ANIMATION ---
        document.addEventListener("DOMContentLoaded", () => {
            if(totalSlides > 0) startTimer();

            const sections = document.querySelectorAll(".fade-section");
            const observer = new IntersectionObserver((entries, obs) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.remove("opacity-0", "translate-y-10");
                        entry.target.classList.add("opacity-100", "translate-y-0");
                        obs.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.1 }); 
            sections.forEach(section => observer.observe(section));
        });
    </script>

</x-layout>