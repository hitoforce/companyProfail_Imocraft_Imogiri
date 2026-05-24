<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IMOCRAFT</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f9f5f0;
            color: #333;
        }

        .nav-gradient {
            background: linear-gradient(135deg, #383636 0%, #9fb4c9 100%);
        }

        .hero-section {
            /* Background image and overlay are handled by JS for slider, kept for fallback */
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5));
            /* Fallback overlay */
            background-size: cover;
            position: relative;
            /* Ensure text is above images */
            overflow: hidden;
            /* Hide overflowing parts of images */
        }

        .craft-card {
            transition: all 0.3s ease;
        }

        .craft-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 25px -5px rgba(255, 19, 19, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .footer-bg {
            background: linear-gradient(135deg, #383636 0%, #9fb4c9 100%);
        }

        /* Specific styles for slider images to handle transition */
        .slider-image {
            transition: opacity 1s ease-in-out;
        }
    </style>
</head>

<body>
    <nav class="nav-gradient shadow-md sticky top-0 z-50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <div class="mr-6 md:mr-10">
                        <a href="#" class="text-xl sm:text-2xl font-bold text-gray-800"><img
                                src="{{ asset('admin/img/imc.png') }}" style="height: 50px" alt=""></a>
                    </div>
                    <div class="hidden md:flex space-x-4 lg:space-x-8">
                        <a href="#beranda" class="text-gray-800 hover:text-white transition">Beranda</a>
                        <a href="#jenis-kerajinan" class="text-gray-800 hover:text-white transition">Jenis Kerajinan</a>
                        <a href="#kerajinan-jogja" class="text-gray-800 hover:text-white transition">Kerajinan Di
                            Jogja</a>
                        <a href="#tutorial" class="text-gray-800 hover:text-white transition">Vidio</a>
                        <a href="#tentang-kami" class="text-gray-800 hover:text-white transition">Tentang Kami</a>
                        <a href="/Wisata" class="text-gray-800 hover:text-white transition">Desa Wisata</a>

                        <a href="/Belanja" class="relative text-gray-800 hover:text-white transition">
                            <i class="fas fa-shopping-cart text-xl"></i>
                            <span
                                @forelse ($Product as $p) class="absolute -top-2 -right-2 bg-[#c17a4a] text-white text-xs font-bold rounded-full h-5 w-5 flex items-center justify-center shadow">
                                {{ $p->id }}
                                @empty

                    <div class="text-center py-5 text-white">

                    </div> @endforelse
                                </span>
                        </a>


                    </div>
                </div>

                <div class="md:hidden">
                    <button id="mobile-menu-button" class="text-gray-800 focus:outline-none p-2">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
            <div id="mobile-menu" class="hidden md:hidden mt-4 pb-2">

                <a href="#beranda" class="block py-2 px-4 text-gray-800 hover:text-white transition">Beranda</a>
                <a href="#jenis-kerajinan" class="block py-2 px-4 text-gray-800 hover:text-white transition">Jenis
                    Kerajinan</a>
                <a href="#tutorial" class="block py-2 px-4 text-gray-800 hover:text-white transition">Tutorial</a>
                <a href="#tentang-kami" class="block py-2 px-4 text-gray-800 hover:text-white transition">Tentang
                    Kami</a>

            </div>
        </div>
    </nav>



    <section id="beranda" class="relative text-white">
        @forelse ($Bg as $p)
            <!-- Background image & gradient overlay -->
            <div class="absolute inset-0">
                <img src="{{ Storage::url($p->foto) }}" alt="Kerajinan batik tradisional"
                    class="w-full h-full object-cover brightness-75">
                <div class="absolute inset-0 bg-gradient-to-b from-black/60 to-black/80"></div>
            </div>

            <!-- Content -->
            <div class="relative z-10 flex items-center justify-center min-h-screen px-6 md:px-12 text-center">
                <div class="max-w-4xl">
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold leading-tight mb-6 animate-fade-in-up">
                        {{ $p->nama }}
                    </h1>
                    <p class="text-lg md:text-xl lg:text-2xl text-white/90 mb-2 animate-fade-in-up delay-100">
                        {{ $p->deskripsi }}
                    </p>
                    <p class="text-[10px] text-white/90 mb-4 animate-fade-in-up delay-150">
                        <a href="https://wahyuandalan.com/" class="hover:text-blue-300 transition-colors duration-200"
                            target="_blank" rel="noopener noreferrer">
                            wahyuandalan.com
                        </a>
                    </p>

                    </p>

                    <a href="#jenis-kerajinan"
                        class="inline-block bg-orange-600 hover:bg-orange-700 text-white font-semibold py-3 px-8 rounded-lg shadow-lg transform transition duration-300 hover:scale-105 animate-fade-in-up delay-200">
                        Mulai Jelajahi
                    </a>
                </div>
            </div>
        @empty
            <!-- Jika tidak ada data -->
            <div class="relative z-10 text-center py-32 px-4">
                <h2 class="text-3xl font-bold mb-4">Belum ada data beranda yang ditampilkan.</h2>
                <p class="text-lg">Silakan tambahkan konten melalui panel admin.</p>
            </div>
        @endforelse
    </section>


    <section id="pengertian-kerajinan" class="py-12 md:py-16 bg-white">

        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row items-center">
                @forelse ($About as $p)
                    <div class="md:w-1/2 mb-8 md:mb-0 md:pr-10">
                        <img src="{{ Storage::url($p->foto) }}"
                            alt="Berbagai bahan kerajinan tangan tradisional Indonesia seperti kayu, rotan, kain, dan logam disusun rapi di atas meja kayu"
                            class="rounded-lg shadow-xl w-full h-auto object-cover">
                    </div>
                    <div class="md:w-1/2">
                        <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-4 md:mb-6">{{ $p->nama }}</h2>
                        <p class="text-gray-600 mb-3 md:mb-4 leading-relaxed text-sm md:text-base">
                            {{ $p->deskripsi }}
                        </p>


                    </div>
                @empty
                    <!-- Jika tidak ada data -->
                    <div class="relative z-10 text-center py-32 px-4">
                        <h2 class="text-3xl font-bold mb-4">Belum ada data beranda yang ditampilkan.</h2>
                        <p class="text-lg">Silakan tambahkan konten melalui panel admin.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <section id="jenis-kerajinan" class="py-12 md:py-16 bg-gray-50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12 md:mb-16">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-3 md:mb-4">Jenis-Jenis Kerajinan Itu Apa Aja
                    yah??</h2>
                <p class="text-gray-600 max-w-2xl mx-auto text-sm md:text-base">
                    Yuk temukan berbagai jenis kerajinan tangan tradisional Indonesia yang kaya akan teknik dan bahan
                    dasar.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8">
                <div class="craft-card bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg">
                    <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/ac9ac3a6-6688-4f45-9a0c-6ce8ab22f31c.png"
                        alt="Kerajinan kayu ukir khas Jepara dengan motif daun dan bunga yang rumit"
                        class="w-full h-48 object-cover">
                    <div class="p-5 md:p-6">
                        <h3 class="text-lg md:text-xl font-semibold text-gray-800 mb-2">Kerajinan Kayu</h3>
                        <p class="text-gray-600 text-xs md:text-sm mb-3 md:mb-4">
                            Kerajinan berbahan dasar kayu seperti ukiran, furnitur, dan patung dengan teknik
                            tradisional.
                        </p>

                    </div>
                </div>

                <div class="craft-card bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg">
                    <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/0a77074c-4729-4da0-9f34-8c14164af983.png"
                        alt="Kerajinan anyaman rotan berupa tempat sampah dan keranjang dengan pola geometris"
                        class="w-full h-48 object-cover">
                    <div class="p-5 md:p-6">
                        <h3 class="text-lg md:text-xl font-semibold text-gray-800 mb-2">Kerajinan Anyaman</h3>
                        <p class="text-gray-600 text-xs md:text-sm mb-3 md:mb-4">
                            Teknik menganyam rotan, bambu, atau pandan menjadi beragam produk fungsional dan dekoratif.
                        </p>

                    </div>
                </div>

                <div class="craft-card bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg">
                    <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/012ae5af-e0d2-4ca3-8c80-ff11d369d3a1.png"
                        alt="Berbagai benda logam tembaga dan perak seperti nampan, vas bunga, dan ornamen dinding"
                        class="w-full h-48 object-cover">
                    <div class="p-5 md:p-6">
                        <h3 class="text-lg md:text-xl font-semibold text-gray-800 mb-2">Kerajinan Logam</h3>
                        <p class="text-gray-600 text-xs md:text-sm mb-3 md:mb-4">
                            Pengerjaan logam seperti tembaga, perak, dan kuningan dengan teknik tempa dan ukir.
                        </p>

                    </div>
                </div>

                <div class="craft-card bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg">
                    <img src="https://storage.googleapis.com/workspace-0f70711f-8b4e-4d94-86f1-2a93ccde5887/image/0b78ae87-185a-4e14-9c3e-8a17032c611b.png"
                        alt="Koleksi batik tulis dan cap dengan motif tradisional dari berbagai daerah di Indonesia"
                        class="w-full h-48 object-cover">
                    <div class="p-5 md:p-6">
                        <h3 class="text-lg md:text-xl font-semibold text-gray-800 mb-2">Kerajinan Tekstil</h3>
                        <p class="text-gray-600 text-xs md:text-sm mb-3 md:mb-4">
                            Kain batik, tenun, dan songket yang merupakan warisan budaya tekstil Nusantara.
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="kerajinan-jogja" class="py-16 bg-gray-100">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Judul -->
            <div class="text-center mb-12">
                <h2 class="text-3xl font-extrabold text-gray-800 mb-3">Kerajinan di Yogyakarta</h2>
                <p class="text-gray-600 max-w-xl mx-auto text-base">
                    Eksplorasi kekayaan kerajinan tangan khas Daerah Istimewa Yogyakarta yang sarat makna dan budaya.
                </p>
            </div>

            <!-- Filter dan Search -->


            <!-- Grid Kerajinan -->
            <div id="kerajinan-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @forelse ($Blog as $p)
                    <div class="craft-card bg-white rounded-xl shadow hover:shadow-lg transition transform hover:-translate-y-1 duration-300"
                        data-wilayah="{{ Str::lower(str_replace(' ', '', $p->wilayah)) }}">
                        <img src="{{ Storage::url($p->foto) }}" alt="Gambar {{ $p->judul }}"
                            class="w-full h-48 object-cover rounded-t-xl">
                        <div class="p-4">
                            <h3 class="text-lg font-semibold text-gray-800 mb-2 truncate">{{ $p->judul }}</h3>
                            <p class="text-sm text-gray-600 mb-3 line-clamp-3">{{ $p->deskripsi }}</p>
                            <a href="/Detail"
                                class="text-orange-600 text-xs md:text-sm font-medium hover:text-orange-800 transition">
                                Selengkapnya &rarr;
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="text-center col-span-4 text-gray-600">
                        Belum ada data kerajinan ditambahkan.
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Script Filter Wilayah + Pencarian -->
        <script>
            function filterKerajinan() {
                const input = document.getElementById('search-kerajinan').value.toLowerCase().replace(/\s+/g, '');
                const selected = document.getElementById('filter-wilayah').value.toLowerCase().replace(/\s+/g, '');
                const cards = document.querySelectorAll('.craft-card');

                cards.forEach(card => {
                    const cardWilayah = card.getAttribute('data-wilayah');
                    const cardTitle = card.querySelector('h3').textContent.toLowerCase().replace(/\s+/g, '');

                    const cocokWilayah = (selected === 'semua') || (cardWilayah === selected);
                    const cocokSearch = (input === '') || (cardTitle.includes(input) || cardWilayah.includes(input));

                    if (cocokWilayah && cocokSearch) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            }
        </script>
    </section>

    <section id="manfaat" class="py-12 md:py-16 bg-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12 md:mb-16">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-3 md:mb-4">Manfaat Kerajinan Tradisional
                </h2>
                <p class="text-gray-600 max-w-2xl mx-auto text-sm md:text-base">
                    Kerajinan tidak hanya bernilai estetika, tetapi juga memiliki berbagai manfaat bagi masyarakat dan
                    budaya.
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                <div class="text-center p-5 md:p-6 rounded-lg bg-gray-50">
                    <div
                        class="w-14 h-14 md:w-16 md:h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 md:h-8 md:w-8 text-orange-600"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg md:text-xl font-semibold text-gray-800 mb-2">Pelestarian Budaya</h3>
                    <p class="text-gray-600 text-sm md:text-base">
                        Menjaga warisan budaya dan tradisi leluhur melalui karya-karya yang kaya makna filosofis.
                    </p>
                </div>

                <div class="text-center p-5 md:p-6 rounded-lg bg-gray-50">
                    <div
                        class="w-14 h-14 md:w-16 md:h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 md:h-8 md:w-8 text-orange-600"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-lg md:text-xl font-semibold text-gray-800 mb-2">Ekonomi Kreatif</h3>
                    <p class="text-gray-600 text-sm md:text-base">
                        Menciptakan lapangan pekerjaan dan meningkatkan ekonomi masyarakat pengrajin lokal.
                    </p>
                </div>

                <div class="text-center p-5 md:p-6 rounded-lg bg-gray-50">
                    <div
                        class="w-14 h-14 md:w-16 md:h-16 bg-orange-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 md:h-8 md:w-8 text-orange-600"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </div>
                    <h3 class="text-lg md:text-xl font-semibold text-gray-800 mb-2">Pengembangan Kreativitas</h3>
                    <p class="text-gray-600 text-sm md:text-base">
                        Melatih ketelitian, kesabaran, dan mengembangkan imajinasi serta kreativitas pembuatnya.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section id="galery" class="py-12 md:py-16 bg-gray-50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12 md:mb-16">
                <h2 class="text-3xl font-bold text-gray-800 mb-4">Galery Kami</h2>
                <p class="text-gray-600 max-w-2xl mx-auto text-base">
                    Yuk temukan berbagai documentasi kami
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Card 1 -->
                @forelse ($Galery as $p)
                    <div
                        class="group bg-white rounded-lg shadow-md overflow-hidden cursor-pointer transform transition duration-300 hover:scale-105 hover:shadow-xl">
                        <div class="overflow-hidden">
                            <img src="{{ Storage::url($p->foto) }}" alt="{{ $p->nama }}"
                                class="zoomable w-full h-48 object-cover object-center transition-transform duration-500 group-hover:scale-110" />
                        </div>
                        {{-- <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-2">Kerajinan Kayu</h3>
                        <p class="text-gray-600 text-sm">
                            Kerajinan berbahan dasar kayu seperti ukiran, furnitur, dan patung dengan teknik
                            tradisional.
                        </p>
                    </div> --}}
                    </div>
                @empty
                    <div class="text-center py-5 text-white">
                        <h2>Belum ada data beranda yang ditampilkan.</h2>
                        <p>Silakan tambahkan konten melalui panel admin.</p>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Modal Zoom Fullscreen -->
        <div id="imageModal"
            class="fixed inset-0 bg-black bg-opacity-80 flex items-center justify-center z-50 hidden">
            <!-- Tombol X -->
            <button id="closeModal"
                class="absolute top-4 right-6 text-white text-3xl font-bold hover:text-red-400 transition duration-200">
                &times;
            </button>
            <img id="modalImage" src="" alt="Zoomed Image"
                class="max-w-full max-h-full rounded-lg shadow-lg transition-transform duration-300">
        </div>
    </section>

    <!-- Script Zoom -->
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const images = document.querySelectorAll('.zoomable');
            const modal = document.getElementById('imageModal');
            const modalImg = document.getElementById('modalImage');
            const closeModal = document.getElementById('closeModal');

            images.forEach(img => {
                img.addEventListener('click', () => {
                    modal.classList.remove('hidden');
                    modalImg.src = img.src;
                });
            });

            closeModal.addEventListener('click', () => {
                modal.classList.add('hidden');
            });

            // Jika klik background juga keluar
            modal.addEventListener('click', (e) => {
                if (e.target === modal) {
                    modal.classList.add('hidden');
                }
            });
        });
    </script>




    <section id="tutorial" class="py-12 md:py-16 bg-gray-50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12 md:mb-16">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-3 md:mb-4">Melihat Desa Wisata</h2>
                <p class="text-gray-600 max-w-2xl mx-auto text-sm md:text-base">
                    Mulailah perjalanan kreatif Anda dengan Melihat Desa Wisata dasar kerajinan tangan sederhana. Klik
                    untuk
                    menonton video Desa Wisata yang ada di jogjakarta!
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8">
                @forelse ($Beranda as $p)
                    <div
                        class="bg-white rounded-lg shadow-md overflow-hidden transform hover:scale-[1.02] transition duration-300">
                        <a href="{{ $p->link }}" target="_blank" rel="noopener noreferrer"
                            class="block relative pb-[56.25%]">
                            <img src="{{ Storage::url($p->foto) }}" alt="{{ $p->nama }}"
                                class="absolute h-full w-full object-cover">
                            <div
                                class="absolute inset-0 flex items-center justify-center bg-black bg-opacity-40 opacity-0 hover:opacity-100 transition-opacity duration-300">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-white"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </a>

                        <div class="p-5 md:p-6" x-data="{ expanded: false }">
                            <h3 class="text-lg md:text-xl font-semibold text-gray-800 mb-2">{{ $p->nama }}</h3>

                            <p x-show="!expanded" class="text-gray-600 text-xs md:text-sm mb-2 line-clamp-5"
                                style="display: block;">
                                {{ $p->deskripsi }}
                            </p>
                            <p x-show="expanded" class="text-gray-600 text-xs md:text-sm mb-2"
                                style="display: none;">
                                {{ $p->deskripsi }}
                            </p>

                            <button @click="expanded = !expanded"
                                class="text-blue-600 text-xs underline hover:text-blue-800 transition focus:outline-none">
                                <span x-text="expanded ? 'Sembunyikan' : 'Selengkapnya'"></span>
                            </button>
                        </div>
                    </div>
                @empty
                    <div class="text-center py-5 text-white">
                        <h2>Belum ada data beranda yang ditampilkan.</h2>
                        <p>Silakan tambahkan konten melalui panel admin.</p>
                    </div>
                @endforelse
            </div>
        </div>

        <!-- Alpine.js CDN -->
        <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    </section>



    <section id="quiz" class="py-12 md:py-16 bg-gray-100">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-6">Quiz: Seberapa Dalam Pengetahuan Anda?</h2>
            <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md p-6 md:p-8">
                <div id="quiz-container">
                    <h3 class="text-lg md:text-xl font-semibold mb-4" id="question-text"></h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3 md:gap-4 mb-4 md:mb-6" id="answers-container">
                    </div>
                    <div id="quiz-feedback" class="hidden text-center text-base md:text-lg font-medium mb-4"></div>
                    <button id="next-quiz"
                        class="bg-orange-600 hover:bg-orange-700 text-white font-medium px-5 py-2 rounded-md transition hidden text-sm md:text-base">
                        Pertanyaan Berikutnya
                    </button>
                    <div class="text-sm text-gray-500 mt-4">Soal <span id="current-quiz">1</span> dari <span
                            id="total-quiz"></span></div>
                </div>
            </div>
        </div>
    </section>

    <section id="newsletter" class="py-12 md:py-16 bg-orange-50">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-2xl md:text-3xl font-bold text-gray-800 mb-4">Tetap Terhubung</h2>
                <p class="text-gray-600 mb-4 md:mb-6 max-w-2xl mx-auto text-sm md:text-base">
                    Website ini dibuat semata-mata hanya untuk tujuan edukasi dan motivasi. Kami ingin mengedukasi
                    masyarakat tentang pentingnya melestarikan kerajinan tradisional Yogyakarta serta menumbuhkan rasa
                    cinta terhadap budaya lokal.
                </p>
                <!-- Tambahan Promosi & CTA -->
                <p class="text-gray-700 mb-6 md:mb-8 max-w-2xl mx-auto text-sm md:text-base">
                    Punya produk kerajinan sendiri dan ingin dipromosikan di website kami? 💡
                    <strong>Kami membuka kesempatan untuk UMKM dan pengrajin lokal</strong> agar karyanya bisa tampil di
                    website ini.
                    <br><br>
                    Atau ingin langsung berkunjung dan belanja produk-produk kreatif pilihan kami?
                    Jangan ragu, silakan klik tombol di bawah ini untuk mengisi form atau langsung berbelanja.
                </p>

                <!-- Tombol Daftar -->
                <a href="/Belanja"
                    class="inline-flex items-center bg-white text-gray-800 font-semibold py-2 px-4 rounded-full shadow-md hover:bg-gray-100 transition duration-300">

                    <img src="{{ asset('admin/img/klik.png') }}" style="width: 100px" alt="klik"
                        class="w-6 h-6 ml-2">
                </a>

            </div>
        </div>
    </section>



    <footer id="tentang-kami" class="footer-bg text-white pt-10 pb-6">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8 mb-8">
                <div>
                    <h3 class="text-lg md:text-xl font-semibold mb-4"><img src="{{ asset('admin/img/imc.png') }}"
                            style="width: 200px" alt=""></h3>
                    <p class="text-gray-300 text-xs md:text-sm">
                        Imocraft adalah website yang menampilkan kerajinan tradisional Indonesia sekaligus sebagai media
                        edukasi untuk melestarikan dan mengenalkan budaya kerajinan kepada semua kalangan.


                    </p>
                </div>

                <div>
                    <h4 class="font-semibold mb-4 text-base md:text-lg">Menu</h4>
                    <ul class="space-y-2">
                        <li><a href="#beranda"
                                class="text-gray-300 hover:text-white transition text-xs md:text-sm">Beranda</a></li>
                        <li><a href="#kerajinan-jogja"
                                class="text-gray-300 hover:text-white transition text-xs md:text-sm">Jenis
                                Kerajinan di jogja</a></li>
                        <li><a href="#tutorial"
                                class="text-gray-300 hover:text-white transition text-xs md:text-sm">Tutorial</a></li>
                        <li><a href="#quiz"
                                class="text-gray-300 hover:text-white transition text-xs md:text-sm">Quiz</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-semibold mb-4 text-base md:text-lg">Informasi</h4>
                    <ul class="space-y-2">
                        <li><a href="#tentang-kami"
                                class="text-gray-300 hover:text-white transition text-xs md:text-sm">Tentang Kami</a>
                        </li>
                        <li><a href="#"
                                class="text-gray-300 hover:text-white transition text-xs md:text-sm">Kebijakan
                                Privasi</a></li>
                        <li><a href="#"
                                class="text-gray-300 hover:text-white transition text-xs md:text-sm">Syarat &
                                Ketentuan</a></li>
                        <li><a href="#"
                                class="text-gray-300 hover:text-white transition text-xs md:text-sm">FAQ</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-semibold mb-4 text-base md:text-lg text-white">Hubungi Kami</h4>

                    <!-- WhatsApp -->
                    <div class="flex items-center mb-3">
                        <a href="https://wa.me/6281234567890" target="_blank"
                            class="flex items-center text-white hover:text-[#25D366] active:text-[#25D366] transition-colors duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5 mr-2 text-white hover:text-[#25D366] active:text-[#25D366]"
                                fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M20.52 3.48A11.8 11.8 0 0012 0a11.79 11.79 0 00-9.69 18.66L0 24l5.52-2.31A11.79 11.79 0 0012 24a11.8 11.8 0 008.48-20.52zM12 21.9a9.9 9.9 0 01-5.11-1.41l-.37-.23-3.27 1.38.7-3.4-.22-.35A9.9 9.9 0 1121.9 12 9.92 9.92 0 0112 21.9zm5.46-7.43c-.3-.15-1.75-.86-2.02-.96s-.47-.15-.66.15-.76.95-.93 1.15-.34.22-.63.07a8.14 8.14 0 01-2.39-1.48 8.89 8.89 0 01-1.64-2.03c-.17-.3 0-.46.13-.6s.3-.35.45-.52a2 2 0 00.3-.5.56.56 0 000-.52c-.07-.15-.66-1.59-.91-2.18s-.48-.5-.66-.5h-.56a1.07 1.07 0 00-.76.35 3.19 3.19 0 00-1 2.34 5.55 5.55 0 001.18 2.7A13.2 13.2 0 0012 17.37a5.18 5.18 0 003.17 1 3.7 3.7 0 002.33-1.63 3 3 0 00.43-1.07 1 1 0 00-.47-.7z" />
                            </svg>
                            <span class="text-sm">Chat WhatsApp</span>
                        </a>
                    </div>

                    <!-- Instagram -->
                    <div class="flex items-center mb-3">
                        <a href="https://www.instagram.com/imocraft.jogja/" target="_blank"
                            class="flex items-center text-white hover:text-[#E1306C] active:text-[#E1306C] transition-colors duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5 mr-2 text-white hover:text-[#E1306C] active:text-[#E1306C]"
                                fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-0.081 1.802h-0.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344a3.2 3.2 0 00-1.898 1.898c-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857a3.2 3.2 0 001.898 1.898c.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344a3.2 3.2 0 001.898-1.898c.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.2 3.2 0 00-1.898-1.898c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" />
                            </svg>
                            <span class="text-sm">Instagram</span>
                        </a>
                    </div>

                    <!-- Kunjungi Website -->
                    <div class="flex items-center">
                        <a href="https://wahyuandalan.com/" target="_blank"
                            class="flex items-center text-white hover:text-blue-600 active:text-blue-600 transition-colors duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5 mr-2 text-white hover:text-blue-600 active:text-blue-600"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4a8 8 0 100 16 8 8 0 000-16zm0 0c1.657 0 3 3.134 3 7s-1.343 7-3 7-3-3.134-3-7 1.343-7 3-7zm0 0H4m8 0h8" />
                            </svg>
                            <span class="text-sm">Kunjungi Website Kami</span>
                        </a>
                    </div>
                </div>


            </div>

        </div>

        <div class="border-t border-gray-700 pt-6 text-center">
            <p class="text-gray-300 text-xs md:text-sm">
                &copy; <span id="current-year"></span> Imocraft
            </p>
        </div>
        </div>
    </footer>

    <script>
        // Set current year in footer
        document.getElementById('current-year').textContent = new Date().getFullYear();

        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });

        // Smooth scrolling for anchor links and close mobile menu if open
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();

                const targetId = this.getAttribute('href');
                if (targetId === '#') return; // Do nothing if href is just '#'

                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    targetElement.scrollIntoView({
                        behavior: 'smooth'
                    });
                }

                // Close mobile menu after clicking a link
                const mobileMenu = document.getElementById('mobile-menu');
                if (!mobileMenu.classList.contains('hidden')) {
                    mobileMenu.classList.add('hidden');
                }
            });
        });

        // Image slider functionality
        let currentSlide = 0;
        const slides = document.querySelectorAll('.slider-image');
        // Ensure only the first slide is visible initially by removing opacity-0
        slides.forEach((slide, index) => {
            if (index === 0) {
                slide.classList.remove('opacity-0');
                slide.classList.add('opacity-100'); // Ensure it starts fully visible
            } else {
                slide.classList.add('opacity-0');
                slide.classList.remove('opacity-100');
            }
        });

        function rotateSlides() {
            slides[currentSlide].classList.remove('opacity-100');
            slides[currentSlide].classList.add('opacity-0');

            currentSlide = (currentSlide + 1) % slides.length;

            slides[currentSlide].classList.remove('opacity-0');
            slides[currentSlide].classList.add('opacity-100');

            setTimeout(rotateSlides, 5000); // Change image every 5 seconds
        }
        setTimeout(rotateSlides, 5000); // Start the rotation after initial display


        // Quiz functionality
        const quizData = [{
                question: "Dari daerah manakah kerajinan **batik Jogja** berasal?",
                answers: ["Jawa Barat", "Jawa Tengah", "Jawa Timur", "DIY Yogyakarta"],
                correct: 3 // Index of the correct answer
            },
            {
                question: "Bahan dasar utama kerajinan **gerabah** adalah?",
                answers: ["Kayu", "Bambu", "Tanah Liat", "Rotan"],
                correct: 2
            },
            {
                question: "Kerajinan **ukiran kayu** dari Jepara terkenal karena detailnya yang rumit. Kerajinan ini termasuk jenis kerajinan apa?",
                answers: ["Anyaman", "Logam", "Kayu", "Tekstil"],
                correct: 2
            },
            {
                question: "**Kain songket** banyak ditemukan di daerah mana di Indonesia?",
                answers: ["Jawa", "Sumatera", "Kalimantan", "Sulawesi"],
                correct: 1
            },
            {
                question: "Manfaat utama kerajinan tradisional dalam aspek budaya adalah?",
                answers: ["Meningkatkan ekonomi", "Melatih kesabaran", "Melestarikan warisan budaya",
                    "Menjadi hiasan rumah"
                ],
                correct: 2
            }
        ];

        let currentQuizIndex = 0;
        let score = 0;
        const questionText = document.getElementById('question-text');
        const answersContainer = document.getElementById('answers-container');
        const quizFeedback = document.getElementById('quiz-feedback');
        const nextQuizButton = document.getElementById('next-quiz');
        const currentQuizSpan = document.getElementById('current-quiz');
        const totalQuizSpan = document.getElementById('total-quiz');

        totalQuizSpan.textContent = quizData.length;

        function loadQuiz() {
            const quiz = quizData[currentQuizIndex];
            questionText.innerHTML = quiz.question; // Use innerHTML for bold text

            answersContainer.innerHTML = '';
            quiz.answers.forEach((answer, index) => {
                const button = document.createElement('button');
                button.className =
                    'quiz-answer bg-orange-100 hover:bg-orange-200 text-orange-800 px-4 py-3 rounded-md transition text-sm md:text-base';
                button.textContent = answer;
                button.dataset.index = index; // Store index for checking
                button.addEventListener('click', selectAnswer);
                answersContainer.appendChild(button);
            });

            quizFeedback.classList.add('hidden');
            quizFeedback.textContent = ''; // Clear previous feedback
            nextQuizButton.classList.add('hidden');
            currentQuizSpan.textContent = currentQuizIndex + 1;

            // Enable all answer buttons
            answersContainer.querySelectorAll('.quiz-answer').forEach(btn => {
                btn.disabled = false;
                btn.classList.remove('bg-green-200', 'bg-red-200');
                btn.classList.add('bg-orange-100', 'hover:bg-orange-200');
            });
        }

        function selectAnswer(event) {
            const selectedButton = event.target;
            const selectedIndex = parseInt(selectedButton.dataset.index);
            const quiz = quizData[currentQuizIndex];

            // Disable all answer buttons after selection
            answersContainer.querySelectorAll('.quiz-answer').forEach(btn => {
                btn.disabled = true;
            });

            if (selectedIndex === quiz.correct) {
                score++;
                quizFeedback.textContent = 'Benar! Jawaban Anda tepat.';
                quizFeedback.classList.remove('hidden', 'text-red-600');
                quizFeedback.classList.add('text-green-600');
                selectedButton.classList.remove('bg-orange-100', 'hover:bg-orange-200');
                selectedButton.classList.add('bg-green-200');
            } else {
                quizFeedback.textContent = 'Salah. Coba lagi di pertanyaan berikutnya!';
                quizFeedback.classList.remove('hidden', 'text-green-600');
                quizFeedback.classList.add('text-red-600');
                selectedButton.classList.remove('bg-orange-100', 'hover:bg-orange-200');
                selectedButton.classList.add('bg-red-200');

                // Highlight correct answer
                answersContainer.querySelector(`[data-index="${quiz.correct}"]`).classList.remove('bg-orange-100',
                    'hover:bg-orange-200');
                answersContainer.querySelector(`[data-index="${quiz.correct}"]`).classList.add('bg-green-200');
            }

            nextQuizButton.classList.remove('hidden');
        }

        nextQuizButton.addEventListener('click', () => {
            currentQuizIndex++;
            if (currentQuizIndex < quizData.length) {
                loadQuiz();
            } else {
                displayFinalScore();
            }
        });

        function displayFinalScore() {
            quizFeedback.classList.remove('hidden', 'text-red-600', 'text-green-600');
            quizFeedback.classList.add('text-gray-800');
            quizFeedback.innerHTML =
                `Quiz Selesai! Anda berhasil menjawab **${score} dari ${quizData.length}** pertanyaan dengan benar. <br> Terima kasih telah berpartisipasi!`;
            answersContainer.innerHTML = ''; // Clear answers
            questionText.textContent = ''; // Clear question
            nextQuizButton.classList.add('hidden');
            currentQuizSpan.textContent = quizData.length; // Show total questions
        }

        // Load the first quiz question when the page loads
        loadQuiz();
    </script>
    <style>
        @keyframes fade-in-up {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-up {
            animation: fade-in-up 0.8s ease-out both;
        }

        .delay-100 {
            animation-delay: 0.1s;
        }

        .delay-200 {
            animation-delay: 0.2s;
        }
    </style>
</body>

</html>
