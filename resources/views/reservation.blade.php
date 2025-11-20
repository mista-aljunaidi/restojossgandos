<x-layout>
    <main class="pt-16 min-h-screen">
        <section class="py-8">
            <div class="max-w-6xl mx-auto px-4">
                
                <h2 class="text-4xl font-bold text-center text-gray-700 mb-10 text-shadow-strong">Reservasi</h2>
                
                <style>
                    .text-shadow-strong {
                        text-shadow: 2px 2px 6px rgba(0,0,0,0.15);
                    }
                </style>

                <div class="mb-16">
                    <div class="text-center mb-6">
                        <h3 class="text-2xl font-bold text-gray-700 inline-block border-b-4 border-red-700 pb-2 mb-2 text-shadow-strong">
                            Ruangan & Fasilitas
                        </h3>
                    </div>

                    <div class="relative w-full max-w-5xl mx-auto h-[400px] md:h-[500px] overflow-hidden rounded-3xl shadow-xl group bg-gray-100">
                        
                        <div id="roomTrack" class="flex w-full h-full transition-transform duration-500 ease-in-out">
                            <img src="img/reservation/kawahijen.png" alt="Kawah Ijen" class="w-full h-full object-cover flex-shrink-0">
                            <img src="img/reservation/blambangan.png" alt="Blambangan" class="w-full h-full object-cover flex-shrink-0">
                            <img src="img/reservation/pulaumerah.png" alt="Pulau Merah" class="w-full h-full object-cover flex-shrink-0">
                            <img src="img/reservation/minakjinggo.png" alt="Minak Jinggo" class="w-full h-full object-cover flex-shrink-0">
                            <img src="img/reservation/sritanjung.png" alt="Sri Tanjung" class="w-full h-full object-cover flex-shrink-0">
                            <img src="img/reservation/ketapang.png" alt="Ketapang" class="w-full h-full object-cover flex-shrink-0">
                            <img src="img/reservation/outdoordepan.png" alt="Outdoor Depan" class="w-full h-full object-cover flex-shrink-0">
                            <img src="img/reservation/outdoorbelakang.png" alt="Outdoor Belakang" class="w-full h-full object-cover flex-shrink-0">
                        </div>

                        <button onclick="prevRoomImage()" class="absolute left-4 top-1/2 -translate-y-1/2 bg-black/30 hover:bg-black/50 backdrop-blur-sm text-white p-3 rounded-full transition-all z-10">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                            </svg>
                        </button>

                        <button onclick="nextRoomImage()" class="absolute right-4 top-1/2 -translate-y-1/2 bg-black/30 hover:bg-black/50 backdrop-blur-sm text-white p-3 rounded-full transition-all z-10">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="text-center mb-8 mt-16">
                    <h3 class="text-2xl font-bold text-gray-700 inline-block border-b-4 border-red-700 pb-2 mb-2 text-shadow-strong">
                        Outlet Kami
                    </h3>
                </div>

                <div class="relative w-full max-w-5xl mx-auto h-[400px] md:h-[500px] overflow-hidden mb-12 rounded-3xl shadow-xl bg-gray-100">
                    <button onclick="prevLocationImage()" class="absolute left-4 top-1/2 -translate-y-1/2 bg-white/30 backdrop-blur-sm text-white p-3 rounded-full hover:bg-white/50 transition-colors z-10">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                        </svg>
                    </button>

                    <img id="locationSliderImage" 
                        src="img/reservation/tampakdepanjemursari.jpg" 
                        alt="Outlet Location" 
                        class="w-full h-full object-cover transition-opacity duration-700 ease-in-out opacity-100">

                    <button onclick="nextLocationImage()" class="absolute right-4 top-1/2 -translate-y-1/2 bg-white/30 backdrop-blur-sm text-white p-3 rounded-full hover:bg-white/50 transition-colors z-10">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>
                    </button>
                </div>

                <div class="space-y-8 max-w-4xl mx-auto">
                    <div class="pb-6">
                        <h4 class="text-xl font-bold text-gray-800 cursor-pointer flex items-center gap-3 select-none" onclick="toggleDetail(this)">
                            <span class="icon flex items-center justify-center w-8 h-8 bg-red-50 rounded-full text-red-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="arrow-right w-5 h-5 transition-transform" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M17.92,11.62a1,1,0,0,0-.21-.33l-5-5a1,1,0,0,0-1.42,1.42L14.59,11H7a1,1,0,0,0,0,2h7.59l-3.3,3.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0l5-5a1,1,0,0,0,.21-.33A1,1,0,0,0,17.92,11.62Z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="arrow-down hidden w-5 h-5 transition-transform" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M17.71,11.29a1,1,0,0,0-1.42,0L13,14.59V7a1,1,0,0,0-2,0v7.59l-3.29-3.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,.33.21.94.94,0,0,0,.76,0,1,1,0,0,0,.33-.21l5-5A1,1,0,0,0,17.71,11.29Z"></path>
                                </svg>
                            </span>
                            Resto Joss Gandos - Jemursari
                        </h4>
                        
                        <div class="mt-4 hidden pl-11">
                            <p class="text-gray-800 mb-1 font-medium">Jl. Raya Jemursari No.15, Jemur Wonosari, Kec. Wonocolo, Surabaya, Jawa Timur 60237</p>
                            <p class="text-gray-700 mb-1">Senin - Minggu, 10.00 WIB – 22.00 WIB</p>
                            <p class="text-gray-700 font-bold">Phone: +62 319-984-2999</p>
                            
                            <div class="flex space-x-4 mt-4 mb-6">
                                <a href="https://www.facebook.com/RestoJossGandos" target="_blank" class="text-gray-500 hover:text-blue-600 transition-colors">
                                    <span class="[&>svg]:h-6 [&>svg]:w-6"><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 320 512"><path d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z"/></svg></span>
                                </a>
                                <a href="https://www.instagram.com/restojossgandos/" target="_blank" class="text-gray-500 hover:text-pink-700 transition-colors">
                                    <span class="[&>svg]:h-6 [&>svg]:w-6"><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 448 512"><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/></svg></span>
                                </a>
                                <a href="https://www.tiktok.com/@restojossgandos" target="_blank" class="text-gray-500 hover:text-black transition-colors">
                                    <span class="[&>svg]:h-6 [&>svg]:w-6"><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 448 512"><path d="M448 209.9a210.1 210.1 0 0 1 -122.8-39.3V349.4A162.6 162.6 0 1 1 185 188.3V278.2a74.6 74.6 0 1 0 52.2 71.2V0l88 0a121.2 121.2 0 0 0 1.9 22.2h0A122.2 122.2 0 0 0 381 102.4a121.4 121.4 0 0 0 67 20.1z"/></svg></span>
                                </a>
                            </div>
                            
                            <div class="rounded-xl overflow-hidden shadow-md">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.254930294519!2d112.734773874761!3d-7.325237292682985!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fb597129038d%3A0x1ed010a8c48ea678!2sResto%20Joss%20Gandos!5e0!3m2!1sid!2sid!4v1755244684155!5m2!1sid!2sid"
                                width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>

                    <div class="pb-6">
                        <h4 class="text-xl font-bold text-gray-800 cursor-pointer flex items-center gap-3 select-none" onclick="toggleDetail(this)">
                            <span class="icon flex items-center justify-center w-8 h-8 bg-red-50 rounded-full text-red-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="arrow-right w-5 h-5" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M17.92,11.62a1,1,0,0,0-.21-.33l-5-5a1,1,0,0,0-1.42,1.42L14.59,11H7a1,1,0,0,0,0,2h7.59l-3.3,3.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0l5-5a1,1,0,0,0,.21-.33A1,1,0,0,0,17.92,11.62Z"></path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="arrow-down hidden w-5 h-5" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="M17.71,11.29a1,1,0,0,0-1.42,0L13,14.59V7a1,1,0,0,0-2,0v7.59l-3.29-3.3a1,1,0,0,0-1.42,1.42l5,5a1,1,0,0,0,.33.21.94.94,0,0,0,.76,0,1,1,0,0,0,.33-.21l5-5A1,1,0,0,0,17.71,11.29Z"></path>
                                </svg>
                            </span>
                            Resto Joss Gandos - Ketintang
                        </h4>
                        
                        <div class="mt-4 hidden pl-11">
                            <p class="text-gray-800 mb-1 font-medium">Jl. Jetis Seraten, Ketintang, Kec. Gayungan, Surabaya, Jawa Timur 60231</p>
                            <p class="text-gray-700 mb-1">Senin - Minggu, 10.00 WIB – 22.00 WIB</p>
                            <p class="text-gray-700 font-bold">Phone: +62 319-984-2888</p>

                            <div class="flex space-x-4 mt-4 mb-6">
                                <a href="https://www.facebook.com/profile.php?id=61564928110856" target="_blank" class="text-gray-500 hover:text-blue-600 transition-colors">
                                    <span class="[&>svg]:h-6 [&>svg]:w-6"><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 320 512"><path d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z"/></svg></span>
                                </a>
                                <a href="https://www.instagram.com/restojossgandos_ketintang/" target="_blank" class="text-gray-500 hover:text-pink-700 transition-colors">
                                    <span class="[&>svg]:h-6 [&>svg]:w-6"><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 448 512"><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/></svg></span>
                                </a>
                                <a href="https://www.tiktok.com/@rstojossgandos.ketintang?_t=ZS-8zDabrwjQaP&_r=1" target="_blank" class="text-gray-500 hover:text-black transition-colors">
                                    <span class="[&>svg]:h-6 [&>svg]:w-6"><svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 448 512"><path d="M448 209.9a210.1 210.1 0 0 1 -122.8-39.3V349.4A162.6 162.6 0 1 1 185 188.3V278.2a74.6 74.6 0 1 0 52.2 71.2V0l88 0a121.2 121.2 0 0 0 1.9 22.2h0A122.2 122.2 0 0 0 381 102.4a121.4 121.4 0 0 0 67 20.1z"/></svg></span>
                                </a>
                            </div>

                            <div class="rounded-xl overflow-hidden shadow-md">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.2758272411224!2d112.72429227476103!3d-7.322883292685306!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fbbc457099a7%3A0x532f9878c0a059e8!2sResto%20Joss%20Gandos%20Ketintang!5e0!3m2!1sid!2sid!4v1755244511303!5m2!1sid!2sid" 
                                width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-24 relative w-full rounded-3xl overflow-hidden shadow-2xl group cursor-pointer">
                    
                    <div class="absolute inset-0 z-0">
                        <img src="img/reservation/outdoorbelakang.png" alt="Background Joss Gandos" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110 filter blur-[1px]">
                        <div class="absolute inset-0 bg-gradient-to-t from-red-900/90 via-black/60 to-black/40"></div>
                    </div>

                    <div class="relative z-10 px-6 py-20 md:py-24 text-center flex flex-col items-center justify-center h-full">
                        
                        <span class="inline-block py-1 px-3 rounded-full bg-white/10 border border-white/20 text-white text-xs font-bold tracking-wider mb-6 uppercase backdrop-blur-sm shadow-lg">
                            Best Service
                        </span>

                        <h3 class="text-3xl md:text-5xl text-white font-black leading-tight tracking-tight mb-6 drop-shadow-2xl">
                            Jadikan Momen Anda <br class="hidden md:block"> 
                            <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-200 to-amber-400">Lebih Istimewa</span>
                        </h3>

                        <p class="text-gray-200 text-lg md:text-xl mb-10 max-w-2xl mx-auto font-light leading-relaxed">
                            Dari ulang tahun hingga gathering kantor, kami siapkan tempat dan hidangan terbaik untuk Anda.
                        </p>
                        
                        <a href="https://wa.me/628199842999" target="_blank" 
                           class="group/btn relative inline-flex items-center gap-3 bg-white text-red-700 px-10 py-4 rounded-full font-extrabold text-lg shadow-[0_0_20px_rgba(255,255,255,0.3)] transition-all duration-300 transform hover:scale-105 hover:shadow-[0_0_30px_rgba(255,255,255,0.5)] overflow-hidden">
                            
                            <span class="absolute inset-0 bg-gray-100 transform scale-x-0 group-hover/btn:scale-x-100 transition-transform origin-left duration-300"></span>
                            
                            <span class="relative flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                                    <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
                                </svg>
                                Reservasi Sekarang
                            </span>
                        </a>
                    </div>
                </div>

            </div>

            <script>
                let roomIndex = 0;
                const roomTrack = document.getElementById("roomTrack");
                const totalRooms = roomTrack.children.length;

                function updateRoomSlide() {
                    const translateXValue = -(roomIndex * 100);
                    roomTrack.style.transform = `translateX(${translateXValue}%)`;
                }

                function nextRoomImage() {
                    roomIndex = (roomIndex + 1) % totalRooms;
                    updateRoomSlide();
                }

                function prevRoomImage() {
                    roomIndex = (roomIndex - 1 + totalRooms) % totalRooms;
                    updateRoomSlide();
                }

                // Slider Lokasi Logic
                const locImages = [
                    "img/reservation/tampakdepanjemursari.jpg",
                    "img/reservation/tampakdepanjemursari.jpg", 
                    "img/reservation/tampakdepanjemursari.jpg"
                ];

                let locIndex = 0;
                const locImgElement = document.getElementById("locationSliderImage");

                function showLocationImage(newIndex) {
                    locImgElement.classList.remove("opacity-100");
                    locImgElement.classList.add("opacity-0");

                    setTimeout(() => {
                        locImgElement.src = locImages[newIndex];
                        locImgElement.classList.remove("opacity-0");
                        locImgElement.classList.add("opacity-100");
                    }, 400);
                }

                function nextLocationImage() {
                    locIndex = (locIndex + 1) % locImages.length;
                    showLocationImage(locIndex);
                }

                function prevLocationImage() {
                    locIndex = (locIndex - 1 + locImages.length) % locImages.length;
                    showLocationImage(locIndex);
                }
                setInterval(nextLocationImage, 10000); 
            </script>

            <script>
                function toggleDetail(el) {
                    const detail = el.nextElementSibling;
                    detail.classList.toggle("hidden");

                    const arrowRight = el.querySelector(".arrow-right");
                    const arrowDown = el.querySelector(".arrow-down");

                    if (detail.classList.contains("hidden")) {
                        arrowRight.classList.remove("hidden");
                        arrowDown.classList.add("hidden");
                    } else {
                        arrowRight.classList.add("hidden");
                        arrowDown.classList.remove("hidden");
                    }
                }
            </script>
            
        </section>
    </main>
</x-layout>