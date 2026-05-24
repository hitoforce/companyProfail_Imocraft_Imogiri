<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desa Wisata Yogyakarta - ArtisanCraft</title>

    <!-- Tailwind & Font Awesome -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        h1, h2, h3 {
            font-family: 'Playfair Display', serif;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 0;
            background-color: #c17a4a;
            transition: width 0.3s;
        }

        .nav-link:hover::after {
            width: 100%;
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800">

    <!-- Navbar -->
    <nav class="bg-white shadow-md py-4 sticky top-0 z-50">
        <div class="container mx-auto px-6 flex justify-between items-center">
            <a href="/" class="text-2xl font-bold text-brown-800">
                <img src="{{ asset('admin/img/imc.png') }}"
                     style="width: 100px" alt="Logo">
            </a>
            {{-- <div class="hidden md:flex space-x-8">
                <a href="/" class="nav-link relative">Beranda</a>
                <a href="#desa" class="nav-link relative">Desa Wisata</a>
                <a href="#kontak" class="nav-link relative">Kontak</a>
            </div> --}}
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="h-[50vh] bg-cover bg-center flex items-center justify-center text-white relative"
             style="background-image: url('{{ asset('admin/img/wis.png') }}');">
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        <div class="relative z-10 text-center px-6">
            <h1 class="text-4xl md:text-5xl font-bold">Desa Wisata di Yogyakarta</h1>
            <p class="mt-4 text-lg">Menjelajahi budaya, alam, dan tradisi dari desa-desa istimewa di Jogja.</p>
        </div>
    </section>

    <!-- Section: Desa Wisata -->
    <section id="desa" class="py-16 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4">Pilihan Desa Wisata</h2>
                <div class="w-20 h-1 bg-yellow-500 mx-auto"></div>
                <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                    Beberapa desa wisata populer di Yogyakarta yang menawarkan keunikan budaya, keindahan alam,
                    dan pengalaman lokal yang autentik.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse ($Dswisata as $p)
                    <div class="bg-white rounded-lg shadow hover:shadow-lg transition overflow-hidden">
                        <img src="{{ Storage::url($p->foto) }}"
                             alt="{{ $p->nama }}"
                             class="w-full h-56 object-cover">
                        <div class="p-6">
                            <h3 class="text-xl font-semibold mb-2">{{ $p->nama }}</h3>
                            <p class="text-gray-600 text-sm">
                                {{ Str::limit($p->deskripsi, 120) }}
                            </p>
                              <a href="/Dtlwis"
                                class="text-orange-600 text-xs md:text-sm font-medium hover:text-orange-800 transition">
                                Selengkapnya &rarr;
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-10 text-gray-500">
                        <h2 class="text-lg font-semibold">Belum ada data desa wisata.</h2>
                        <p>Silakan tambahkan konten melalui panel admin.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-400 text-center py-6 text-sm">
        &copy; 2025 Imocraft.
    </footer>

</body>

</html>
