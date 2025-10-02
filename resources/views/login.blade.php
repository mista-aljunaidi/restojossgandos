<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login Page</title>
  <link rel="icon" type="image/jpeg" href="img/logo-joss-gandos.png">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center h-screen bg-gray-100">

  <div class="bg-white shadow-lg rounded-xl p-8 w-96">
    <h2 class="text-2xl font-bold text-center text-red-700 mb-6">Login</h2>

    {{-- Pesan error --}}
    @if($errors->any())
      <div class="mb-4 text-red-600 text-sm">
        {{ $errors->first() }}
      </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
      @csrf

      <div class="mb-4">
        <label class="block text-sm mb-1">Username</label>
        <input 
          type="text" 
          name="username" 
          value="{{ old('username') }}" 
          class="w-full border px-3 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500" 
          required
        >
      </div>

      <div class="mb-4">
        <label class="block text-sm mb-1">Password</label>
        <input 
          type="password" 
          name="password" 
          class="w-full border px-3 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500" 
          required
        >
      </div>

      <button type="submit" class="w-full bg-red-700 text-white py-2 rounded-md hover:bg-red-800 transition">
        Submit
      </button>
    </form>
  </div>

</body>
</html>