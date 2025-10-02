<x-layout>
    
<main class="pt-16 min-h-screen font-sans ">
    <!-- GALLERY PAGE -->
    <section class="py-8 fade-section opacity-100 translate-y-10 transition-all duration-1000">
    <h2 class="text-4xl font-bold text-center text-gray-600 mb-8">Galeri Kami</h2>

    {{-- Slider khusus ambience --}}
    <section class="relative w-full h-[500px] rounded-3xl overflow-hidden">
        <div id="slider" class="flex w-full h-full transition-transform duration-700">
            @foreach ($ambiencePhotos as $photo)
                <div class="w-full h-full flex-shrink-0">
                    <img src="{{ asset($photo->image_path) }}" 
                        class="w-full h-full object-cover" 
                        alt="{{ $photo->title }}">
                </div>
            @endforeach
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
                        <span class="block text-gray-200/90 text-xs tracking-widest uppercase text-shadow-strong">{{ $photo->category }}</span>
                        <h3 class="text-gray-200 font-extrabold text-2xl leading-tight text-shadow-strong">{{ $photo->title }}</h3>
                    </div>
                </div>
            @empty
            @endforelse
        </div>
        <style>
            .text-shadow-strong {
              text-shadow: 2px 2px 6px rgba(0, 0, 0, 0.9);
            }
          </style>
    </section>
    </section>
</main>

    {{-- Filter Script --}}
    <script>
        // Simple Slider
            document.addEventListener("DOMContentLoaded", function () {
            const slider = document.getElementById("slider");
            const slides = slider.children;
            let index = 0;

            function showSlide(i) {
                slider.style.transform = `translateX(-${i * 100}%)`;
            }

            setInterval(() => {
                index = (index + 1) % slides.length;
                showSlide(index);
            }, 3000);
        });	

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