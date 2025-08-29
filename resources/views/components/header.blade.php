<!-- Hero Section -->
<section class="relative overflow-hidden fade-section opacity-0 translate-y-10 transition-all duration-1000">
  <div class="max-w-7xl mx-auto relative flex items-center justify-center h-[800px] sm:h-[800px] md:h-[800px]">
    
    <!-- Video Background -->
    <div class="absolute inset-0 z-0 flex justify-center">
      <video
        id="bg-video"
        class="w-full h-full object-cover rounded-7xl" 
        src="vid/phonk.mp4"
        autoplay
        muted
        loop
        playsinline
        preload="auto">
      </video>
    </div>
    <!-- Overlay -->
    <div class="absolute inset-0 bg-black bg-opacity-70 z-10 rounded-7xl"></div>

  <!-- Konten Hero -->
  <div class="relative z-20 flex flex-col items-center justify-center h-full text-center px-4">
    <h1 class="text-3xl font-bold tracking-tight text-red-600 sm:text-6xl">Resto Joss Gandos</h1>
    <p class="mt-8 text-lg font-medium text-pretty text-white sm:text-xl/8 animate-bounce">
      Pelopor No. 1 Resto dan Cafe
    </p>
    <div class="mt-10 grid grid-cols-2 gap-x-8 gap-y-6 text-base font-semibold text-yellow-300 sm:grid-cols-2 md:flex lg:gap-x-10">
      <a href="about" class="hover:text-white">Tentang Kami<span aria-hidden="true">&rarr;</span></a>
      <a href="menu" class="hover:text-white">Menu Kami<span aria-hidden="true">&rarr;</span></a>
      <a href="gallery" class="hover:text-white">Galeri Kami<span aria-hidden="true">&rarr;</span></a>
      <a href="location" class="hover:text-white">Lokasi Kami<span aria-hidden="true">&rarr;</span></a>
    </div>
  </div>

    <!-- Preload video agar cepat siap -->
  <link rel="preload" as="video" href="vid/phonk.mp4" type="video/mp4">

  <script>
    const video = document.getElementById('bg-video');
    
    // Paksa play segera tanpa menunggu buffering penuh
    video.addEventListener('canplay', () => {
      video.play().catch(err => console.log(err));
    });

    // Lazy load untuk optimasi (opsional)
    document.addEventListener('DOMContentLoaded', () => {
      if ('IntersectionObserver' in window) {
        const observer = new IntersectionObserver(entries => {
          entries.forEach(entry => {
            if (entry.isIntersecting) {
              video.load();
              observer.unobserve(video);
            }
          });
        });
        observer.observe(video);
      } else {
        // Fallback jika browser tidak mendukung IntersectionObserver
        video.load();
      }
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

</section>