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
<nav class="bg-white border-2 p-4 mb-1 sticky top-0 z-10">
    <div class="container mx-auto flex justify-between items-center">
        <a href="#" class="text-2xl font-semibold bg-gradient-to-r from-blue-800 to-pink-400 text-transparent bg-clip-text font-bold pl-5">Digitaliz</a>
        <div class="space-x-4">
          <input class="card rounded pl-2 py-1 justify border-b-2 border-purple-500 hover:bg-gray-100 px-2 py-2 rounded" type="Search" placeholder="Search">
          <a href="#" class="text-purple-500 mx-2 hover:bg-gray-300 px-1 py-2 rounded">Home</a>
            <a href="{{ url('/blog') }}" class="text-purple-500 hover:bg-gray-300 px-1 py-2 rounded">Blog</a>
            <a href="{{ url('/about') }}" class="text-purple-500 mx-2 hover:bg-gray-300 px-1 py-2 rounded">About</a>
        </div>
    </div>
</nav>

<div class="bg-gradient-to-r from-purple-700 to-transparent">
  <div class="py-40 text-center bg-cover bg-center opacity-75" style="background-image: url('/assets/css/bg1.jpg')"></div>
  <div class="text-center w-screen absolute top-48">
      <h1 class="text-4xl font-semibold mb-2 text-white">Welcome to Our Blog</h1>
      <p class="mb-20 text-white ">Read our latest articles and stay updated.</p>
    </div>
</div>

<div class="container mx-auto sm:mx-auto">
  <div class="ml-10 text-2xl pt-10 pb-4">
    <h1 class="font-semibold text-purple-800">Featured Posts</h1>
  </div>
</div>

<!-- <main class="container mx-auto p-4">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($article as $data)
            <a href="#" class="bg-white rounded-lg overflow-hidden shadow-md transition duration-300 transform hover:-translate-y-1 hover:shadow-lg">
                <img src="https://via.placeholder.com/400x200" alt="Blog Post" class="w-full h-48 object-cover object-center">
                <div class="p-6">
                    <h2 class="text-xl font-semibold mb-2">{{ $data -> title}}</h2>
                    <p class="text-gray-600">{{ $data->content }}</p>
                    <div class="mt-4">
                        <span class="text-purple-400">Read more</span>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</main> -->

<main class="container mx-auto p-4">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @php
            $counter = 0;
        @endphp
        @foreach ($article as $data)
            @if ($counter < 6)
                <div class="bg-white rounded-lg overflow-hidden shadow-md transition duration-300 transform hover:-translate-y-1 hover:shadow-lg">
                <img src="{{ $data->getFirstMediaUrl('image') }}" alt="Blog Post" class="w-full h-48 object-cover object-center">
                    <div class="p-6">
                        <h2 class="text-xl font-semibold mb-2">{{ $data -> title}}</h2>
                        <p class="text-gray-600">{{ $data->description }}</p>
                    </div>
                </div>
                @php
                    $counter++;
                @endphp
            @endif
        @endforeach
    </div>
    
    <div class="flex justify-center mt-4">
        <ul class="flex list-none">
            {{-- Previous Page Link --}}
            @if ($article->previousPageUrl())
                <li class="mr-2">
                    <a href="{{ $article->previousPageUrl() }}" class="text-purple-500 hover:underline">Previous</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($article->links() as $page => $url)
                @if (is_string($page))
                    <li class="mr-2"><span class="px-2 py-1 bg-purple-500 text-white rounded-full">{{ $page }}</span></li>
                @else
                    <li class="mr-2"><a href="{{ $url }}" class="px-2 py-1 hover:bg-purple-500 hover:text-white rounded-full">{{ $page }}</a></li>
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($article->nextPageUrl())
                <li class="mr-2">
                    <a href="{{ $article->nextPageUrl() }}" class="text-purple-500 hover:underline">Next</a>
                </li>
            @endif
        </ul>
    </div>

    <div class="grid justify-items-end text-purple-500">
        <a href="{{ url('/blog') }}" class="hover:bg-gray-200 px-2 py-2 rounded font-bold">Selengkapnya</a>
    </div>
</main>


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
                      <ul class="flex flex-col h-1/6 text-gray-300">
                          <a href="#" class="hover:text-gray-100 transition duration-300">Home</a>
                          <a href="#" class="hover:text-gray-100 transition duration-300">Blog</a>
                          <a href="#" class="hover:text-gray-100 transition duration-300">About</a>
                          <a href="#" class="hover:text-gray-100 transition duration-300">Contact</a>
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
