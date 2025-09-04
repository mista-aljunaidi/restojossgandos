<x-layout>
    
<main class="pt-16 min-h-screen font-sans ">
    <!-- GALLERY PAGE -->
    <section class="py-8 fade-section opacity-100 translate-y-10 transition-all duration-1000">
    <h2 class="text-4xl font-bold text-center text-gray-600 mb-8">Galeri Kami</h2>

    {{-- Ambience Slider --}}
    <section class="relative w-full h-[600px] overflow-hidden">
        <div class="absolute inset-0 flex transition-transform duration-700" id="slider">
            <img src="{{ asset('img/ambience1.jpg') }}" class="w-full object-cover flex-shrink-0" alt="Ambience 1">
            <img src="{{ asset('img/ambience2.jpg') }}" class="w-full object-cover flex-shrink-0" alt="Ambience 2">
            <img src="{{ asset('img/ambience3.jpg') }}" class="w-full object-cover flex-shrink-0" alt="Ambience 3">
        </div>
    </section>

    {{-- Filter --}}
    <section class="max-w-6xl mx-auto px-4 py-8">
        <div class="flex justify-center gap-4 mb-8">
            <button class="px-4 py-2 rounded-full bg-red-500 text-white hover:bg-gray-300 filter-btn" data-filter="all">All</button>
            <button class="px-4 py-2 rounded-full bg-gray-200 hover:bg-gray-300 filter-btn" data-filter="food">Food</button>
            <button class="px-4 py-2 rounded-full bg-gray-200 hover:bg-gray-300 filter-btn" data-filter="customer">Customer</button>
            <button class="px-4 py-2 rounded-full bg-gray-200 hover:bg-gray-300 filter-btn" data-filter="event">Event</button>
        </div>

        {{-- Gallery Grid --}}
        <div id="gallery-grid" class="group/gallery grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @forelse ($photos as $photo)
                <div class="card group/card relative overflow-hidden rounded-2xl category-{{ strtolower($photo->category) }}">
                    <img src="{{ asset($photo->image_path) }}" alt="{{ $photo->title }}"
                        class="w-full h-64 object-cover transition duration-500
                                group-has-[.card:hover]/gallery:blur-[2px] group-has-[.card:hover]/gallery:brightness-75 group-has-[.card:hover]/gallery:scale-[.98]
                                group-hover/card:!blur-0 group-hover/card:!brightness-100 group-hover/card:!scale-100">
                    <div class="pointer-events-none absolute top-4 left-4 opacity-0 translate-y-4 transition-all duration-500
                                group-hover/card:opacity-100 group-hover/card:translate-y-0">
                        <span class="block text-gray-200/90 text-xs tracking-widest uppercase">{{ $photo->category }}</span>
                        <h3 class="text-gray-200 font-extrabold text-2xl leading-tight drop-shadow">{{ $photo->title }}</h3>
                    </div>
                </div>
            @empty
            @endforelse
            {{-- ===== Food ===== --}}
            <div class="card group/card relative overflow-hidden rounded-2xl category-food">
                <img src="{{ asset('img/bebekgoreng.jpg') }}" alt="Bebek Goreng"
                    class="w-full h-64 object-cover transition duration-500
                            group-has-[.card:hover]/gallery:blur-[2px] group-has-[.card:hover]/gallery:brightness-75 group-has-[.card:hover]/gallery:scale-[.98]
                            group-hover/card:!blur-0 group-hover/card:!brightness-100 group-hover/card:!scale-100">
                <div class="pointer-events-none absolute top-4 left-4 opacity-0 translate-y-4 transition-all duration-500
                            group-hover/card:opacity-100 group-hover/card:translate-y-0">
                <span class="block text-gray-200/90 text-xs tracking-widest uppercase">Food</span>
                <h3 class="text-gray-200 font-extrabold text-2xl leading-tight drop-shadow">Bebek Goreng</h3>
                </div>
            </div>

            <div class="card group/card relative overflow-hidden rounded-2xl category-food">
                <img src="{{ asset('img/gulaikepalasalmon.jpg') }}" alt="Gulai Kepala Salmon"
                    class="w-full h-64 object-cover transition duration-500
                            group-has-[.card:hover]/gallery:blur-[2px] group-has-[.card:hover]/gallery:brightness-75 group-has-[.card:hover]/gallery:scale-[.98]
                            group-hover/card:!blur-0 group-hover/card:!brightness-100 group-hover/card:!scale-100">
                <div class="pointer-events-none absolute top-4 left-4 opacity-0 translate-y-4 transition-all duration-500
                            group-hover/card:opacity-100 group-hover/card:translate-y-0">
                <span class="block text-gray-200/90 text-xs tracking-widest uppercase">Food</span>
                <h3 class="text-gray-200 font-extrabold text-2xl leading-tight drop-shadow">Gulai Kepala Salmon</h3>
                </div>
            </div>

            <div class="card group/card relative overflow-hidden rounded-2xl category-food">
                <img src="{{ asset('img/ayammozarella.jpg') }}" alt="Ayam Mozarella"
                    class="w-full h-64 object-cover transition duration-500
                            group-has-[.card:hover]/gallery:blur-[2px] group-has-[.card:hover]/gallery:brightness-75 group-has-[.card:hover]/gallery:scale-[.98]
                            group-hover/card:!blur-0 group-hover/card:!brightness-100 group-hover/card:!scale-100">
                <div class="pointer-events-none absolute top-4 left-4 opacity-0 translate-y-4 transition-all duration-500
                            group-hover/card:opacity-100 group-hover/card:translate-y-0">
                <span class="block text-gray-200/90 text-xs tracking-widest uppercase">Food</span>
                <h3 class="text-gray-200 font-extrabold text-2xl leading-tight drop-shadow">Ayam Mozarella</h3>
                </div>
            </div>

            <div class="card group/card relative overflow-hidden rounded-2xl category-customer">
                <img src="{{ asset('img/customer1.jpg') }}" alt="Customer 1"
                    class="w-full h-64 object-cover transition duration-500
                            group-has-[.card:hover]/gallery:blur-[2px] group-has-[.card:hover]/gallery:brightness-75 group-has-[.card:hover]/gallery:scale-[.98]
                            group-hover/card:!blur-0 group-hover/card:!brightness-100 group-hover/card:!scale-100">
                <div class="pointer-events-none absolute top-4 left-4 opacity-0 translate-y-4 transition-all duration-500
                            group-hover/card:opacity-100 group-hover/card:translate-y-0">
                <span class="block text-gray-200/90 text-xs tracking-widest uppercase">Customer</span>
                <h3 class="text-gray-200 font-extrabold text-2xl leading-tight drop-shadow">Guest</h3>
                </div>
            </div>

            <div class="card group/card relative overflow-hidden rounded-2xl category-customer">
                <img src="{{ asset('img/customer2.jpg') }}" alt="Customer 2"
                    class="w-full h-64 object-cover transition duration-500
                            group-has-[.card:hover]/gallery:blur-[2px] group-has-[.card:hover]/gallery:brightness-75 group-has-[.card:hover]/gallery:scale-[.98]
                            group-hover/card:!blur-0 group-hover/card:!brightness-100 group-hover/card:!scale-100">
                <div class="pointer-events-none absolute top-4 left-4 opacity-0 translate-y-4 transition-all duration-500
                            group-hover/card:opacity-100 group-hover/card:translate-y-0">
                <span class="block text-gray-200/90 text-xs tracking-widest uppercase">Customer</span>
                <h3 class="text-gray-200 font-extrabold text-2xl leading-tight drop-shadow">Guest</h3>
                </div>
            </div>

            <div class="card group/card relative overflow-hidden rounded-2xl category-customer">
                <img src="{{ asset('img/customer3.jpg') }}" alt="Customer 3"
                    class="w-full h-64 object-cover transition duration-500
                            group-has-[.card:hover]/gallery:blur-[2px] group-has-[.card:hover]/gallery:brightness-75 group-has-[.card:hover]/gallery:scale-[.98]
                            group-hover/card:!blur-0 group-hover/card:!brightness-100 group-hover/card:!scale-100">
                <div class="pointer-events-none absolute top-4 left-4 opacity-0 translate-y-4 transition-all duration-500
                            group-hover/card:opacity-100 group-hover/card:translate-y-0">
                <span class="block text-gray-200/90 text-xs tracking-widest uppercase">Customer</span>
                <h3 class="text-gray-200 font-extrabold text-2xl leading-tight drop-shadow">Guest</h3>
                </div>
            </div>

            <div class="card group/card relative overflow-hidden rounded-2xl category-customer">
                <img src="{{ asset('img/customer4.jpg') }}" alt="Customer 4"
                    class="w-full h-64 object-cover transition duration-500
                            group-has-[.card:hover]/gallery:blur-[2px] group-has-[.card:hover]/gallery:brightness-75 group-has-[.card:hover]/gallery:scale-[.98]
                            group-hover/card:!blur-0 group-hover/card:!brightness-100 group-hover/card:!scale-100">
                <div class="pointer-events-none absolute top-4 left-4 opacity-0 translate-y-4 transition-all duration-500
                            group-hover/card:opacity-100 group-hover/card:translate-y-0">
                <span class="block text-gray-200/90 text-xs tracking-widest uppercase">Customer</span>
                <h3 class="text-gray-200 font-extrabold text-2xl leading-tight drop-shadow">Guest</h3>
                </div>
            </div>

            {{-- ===== Event ===== --}}
            <div class="card group/card relative overflow-hidden rounded-2xl category-event">
                <img src="{{ asset('img/event1.jpg') }}" alt="Birthday"
                    class="w-full h-64 object-cover transition duration-500
                            group-has-[.card:hover]/gallery:blur-[2px] group-has-[.card:hover]/gallery:brightness-75 group-has-[.card:hover]/gallery:scale-[.98]
                            group-hover/card:!blur-0 group-hover/card:!brightness-100 group-hover/card:!scale-100">
                <div class="pointer-events-none absolute top-4 left-4 opacity-0 translate-y-4 transition-all duration-500
                            group-hover/card:opacity-100 group-hover/card:translate-y-0">
                <span class="block text-gray-200/90 text-xs tracking-widest uppercase">Event</span>
                <h3 class="text-gray-200 font-extrabold text-2xl leading-tight drop-shadow">Birthday</h3>
                </div>
            </div>

            <div class="card group/card relative overflow-hidden rounded-2xl category-event">
                <img src="{{ asset('img/event2.jpg') }}" alt="Birthday"
                    class="w-full h-64 object-cover transition duration-500
                            group-has-[.card:hover]/gallery:blur-[2px] group-has-[.card:hover]/gallery:brightness-75 group-has-[.card:hover]/gallery:scale-[.98]
                            group-hover/card:!blur-0 group-hover/card:!brightness-100 group-hover/card:!scale-100">
                <div class="pointer-events-none absolute top-4 left-4 opacity-0 translate-y-4 transition-all duration-500
                            group-hover/card:opacity-100 group-hover/card:translate-y-0">
                <span class="block text-gray-200/90 text-xs tracking-widest uppercase">Event</span>
                <h3 class="text-gray-200 font-extrabold text-2xl leading-tight drop-shadow">Birthday</h3>
                </div>
            </div>

            <div class="card group/card relative overflow-hidden rounded-2xl category-event">
                <img src="{{ asset('img/event3.jpg') }}" alt="Live Music"
                    class="w-full h-64 object-cover transition duration-500
                            group-has-[.card:hover]/gallery:blur-[2px] group-has-[.card:hover]/gallery:brightness-75 group-has-[.card:hover]/gallery:scale-[.98]
                            group-hover/card:!blur-0 group-hover/card:!brightness-100 group-hover/card:!scale-100">
                <div class="pointer-events-none absolute top-4 left-4 opacity-0 translate-y-4 transition-all duration-500
                            group-hover/card:opacity-100 group-hover/card:translate-y-0">
                <span class="block text-gray-200/90 text-xs tracking-widest uppercase">Event</span>
                <h3 class="text-gray-200 font-extrabold text-2xl leading-tight drop-shadow">Live Music</h3>
                </div>
            </div>

            <div class="card group/card relative overflow-hidden rounded-2xl category-event">
                <img src="{{ asset('img/event4.jpg') }}" alt="Birthday"
                    class="w-full h-64 object-cover transition duration-500
                            group-has-[.card:hover]/gallery:blur-[2px] group-has-[.card:hover]/gallery:brightness-75 group-has-[.card:hover]/gallery:scale-[.98]
                            group-hover/card:!blur-0 group-hover/card:!brightness-100 group-hover/card:!scale-100">
                <div class="pointer-events-none absolute top-4 left-4 opacity-0 translate-y-4 transition-all duration-500
                            group-hover/card:opacity-100 group-hover/card:translate-y-0">
                <span class="block text-gray-200/90 text-xs tracking-widest uppercase">Event</span>
                <h3 class="text-gray-200 font-extrabold text-2xl leading-tight drop-shadow">Birthday</h3>
                </div>
            </div>
        </div>
    </section>
    </section>
</main>

    {{-- Filter Script --}}
    <script>
    // Simple Slider
        const slider = document.getElementById('slider');
        let slideIndex = 0;
        setInterval(() => {
            slideIndex = (slideIndex + 1) % slider.children.length;
            slider.style.transform = `translateX(-${slideIndex * 100}%)`;
        }, 3000);	

        const buttons = document.querySelectorAll('.filter-btn');
        const items = document.querySelectorAll('#gallery-grid > div');

        buttons.forEach(btn => {
            btn.addEventListener('click', () => {
                const filter = btn.getAttribute('data-filter');

                // Active button state
                buttons.forEach(b => b.classList.remove('bg-red-500','text-white'));
                buttons.forEach(b => b.classList.add('bg-gray-200','text-black'));
                btn.classList.add('bg-red-500','text-white');

                // Filter items
                items.forEach(item => {
                    if (filter === 'all' || item.classList.contains(`category-${filter}`)) {
                        item.classList.remove('hidden');
                    } else {
                        item.classList.add('hidden');
                    }
                });
            });
        });
    </script>

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