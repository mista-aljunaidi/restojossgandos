<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Login - Resto Joss Gandos</title>
    <link rel="icon" type="image/jpeg" href="public/img/logojossgandos.png">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/gsap.min.js"></script>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
      body { font-family: 'Inter', sans-serif; }
      .fade-in { opacity: 0; transform: translateY(20px); transition: opacity 0.8s ease-out, transform 0.8s ease-out; }
      .fade-in.show { opacity: 1; transform: translateY(0); }
    </style>
</head>

<body class="bg-gray-50 min-h-screen flex items-center justify-center p-4">

  <div class="max-w-md w-full bg-white rounded-2xl shadow-2xl overflow-hidden fade-in show">
    
    <div class="bg-red-700 p-6 text-center relative overflow-hidden">
      <div class="flex justify-center mb-4">
         <img src="public/img/logojossgandos.png" 
              alt="Logo Joss Gandos" 
              class="h-24 w-24 object-cover rounded-full border-4 border-white/30 shadow-xl">
      </div>
      <h2 class="text-white text-xl font-semibold tracking-wide">Login Admin</h2>
    </div>

    <div class="p-8">
      @if($errors->any())
        <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded-r shadow-sm">
          <div class="flex">
            <div class="flex-shrink-0"><i class="uil uil-exclamation-triangle text-red-500 text-xl"></i></div>
            <div class="ml-3"><p class="text-sm text-red-700 font-medium">{{ $errors->first() }}</p></div>
          </div>
        </div>
      @endif

      <form method="POST" action="{{ route('login') }}" class="space-y-6">
        @csrf
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Username</label>
          <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none"><i class="uil uil-user text-gray-400 text-lg"></i></div>
            <input type="text" name="username" value="{{ old('username') }}" class="w-full pl-10 pr-4 py-3 rounded-lg bg-gray-50 border border-gray-300 text-gray-900 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-200 placeholder-gray-400" placeholder="Masukkan username anda" required>
          </div>
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
          <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none"><i class="uil uil-lock text-gray-400 text-lg"></i></div>
            <input type="password" name="password" class="w-full pl-10 pr-4 py-3 rounded-lg bg-gray-50 border border-gray-300 text-gray-900 focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent transition duration-200 placeholder-gray-400" placeholder="••••••••" required>
          </div>
        </div>

        <button type="submit" class="w-full bg-red-700 text-white font-bold py-3 px-4 rounded-lg hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 shadow-lg transform transition hover:-translate-y-0.5 duration-200 flex justify-center items-center gap-2">
          <span>Sign In</span><i class="uil uil-arrow-right"></i>
        </button>
      </form>
    </div>
    
    <div class="bg-gray-50 px-8 py-4 text-center border-t border-gray-100">
      <p class="text-xs text-gray-400">&copy; {{ date('Y') }} Resto Joss Gandos System.</p>
    </div>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
        const fadeEl = document.querySelector('.fade-in');
        if(fadeEl) { setTimeout(() => { fadeEl.classList.add('show'); }, 100); }
    });
  </script>
</body>
</html>