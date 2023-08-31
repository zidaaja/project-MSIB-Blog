<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Blog</title>
</head>
<body class="bg-gray-100">

<!-- Navbar -->
<nav class="bg-white border-1 p-4 mb-1 sticky top-0 z-10">
    <div class="container mx-auto flex justify-between items-center">
        <a href="#" class="text-2xl font-semibold bg-gradient-to-r from-blue-800 to-pink-400 text-transparent bg-clip-text font-bold pl-5">Digitaliz</a>
        <div class="space-x-4">
          <input class="card rounded pl-2 py-1 justify border-b-2 border-purple-500 hover:bg-gray-100 px-2 py-2 rounded" type="Search" placeholder="Search">
          <a href="{{ url('/home') }}" class="text-purple-500 mx-2 hover:bg-gray-300 px-1 py-2 rounded">Home</a>
            <a href="{{ url('/blog') }}" class="text-purple-500 hover:bg-gray-300 px-1 py-2 rounded">Blog</a>
            <a href="#" class="text-purple-500 mx-2 hover:bg-gray-300 px-1 py-2 rounded">About</a>
        </div>
    </div>
</nav>

<!-- Detail Blog -->
<div class="container mx-auto px-4 py-8">

    <!-- Judul Blog -->
    <h1 class="text-4xl font-semibold mb-4">Judul Blog</h1>

    <!-- Informasi Penulis & Tanggal -->
    <p class="text-gray-500 mb-2">Ditulis oleh <span class="font-semibold">Nama Penulis</span> pada <span class="font-semibold">Tanggal</span></p>

    <!-- Konten Blog -->
    <div class="bg-white rounded-lg shadow p-6">
        <!-- Konten Utama Blog -->
        <p class="mb-4">
            Konten blog
        </p>
        
        <!-- Gambar Blog (jika diperlukan) -->
        <img src="gambar_blog.jpg" alt="Gambar Blog" class="w-full rounded-lg mb-4">

        <!-- Paragraf Lanjutan -->
        <p>
            Paragraf lanjutan untuk konten blog.
        </p>
    </div>

</div>


<!-- Blog List Section -->
    </body>
    <footer class="bg-purple-400 text-white">
          <div class="container mx-auto py-8">
              <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                  <div class="mb-4">
                      <h3 class="text-lg font-semibold mb-2">Digitaliz</h3>
                      <p class="text-gray-300">Digitaliz are rights reserved</p>
                  </div>
                  <div class="mb-4">
                      <h3 class="text-lg font-semibold mb-2">Navigasi</h3>
                      <ul class="list-disc list-inside text-gray-300">
                          <li><a href="#" class="hover:text-gray-100 transition duration-300">Home</a></li>
                          <li><a href="#" class="hover:text-gray-100 transition duration-300">Blog</a></li>
                          <li><a href="#" class="hover:text-gray-100 transition duration-300">About</a></li>
                          <li><a href="#" class="hover:text-gray-100 transition duration-300">Contact</a></li>
                      </ul>
                  </div>
                  <div class="mb-4">
                      <h3 class="text-lg font-semibold mb-2">Kontak</h3>
                      <p class="text-gray-300">Email: hello@digitaliz.net</p>
                      <p class="text-gray-300">Telepon: +62 82255276688</p>
                  </div>
                  <div class="mb-4">
                      <h3 class="text-lg font-semibold mb-2">Ikuti Kami</h3>
                      <div class="flex space-x-4">
                          <a href="#" class="text-gray-300 hover:text-gray-100 transition duration-300">
                              <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                  <!-- Icon media sosial (misal: Facebook) -->
                              </svg>
                          </a>
                          <a href="#" class="text-gray-300 hover:text-gray-100 transition duration-300">
                              <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                  <!-- Icon media sosial (misal: Twitter) -->
                              </svg>
                          </a>
                          <a href="#" class="text-gray-300 hover:text-gray-100 transition duration-300">
                              <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                  <!-- Icon media sosial (misal: Instagram) -->
                              </svg>
                          </a>
                      </div>
                  </div>
              </div>
          </div>
      </footer>
</html>
