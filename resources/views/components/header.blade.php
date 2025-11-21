<section class="relative fade-section opacity-0 translate-y-10 transition-all duration-1000 pt-24 pb-10 px-4 sm:px-6 lg:px-8">
  
  <div class="max-w-7xl mx-auto relative h-[600px] md:h-[650px] rounded-[2.5rem] overflow-hidden shadow-2xl border-4 border-white/30 group">
    
    <div class="absolute inset-0 z-0 bg-black">
      <iframe 
        id="bg-video"
        class="w-full h-full pointer-events-none transform scale-[1.35]" 
        src="https://www.youtube.com/embed/b2y8iRP0eXg?autoplay=1&mute=1&controls=0&loop=1&playlist=b2y8iRP0eXg&playsinline=1&rel=0&showinfo=0&modestbranding=1&iv_load_policy=3" 
        title="Testimoni Resto Bebek Joss Gandos" 
        frameborder="0" 
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
        allowfullscreen>
      </iframe>
    </div>

    <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/50 to-black/30 z-10"></div>

    <div class="relative z-20 flex flex-col items-center justify-center h-full text-center px-4">
      
      <span class="inline-block py-1 px-4 rounded-full bg-red-600/90 backdrop-blur-md text-white text-xs md:text-sm font-bold tracking-[0.2em] uppercase mb-6 border border-red-500/50 animate-pulse">
        Est. 2017
      </span>

      <h1 class="text-4xl sm:text-6xl md:text-7xl font-serif font-bold text-white mb-4 drop-shadow-lg tracking-wide">
        Resto <span class="text-transparent bg-clip-text bg-gradient-to-r from-red-500 to-yellow-400">Joss Gandos</span>
      </h1>

      <p class="mt-2 text-lg sm:text-xl font-light text-gray-100 tracking-wider mb-10">
        Pelopor No. 1 Resto dan Cafe di Jemursari
      </p>

      <div class="grid grid-cols-2 sm:flex sm:flex-wrap justify-center gap-4 w-full max-w-3xl">
        
        <a href="about" class="group relative px-6 py-3.5 rounded-full bg-white/10 backdrop-blur-md border border-white/30 text-white font-medium transition-all duration-300 hover:bg-white hover:text-red-700 hover:scale-105 hover:border-white shadow-lg flex items-center justify-center gap-2">
            Tentang Kami 
            <svg class="w-4 h-4 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        </a>

        <a href="menu" class="group relative px-6 py-3.5 rounded-full bg-white/10 backdrop-blur-md border border-white/30 text-white font-medium transition-all duration-300 hover:bg-white hover:text-red-700 hover:scale-105 hover:border-white shadow-lg flex items-center justify-center gap-2">
            Menu Kami
            <svg class="w-4 h-4 transition-transform group-hover:-translate-y-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path></svg>
        </a>

        <a href="gallery" class="group relative px-6 py-3.5 rounded-full bg-white/10 backdrop-blur-md border border-white/30 text-white font-medium transition-all duration-300 hover:bg-white hover:text-red-700 hover:scale-105 hover:border-white shadow-lg flex items-center justify-center gap-2">
            Galeri Kami
            <svg class="w-4 h-4 transition-transform group-hover:rotate-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
        </a>

        <a href="reservation" class="group relative px-6 py-3.5 rounded-full bg-white/10 backdrop-blur-md border border-white/30 text-white font-medium transition-all duration-300 hover:bg-white hover:text-red-700 hover:scale-105 hover:border-white shadow-lg flex items-center justify-center gap-2">
            Reservasi
            <svg class="w-4 h-4 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
        </a>

      </div>
    </div>
  </div>

  <script>
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
      }, { threshold: 0.2 });

      sections.forEach(section => {
        observer.observe(section);
      });
    });
  </script>

</section>