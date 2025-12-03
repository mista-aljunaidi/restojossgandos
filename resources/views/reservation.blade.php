<x-layout>

    <style>
        /* CSS untuk Hide Scrollbar di Main Container */
        main::-webkit-scrollbar {
            display: none;
        }
        main {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
        
        /* Base Transition Style */
        .fade-section {
            transition-property: opacity, transform;
            transition-timing-function: ease-out;
        }
    </style>
    
    <main class="pt-20 min-h-screen bg-batik bg-fixed bg-cover bg-center bg-no-repeat relative w-full overflow-x-hidden">
        
        <div class="absolute inset-0 w-full h-full bg-stone-100/60 pointer-events-none z-0"></div>

        <section class="relative z-10 py-12 text-center fade-section opacity-0 translate-y-10 transition-all duration-1000">
            <div class="max-w-4xl mx-auto px-4">
                <span class="uppercase tracking-widest text-red-600 font-bold text-sm mb-2 block">Booking & Event</span>
                <h1 class="text-5xl md:text-6xl font-serif font-bold text-gray-800 mb-4 drop-shadow-sm">
                    Reservasi <span class="text-red-700">Tempat</span>
                </h1>
                <div class="h-1.5 w-24 bg-gradient-to-r from-red-500 to-yellow-400 mx-auto rounded-full mb-6"></div>
            </div>
        </section>

        <div class="relative z-10 pb-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <section class="fade-section opacity-0 translate-y-10 transition-all duration-1000 delay-100">
                <div class="bg-white/80 backdrop-blur-md rounded-[2.5rem] p-6 md:p-10 shadow-xl border border-white/60 mb-20 relative overflow-hidden group">
                    <div class="absolute top-0 right-0 w-40 h-40 bg-red-100 rounded-bl-full -mr-10 -mt-10 opacity-50"></div>

                    <div class="text-center mb-8 relative z-10">
                        <h3 class="text-3xl font-serif font-bold text-gray-800">Ruangan & Fasilitas</h3>
                    </div>

                    <div class="relative w-full max-w-5xl mx-auto h-[300px] md:h-[500px] overflow-hidden rounded-[2rem] shadow-lg group/slider bg-gray-100">
                        <div id="roomTrack" class="flex w-full h-full transition-transform duration-700 ease-in-out">
                            <img src="img/reservation/kawahijen.png" alt="Kawah Ijen" class="w-full h-full object-cover flex-shrink-0">
                            <img src="img/reservation/blambangan.png" alt="Blambangan" class="w-full h-full object-cover flex-shrink-0">
                            <img src="img/reservation/pulaumerah.png" alt="Pulau Merah" class="w-full h-full object-cover flex-shrink-0">
                            <img src="img/reservation/minakjinggo.png" alt="Minak Jinggo" class="w-full h-full object-cover flex-shrink-0">
                            <img src="img/reservation/sritanjung.png" alt="Sri Tanjung" class="w-full h-full object-cover flex-shrink-0">
                            <img src="img/reservation/ketapang.png" alt="Ketapang" class="w-full h-full object-cover flex-shrink-0">
                            <img src="img/reservation/outdoordepan.png" alt="Outdoor Depan" class="w-full h-full object-cover flex-shrink-0">
                            <img src="img/reservation/outdoorbelakang.png" alt="Outdoor Belakang" class="w-full h-full object-cover flex-shrink-0">
                        </div>

                        <button onclick="prevRoomImage()" class="absolute left-4 top-1/2 -translate-y-1/2 bg-black/30 backdrop-blur-md text-white p-3 rounded-full hover:bg-black/50 transition-all z-10">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" /></svg>
                        </button>
                        <button onclick="nextRoomImage()" class="absolute right-4 top-1/2 -translate-y-1/2 bg-black/30 backdrop-blur-md text-white p-3 rounded-full hover:bg-black/50 transition-all z-10">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" /></svg>
                        </button>
                    </div>
                </div>
            </section>

            <section class="mb-12 fade-section opacity-0 translate-y-10 transition-all duration-1000 delay-100">
                <div class="text-center mb-8">
                    <h3 class="text-3xl font-serif font-bold text-gray-800 inline-block border-b-4 border-red-600 pb-2">
                        Lokasi Outlet
                    </h3>
                </div>

                <div class="relative w-full max-w-5xl mx-auto h-[400px] md:h-[500px] overflow-hidden rounded-[2.5rem] shadow-2xl group bg-gray-200">
                    
                    <img id="locationSliderImage" 
                        src="img/reservation/tampakdepanjemursari.jpg" 
                        alt="Outlet Location" 
                        class="w-full h-full object-cover transition-opacity duration-500 ease-in-out opacity-100">

                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 via-transparent to-transparent pointer-events-none"></div>

                    <button onclick="prevLocationImage()" 
                            class="absolute left-4 top-1/2 -translate-y-1/2 bg-white/20 hover:bg-white/80 backdrop-blur-md border border-white/30 text-white hover:text-gray-800 p-3 rounded-full transition-all duration-300 z-10 opacity-0 group-hover:opacity-100 translate-x-[-20px] group-hover:translate-x-0">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                        </svg>
                    </button>

                    <button onclick="nextLocationImage()" 
                            class="absolute right-4 top-1/2 -translate-y-1/2 bg-white/20 hover:bg-white/80 backdrop-blur-md border border-white/30 text-white hover:text-gray-800 p-3 rounded-full transition-all duration-300 z-10 opacity-0 group-hover:opacity-100 translate-x-[20px] group-hover:translate-x-0">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                        </svg>
                    </button>

                    <div id="sliderIndicators" class="absolute bottom-6 left-1/2 -translate-x-1/2 flex space-x-2 z-10">
                        </div>
                </div>
            </section>

            <section class="mb-20 max-w-4xl mx-auto space-y-6 fade-section opacity-0 translate-y-10 transition-all duration-1000 delay-100">
                
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-stone-100 transition-all duration-300 hover:shadow-xl">
                    <div class="p-6 cursor-pointer flex items-center justify-between bg-white hover:bg-stone-50 transition-colors" onclick="toggleDetail(this)">
                        <h4 class="text-xl font-bold text-gray-800 flex items-center gap-4">
                            <span class="flex items-center justify-center w-10 h-10 bg-red-100 rounded-full text-red-600 shadow-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                            </span>
                            Resto Joss Gandos - Jemursari
                        </h4>
                        <div class="text-gray-400 transform transition-transform duration-300 arrow-icon bg-gray-100 p-2 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                        </div>
                    </div>
                    <div class="hidden bg-stone-50/50 px-6 pb-8 pt-2 border-t border-stone-100">
                        <div class="grid md:grid-cols-2 gap-6 mt-4">
                            <div>
                                <p class="text-gray-600 text-sm mb-3"><strong class="text-gray-900 block text-base mb-1">Alamat:</strong>Jl. Raya Jemursari No.15, Jemur Wonosari, Kec. Wonocolo, Surabaya</p>
                                <p class="text-gray-600 text-sm mb-3"><strong class="text-gray-900 block text-base mb-1">Jam Operasional:</strong>Senin - Minggu, 10.00 WIB – 22.00 WIB</p>
                                <p class="text-gray-600 text-sm mb-4"><strong class="text-gray-900 block text-base mb-1">Telepon:</strong>+62 896-9907-1599</p>
                                <div class="flex gap-3">
                                    <a href="https://www.facebook.com/RestoJossGandos" target="_blank" class="bg-blue-50 p-2 rounded-lg text-blue-700 hover:bg-blue-100 transition"><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 320 512"><path d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z"/></svg></a>
                                    <a href="https://www.instagram.com/restojossgandos/" target="_blank" class="bg-pink-50 p-2 rounded-lg text-pink-600 hover:bg-pink-100 transition"><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 448 512"><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/></svg></a>
                                    <a href="https://www.tiktok.com/@restojossgandos" target="_blank" class="bg-gray-200 p-2 rounded-lg text-black hover:bg-gray-300 transition"><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 448 512"><path d="M448 209.9a210.1 210.1 0 0 1 -122.8-39.3V349.4A162.6 162.6 0 1 1 185 188.3V278.2a74.6 74.6 0 1 0 52.2 71.2V0l88 0a121.2 121.2 0 0 0 1.9 22.2h0A122.2 122.2 0 0 0 381 102.4a121.4 121.4 0 0 0 67 20.1z"/></svg></a>
                                </div>
                            </div>
                            <div class="rounded-xl overflow-hidden shadow-md border border-gray-200 h-48">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.254930294519!2d112.734773874761!3d-7.325237292682985!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fb597129038d%3A0x1ed010a8c48ea678!2sResto%20Joss%20Gandos!5e0!3m2!1sid!2sid!4v1755244684155!5m2!1sid!2sid" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-stone-100 transition-all duration-300 hover:shadow-xl">
                    <div class="p-6 cursor-pointer flex items-center justify-between bg-white hover:bg-stone-50 transition-colors" onclick="toggleDetail(this)">
                        <h4 class="text-xl font-bold text-gray-800 flex items-center gap-4">
                            <span class="flex items-center justify-center w-10 h-10 bg-yellow-100 rounded-full text-yellow-600 shadow-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                            </span>
                            Resto Joss Gandos - Ketintang
                        </h4>
                        <div class="text-gray-400 transform transition-transform duration-300 arrow-icon bg-gray-100 p-2 rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                        </div>
                    </div>
                    <div class="hidden bg-stone-50/50 px-6 pb-8 pt-2 border-t border-stone-100">
                        <div class="grid md:grid-cols-2 gap-6 mt-4">
                            <div>
                                <p class="text-gray-600 text-sm mb-3"><strong class="text-gray-900 block text-base mb-1">Alamat:</strong>Jl. Jetis Seraten, Ketintang, Kec. Gayungan, Surabaya</p>
                                <p class="text-gray-600 text-sm mb-3"><strong class="text-gray-900 block text-base mb-1">Jam Operasional:</strong>Senin - Minggu, 10.00 WIB – 22.00 WIB</p>
                                <p class="text-gray-600 text-sm mb-4"><strong class="text-gray-900 block text-base mb-1">Telepon:</strong>+62 319-984-2888</p>
                                <div class="flex gap-3">
                                    <a href="https://www.facebook.com/profile.php?id=61564928110856" target="_blank" class="bg-blue-50 p-2 rounded-lg text-blue-700 hover:bg-blue-100 transition"><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 320 512"><path d="M80 299.3V512H196V299.3h86.5l18-97.8H196V166.9c0-51.7 20.3-71.5 72.7-71.5c16.3 0 29.4 .4 37 1.2V7.9C291.4 4 256.4 0 236.2 0C129.3 0 80 50.5 80 159.4v42.1H14v97.8H80z"/></svg></a>
                                    <a href="https://www.instagram.com/restojossgandos_ketintang/" target="_blank" class="bg-pink-50 p-2 rounded-lg text-pink-600 hover:bg-pink-100 transition"><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 448 512"><path d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/></svg></a>
                                    <a href="https://www.tiktok.com/@rstojossgandos.ketintang?_t=ZS-8zDabrwjQaP&_r=1" target="_blank" class="bg-gray-200 p-2 rounded-lg text-black hover:bg-gray-300 transition"><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 448 512"><path d="M448 209.9a210.1 210.1 0 0 1 -122.8-39.3V349.4A162.6 162.6 0 1 1 185 188.3V278.2a74.6 74.6 0 1 0 52.2 71.2V0l88 0a121.2 121.2 0 0 0 1.9 22.2h0A122.2 122.2 0 0 0 381 102.4a121.4 121.4 0 0 0 67 20.1z"/></svg></a>
                                </div>
                            </div>
                            <div class="rounded-xl overflow-hidden shadow-md border border-gray-200 h-48">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.2758272411224!2d112.72429227476103!3d-7.322883292685306!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fbbc457099a7%3A0x532f9878c0a059e8!2sResto%20Joss%20Gandos%20Ketintang!5e0!3m2!1sid!2sid!4v1755244511303!5m2!1sid!2sid" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="fade-section opacity-0 translate-y-10 transition-all duration-1000 delay-100">
                <div class="relative w-full rounded-[3rem] overflow-hidden shadow-2xl group cursor-pointer h-[400px] md:h-[450px]">
                    <div class="absolute inset-0 z-0">
                        <img src="img/reservation/fullteam.jpg" alt="Background Joss Gandos" class="w-full h-full object-cover transition-transform duration-[2s] group-hover:scale-105">
                        <div class="absolute inset-0 bg-gradient-to-br from-red-900/80 via-red-800/60 to-black/50"></div>
                    </div>

                    <div class="relative z-10 px-6 h-full flex flex-col items-center justify-center text-center">
                        <span class="inline-block py-1.5 px-4 rounded-full bg-white/20 border border-white/30 text-white text-xs font-bold tracking-[0.2em] mb-6 uppercase backdrop-blur-md shadow-lg">
                            Best Service
                        </span>

                        <h3 class="text-4xl md:text-6xl font-serif font-bold text-white leading-tight mb-6 drop-shadow-2xl">
                            Jadikan Momen Anda <br>
                            <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-200 to-amber-400">Lebih Istimewa</span>
                        </h3>

                        <p class="text-gray-100 text-lg md:text-xl mb-10 max-w-2xl mx-auto font-light leading-relaxed">
                            Dari ulang tahun hingga gathering kantor, kami siapkan tempat dan hidangan terbaik untuk Anda.
                        </p>
                        
                        <div class="relative inline-block">
                            
                            <div id="promo-wa-menu" class="hidden absolute bottom-full left-1/2 -translate-x-1/2 mb-3 w-64 bg-white rounded-xl shadow-2xl border border-gray-100 overflow-hidden z-50 text-left">
                                <div class="py-1">
                                    <p class="px-4 py-3 text-xs font-bold text-gray-500 uppercase bg-gray-50 text-center border-b border-gray-100">
                                        Pilih Admin
                                    </p>
                                    
                                    <a href="javascript:void(0)" 
                                    data-nomor="6289699071599"
                                    data-pesan="Halo Admin! Saya ingin reservasi untuk acara spesial. Mohon info pricelist dan ketersediaan tempat."
                                    onclick="kirimWa(this)"
                                    class="px-5 py-3 text-sm text-gray-800 hover:bg-red-50 hover:text-red-700 transition flex items-center justify-between group-link">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full bg-green-100 text-green-600 flex items-center justify-center">
                                            <i class="fas fa-user text-xs"></i> 1
                                        </div>
                                        <div class="flex flex-col">
                                            <span class="font-bold">Admin 1</span>
                                            <span class="text-[10px] text-gray-400">089699071599</span>
                                        </div>
                                    </div>
                                    <svg class="w-4 h-4 text-gray-300 group-hover-link:text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                    </a>

                                    <a href="javascript:void(0)" 
                                    data-nomor="62895326824595"
                                    data-pesan="Halo Admin! Saya ingin reservasi untuk acara spesial. Mohon info pricelist dan ketersediaan tempat."
                                    onclick="kirimWa(this)"
                                    class="px-5 py-3 text-sm text-gray-800 hover:bg-red-50 hover:text-red-700 transition flex items-center justify-between border-t border-gray-100 group-link">
                                    <div class="flex items-center gap-3">
                                        <div class="w-8 h-8 rounded-full bg-green-100 text-green-600 flex items-center justify-center">
                                            <i class="fas fa-user text-xs"></i>
                                            2
                                        </div>
                                        <div class="flex flex-col">
                                            <span class="font-bold">Admin 2</span>
                                            <span class="text-[10px] text-gray-400">0895326824595</span>
                                        </div>
                                    </div>
                                    <svg class="w-4 h-4 text-gray-300 group-hover-link:text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                    </a>
                                </div>
                            </div>

                            <button onclick="togglePromoWa()" 
                                    class="group/btn relative inline-flex items-center gap-3 bg-white text-red-700 px-10 py-4 rounded-full font-bold text-lg shadow-[0_0_20px_rgba(255,255,255,0.3)] transition-all duration-300 transform hover:scale-105 hover:shadow-[0_0_30px_rgba(255,255,255,0.5)] overflow-hidden focus:outline-none">
                                
                                <span class="absolute inset-0 bg-red-50 transform scale-x-0 group-hover/btn:scale-x-100 transition-transform origin-left duration-300"></span>
                                
                                <span class="relative flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16"><path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/></svg>
                                    Reservasi Sekarang
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </section>

        </div>
    </main>

    <script>
        function togglePromoWa() {
            const menu = document.getElementById('promo-wa-menu');
            menu.classList.toggle('hidden');
        }
        
        if (typeof kirimWa !== 'function') {
            function kirimWa(element) {
                const nomor = element.getAttribute('data-nomor');
                const pesan = element.getAttribute('data-pesan');
                const pesanEncoded = encodeURIComponent(pesan);
                const url = `https://api.whatsapp.com/send?phone=${nomor}&text=${pesanEncoded}`;
                window.open(url, '_blank');
            }
        }

        // Menutup menu jika klik di luar
        window.addEventListener('click', function(e) {
            const btn = document.querySelector('button[onclick="togglePromoWa()"]');
            const menu = document.getElementById('promo-wa-menu');
            
            if (btn && menu && !btn.contains(e.target) && !menu.contains(e.target)) {
                menu.classList.add('hidden');
            }
        });
    </script>

    <script>
        // ============================
        // 1. ROOM SLIDER LOGIC
        // ============================
        let roomIndex = 0;
        const roomTrack = document.getElementById("roomTrack");
        // Cek apakah element ada untuk menghindari error jika halaman lain tidak punya roomTrack
        if (roomTrack) {
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
        }

        // ============================
        // 2. LOCATION SLIDER LOGIC (SMOOTH & DOTS)
        // ============================
        const locImages = [
            "img/reservation/tampakdepanjemursari.jpg",
            "img/reservation/Ketintang.jpeg"
        ];

        let locIndex = 0;
        const locImgElement = document.getElementById("locationSliderImage");
        const locIndicatorsContainer = document.getElementById("sliderIndicators");
        let locAutoSlideInterval;

        // A. Fungsi Inisialisasi Dots
        function initLocIndicators() {
            if (!locIndicatorsContainer) return;
            
            locIndicatorsContainer.innerHTML = ''; // Bersihkan isi
            locImages.forEach((_, index) => {
                const dot = document.createElement('button');
                // Style default dot
                dot.className = `w-3 h-3 rounded-full transition-all duration-300 ${index === 0 ? 'bg-white w-8' : 'bg-white/50 hover:bg-white'}`;
                dot.onclick = () => goToLocationImage(index);
                locIndicatorsContainer.appendChild(dot);
            });
        }

        // B. Fungsi Utama Update Gambar
        function updateLocationSlide() {
            if (!locImgElement) return;

            // 1. Fade Out
            locImgElement.classList.remove("opacity-100");
            locImgElement.classList.add("opacity-0");

            // 2. Tunggu transisi fade out selesai (500ms)
            setTimeout(() => {
                // Ganti Source
                locImgElement.src = locImages[locIndex];

                // Update Dots Active State
                if (locIndicatorsContainer) {
                    const dots = locIndicatorsContainer.children;
                    for (let i = 0; i < dots.length; i++) {
                        if (i === locIndex) {
                            dots[i].className = 'w-8 h-3 rounded-full bg-white transition-all duration-300';
                        } else {
                            dots[i].className = 'w-3 h-3 rounded-full bg-white/50 hover:bg-white transition-all duration-300';
                        }
                    }
                }

                // 3. Fade In (Hanya setelah gambar siap)
                locImgElement.onload = () => {
                    locImgElement.classList.remove("opacity-0");
                    locImgElement.classList.add("opacity-100");
                };
                
                // Fallback jika gambar sudah di-cache (onload mungkin tidak trigger)
                if (locImgElement.complete) {
                    locImgElement.classList.remove("opacity-0");
                    locImgElement.classList.add("opacity-100");
                }

            }, 500); // Waktu ini harus sesuai dengan class 'duration-500' di HTML img
        }

        // C. Navigasi
        function nextLocationImage() {
            locIndex = (locIndex + 1) % locImages.length;
            updateLocationSlide();
            resetLocTimer(); // Reset timer agar tidak bentrok dengan klik user
        }

        function prevLocationImage() {
            locIndex = (locIndex - 1 + locImages.length) % locImages.length;
            updateLocationSlide();
            resetLocTimer();
        }

        function goToLocationImage(index) {
            locIndex = index;
            updateLocationSlide();
            resetLocTimer();
        }

        // D. Timer Auto Slide
        function startLocTimer() {
            locAutoSlideInterval = setInterval(() => {
                locIndex = (locIndex + 1) % locImages.length;
                updateLocationSlide();
            }, 5000); // Ganti tiap 5 detik
        }

        function resetLocTimer() {
            clearInterval(locAutoSlideInterval);
            startLocTimer();
        }

        // ============================
        // 3. ACCORDION LOGIC
        // ============================
        function toggleDetail(el) {
            const detail = el.nextElementSibling;
            const icon = el.querySelector(".arrow-icon");
            
            detail.classList.toggle("hidden");

            if (detail.classList.contains("hidden")) {
                icon.style.transform = "rotate(0deg)";
            } else {
                icon.style.transform = "rotate(180deg)";
            }
        }

        // ============================
        // 4. INIT & FADE ANIMATION
        // ============================
        document.addEventListener("DOMContentLoaded", () => {
            // Init Location Slider
            initLocIndicators();
            startLocTimer();

            // Intersection Observer untuk Fade Section
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