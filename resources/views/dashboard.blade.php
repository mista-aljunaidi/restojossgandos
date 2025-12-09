<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - Resto Joss Gandos</title>
  <link rel="icon" type="image/png" href="{{ asset('public/img/logojossgandos.png') }}">
  
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
  
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <style>
    body { font-family: 'Inter', sans-serif; }
    html { scroll-behavior: smooth; }
    .custom-scrollbar::-webkit-scrollbar { height: 8px; width: 8px; }
    .custom-scrollbar::-webkit-scrollbar-track { background: #f1f5f9; }
    .custom-scrollbar::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 4px; }
    .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
    .fade-enter { opacity: 0; transform: translateY(10px); }
    .fade-enter-active { opacity: 1; transform: translateY(0); transition: opacity 0.4s ease-out, transform 0.4s ease-out; }
    .highlighted-row { background-color: #fef9c3 !important; transition: background 0.3s ease; } 
    .active-highlight { background-color: #fde047 !important; transform: scale-[1.01]; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); position: relative; z-index: 10; }
  </style>
</head>

<body class="bg-slate-50 text-slate-800 antialiased overflow-x-hidden">

  <div class="flex h-screen overflow-hidden">

    <aside id="sidebar" 
      class="fixed inset-y-0 left-0 z-40 w-64 bg-slate-900 text-white transform -translate-x-full transition-transform duration-300 ease-in-out md:relative md:translate-x-0 flex flex-col justify-between shadow-2xl">
      
      <div>
        <div class="flex items-center gap-3 px-6 py-8 border-b border-slate-700/50">
          <div class="relative group">
            <div class="absolute -inset-1 bg-gradient-to-r from-red-600 to-orange-600 rounded-full blur opacity-25 group-hover:opacity-75 transition duration-200"></div>
            <img src="{{ asset('public/img/logojossgandos.png') }}" alt="Logo" class="relative w-10 h-10 object-contain">
          </div>
          <div>
            <h1 class="font-bold text-lg tracking-wide leading-none">Resto Joss Gandos</h1>
            <span class="text-xs text-slate-400 font-medium tracking-wider uppercase">Dashboard Admin</span>
          </div>
        </div>

        <nav class="mt-8 px-4 space-y-2">
          <a href="{{ route('dashboard') }}" 
             class="flex items-center gap-3 px-4 py-3.5 text-sm font-medium rounded-xl bg-indigo-600 text-white shadow-lg shadow-indigo-500/30 transition-all hover:bg-indigo-700">
             <i class="uil uil-apps text-xl"></i>
             <span>Overview</span>
          </a>

          <a href="{{ route('statistik') }}" 
             class="flex items-center gap-3 px-4 py-3.5 text-sm font-medium rounded-xl text-slate-400 hover:text-white hover:bg-slate-800 transition-all group">
             <i class="uil uil-chart-line text-xl group-hover:text-indigo-400 transition-colors"></i>
             <span>Statistik</span>
          </a>
        </nav>
      </div>

      <div class="p-4 border-t border-slate-700/50">
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button type="submit" 
            class="flex items-center justify-center gap-2 w-full px-4 py-3 text-sm font-medium text-red-400 bg-slate-800/50 hover:bg-red-500/10 hover:text-red-500 rounded-xl transition-all border border-transparent hover:border-red-500/20">
            <i class="uil uil-sign-out-alt text-lg"></i>
            <span>Logout</span>
          </button>
        </form>
      </div>
    </aside>

    <div id="overlay" class="fixed inset-0 bg-slate-900/50 z-30 hidden md:hidden backdrop-blur-sm transition-opacity" onclick="toggleSidebar()"></div>

    <main class="flex-1 flex flex-col h-screen overflow-hidden bg-slate-50 relative">
      
      <header class="flex-shrink-0 bg-white border-b border-slate-200 shadow-sm z-20 px-6 py-4 flex items-center justify-between gap-4">
        
        <div class="flex items-center gap-4 flex-1">
          <button onclick="toggleSidebar()" class="md:hidden p-2 text-slate-500 hover:bg-slate-100 rounded-lg">
            <i class="uil uil-bars text-2xl"></i>
          </button>

          <div class="relative w-full max-w-lg hidden sm:block">
            <i class="uil uil-search absolute left-4 top-1/2 -translate-y-1/2 text-slate-400 text-lg"></i>
            <input type="text" id="searchInput" 
              placeholder="Cari menu, kategori, atau galeri..." 
              class="w-full pl-11 pr-4 py-2.5 bg-slate-100 border-none rounded-xl text-sm font-medium text-slate-700 focus:ring-2 focus:ring-indigo-500 focus:bg-white transition-all placeholder:text-slate-400">
          </div>
        </div>

        <button onclick="openChooseModal()" 
          class="flex items-center gap-2 bg-green-700 hover:bg-slate-800 text-white px-5 py-2.5 rounded-xl text-sm font-semibold shadow-lg hover:shadow-xl transition-all transform hover:-translate-y-0.5">
          <i class="uil uil-plus-circle text-lg"></i>
          <span>Tambah Data</span>
        </button>
      </header>

      <div class="flex-1 overflow-y-auto p-6 scroll-smooth" id="mainScrollContent">
        
        @if(session('success'))
          <div id="success-alert" class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-xl flex items-center gap-3 shadow-sm fade-enter-active">
            <i class="uil uil-check-circle text-xl"></i>
            <span class="font-medium">{{ session('success') }}</span>
          </div>
        @endif

        @if ($errors->any())
          <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-700 rounded-xl shadow-sm">
             <ul class="list-disc list-inside text-sm font-medium">
               @foreach ($errors->all() as $error)
                 <li>{{ $error }}</li>
               @endforeach
             </ul>
          </div>
        @endif

        <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-8 fade-section">
            <div class="bg-white p-5 rounded-2xl shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] border border-slate-100 flex items-center gap-4 hover:border-indigo-100 transition-colors">
                <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center text-xl">
                    <i class="uil uil-image"></i>
                </div>
                <div>
                    <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Galeri</p>
                    <h3 class="text-2xl font-bold text-slate-800">{{ $galleryCount ?? 0 }}</h3>
                </div>
            </div>
            
            <div class="bg-white p-5 rounded-2xl shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] border border-slate-100 flex items-center gap-4 hover:border-indigo-100 transition-colors">
                <div class="w-12 h-12 rounded-xl bg-orange-50 text-orange-600 flex items-center justify-center text-xl">
                    <i class="uil uil-utensils"></i>
                </div>
                <div>
                    <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Menu</p>
                    <h3 class="text-2xl font-bold text-slate-800">{{ $menuCount ?? 0 }}</h3>
                </div>
            </div>

            <div class="bg-white p-5 rounded-2xl shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] border border-slate-100 flex items-center gap-4 hover:border-indigo-100 transition-colors">
                <div class="w-12 h-12 rounded-xl bg-green-50 text-green-600 flex items-center justify-center text-xl">
                    <i class="uil uil-comments"></i>
                </div>
                <div>
                    <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Testimoni</p>
                    <h3 class="text-2xl font-bold text-slate-800">{{ $testimonialCount ?? 12 }}</h3>
                </div>
            </div>

            <div class="bg-white p-5 rounded-2xl shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)] border border-slate-100 flex items-center gap-4 hover:border-indigo-100 transition-colors">
                <div class="w-12 h-12 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center text-xl">
                    <i class="uil uil-megaphone"></i>
                </div>
                <div>
                    <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider">Promo/Event</p>
                    <h3 class="text-2xl font-bold text-slate-800">{{ $eventCount ?? 3 }}</h3>
                </div>
            </div>
        </section>

        <div class="flex flex-col lg:flex-row items-start lg:items-center justify-between gap-4 mb-6 fade-section">
            <div class="bg-slate-200/60 p-1.5 rounded-xl inline-flex">
                <button id="btn-menu" class="px-6 py-2 rounded-lg text-sm font-semibold transition-all duration-300">
                    Daftar Menu
                </button>
                <button id="btn-gallery" class="px-6 py-2 rounded-lg text-sm font-semibold text-slate-500 hover:text-slate-700 transition-all duration-300">
                    Galeri Foto
                </button>
            </div>

            <div id="filter-wrapper" class="flex flex-wrap items-center gap-2">
                <div id="filter-menu" class="flex items-center gap-2">
                    <select id="menuFilterType" class="bg-white border border-slate-200 text-slate-700 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block px-3 py-2 cursor-pointer shadow-sm outline-none transition-all hover:bg-slate-50">
                        <option value="">Semua Tipe</option>
                        <option value="special">Special</option>
                        <option value="carousel">Carousel</option>
                    </select>
                    <select id="menuSortBy" class="bg-white border border-slate-200 text-slate-700 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block px-3 py-2 cursor-pointer shadow-sm outline-none transition-all hover:bg-slate-50">
                        <option value="latest">Terbaru</option>
                        <option value="oldest">Terlama</option>
                    </select>
                </div>

                <div id="filter-gallery" class="hidden items-center gap-2">
                    <select id="galleryFilterCategory" class="bg-white border border-slate-200 text-slate-700 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block px-3 py-2 cursor-pointer shadow-sm outline-none transition-all hover:bg-slate-50">
                        <option value="">Semua Kategori</option>
                        <option value="food">Food</option>
                        <option value="customer">Customer</option>
                        <option value="event">Event</option>
                    </select>
                    <select id="gallerySortBy" class="bg-white border border-slate-200 text-slate-700 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block px-3 py-2 cursor-pointer shadow-sm outline-none transition-all hover:bg-slate-50">
                        <option value="latest">Terbaru</option>
                        <option value="oldest">Terlama</option>
                    </select>
                </div>

                <button id="globalReset" class="flex items-center gap-2 px-4 py-2 text-sm font-medium text-slate-600 bg-white border border-slate-200 rounded-lg hover:bg-slate-50 hover:text-indigo-600 shadow-sm transition-all h-[38px]">
                    <i class="uil uil-redo"></i> 
                    <span>Reset</span>
                </button>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden fade-section">
            
            <div id="dashboard-menu" class="overflow-x-auto custom-scrollbar">
                <table class="w-full text-sm text-left text-slate-600">
                    <thead class="text-xs text-slate-500 uppercase bg-slate-50 border-b border-slate-200 sticky top-0 z-10">
                        <tr>
                            <th scope="col" class="px-6 py-4 font-semibold">Info Menu</th>
                            <th scope="col" class="px-6 py-4 font-semibold">Deskripsi</th>
                            <th scope="col" class="px-6 py-4 font-semibold text-center">Tipe</th>
                            <th scope="col" class="px-6 py-4 font-semibold text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach($menus as $menu)
                        <tr class="hover:bg-slate-50/80 transition-colors duration-200 group">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-4">
                                    <img src="{{ asset($menu->image_path) }}" class="w-16 h-16 rounded-xl object-cover shadow-sm border border-slate-100" alt="">
                                    <span class="font-semibold text-slate-800 text-base">{{ $menu->title }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <p class="text-slate-500 line-clamp-2 max-w-xs">{{ $menu->description }}</p>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium border
                                    {{ $menu->type === 'carousel' ? 'bg-purple-50 text-purple-700 border-purple-200' : 'bg-orange-50 text-orange-700 border-orange-200' }}">
                                    {{ ucfirst($menu->type) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <button onclick="openUpdateMenuFromBtn(this)" 
                                        data-id="{{ $menu->id }}" data-title="{{ $menu->title }}" data-description="{{ $menu->description }}" data-type="{{ $menu->type }}"
                                        class="p-2 text-indigo-600 hover:bg-indigo-50 rounded-lg transition" title="Edit">
                                        <i class="uil uil-edit text-lg"></i>
                                    </button>
                                    <button onclick="openDeleteMenuFromBtn(this)" data-id="{{ $menu->id }}"
                                        class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition" title="Hapus">
                                        <i class="uil uil-trash-alt text-lg"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div id="dashboard-gallery" class="overflow-x-auto custom-scrollbar hidden">
                <table class="w-full text-sm text-left text-slate-600">
                    <thead class="text-xs text-slate-500 uppercase bg-slate-50 border-b border-slate-200 sticky top-0 z-10">
                        <tr>
                            <th scope="col" class="px-6 py-4 font-semibold">Foto & Judul</th>
                            <th scope="col" class="px-6 py-4 font-semibold text-center">Kategori</th>
                            <th scope="col" class="px-6 py-4 font-semibold text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach($photos as $photo)
                        <tr class="hover:bg-slate-50/80 transition-colors duration-200 group">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-4">
                                    <div class="w-20 h-14 rounded-lg overflow-hidden border border-slate-200 shadow-sm relative group-img">
                                        <img src="{{ asset($photo->image_path) }}" class="w-full h-full object-cover" alt="">
                                    </div>
                                    <span class="font-medium text-slate-700">{{ $photo->title }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium border
                                {{ $photo->category === 'food' ? 'bg-red-50 text-red-700 border-red-200' :
                                   ($photo->category === 'customer' ? 'bg-blue-50 text-blue-700 border-blue-200' :
                                   ($photo->category === 'event' ? 'bg-green-50 text-green-700 border-green-200' :
                                   'bg-yellow-50 text-yellow-700 border-yellow-200')) }}">
                                   {{ ucfirst($photo->category) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <div class="flex items-center justify-center gap-2">
                                    <button onclick="openUpdatePhotoFromBtn(this)" 
                                        data-id="{{ $photo->id }}" data-title="{{ $photo->title }}" data-category="{{ $photo->category }}"
                                        class="p-2 text-indigo-600 hover:bg-indigo-50 rounded-lg transition">
                                        <i class="uil uil-edit text-lg"></i>
                                    </button>
                                    <button onclick="openDeletePhotoFromBtn(this)" data-id="{{ $photo->id }}"
                                        class="p-2 text-red-600 hover:bg-red-50 rounded-lg transition">
                                        <i class="uil uil-trash-alt text-lg"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            @if($menus->isEmpty() && $photos->isEmpty())
            <div class="p-10 text-center text-slate-400">
                <i class="uil uil-folder-open text-4xl mb-2 block"></i>
                <p>Belum ada data tersedia.</p>
            </div>
            @endif
        </div>
        
        <div class="h-20"></div> </div>
    </main>
  </div>

  <div id="modalChoose" class="fixed inset-0 z-[60] hidden" role="dialog" aria-modal="true">
      <div class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm transition-opacity" onclick="closeChooseModal()"></div>
      <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full items-center justify-center p-4 text-center">
            <div class="relative transform overflow-hidden rounded-2xl bg-white text-left shadow-2xl transition-all w-full max-w-lg scale-95 opacity-0 modal-content">
                <div class="p-6 text-center">
                    <h3 class="text-xl font-bold text-slate-800 mb-6">Mau kelola data apa?</h3>
                    <div class="grid grid-cols-3 gap-4">
                        <button onclick="openTambahMenu()" class="flex flex-col items-center justify-center p-4 rounded-xl border-2 border-orange-100 bg-orange-50 text-orange-600 hover:bg-orange-100 hover:border-orange-300 transition-all gap-2 group">
                            <i class="uil uil-utensils text-3xl group-hover:scale-110 transition-transform"></i>
                            <span class="font-semibold text-sm">Menu</span>
                        </button>
                        <button onclick="openTambahGallery()" class="flex flex-col items-center justify-center p-4 rounded-xl border-2 border-blue-100 bg-blue-50 text-blue-600 hover:bg-blue-100 hover:border-blue-300 transition-all gap-2 group">
                            <i class="uil uil-image text-3xl group-hover:scale-110 transition-transform"></i>
                            <span class="font-semibold text-sm">Galeri</span>
                        </button>
                        <button onclick="openHeaderModal()" class="flex flex-col items-center justify-center p-4 rounded-xl border-2 border-purple-100 bg-purple-50 text-purple-600 hover:bg-purple-100 hover:border-purple-300 transition-all gap-2 group">
                            <i class="uil uil-video text-3xl group-hover:scale-110 transition-transform"></i>
                            <span class="font-semibold text-sm">Video Header</span>
                        </button>
                    </div>
                    <button onclick="closeChooseModal()" class="mt-6 text-slate-400 hover:text-slate-600 text-sm font-medium">Batal</button>
                </div>
            </div>
        </div>
      </div>
  </div>

  <div id="modalHeader" class="fixed inset-0 z-[60] hidden" role="dialog">
    <div class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm" onclick="closeHeaderModal()"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full items-center justify-center p-4">
            <div class="relative w-full max-w-lg transform rounded-2xl bg-white p-6 shadow-2xl transition-all scale-95 opacity-0 modal-content">
                
                <div class="flex justify-between items-center mb-5">
                    <h3 class="text-lg font-bold text-slate-800">Pengaturan Video Header</h3>
                    <button onclick="closeHeaderModal()" class="text-slate-400 hover:text-slate-600">
                        <i class="uil uil-times text-xl"></i>
                    </button>
                </div>

                @php
                    $h_type = $header->video_type ?? 'youtube';
                    $h_yt   = $header->youtube_id ?? 'b2y8iRP0eXg';
                @endphp

                <form action="{{ route('header.update') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf @method('PUT')
                    
                    <div>
                        <label class="block text-xs font-semibold text-slate-500 uppercase mb-3">Sumber Video</label>
                        <div class="flex items-center gap-4">
                            <label class="flex items-center gap-2 cursor-pointer p-3 border border-slate-200 rounded-lg hover:bg-slate-50 w-full">
                                <input type="radio" name="source_type" value="youtube" class="w-4 h-4 text-purple-600 focus:ring-purple-500" 
                                       {{ $h_type == 'youtube' ? 'checked' : '' }} onclick="toggleVideoInput('youtube')">
                                <span class="text-sm font-medium text-slate-700">Link YouTube</span>
                            </label>
                            <label class="flex items-center gap-2 cursor-pointer p-3 border border-slate-200 rounded-lg hover:bg-slate-50 w-full">
                                <input type="radio" name="source_type" value="file" class="w-4 h-4 text-purple-600 focus:ring-purple-500" 
                                       {{ $h_type == 'file' ? 'checked' : '' }} onclick="toggleVideoInput('file')">
                                <span class="text-sm font-medium text-slate-700">Upload File (MP4)</span>
                            </label>
                        </div>
                    </div>

                    <div id="input-youtube" class="{{ $h_type == 'youtube' ? 'block' : 'hidden' }}">
                        <label class="block text-xs font-semibold text-slate-500 uppercase mb-1">URL YouTube</label>
                        <input type="text" name="youtube_url" 
                               value="{{ $h_type == 'youtube' ? 'https://www.youtube.com/watch?v='.$h_yt : '' }}"
                               class="w-full rounded-lg border-slate-300 focus:border-purple-500 focus:ring-purple-500 text-sm p-2.5 bg-slate-50" 
                               placeholder="Contoh: https://www.youtube.com/watch?v=b2y8iRP0eXg">
                        <p class="text-[10px] text-slate-400 mt-1">Copy paste link lengkap dari browser.</p>
                    </div>

                    <div id="input-file" class="{{ $h_type == 'file' ? 'block' : 'hidden' }}">
                        <label class="block text-xs font-semibold text-slate-500 uppercase mb-1">Upload Video</label>
                        <input type="file" name="video_file" accept="video/mp4"
                               class="w-full text-xs text-slate-500 file:mr-2 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-purple-50 file:text-purple-700 hover:file:bg-purple-100">
                        <p class="text-[10px] text-slate-400 mt-1">Format: MP4. Maksimal ukuran: 20MB.</p>
                    </div>

                    <button type="submit" class="w-full bg-purple-600 hover:bg-purple-700 text-white font-semibold py-2.5 rounded-xl transition-all shadow-md hover:shadow-lg mt-4">
                        Simpan Perubahan
                    </button>
                </form>
            </div>
        </div>
    </div>
  </div>

  <div id="modalTambahMenu" class="fixed inset-0 z-[60] hidden" role="dialog">
    <div class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm" onclick="closeTambahMenu()"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
      <div class="flex min-h-full items-center justify-center p-4">
        <div class="relative w-full max-w-md transform rounded-2xl bg-white p-6 shadow-2xl transition-all scale-95 opacity-0 modal-content">
            <div class="flex justify-between items-center mb-5">
                <h3 class="text-lg font-bold text-slate-800">Tambah Menu Baru</h3>
                <button onclick="closeTambahMenu()" class="text-slate-400 hover:text-slate-600"><i class="uil uil-times text-xl"></i></button>
            </div>
            <form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase mb-1">Nama Menu</label>
                    <input type="text" name="title" class="w-full rounded-lg border-slate-300 focus:border-indigo-500 focus:ring-indigo-500 text-sm p-2.5 bg-slate-50" placeholder="Contoh: Nasi Goreng Spesial" required>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase mb-1">Deskripsi</label>
                    <textarea name="description" rows="3" class="w-full rounded-lg border-slate-300 focus:border-indigo-500 focus:ring-indigo-500 text-sm p-2.5 bg-slate-50" required></textarea>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-500 uppercase mb-1">Tipe</label>
                        <select name="type" class="w-full rounded-lg border-slate-300 focus:border-indigo-500 focus:ring-indigo-500 text-sm p-2.5 bg-slate-50">
                            <option value="carousel">Carousel</option>
                            <option value="special">Special</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-500 uppercase mb-1">Foto</label>
                        <input type="file" name="image" class="w-full text-xs text-slate-500 file:mr-2 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" required>
                    </div>
                </div>
                <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2.5 rounded-xl transition-all shadow-md hover:shadow-lg mt-2">Simpan Menu</button>
            </form>
        </div>
      </div>
    </div>
  </div>

  <div id="modalUpdateMenu" class="fixed inset-0 z-[60] hidden" role="dialog">
    <div class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm" onclick="closeUpdateMenu()"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
      <div class="flex min-h-full items-center justify-center p-4">
        <div class="relative w-full max-w-md transform rounded-2xl bg-white p-6 shadow-2xl transition-all scale-95 opacity-0 modal-content">
            <div class="flex justify-between items-center mb-5">
                <h3 class="text-lg font-bold text-slate-800">Edit Menu</h3>
                <button onclick="closeUpdateMenu()" class="text-slate-400 hover:text-slate-600"><i class="uil uil-times text-xl"></i></button>
            </div>
            <form id="formUpdateMenu" method="POST" enctype="multipart/form-data" class="space-y-4" data-action="{{ route('menu.update', ':id') }}">
                @csrf @method('PUT')
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase mb-1">Nama Menu</label>
                    <input type="text" id="updateTitle" name="title" class="w-full rounded-lg border-slate-300 focus:border-indigo-500 focus:ring-indigo-500 text-sm p-2.5 bg-slate-50" required>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase mb-1">Deskripsi</label>
                    <textarea id="updateDescription" name="description" rows="3" class="w-full rounded-lg border-slate-300 focus:border-indigo-500 focus:ring-indigo-500 text-sm p-2.5 bg-slate-50" required></textarea>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-semibold text-slate-500 uppercase mb-1">Tipe</label>
                        <select id="updateType" name="type" class="w-full rounded-lg border-slate-300 focus:border-indigo-500 focus:ring-indigo-500 text-sm p-2.5 bg-slate-50">
                            <option value="carousel">Carousel</option>
                            <option value="special">Special</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-semibold text-slate-500 uppercase mb-1">Ganti Foto (Opsional)</label>
                        <input type="file" name="image" class="w-full text-xs text-slate-500 file:mr-2 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-slate-100 file:text-slate-700 hover:file:bg-slate-200">
                    </div>
                </div>
                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2.5 rounded-xl transition-all shadow-md hover:shadow-lg mt-2">Update Perubahan</button>
            </form>
        </div>
      </div>
    </div>
  </div>

  <div id="modalDeleteMenu" class="fixed inset-0 z-[60] hidden" role="dialog">
    <div class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm" onclick="closeDeleteMenu()"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
      <div class="flex min-h-full items-center justify-center p-4">
        <div class="relative w-full max-w-sm transform rounded-2xl bg-white p-6 text-center shadow-2xl transition-all scale-95 opacity-0 modal-content">
            <div class="w-14 h-14 rounded-full bg-red-100 text-red-500 flex items-center justify-center mx-auto mb-4">
                <i class="uil uil-trash-alt text-2xl"></i>
            </div>
            <h3 class="text-lg font-bold text-slate-800 mb-2">Hapus Menu Ini?</h3>
            <p class="text-sm text-slate-500 mb-6">Tindakan ini tidak dapat dibatalkan. Menu akan hilang dari daftar.</p>
            
            <form id="formDeleteMenu" method="POST" data-action="{{ route('menu.destroy', ':id') }}" class="flex gap-3">
                @csrf @method('DELETE')
                <button type="button" onclick="closeDeleteMenu()" class="flex-1 px-4 py-2.5 bg-slate-100 text-slate-700 font-semibold rounded-xl hover:bg-slate-200 transition">Batal</button>
                <button type="submit" class="flex-1 px-4 py-2.5 bg-red-600 text-white font-semibold rounded-xl hover:bg-red-700 transition shadow-lg shadow-red-500/30">Ya, Hapus</button>
            </form>
        </div>
      </div>
    </div>
  </div>

  <div id="modalTambahPhoto" class="fixed inset-0 z-[60] hidden" role="dialog">
    <div class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm" onclick="closeTambahModal()"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
      <div class="flex min-h-full items-center justify-center p-4">
        <div class="relative w-full max-w-md transform rounded-2xl bg-white p-6 shadow-2xl transition-all scale-95 opacity-0 modal-content">
            <div class="flex justify-between items-center mb-5">
                <h3 class="text-lg font-bold text-slate-800">Upload Foto Baru</h3>
                <button onclick="closeTambahModal()" class="text-slate-400 hover:text-slate-600"><i class="uil uil-times text-xl"></i></button>
            </div>
            <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase mb-1">Judul Foto</label>
                    <input type="text" name="title" class="w-full rounded-lg border-slate-300 focus:border-indigo-500 focus:ring-indigo-500 text-sm p-2.5 bg-slate-50" required>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase mb-1">Kategori</label>
                    <select name="category" class="w-full rounded-lg border-slate-300 focus:border-indigo-500 focus:ring-indigo-500 text-sm p-2.5 bg-slate-50">
                        <option value="food">Food</option>
                        <option value="customer">Customer</option>
                        <option value="event">Event</option>
                        <option value="ambience">Ambience</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase mb-1">File Foto</label>
                    <input type="file" name="image" class="w-full text-xs text-slate-500 file:mr-2 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100" required>
                </div>
                <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2.5 rounded-xl transition-all shadow-md hover:shadow-lg mt-2">Upload Foto</button>
            </form>
        </div>
      </div>
    </div>
  </div>

  <div id="modalUpdatePhoto" class="fixed inset-0 z-[60] hidden" role="dialog">
    <div class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm" onclick="closeUpdatePhoto()"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
      <div class="flex min-h-full items-center justify-center p-4">
        <div class="relative w-full max-w-md transform rounded-2xl bg-white p-6 shadow-2xl transition-all scale-95 opacity-0 modal-content">
            <div class="flex justify-between items-center mb-5">
                <h3 class="text-lg font-bold text-slate-800">Edit Foto</h3>
                <button onclick="closeUpdatePhoto()" class="text-slate-400 hover:text-slate-600"><i class="uil uil-times text-xl"></i></button>
            </div>
            <form id="formUpdatePhoto" method="POST" enctype="multipart/form-data" class="space-y-4" data-action="{{ route('gallery.update', ':id') }}">
                @csrf @method('PUT')
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase mb-1">Judul Foto</label>
                    <input type="text" id="updatePhotoTitle" name="title" class="w-full rounded-lg border-slate-300 focus:border-indigo-500 focus:ring-indigo-500 text-sm p-2.5 bg-slate-50" required>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase mb-1">Kategori</label>
                    <select id="updatePhotoCategory" name="category" class="w-full rounded-lg border-slate-300 focus:border-indigo-500 focus:ring-indigo-500 text-sm p-2.5 bg-slate-50">
                        <option value="food">Food</option>
                        <option value="customer">Customer</option>
                        <option value="event">Event</option>
                        <option value="ambience">Ambience</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-500 uppercase mb-1">Ganti Foto (Opsional)</label>
                    <input type="file" name="image" class="w-full text-xs text-slate-500 file:mr-2 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-slate-100 file:text-slate-700 hover:file:bg-slate-200">
                </div>
                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2.5 rounded-xl transition-all shadow-md hover:shadow-lg mt-2">Simpan Perubahan</button>
            </form>
        </div>
      </div>
    </div>
  </div>

  <div id="modalDeletePhoto" class="fixed inset-0 z-[60] hidden" role="dialog">
    <div class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm" onclick="closeDeletePhoto()"></div>
    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
      <div class="flex min-h-full items-center justify-center p-4">
        <div class="relative w-full max-w-sm transform rounded-2xl bg-white p-6 text-center shadow-2xl transition-all scale-95 opacity-0 modal-content">
            <div class="w-14 h-14 rounded-full bg-red-100 text-red-500 flex items-center justify-center mx-auto mb-4">
                <i class="uil uil-trash-alt text-2xl"></i>
            </div>
            <h3 class="text-lg font-bold text-slate-800 mb-2">Hapus Foto Ini?</h3>
            <p class="text-sm text-slate-500 mb-6">Foto yang dihapus tidak bisa dikembalikan lagi.</p>
            
            <form id="formDeletePhoto" method="POST" data-action="{{ route('gallery.destroy', ':id') }}" class="flex gap-3">
                @csrf @method('DELETE')
                <button type="button" onclick="closeDeletePhoto()" class="flex-1 px-4 py-2.5 bg-slate-100 text-slate-700 font-semibold rounded-xl hover:bg-slate-200 transition">Batal</button>
                <button type="submit" class="flex-1 px-4 py-2.5 bg-red-600 text-white font-semibold rounded-xl hover:bg-red-700 transition shadow-lg shadow-red-500/30">Ya, Hapus</button>
            </form>
        </div>
      </div>
    </div>
  </div>

  <script>
    // 1. Sidebar Toggle
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');
        const isClosed = sidebar.classList.contains('-translate-x-full');
        if (isClosed) {
            sidebar.classList.remove('-translate-x-full');
            overlay.classList.remove('hidden');
        } else {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        }
    }

    // 2. Tab Switcher Logic
    const btnMenu = document.getElementById('btn-menu');
    const btnGallery = document.getElementById('btn-gallery');
    const tableMenu = document.getElementById('dashboard-menu');
    const tableGallery = document.getElementById('dashboard-gallery');
    const filterMenu = document.getElementById('filter-menu');
    const filterGallery = document.getElementById('filter-gallery');

    function setActiveTab(type) {
        if(type === 'menu') {
            btnMenu.classList.add('bg-white', 'text-indigo-600', 'shadow-sm');
            btnMenu.classList.remove('text-slate-500');
            btnGallery.classList.remove('bg-white', 'text-indigo-600', 'shadow-sm');
            btnGallery.classList.add('text-slate-500');
            tableMenu.classList.remove('hidden');
            tableGallery.classList.add('hidden');
            filterMenu.classList.remove('hidden');
            filterMenu.classList.add('flex');
            filterGallery.classList.add('hidden');
            filterGallery.classList.remove('flex');
        } else {
            btnGallery.classList.add('bg-white', 'text-indigo-600', 'shadow-sm');
            btnGallery.classList.remove('text-slate-500');
            btnMenu.classList.remove('bg-white', 'text-indigo-600', 'shadow-sm');
            btnMenu.classList.add('text-slate-500');
            tableGallery.classList.remove('hidden');
            tableMenu.classList.add('hidden');
            filterGallery.classList.remove('hidden');
            filterGallery.classList.add('flex');
            filterMenu.classList.add('hidden');
            filterMenu.classList.remove('flex');
        }
    }

    btnMenu.addEventListener('click', () => setActiveTab('menu'));
    btnGallery.addEventListener('click', () => setActiveTab('gallery'));
    setActiveTab('menu');

    // 3. Modal System (Universal)
    function toggleModal(modalID, show) {
        const modal = document.getElementById(modalID);
        const content = modal.querySelector('.modal-content');
        if (show) {
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden'; 
            setTimeout(() => {
                content.classList.remove('scale-95', 'opacity-0');
                content.classList.add('scale-100', 'opacity-100');
            }, 10);
        } else {
            content.classList.remove('scale-100', 'opacity-100');
            content.classList.add('scale-95', 'opacity-0');
            setTimeout(() => {
                modal.classList.add('hidden');
                document.body.style.overflow = '';
            }, 200);
        }
    }

    // Modal Choose
    function openChooseModal() { toggleModal('modalChoose', true); }
    function closeChooseModal() { toggleModal('modalChoose', false); }

    // Modal Header Video (BARU)
    function openHeaderModal() { closeChooseModal(); toggleModal('modalHeader', true); }
    function closeHeaderModal() { toggleModal('modalHeader', false); }
    
    // Logic Switch Input (Youtube vs File)
    function toggleVideoInput(type) {
        const inputYt = document.getElementById('input-youtube');
        const inputFile = document.getElementById('input-file');
        if(type === 'youtube') {
            inputYt.classList.remove('hidden');
            inputFile.classList.add('hidden');
        } else {
            inputYt.classList.add('hidden');
            inputFile.classList.remove('hidden');
        }
    }

    // Modal Menu
    function openTambahMenu() { closeChooseModal(); toggleModal('modalTambahMenu', true); }
    function closeTambahMenu() { toggleModal('modalTambahMenu', false); }
    function openUpdateMenuFromBtn(btn) {
        const form = document.getElementById('formUpdateMenu');
        form.action = form.dataset.action.replace(':id', btn.dataset.id);
        document.getElementById('updateTitle').value = btn.dataset.title;
        document.getElementById('updateDescription').value = btn.dataset.description;
        document.getElementById('updateType').value = btn.dataset.type;
        toggleModal('modalUpdateMenu', true);
    }
    function closeUpdateMenu() { toggleModal('modalUpdateMenu', false); }
    function openDeleteMenuFromBtn(btn) {
        const form = document.getElementById('formDeleteMenu');
        form.action = form.dataset.action.replace(':id', btn.dataset.id);
        toggleModal('modalDeleteMenu', true);
    }
    function closeDeleteMenu() { toggleModal('modalDeleteMenu', false); }

    // Modal Gallery
    function openTambahGallery() { closeChooseModal(); toggleModal('modalTambahPhoto', true); }
    function closeTambahModal() { toggleModal('modalTambahPhoto', false); }
    function openUpdatePhotoFromBtn(btn) {
        const form = document.getElementById('formUpdatePhoto');
        form.action = form.dataset.action.replace(':id', btn.dataset.id);
        document.getElementById('updatePhotoTitle').value = btn.dataset.title;
        document.getElementById('updatePhotoCategory').value = btn.dataset.category;
        toggleModal('modalUpdatePhoto', true);
    }
    function closeUpdatePhoto() { toggleModal('modalUpdatePhoto', false); }
    function openDeletePhotoFromBtn(btn) {
        const form = document.getElementById('formDeletePhoto');
        form.action = form.dataset.action.replace(':id', btn.dataset.id);
        toggleModal('modalDeletePhoto', true);
    }
    function closeDeletePhoto() { toggleModal('modalDeletePhoto', false); }

    // 4. Search & Highlight Logic (sama seperti sebelumnya)
    const searchInput = document.getElementById('searchInput');
    let highlightedRows = [];
    let highlightIndex = -1;
    function clearHighlights() {
        document.querySelectorAll('.highlighted-row').forEach(el => {
            el.classList.remove('highlighted-row', 'active-highlight');
        });
        highlightedRows = [];
        highlightIndex = -1;
    }
    searchInput.addEventListener('input', (e) => {
        const term = e.target.value.toLowerCase();
        clearHighlights();
        if (!term) return;
        const activeTable = tableMenu.classList.contains('hidden') ? tableGallery : tableMenu;
        const rows = activeTable.querySelectorAll('tbody tr');
        let found = false;
        rows.forEach(row => {
            if(row.innerText.toLowerCase().includes(term)) {
                row.classList.add('highlighted-row');
                highlightedRows.push(row);
                found = true;
            }
        });
        if(!found) {
            const otherTable = tableMenu.classList.contains('hidden') ? tableMenu : tableGallery;
            const otherRows = otherTable.querySelectorAll('tbody tr');
            let foundOther = false;
            otherRows.forEach(row => {
                if(row.innerText.toLowerCase().includes(term)) foundOther = true;
            });
            if(foundOther) {
                if(activeTable === tableMenu) setActiveTab('gallery');
                else setActiveTab('menu');
                searchInput.dispatchEvent(new Event('input'));
            }
        }
    });

    // 5. Filter Table (sama seperti sebelumnya)
    const globalReset = document.getElementById('globalReset');
    const menuTbody = tableMenu.querySelector('tbody');
    const galleryTbody = tableGallery.querySelector('tbody');
    const originalMenuRows = Array.from(menuTbody.querySelectorAll('tr'));
    const originalGalleryRows = Array.from(galleryTbody.querySelectorAll('tr'));
    function filterTable() {
        const menuType = document.getElementById('menuFilterType').value.toLowerCase();
        const menuSort = document.getElementById('menuSortBy').value;
        let mRows = [...originalMenuRows];
        if(menuType) {
            mRows = mRows.filter(row => row.querySelector('td:nth-child(3)').innerText.toLowerCase().includes(menuType));
        }
        if(menuSort === 'oldest') mRows.reverse();
        menuTbody.innerHTML = ''; mRows.forEach(row => menuTbody.appendChild(row));

        const galCat = document.getElementById('galleryFilterCategory').value.toLowerCase();
        const galSort = document.getElementById('gallerySortBy').value;
        let gRows = [...originalGalleryRows];
        if(galCat) {
            gRows = gRows.filter(row => row.querySelector('td:nth-child(2)').innerText.toLowerCase().includes(galCat));
        }
        if(galSort === 'oldest') gRows.reverse();
        galleryTbody.innerHTML = ''; gRows.forEach(row => galleryTbody.appendChild(row));
    }
    ['menuFilterType', 'menuSortBy', 'galleryFilterCategory', 'gallerySortBy'].forEach(id => {
        document.getElementById(id).addEventListener('change', filterTable);
    });
    globalReset.addEventListener('click', () => {
        document.getElementById('menuFilterType').value = "";
        document.getElementById('menuSortBy').value = "latest";
        document.getElementById('galleryFilterCategory').value = "";
        document.getElementById('gallerySortBy').value = "latest";
        document.getElementById('searchInput').value = "";
        clearHighlights();
        filterTable();
    });

    // 6. Animation
    document.addEventListener("DOMContentLoaded", () => {
        const sections = document.querySelectorAll(".fade-section");
        const observer = new IntersectionObserver((entries, obs) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("fade-enter-active");
                    entry.target.classList.remove("fade-enter");
                    obs.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });
        sections.forEach(s => { s.classList.add("fade-enter"); observer.observe(s); });
        const alert = document.getElementById('success-alert');
        if(alert) setTimeout(() => alert.style.display = 'none', 3000);
    });
  </script>
</body>
</html>