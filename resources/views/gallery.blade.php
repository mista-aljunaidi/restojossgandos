<x-layout>
    
    <style>
        main::-webkit-scrollbar { display: none; }
        main { -ms-overflow-style: none; scrollbar-width: none; }
        .text-shadow-strong { text-shadow: 2px 2px 6px rgba(0,0,0,0.5); }
    </style>

    <main class="pt-20 min-h-screen bg-batik bg-fixed bg-cover bg-center bg-no-repeat relative w-full overflow-x-hidden font-sans">
        
        <div class="absolute inset-0 w-full h-full bg-stone-100/60 pointer-events-none z-0"></div>

        <section class="relative z-10 py-12 text-center fade-section opacity-0 translate-y-10 transition-all duration-1000">
            <div class="max-w-4xl mx-auto px-4">
                <span class="uppercase tracking-widest text-red-600 font-bold text-sm mb-2 block">Dokumentasi</span>
                <h1 class="text-5xl md:text-6xl font-serif font-bold text-gray-800 mb-4 drop-shadow-sm">
                    Galeri <span class="text-red-700">Kami</span>
                </h1>
                <div class="h-1.5 w-24 bg-gradient-to-r from-red-500 to-yellow-400 mx-auto rounded-full mb-6"></div>
                <p class="text-lg md:text-xl text-gray-800 max-w-2xl mx-auto font-light">
                    Kumpulan momen kebersamaan dan hidangan spesial yang telah kami sajikan.
                </p>
            </div>
        </section>

        <section class="relative z-10 pb-20 fade-section opacity-0 translate-y-10 transition-all duration-1000 delay-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <div class="flex justify-center gap-4 mb-8 flex-wrap">
                    <button class="px-4 py-2 rounded-full bg-red-600 text-white hover:bg-red-700 filter-btn shadow-md transition-all" data-filter="all">All</button>
                    <button class="px-4 py-2 rounded-full bg-white text-gray-600 hover:bg-red-50 hover:text-red-600 border border-gray-200 filter-btn shadow-sm transition-all" data-filter="food">Food</button>
                    <button class="px-4 py-2 rounded-full bg-white text-gray-600 hover:bg-red-50 hover:text-red-600 border border-gray-200 filter-btn shadow-sm transition-all" data-filter="customer">Customer</button>
                    <button class="px-4 py-2 rounded-full bg-white text-gray-600 hover:bg-red-50 hover:text-red-600 border border-gray-200 filter-btn shadow-sm transition-all" data-filter="event">Event</button>
                </div>

                <div id="gallery-grid" class="group/gallery grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                    @forelse ($photos as $photo)
                        <div class="card group/card relative overflow-hidden rounded-2xl category-{{ strtolower($photo->category) }}">
                            
                            <img src="{{ asset($photo->image_path) }}" alt="{{ $photo->title }}"
                                class="w-full h-64 object-cover transition duration-500
                                        group-has-[.card:hover]/gallery:blur-[2px] group-has-[.card:hover]/gallery:brightness-75 group-has-[.card:hover]/gallery:scale-[.98]
                                        group-hover/card:!blur-0 group-hover/card:!brightness-100 group-hover/card:!scale-100">
                            
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-0 group-hover/card:opacity-100 transition-opacity duration-500"></div>

                            <div class="pointer-events-none absolute bottom-0 left-0 w-full p-6 translate-y-4 opacity-0 transition-all duration-500
                                        group-hover/card:opacity-100 group-hover/card:translate-y-0">
                                
                                <span class="inline-block py-1 px-3 rounded-full bg-red-600 text-white text-[10px] font-bold tracking-widest uppercase mb-2 shadow-sm">
                                    {{ $photo->category }}
                                </span>
                                
                                <h3 class="text-white font-serif font-bold text-2xl leading-tight drop-shadow-md">
                                    {{ $photo->title }}
                                </h3>
                            </div>
                        </div>
                    @empty
                        <p class="col-span-full text-center text-gray-500 italic">Belum ada foto.</p>
                    @endforelse
                </div>
            </div>
        </section>

        <section class="relative z-10 pb-16 fade-section opacity-0 translate-y-10 transition-all duration-1000">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="relative rounded-[2.5rem] overflow-hidden shadow-2xl group">
                    <img src="img/gallery/livemusic.png" alt="Live Music Joss Gandos" 
                         class="w-full h-auto object-contain">
                </div>
            </div>
        </section>

        <section class="relative z-10 pb-24 fade-section opacity-0 translate-y-10 transition-all duration-1000">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                
                <div class="text-center mb-10">
                    <h2 class="text-4xl font-serif font-bold text-gray-800 mb-3">Momen Spesial</h2>
                    <div class="h-1 w-20 bg-red-600 mx-auto rounded-full"></div>
                </div>

                <div class="flex flex-col gap-10">
                    <div class="relative rounded-[2.5rem] overflow-hidden shadow-xl group hover:shadow-2xl transition-shadow duration-300">
                        <img src="img/gallery/wedding.png" alt="Wedding Event" class="w-full h-auto object-contain">
                    </div>

                    <div class="relative rounded-[2.5rem] overflow-hidden shadow-xl group hover:shadow-2xl transition-shadow duration-300">
                        <img src="img/gallery/engagement.png" alt="Engagement Event" class="w-full h-auto object-contain">
                    </div>

                    <div class="relative rounded-[2.5rem] overflow-hidden shadow-xl group hover:shadow-2xl transition-shadow duration-300">
                        <img src="img/gallery/birthdayparty.png" alt="Birthday Event" class="w-full h-auto object-contain">
                    </div>

                    <div class="relative rounded-[2.5rem] overflow-hidden shadow-xl group hover:shadow-2xl transition-shadow duration-300">
                        <img src="img/gallery/reuni.png" alt="Reunion Event" class="w-full h-auto object-contain">
                    </div>

                    <div class="relative rounded-[2.5rem] overflow-hidden shadow-xl group hover:shadow-2xl transition-shadow duration-300">
                        <img src="img/gallery/comunity.png" alt="Community Event" class="w-full h-auto object-contain">
                    </div>
                </div>
            </div>
        </section>

    </main>

    <script>
        const buttons = document.querySelectorAll('.filter-btn');
        const items = document.querySelectorAll('#gallery-grid > div');

        buttons.forEach(btn => {
            btn.addEventListener('click', () => {
                const filter = btn.getAttribute('data-filter');
                buttons.forEach(b => {
                    b.classList.remove('bg-red-600','text-white');
                    b.classList.add('bg-white','text-gray-600','border-gray-200');
                });
                btn.classList.remove('bg-white','text-gray-600','border-gray-200');
                btn.classList.add('bg-red-600','text-white');

                items.forEach(item => {
                    if (filter === 'all' || item.classList.contains(`category-${filter}`)) {
                        item.classList.remove('hidden');
                    } else {
                        item.classList.add('hidden');
                    }
                });
            });
        });

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