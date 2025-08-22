<!-- Hero Section -->
<section class="relative z-0 h-screen overflow-hidden">
  <!-- Video Background -->
<div class="absolute inset-0 z-0 overflow-hidden">
  <video
    class="absolute top-1/2 left-1/2 w-auto min-w-full h-auto min-h-full transform -translate-x-1/2 -translate-y-1/2 object-cover"
    src="vid/phonk.mp4"
    autoplay
    muted
    loop
    playsinline
  ></video>
</div>

  <!-- Overlay gelap biar teks tetap terbaca -->
  <div class="absolute inset-0 bg-black bg-opacity-70 z-10"></div>
  <!-- Konten Hero -->
  <div class="relative z-20 flex flex-col items-center justify-center h-full text-center px-4">
    <h1 class="text-3xl font-bold tracking-tight text-red-600 sm:text-7xl">Resto Joss Gandos</h1>
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
</section>